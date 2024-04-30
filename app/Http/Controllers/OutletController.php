<?php

namespace App\Http\Controllers;

// USED MODEL
use App\Models\mStaff;

use App\Http\Controllers\GeneralController;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Str;

use App\Exports\OutletExport;
use App\Imports\OutletImport;
use App\Imports\OutletImportUpdate;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class OutletController extends GeneralController
{
    public function index(Request $request)
    {
        // GET DATA
        $customers = GeneralController::trashCustomer(false, true);
        $dataStaff = mStaff::where('user_id', '=', Auth::user()->id)->first();
        // dd($customers);

        // PREPARING DATATABLE & CREATING COLUMN 'ACTION'
        if($request->ajax()){
            $data = GeneralController::trashCustomer(false, true);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('code', function($row){
                        if($row->regist == 1 && $row->type == 0){ //Customer/toko regist
                            return "RO-".$row->code;
                        }elseif($row->regist == 0 && $row->type == 0){ //Customer/toko belum regist
                            return "NRO-".$row->code;
                        }elseif($row->regist == 1 && $row->type == 1){ //Gerai/outlet sudah Member
                            return "M-".$row->code;
                        }else{ //Gerai/outlet yang belum member
                            return "N-".$row->code;
                        }
                    })
                    ->addColumn('staff_name', function($row){
                        if($row->staff_name){
                            return $row->staff_name;
                        }else{
                            return 'Belum Ada Staff';
                        }
                    })
                    ->addColumn('status', function($row){
                        if($row->status == 1){
                            return 'Aktif';
                        }else{
                            return 'Non-Aktif';
                        }
                    })
                    ->addColumn('action', function($row){
                        
                        $btn = '<a href="'.route("outlet.show", ['outlet'=>$row->id]).'" data-toggle="tooltip" data-original-title="Detail" class="edit btn btn-primary btn-sm editDetail"><i class="fa fa-info"></i> <span>  Detail</span></a> ';

                        $btn1 ='<a href="'.route("outlet.edit", ['outlet'=>$row->id]).'"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-warning btn-sm editCustomer"><i class="fa fa-pencil"></i> <span>Edit </span></a> ';
   
                        $btn2 = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteCustomer"><i class="fa fa-trash"></i> <span>Hapus </span></a>';
   
                        return $btn.$btn1.$btn2;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        // CREATING LOG ACTIVITY
        GeneralController::addToLog($request, 'Listing Customer', Auth::user()->id);

        // RETURNING & SEND DATA TO VIEW
        // return view('customer/list', compact('customers'));
        return view('outlet/list', compact('customers', 'dataStaff'));
    }

    public function create(){
        // RETURNING & SEND DATA TO VIEW
        $branches = GeneralController::trashBranch(false);
        // $staffs = GeneralController::trashBranch(false);
        return view('outlet/form', compact('branches'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'branch' => 'required',
        ]);
        $type = 1;
        $generator;$code;$extPhoto;$namePhoto;$destinationPath = 'customer';
        $codeBranch = GeneralController::detailBranch($request->branch)->code;
        $lastCodeCust = GeneralController::searchLastCodeCustomer($codeBranch."0");

        if($request->code == null){
            if($lastCodeCust->isEmpty()){ 
                $code = $codeBranch.'001';
            }else{
                $lastDigit = intval(substr($lastCodeCust->first()->code,3));
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
                $code = $codeBranch.$generator;
            }
            $codenow = GeneralController::searchCustomer($code);
            // dd($lastCodeCust->first());

            while(!$codenow->isEmpty()){
                $codenow = GeneralController::searchCustomer($code);
                if($codenow->isEmpty()) break;
                $lastDigit = intval(substr($codenow->first()->code,3));
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
                    $code = $codeBranch.$generator;
            }
            // dd($code);
        }else{
            $code = $request->code;
        }

        // CHECK PHOTO
        if($request->photo != null){
            $extPhoto = $request->photo->getClientOriginalExtension();
            $namePhoto = $code."-".$request->name.date('d M Y').".".$extPhoto;
            $request->photo->move(public_path($destinationPath), $namePhoto);
        }else{
            $namePhoto = null;
        }

        $customers = GeneralController::addCustomer(
            $code,
            $request->name,
            $request->phone,
            $namePhoto,
            $request->address,
            $request->LA,
            $request->LO,
            $request->area,
            $request->subarea,
            $request->regist,
            $type,
            $request->branch,
            $request->staff,
            Auth::user()->id
        );

        if($customers){
            if($request->owner){
                $lastIdCust = GeneralController::searchLastCodeCustomer($code)->first()->id;
                $owner = GeneralController::addOwner(
                    $request->owner,
                    $request->nik,
                    $request->phone_owner,
                    $request->address_owner,
                    $lastIdCust,
                    Auth::user()->id
                );

                // CREATING LOG ACTIVITY
                GeneralController::addToLog($request, 'Creating Customer '.$request->name, Auth::user()->id);
                GeneralController::addToLog($request, 'Creating Owner '.$request->owner, Auth::user()->id);
                return redirect()
                            ->route('outlet.index')
                            ->with([
                                'success' => 'Berhasil Menyimpan Data Customer'
                            ]);
            }else{
                // CREATING LOG ACTIVITY
                GeneralController::addToLog($request, 'Creating Customer '.$request->name, Auth::user()->id);
                return redirect()
                            ->route('outlet.index')
                            ->with([
                                'success' => 'Berhasil Menyimpan Data Customer'
                            ]);
            }
        }else{
            return redirect()
                        ->back()
                        ->withInput()
                        ->with([
                            'error' => 'Gagal Menyimpan Data Customer'
                        ]);
        };
    }

    public function show(Request $request, $id){
        $outlets = GeneralController::detailCustomer($id);
        GeneralController::addToLog($request, 'Showing Data Outlet '.$outlets->name, Auth::user()->id);
        
        return view('outlet/detail', compact('outlets'));
        // return view('customer/detail');
    }

    public function edit(Request $request, $id){
        $outlets = GeneralController::detailCustomer($id);
            
        GeneralController::addToLog($request, 'Editing Data Outlets '.$outlets->name, Auth::user()->id);

        if($outlets->branch_id == null){
            $branches = GeneralController::trashBranch(false);
        }else{
            $branches = GeneralController::exceptBranchId($outlets->branch_id);
        }
        // dd($customers->branch_id);

        return view('outlet/form', compact('outlets','branches'));
    }

    public function update(Request $request, $id){
        $outlets = GeneralController::updateCustomer($id,
            $request->code,
            $request->name,
            $request->phone_cust,
            $request->address_cust,
            $request->LA,
            $request->LO,
            $request->area,
            $request->regist,
            $request->branch,
            $request->staff,
            Auth::user()->id
        );
        if($outlets){
            // CREATING LOG ACTIVITY
            GeneralController::addToLog($request, 'Updating Outlet '.$request->name, Auth::user()->id);
            return redirect()
                        ->route('outlet.index')
                        ->with([
                            'success' => 'Berhasil Menyimpan Data Customer'
                        ]);
        }else{
            return redirect()
                        ->back()
                        ->withInput()
                        ->with([
                            'error' => 'Gagal Menyimpan Data Customer'
                        ]);
        };
    }
    public function destroy(Request $request, $id){
        // PREPARING ELOQUENT
        $data = GeneralController::detailCustomer($id);
        $name = $data->name;
        $outlets = GeneralController::deleteTemporaryCustomer($id, Auth::user()->id);

        // CONDITION IF SUCCESS DELETE DATA
        if($outlets)
        {
            // SEND TO LOG ACTIVITY
            GeneralController::addToLog($request, 'Deleting Outlet '.$name, Auth::user()->id);
        }else{

        }
     
        // SEND NOTIFICATION TO CONSOLE
        return response()->json(['success'=>'Outlet '.$name.' Berhasil Dihapus.']);
    }

    public function import(Request $request)
    {
        if($request->type == 'create'){
            GeneralController::addToLog($request, 'Importing Create Master Customer(Outlet)', Auth::user()->id);
            Excel::import(new OutletImport,request()->file('file'));

            return back();
        }else{
            GeneralController::addToLog($request, 'Importing Update Master Customer(Outlet)', Auth::user()->id);
            Excel::import(new OutletImportUpdate,request()->file('file'));

            return back();
        }
    }
}
