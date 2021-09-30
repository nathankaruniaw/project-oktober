<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use Yajra\Datatables\Datatables;

class SectionController extends Controller
{

    public function index(){

        return view('admin.section.index');
    }

    public function sectionGetData(){

        // Sub Query dan aliases untuk pengambilan nama nya
        $data = DB::table('page')
            ->where('idPage', DB::raw('idSubPage'))
            ->get();

        return Datatables::of($data)
            ->editColumn('subPage', function($data){
                $subPages = DB::table('page')
                ->where('idSubPage', $data->idPage)
                ->where('idPage', '<>', $data->idPage)
                ->get();

                $counter = 0;
                $output = '';

                foreach($subPages as $subPage){
                    if($counter == 0){
                        $output .= $subPage->namaPage;
                        $counter++;
                    }
                    elseif($counter <=2){
                        $output .= ', '.$subPage->namaPage;
                        $counter++;
                    }
                    elseif($counter == 3){
                        $output .= ', ...';
                        $counter++;
                    }
                }

                return $output;

            })
            ->addColumn('action', function($data){
                return view('admin._action', [
                    'model' => $data,
                    'detail' => route('sectionAddData',$data->idPage),
                ]);
            })
            ->make(true);
    }

    public function sectionAddData($id){

        $data = DB::table('page')
            ->where('idPage', $id)
            ->first();

        return view('admin.section.detail', compact('data'));
    }

    public function sectionGetSectionData(Request $request){
        $data = DB::table('pageSection')
            ->where('idPage', $request->idPage)
            ->leftJoin('section', 'section.idSection', 'pageSection.idSection')
            ->orderBy('pageSection.urutanPageSection', 'asc')
            ->get();

        $section = DB::table('section')
            ->orderBy('idSection', 'asc')
            ->get();

        $data = [$data, $section];

        return response()->json($data);
    }
}
