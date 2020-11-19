<?php
namespace App\Http\Controllers;

use App\Models\Main;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
//use App\User;

Class MainController extends Controller {
use ApiResponser;
 private $request;

 public function __construct(Request $request){
 $this->request = $request;
 }
 public function getUsers(){

    $users = Main::all();
    return response($users, 200);

  
}

public function index()
{
    $users = User ::all();
    return $this->successResponse($users);
  $message = 'Welcome to database';
  return $message;
}

public function addUser(Request $request ){
    $rules = [
        'username' => 'required|max:50',
        'password' => 'required|max:20',
    
    ];

    $this->validate($request, $rules);
    $user = Main::create($request->all());
    return $this->successResponse($user, Response::HTTP_CREATED);
    //return response($user, 201);
}

    public function show($id)
{

     $user = Main::find($id);
     return $user;

}

public function update(Request $request,$id){
    switch ($request->method())
    {
    case 'PUT':
    $rules = [
    'username' => 'required|max:50',
    'password' => 'required|max:20',
  
    ];

break;

case 'PATCH':
    $rules = [
        'username' => 'required_without:password|max:50',
        'password' => 'required_without:username|max:20',

    ];

break;

    default;
        //invalid
break;

    }

    $this->validate($request, $rules);
    $user = Main::find($id);
        
   switch($request->method()){
    

        case 'PUT':
            $user->username = $request->input('username');
            $user->password = $request->input('password');

        break;

        case 'PATCH':
            if(!empty($request->input('username'))){
                $user->username = $request->input('username');
            }
            else{
                $user->password = $request->input('password');
            }
        break;

        default:
        //invalid
    break;
    }

    $user->fill($request->all());
    $user->save();

    return 'data updated as '.$user;

}

public function delete($id){
    $user = Main::find($id);
    $user->delete();

    return 'data '.$user.'has been deleted';
    }
}
