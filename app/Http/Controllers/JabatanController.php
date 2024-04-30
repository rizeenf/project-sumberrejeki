<?php

namespace App\Http\Controllers;

use App\Models\mStaff;

use App\Http\Controllers\GeneralController;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class JabatanController extends GeneralController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // GET DATA
        $jabatans = GeneralController::trashJabatan(true);
        $dataStaff = mStaff::where('user_id', '=', Auth::user()->id)->first();
        // dd($Jabatanes);

        // PREPARING DATATABLE & CREATING COLUMN 'ACTION'
        if($request->ajax()){
            $data = GeneralController::trashJabatan(false);
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
                        
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editJabatan"><i class="fa fa-pencil"></i> Edit</a>';
   
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteJabatan"><i class="fa fa-trash"></i> Hapus</a>';
   
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        // CREATING LOG ACTIVITY
        GeneralController::addToLog($request, 'Listing Jabatan', Auth::user()->id);

        // RETURNING & SEND DATA TO VIEW
        return view('jabatan', compact('jabatans', 'dataStaff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->jabatan_id == NULL){
            GeneralController::addJabatan($request->name, Auth::user()->id);

            // SEND TO LOG ACTIVITY
            GeneralController::addToLog($request, 'Creating Jabatan '.$request->name, Auth::user()->id);

            // RETURNING & SEND DATA TO VIEW
            return response()->json(['success'=>'Jabatan'.$request->name.' Berhasil Dibuat']);
        }else{
            // PARSING DATA & SEND TO DB
            GeneralController::updateJabatan($request->jabatan_id, $request->name, Auth::user()->id);

            // SEND TO LOG ACTIVITY
            GeneralController::addToLog($request, 'Updating Jabatan '.$request->name, Auth::user()->id);

            // RETURNING & SEND DATA TO VIEW
            return response()->json(['success'=>'Jabatan'.$request->name.' Berhasil Diubah']);
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
        $jabatans = GeneralController::detailJabatan($id);

        // SEND DATA TO JSON
        return response()->json($jabatans);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // PREPARING ELOQUENT
        $data = GeneralController::detailJabatan($id);
        $name = $data->name;
        $jabatans = GeneralController::deleteTemporaryJabatan($id, Auth::user()->id);

        // CONDITION IF SUCCESS DELETE DATA
        if($jabatans)
        {
            // SEND TO LOG ACTIVITY
            GeneralController::addToLog($request, 'Deleting Temporary Jabatan '.$name, Auth::user()->id);
        }
     
        // SEND NOTIFICATION TO CONSOLE
        return response()->json(['success'=>'Jabatan '.$name.' Berhasil Dihapus.']);
    }
}
