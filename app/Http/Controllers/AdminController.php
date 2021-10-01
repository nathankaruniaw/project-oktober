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

    public function userIndex(){

        $Users=DB::table('users')
            ->get();

        return view('admin/users/index', compact('Users'));
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

    public function changePassword(Request $request){

        DB::table('users')
            ->where('email', $request->emailUser)
            ->update([
                'password' => $request->password
            ]);

        return response()->json();
    }
}
