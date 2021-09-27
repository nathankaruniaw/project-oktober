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

        return view('admin/adduser');
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
                'password'=> $request->password
            ]);

        // $data = $request->all();
        // User::create($data);

        return response()->json($data);
    }
}
