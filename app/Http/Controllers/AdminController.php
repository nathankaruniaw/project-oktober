<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Response;
use DB;

class AdminController extends Controller
{
    public function index(){

        return view('admin/dashboard');
    }

    public function addUser(){

        $Users=DB::table('users')
            ->get();

        return view('admin/adduser', compact('Users'));
    }

    public function insertNewUser(Request $request){

        $data = request()->validate([
            'name' => 'max:50',
            'email' => 'email'
        ]);

        DB::table('users')
            ->insert([
                'name'=> $request->name,
                'email'=> $request->email,
                'password'=> $request->password,
                'role'=> $request->role
            ]);

        // $data = $request->all();
        // User::create($data);

        return response()->json($data);
    }
}
