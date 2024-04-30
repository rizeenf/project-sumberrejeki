<?php

namespace App\Http\Controllers;

// USED MODEL
use App\Models\mStaff;

use App\Http\Controllers\GeneralController;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class CategoryProductController extends GeneralController
{
    public function index(Request $request)
    {
        // GET DATA
        $categories = GeneralController::trashCategory(true);
        $dataStaff = mStaff::where('user_id', '=', Auth::user()->id)->first();

        // PREPARING DATATABLE & CREATING COLUMN 'ACTION'
        if($request->ajax()){
            $data = GeneralController::trashCategory(false);
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
                        
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editCategory"><i class="fa fa-pencil"></i> Edit</a>';
   
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteCategory"><i class="fa fa-trash"></i> Hapus</a>';
   
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        // CREATING LOG ACTIVITY
        GeneralController::addToLog($request, 'Listing Category Products', Auth::user()->id);

        // RETURNING & SEND DATA TO VIEW
        return view('category', compact('categories', 'dataStaff'));
    }

    public function store(Request $request)
    {
        if($request->category_id == NULL){
            GeneralController::addCategory($request->name, Auth::user()->id);

            // SEND TO LOG ACTIVITY
            GeneralController::addToLog($request, 'Creating Category Products '.$request->name, Auth::user()->id);

            // RETURNING & SEND DATA TO VIEW
            return response()->json(['success'=>'Category Products '.$request->name.' Berhasil Dibuat']);
        }else{
            // PARSING DATA & SEND TO DB
            GeneralController::updateCategory($request->category_id, $request->name, Auth::user()->id);

            // SEND TO LOG ACTIVITY
            GeneralController::addToLog($request, 'Updating Category Products '.$request->name, Auth::user()->id);

            // RETURNING & SEND DATA TO VIEW
            return response()->json(['success'=>'Category Products '.$request->name.' Berhasil Diubah']);
        }
    }

    public function destroy(Request $request, $id)
    {
        // PREPARING ELOQUENT
        $data = GeneralController::detailCategory($id);
        $name = $data->name;
        $categories = GeneralController::deleteTemporaryCategory($id, Auth::user()->id);

        // CONDITION IF SUCCESS DELETE DATA
        if($categories)
        {
            // SEND TO LOG ACTIVITY
            GeneralController::addToLog($request, 'Deleting Temporary Category Products '.$name, Auth::user()->id);
        }
     
        // SEND NOTIFICATION TO CONSOLE
        return response()->json(['success'=>'Category Products '.$name.' Berhasil Dihapus.']);
    }

    public function edit($id)
    {
        // LOAD DATA
        $categories = GeneralController::detailCategory($id);

        // SEND DATA TO JSON
        return response()->json($categories);
    }

    public function autocomplete(Request $request){
        $data = [];
  
        if($request->filled('q')){
            $data = GeneralController::searchCategory($request->get('q'));
        }
    
        return response()->json($data);
    }
}
