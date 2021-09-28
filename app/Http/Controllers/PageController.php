<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use Yajra\Datatables\Datatables;
class PageController extends Controller
{

    public function index(){

        return view('admin.pages.index');
    }

    public function pageGetData(){

        $data = DB::table('page')
            ->where('idPage', DB::raw('idSubPage'))
            ->get();

        return Datatables::of($data)
            ->addColumn('action', function($data){
                return view('admin._action', [
                    'model' => $data,
                    'delete' => route('pageDeleteData',$data->idPage),
                    'edit' => route('pageEditData',$data->idPage),
                ]);
            })
            ->make(true);

    }

    public function pageEditData(Request $request){

        return view('admin.pages.detail');
    }
}
