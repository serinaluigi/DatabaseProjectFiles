<?php

namespace App\Http\Controllers;

use App\Models\Main;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

//use App\User;

class UserController extends Controller
{
    use ApiResponser;

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getUsers()
    {

        $users = Main::all();
        return response($users, 200);
    }

    public function index()
    {
        $users = User::all();
        return $this->successResponse($users);

    }

    public function addUser(Request $request)
    {
        $rules = [
            'username' => 'required|max:50',
            'password' => 'required|max:20',

        ];

        try {
            $this->validate($request, $rules);
        } catch (ValidationException $e) {
        }

        $user = DB::insert('insert into tbluser (username, password) values (?, ?)',
            [$request->input("username"), $request->input("password")]);

        return $this->successResponse($user, Response::HTTP_CREATED);
    }

    public function show($id)
    {

        $user = Main::find($id);
        return $user;

    }

    public function update(Request $request,$id)
    {
        $rules = [
            'username' => 'required|max:50',
            'password' => 'required|max:20',
        ];
        $this->validate($request, $rules);
        $username = $request->input('username');
        $password = $request->input('password');
        $user = DB::update("UPDATE `tbluser` SET `username` = ?, `password` = ? WHERE `tbluser`.`id` = ?"
            ,[$username,$password,$id]);
        return $this->successResponse($user, Response::HTTP_CREATED);
    }

    public function delete($id)
    {
        $user = DB::delete("DELETE FROM `tbluser` WHERE `tbluser`.`id` = ?",[$id]);

        return $this->successResponse($user, Response::HTTP_CREATED);
    }
}
