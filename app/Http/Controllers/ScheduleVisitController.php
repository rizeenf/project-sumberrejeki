<?php

namespace App\Http\Controllers;

use App\Http\Controllers\GeneralController;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Str;

use App\Exports\CustomerExport;
use App\Imports\CustomerImport;
use App\Imports\CustomerImportUpdate;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class ScheduleVisitController extends GeneralController
{
    public function index(Request $request)
    {
        // GET DATA
        $schedule = GeneralController::listAllSchedule();
        $dataStaff = GeneralController::searchStaffId(Auth::user()->id);

        // PREPARING DATATABLE & CREATING COLUMN 'ACTION'
        if($request->ajax()){
            $data = GeneralController::listAllSchedule();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('staff_name', function($row){
                        if($row->staffName){
                            return $row->staffName;
                        }else{
                            return 'Belum Ada Staff';
                        }
                    })
                    // ->addColumn('tipe', function($row){
                    //     if($row->custType == 0){
                    //         return 'Customer';
                    //     }else{
                    //         return 'Gerai';
                    //     }
                    // })
                    ->addColumn('action', function($row){
                        
                        $btn = '<a href="'.route("schedule.show", ['schedule'=>$row->id]).'" data-id="'.$row->id.'" data-toggle="tooltip" data-original-title="Detail" class="edit btn btn-primary btn-sm editDetail"><i class="fa fa-info"></i> <span>  Detail</span></a> ';

                        $btn1 ='<a href="'.route("schedule.edit", ['schedule'=>$row->id]).'" data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-warning btn-sm editCustomer"><i class="fa fa-pencil"></i> <span>Edit </span></a> ';
   
                        $btn2 = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteCustomer"><i class="fa fa-trash"></i> <span>Hapus </span></a>';
   
                        return $btn.$btn1.$btn2;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        // CREATING LOG ACTIVITY
        GeneralController::addToLog($request, 'Listing Schedule Visit', Auth::user()->id);

        // RETURNING & SEND DATA TO VIEW
        return view('schedule/list', compact('schedule'));
    }

    public function create(){
        // RETURNING & SEND DATA TO VIEW
        $liststaff = GeneralController::listAllStaff();
        return view('schedule/form', compact('liststaff'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);

        $schedule = GeneralController::addScheduleVisit($request->name,
            $request->start,
            $request->end,
            $request->pattern,
            $request->value,
            $request->staff,
            Auth::user()->id
        );

        if($schedule){
            GeneralController::addToLog($request, 'Creating Schedule Visit '.$request->name, Auth::user()->id);
            $lastIdVisit = GeneralController::searchScheduleVisit($request->name);
            return redirect()
                    ->route('detailSchedule.create', ['schedulevisit' => $lastIdVisit->id])
                    ->with([
                        'success' => 'Berhasil Menyimpan Data Customer'
                    ]);
        }else{
            return redirect()
                        ->back()
                        ->withInput()
                        ->with([
                            'error' => 'Gagal Menyimpan Data Schedule Visit'
                        ]);
        }
    }

    public function show(Request $request, $id){
        // RETURNING & SEND DATA TO VIEW
        $listcustomer = GeneralController::listAllCustomer();
        $dataschedule = GeneralController::detailScheduleVisit($id);
        $detailschedule = GeneralController::listDetailSchedule($id);

        // dd($detailschedule);
        // PREPARING DATATABLE & CREATING COLUMN 'ACTION'
        if($request->ajax()){
            $data = GeneralController::listDetailSchedule($id);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteDetail"><i class="fa fa-trash"></i> <span>Hapus </span></a>';
   
                        return $btn;
                    })
                    ->addColumn('tipe', function($row){
                        if($row->custType == 0){
                            return 'Customer';
                        }else{
                            return 'Gerai';
                        }
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('schedule/detail', compact('listcustomer', 'dataschedule', 'detailschedule'));
    }

    public function storeDetail(Request $request){
        $this->validate($request, [
            'customer' => 'required',
        ]);

        $detail = GeneralController::addDetailSchedule($request->id_schedule, $request->customer, Auth::user()->id);

        if($detail){
            $countDetail = GeneralController::countDetailSchedule($request->id_schedule);
            $updateTargetVisit = GeneralController::updateTargetVisit($request->id_schedule, $countDetail, Auth::user()->id);
            GeneralController::addToLog($request, 'Adding Customer '.$request->name.' to Detail Schedule', Auth::user()->id);


            // RETURNING & SEND DATA TO VIEW
            return response()->json(['success'=>'Customer '.$request->name.' Berhasil Ditambahkan']);
        }else{
           // RETURNING & SEND DATA TO VIEW
           return response()->json(['failed'=>'Customer '.$request->name.' Gagal Ditambahkan']);
        }
    }

    public function destroyDetail(Request $request, $id){
        // PREPARING ELOQUENT
        $data = GeneralController::dataDetailSchedule($id);
        $name = $data->custName;
        $details = GeneralController::deleteDetailSchedule($id);

        // CONDITION IF SUCCESS DELETE DATA
        if($details)
        {   
            $countDetail = GeneralController::countDetailSchedule($data->scheduleId);
            $updateTargetVisit = GeneralController::updateTargetVisit($data->scheduleId, $countDetail, Auth::user()->id);
            // SEND TO LOG ACTIVITY
            GeneralController::addToLog($request, 'Deleting Customer '.$name.' From Detail Schedule', Auth::user()->id);
            // SEND NOTIFICATION TO CONSOLE
            return response()->json(['success'=>'Customer '.$name.' Berhasil Dihapus.']);
        }else{
            // SEND NOTIFICATION TO CONSOLE
            return response()->json(['failed'=>'Customer '.$name.' Gagal Dihapus.']);
        }
    }
}
