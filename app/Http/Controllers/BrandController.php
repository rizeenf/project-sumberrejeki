<?php

namespace App\Http\Controllers;

// USED MODEL
use App\Models\mStaff;

use App\Http\Controllers\GeneralController;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class BrandController extends GeneralController
{
    public function index(Request $request)
    {
        // GET DATA
        $brands = GeneralController::trashBrand(false);
        $categories = GeneralController::trashCategory(false);
        $dataStaff = mStaff::where('user_id', '=', Auth::user()->id)->first();

        // PREPARING DATATABLE & CREATING COLUMN 'ACTION'
        if($request->ajax()){
            $data = GeneralController::trashBrand(false);
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
                        
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBrand"><i class="fa fa-pencil"></i> Edit</a>';
   
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBrand"><i class="fa fa-trash"></i> Hapus</a>';
   
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        // CREATING LOG ACTIVITY
        GeneralController::addToLog($request, 'Listing Brand Products', Auth::user()->id);

        // RETURNING & SEND DATA TO VIEW
        return view('brand', compact('brands', 'categories', 'dataStaff'));
    }

    public function store(Request $request)
    {
        if($request->brand_id == NULL){
            GeneralController::addBrand($request->name, $request->category, Auth::user()->id);

            // SEND TO LOG ACTIVITY
            GeneralController::addToLog($request, 'Creating Brand Products '.$request->name, Auth::user()->id);

            // RETURNING & SEND DATA TO VIEW
            return response()->json(['success'=>'Brand Products '.$request->name.' Berhasil Dibuat']);
        }else{
            // PARSING DATA & SEND TO DB
            GeneralController::updateBrand($request->brand_id, $request->name, $request->category, Auth::user()->id);

            // SEND TO LOG ACTIVITY
            GeneralController::addToLog($request, 'Updating Brand Products '.$request->name, Auth::user()->id);

            // RETURNING & SEND DATA TO VIEW
            return response()->json(['success'=>'Brand Products '.$request->name.' Berhasil Diubah']);
        }
    }

    public function destroy(Request $request, $id)
    {
        // PREPARING ELOQUENT
        $data = GeneralController::detailBrand($id);
        $name = $data->name;
        $brands = GeneralController::deleteTemporaryBrand($id, Auth::user()->id);

        // CONDITION IF SUCCESS DELETE DATA
        if($brands)
        {
            // SEND TO LOG ACTIVITY
            GeneralController::addToLog($request, 'Deleting Temporary Brand Products '.$name, Auth::user()->id);
        }
     
        // SEND NOTIFICATION TO CONSOLE
        return response()->json(['success'=>'Brand Products '.$name.' Berhasil Dihapus.']);
    }

    public function edit($id)
    {
        // LOAD DATA
        $brands = GeneralController::detailBrand($id);

        // SEND DATA TO JSON
        return response()->json($brands);
    }

    public function autocomplete(Request $request){
        $data = [];
  
        if($request->filled('q')){
            $data = GeneralController::searchBrand($request->get('q'));
        }
    
        return response()->json($data);
    }
}
