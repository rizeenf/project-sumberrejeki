<?php

namespace App\Http\Controllers;

// USED MODEL
use App\Models\mStaff;

use App\Http\Controllers\GeneralController;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class SubBrandController extends GeneralController
{
    public function index(Request $request)
    {
        // GET DATA
        $subbrands = GeneralController::trashSubBrand(false);
        $categories = GeneralController::trashCategory(false);
        $brands = GeneralController::trashBrand(false);
        $dataStaff = mStaff::where('user_id', '=', Auth::user()->id)->first();

        // PREPARING DATATABLE & CREATING COLUMN 'ACTION'
        if($request->ajax()){
            $data = GeneralController::trashSubBrand(false);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function($row){
                        if($row->status == 1){
                            return 'Aktif';
                        }else{
                            return 'Non-Aktif';
                        }
                    })
                    ->addColumn('action', function($row){
                        
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editSubBrand"><i class="fa fa-pencil"></i> Edit</a>';
   
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteSubBrand"><i class="fa fa-trash"></i> Hapus</a>';
   
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        // CREATING LOG ACTIVITY
        GeneralController::addToLog($request, 'Listing Sub Brand Products', Auth::user()->id);

        // RETURNING & SEND DATA TO VIEW
        return view('subbrand', compact('subbrands', 'categories', 'brands', 'dataStaff'));
    }

    public function store(Request $request)
    {
        if($request->sub_brand_id == NULL){
            GeneralController::addSubBrand($request->name, $request->category, $request->brand, Auth::user()->id);

            // SEND TO LOG ACTIVITY
            GeneralController::addToLog($request, 'Creating Sub Brand Products '.$request->name, Auth::user()->id);

            // RETURNING & SEND DATA TO VIEW
            return response()->json(['success'=>'Sub Brand Products '.$request->name.' Berhasil Dibuat']);
        }else{
            // PARSING DATA & SEND TO DB
            GeneralController::updateSubBrand($request->sub_brand_id, $request->name, $request->category, $request->brand, Auth::user()->id);

            // SEND TO LOG ACTIVITY
            GeneralController::addToLog($request, 'Updating Sub Brand Products '.$request->name, Auth::user()->id);

            // RETURNING & SEND DATA TO VIEW
            return response()->json(['success'=>'Sub Brand Products '.$request->name.' Berhasil Diubah']);
        }
    }

    public function destroy(Request $request, $id)
    {
        // PREPARING ELOQUENT
        $data = GeneralController::detailSubBrand($id);
        $name = $data->name;
        $subbrands = GeneralController::deleteTemporarySubBrand($id, Auth::user()->id);

        // CONDITION IF SUCCESS DELETE DATA
        if($subbrands)
        {
            // SEND TO LOG ACTIVITY
            Controller::addToLog($request, 'Deleting Temporary Sub Brand Products '.$name, Auth::user()->id);
        }
     
        // SEND NOTIFICATION TO CONSOLE
        return response()->json(['success'=>'Sub Brand Products '.$name.' Berhasil Dihapus.']);
    }

    public function edit($id)
    {
        // LOAD DATA
        $subbrands = GeneralController::detailSubBrand($id);

        // SEND DATA TO JSON
        return response()->json($subbrands);
    }
}
