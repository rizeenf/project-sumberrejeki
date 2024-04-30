<?php

namespace App\Http\Controllers;

// USED MODEL
use App\Models\mStaff;

use App\Http\Controllers\GeneralController;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class DisplayController extends GeneralController
{
    public function index(Request $request)
    {
        // GET DATA
        $displays = GeneralController::trashDisplay(false);
        $dataStaff = mStaff::where('user_id', '=', Auth::user()->id)->first();
        // dd($displays);

        // PREPARING DATATABLE & CREATING COLUMN 'ACTION'
        if($request->ajax()){
            $data = GeneralController::trashDisplay(false);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('durability', function($row){
                        return $row->durability.' Hari';
                    })
                    ->addColumn('action', function($row){
   
                        $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteDisplay"><i class="fa fa-trash"></i> Hapus</a>';
   
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        // CREATING LOG ACTIVITY
        GeneralController::addToLog($request, 'Listing Display Product', Auth::user()->id);

        // RETURNING & SEND DATA TO VIEW
        return view('display', compact('displays','dataStaff'));
    }

    public function store(Request $request)
    {
        if($request->display_id == NULL){
            GeneralController::addDisplay($request->name, $request->durability, Auth::user()->id);

            // SEND TO LOG ACTIVITY
            GeneralController::addToLog($request, 'Creating Display Products '.$request->name, Auth::user()->id);

            // RETURNING & SEND DATA TO VIEW
            return response()->json(['success'=>'Display Products '.$request->name.' Berhasil Dibuat']);
        }else{
            // PARSING DATA & SEND TO DB
            GeneralController::updateDisplay($request->display_id, $request->name, $request->durability, Auth::user()->id);

            // SEND TO LOG ACTIVITY
            GeneralController::addToLog($request, 'Updating Display Products '.$request->name, Auth::user()->id);

            // RETURNING & SEND DATA TO VIEW
            return response()->json(['success'=>'Display Products '.$request->name.' Berhasil Diubah']);
        }
    }

    public function destroy(Request $request, $id)
    {
        // PREPARING ELOQUENT
        $data = GeneralController::detailDisplay($id);
        $name = $data->name;
        $displays = GeneralController::deleteTemporaryDisplay($id, Auth::user()->id);

        // CONDITION IF SUCCESS DELETE DATA
        if($displays)
        {
            // SEND TO LOG ACTIVITY
            GeneralController::addToLog($request, 'Deleting Temporary Brand Products '.$name, Auth::user()->id);
            // SEND NOTIFICATION TO CONSOLE
            return response()->json(['success'=>'Display Products '.$name.' Berhasil Dihapus.']);
        }else{
            // SEND NOTIFICATION TO CONSOLE
            return response()->json(['failed'=>'Display Products '.$name.' Gagal Dihapus.']);
        }
    }

    public function autocomplete(Request $request){
        $data = [];
  
        if($request->filled('q')){
            $data = GeneralController::searchDisplay($request->get('q'));
        }
    
        return response()->json($data);
    }
}
