<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\User as UserResource;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        //
      $users = User::paginate(15);
      
      return UserResource::collection($users);
    }
    
    public function create()
    {
      
    }

    public function store(Request $request)
    {
        # Gathering of User information
        $firstname = $request->input('firstname');
        $lastname =  $request->input('lastname');
        $phone_number = $request->input('phone_number');
        $email =  $request->input('email');
        $username = $request->input('username');
        $password = Hash::make( $request->input('password') );
        
        # Saving New Record
        $user = new User;
        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->phone_number = $phone_number;
        $user->email = $email;
        $user->username = $username;
        $user->password = $password;

        $response = [ "result" => "error", "message" => "Failed to register!"];

        if( $user->save() ) {
           $response = [ "result" => "success", "message" => "Registration process is successful." ];
        }
        
        return $response;
        
        # TODO: Send A Push notification to your device :)
    
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
    
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');    
        $credentials = ["username" => $username, "password" => $password];

        $response = [ "result" => "error", "message" => "Username or Password does not exist!"];

        if(Auth::attempt($credentials)) {
            $response = [ "result" => "success", "message" => "Login Successful", "user_data" => Auth::user()];
        } 

        return $response;
    }
}
