<?php
namespace App\Http\Controllers;
//use App\User;
use App\Models\UserJob; // <-- your model is located inside Models Folder
use Illuminate\Http\Response; // Response Components
use App\Traits\ApiResponser; // <-- use to standardized our codefor api response
use Illuminate\Http\Request; // <-- handling http request in lumen
use DB; // <-- if your not using lumen eloquent you can use DB component in lumen

Class UserJobController extends Controller {
 // use to add your Traits ApiResponser
 use ApiResponser;
 private $request;
 public function __construct(Request $request){
 $this->request = $request;
 }

 /**
 * Return the list of usersjob
 * @return Illuminate\Http\Response
 */
 public function index()
 {
 $usersjob = UserJob::all();
 return $this->successResponse($usersjob);
 }

 /**
 * Obtains and show one userjob
 * @return Illuminate\Http\Response
 */

 public function show($id)
 {
    $user = UserJob::find($id);
    return $this->successResponse($user);
 }

 public function add(Request $request){
   $rules = [
   'jobname' => 'required|max:20',
   'jid' => 'required|numeric|min:1|not_in:0',
   ];
   $this->validate($request,$rules);
   $userjob =UserJob::findOrFail($request->jobid);
   
   $user = User::create($request->all());

   return $this->successResponse($user, Response::HTTP_CREATED);
}

public function update(Request $request,$id){
   $rules = [
             'jobname' => 'max:20',
              'jid' => 'required|numeric|min:1|not_in:0',
            ];
            $this->validate($request, $rules);
            $userjob = UserJob::findOrFail($request->jobid);
            $user = User::findOrFail($id);
            $user->fill($request->all());

            if ($user->isClean()) {
               return $this->errorResponse('No values changed',
               Response::HTTP_UNPROCESSABLE_ENTITY);
               }
               $user->save();
               return $this->successResponse($user);
               
               


}

}