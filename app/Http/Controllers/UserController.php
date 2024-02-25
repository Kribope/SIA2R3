<?php

namespace App\Http\Controllers;


use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\User;

Class UserController extends Controller {

    use ApiResponser;

    private $request;

    public function __construct(Request $request){
        $this -> request = $request;
    }

    //GET ALL THE USERS

    public function getUsers(){

        $users = User::all();
        
        return response()->json(['data' => $users], 200);

    }

    //GET THE USER BY INDEX

    public function index(){

        $users = User::all();

        return $this -> successResponse($users);
    }

    public function addUser(Request $request){

        $rules = [
            'username' => 'required|max:20',
            'password' => 'required|max:20',
            'gender' => 'required|in:Male,Female',
            ];

        $this->validate($request,$rules);

        $user = User::create($request->all());

        return $this->successResponse($user,Response::HTTP_CREATED);

    }   
}