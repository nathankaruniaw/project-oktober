<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Response;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;

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

        $password = Hash::make($request->password);

        DB::table('users')
            ->insert([
                'name'=> $request->name,
                'email'=> $request->email,
                'password'=> $password,
                'role'=> $request->role
            ]);

        // $data = $request->all();
        // User::create($data);

        return response()->json($data);
    }

    public function deleteUser(Request $request){

        DB::table('users')
            ->where('id', $request->id)
            ->delete();

        return response()->json();
    }

    public function changePassword(Request $request){

        $password = Hash::make($request->password);

        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update([
                'password' => $password
            ]);

        return response()->json();
    }
}
