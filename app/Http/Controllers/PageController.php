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

    public function pageAddData(Request $request){

        $max = DB::table('page')->max('idPage');
        $max = $max + 1;

        DB::table('page')
            ->insert([
                'namaPage' => $request->namaPage,
                'statusPage' => $request->statusPage,
                'idSubPage' => $max,
            ]);
    }

    public function pageEditData(Request $request){

        $page = DB::table('page')
            ->where('idPage', $request->idPage)
            ->first();

        return view('admin.pages.detail');
    }

    public function pageDeleteData($id){

        DB::table('page')
            ->where('idSubPage', $id)
            ->delete();
    }
}
