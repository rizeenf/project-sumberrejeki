<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\mStaff;

use App\Http\Controllers\GeneralController;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;

class StaffController extends GeneralController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // GET DATA
        $staffs = GeneralController::exceptStaffId(Auth::user()->id);
        $dataStaff = GeneralController::searchStaffId(Auth::user()->id);

        // PREPARING DATATABLE & CREATING COLUMN 'ACTION'
        if($request->ajax()){
            $data = GeneralController::exceptStaffId(Auth::user()->id);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('gender', function($row){
                        if($row->gender=='L'){
                            return 'Pria';
                        }else{
                            return 'Wanita';
                        }
                    })
                    ->addColumn('action', function($row){
                        
                        $btn = '<a href="'.route("staff.show", ['staff'=>$row->id]).'" data-toggle="tooltip" data-original-title="Detail" class="edit btn btn-primary btn-sm editDetail"><i class="fa fa-info"></i> <span>  Detail</span></a> ';

                        $btn1 ='<a href="'.route("staff.edit", ['staff'=>$row->id]).'"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-warning btn-sm editStaff"><i class="fa fa-pencil"></i> <span>Edit </span></a> ';
   
                        $btn2 = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteStaff"><i class="fa fa-trash"></i> <span>Hapus </span></a>';
   
                        return $btn.$btn1.$btn2;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        // CREATING LOG ACTIVITY
        GeneralController::addToLog($request, 'Listing Staff', Auth::user()->id);

        // RETURNING & SEND DATA TO VIEW
        // return view('customer/list', compact('customers'));
        return view('staff/list', compact('staffs', 'dataStaff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // RETURNING & SEND DATA TO VIEW
        $jabatans = GeneralController::trashJabatan(false);
        return view('staff/form', compact('jabatans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            // 'code' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'email' => 'email | unique:users',
            'password' => 'required | same:confirm',
            'confirm' => 'required',
        ]);

        $account = GeneralController::addUser($request->name, $request->email, $request->username, $request->password, Auth::user()->id);

        if($account){
            $lastCodeStaff = GeneralController::searchLastCodeStaff('STF');
            // CHECK CODE 
            if($request->code == null){
                if($lastCodeStaff->isEmpty()){ 
                    $code = 'STF001';
                }else{
                    $lastDigit = intval(substr($lastCodeStaff->first()->code,3));
                    if($lastDigit < 10){
                        if($lastDigit == 0){
                            $generator = '001';    
                        }else{
                            $generator = '00'.$lastDigit+1;
                        }
                    }elseif($lastDigit >= 10 && $lastDigit <100){
                        $generator = '0'.$lastDigit+1;
                    }else{
                        $generator = $lastDigit+1;
                    }
                    $code = 'STF'.$generator;
                }
            }else{
                $code = $request->code;
            }

            $cekId = GeneralController::searchUser($request->username, $request->email);
            // dd($cekId);
            // $accountId = $cekId->id;
            // $idAccount = User::find($request->email);
            $staff = GeneralController::addStaff(
                $code,
                $request->name,
                $request->gender,
                $request->phone,
                $request->jabatan,
                $cekId->id,
                Auth::user()->id
            );

            if($staff){
                
                GeneralController::addToLog($request, 'Creating Account And Staff '.$request->name, Auth::user()->id);

                return redirect()
                            ->route('staff.index')
                            ->with([
                                'success' => 'Berhasil Menyimpan Data Staff'
                            ]);
            }else{
                return redirect()
                            ->back()
                            ->withInput()
                            ->with([
                                'error' => 'Gagal Menyimpan Data Staff'
                            ]);
            }
        }else{
            return redirect()
                            ->back()
                            ->withInput()
                            ->with([
                                'error' => 'Gagal Menyimpan Data Account'
                            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mStaff  $mStaff
     * @return \Illuminate\Http\Response
     */
    public function show(mStaff $mStaff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mStaff  $mStaff
     * @return \Illuminate\Http\Response
     */
    public function edit(mStaff $mStaff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mStaff  $mStaff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mStaff $mStaff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mStaff  $mStaff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // PREPARING ELOQUENT
        $data = mStaff::find($id);
        $name = $data->name;
        $idAccount = $data->id_user;
        $customers = mStaff::find($id)->delete();
        $account = User::find($id)->delete();

        // CONDITION IF SUCCESS DELETE DATA
        if($customers && $accunt)
        {
            // SEND TO LOG ACTIVITY
            Controller::addToLog($request, 'Deleting Customer '.$name);
        }else{

        }
     
        // SEND NOTIFICATION TO CONSOLE
        return response()->json(['success'=>'Customer '.$name.' Berhasil Dihapus.']);
    }

    public function autocomplete(Request $request){
        $data = [];
  
        if($request->filled('q')){
            $data = GeneralController::searchStaff($request->get('q'));
        }
    
        return response()->json($data);
    }
}
