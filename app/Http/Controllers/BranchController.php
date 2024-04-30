<?php

namespace App\Http\Controllers;

// USED MODEL
use App\Models\mStaff;

use App\Http\Controllers\GeneralController;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class BranchController extends GeneralController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // GET DATA
        $branches = GeneralController::trashBranch(true);
        $dataStaff = mStaff::where('user_id', '=', Auth::user()->id)->first();
        // dd($branches);

        // PREPARING DATATABLE & CREATING COLUMN 'ACTION'
        if($request->ajax()){
            $data = GeneralController::trashBranch(false);
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
                        
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBranch"><i class="fa fa-pencil"></i> Edit</a>';
   
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBranch"><i class="fa fa-trash"></i> Hapus</a>';
   
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        // CREATING LOG ACTIVITY
        GeneralController::addToLog($request, 'Listing Branch', Auth::user()->id);

        // RETURNING & SEND DATA TO VIEW
        return view('branch', compact('branches', 'dataStaff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if($request->branch_id == NULL){
            GeneralController::addBranch($request->code, $request->name, $request->notes, Auth::user()->id);

            // SEND TO LOG ACTIVITY
            GeneralController::addToLog($request, 'Creating Branch '.$request->name, Auth::user()->id);

            // RETURNING & SEND DATA TO VIEW
            return response()->json(['success'=>'Branch'.$request->name.' Berhasil Dibuat']);
        }else{
            // PARSING DATA & SEND TO DB
            GeneralController::updateBranch($request->branch_id, $request->name, $request->notes, Auth::user()->id);

            // SEND TO LOG ACTIVITY
            GeneralController::addToLog($request, 'Updating Branch '.$request->name, Auth::user()->id);

            // RETURNING & SEND DATA TO VIEW
            return response()->json(['success'=>'Branch'.$request->name.' Berhasil Diubah']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // LOAD DATA
        $branches = GeneralController::detailBranch($id);

        // SEND DATA TO JSON
        return response()->json($branches);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // PARSING DATA & SEND TO DB
        // GeneralController::updateBranch($id, $request->name, $request->notes, Auth::user()->id);

        // SEND TO LOG ACTIVITY
        // GeneralController::addToLog($request, 'Updating Branch '.$request->name, Auth::user()->id);

        // RETURNING & SEND DATA TO VIEW
        // return response()->json(['success'=>'Branch'.$request->name.' Berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // PREPARING ELOQUENT
        $data = GeneralController::detailBranch($id);
        $name = $data->name;
        $branches = GeneralController::deleteTemporaryBranch($id, Auth::user()->id);

        // CONDITION IF SUCCESS DELETE DATA
        if($branches)
        {
            // SEND TO LOG ACTIVITY
            GeneralController::addToLog($request, 'Deleting Temporary Branch '.$name, Auth::user()->id);
        }
     
        // SEND NOTIFICATION TO CONSOLE
        return response()->json(['success'=>'Branch '.$name.' Berhasil Dihapus.']);
    }
}
