<?php

namespace App\Http\Controllers;

use App\Http\Controllers\GeneralController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;
use Image;
use Illuminate\Support\Carbon;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
// use GuzzleHttp\Client;
use Storage;

use App\DataTables\SummaryVisitDataTable;
use App\Exports\VisitExport;
use Maatwebsite\Excel\Facades\Excel;

class VisitController extends GeneralController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataStaff = GeneralController::searchStaffUserId(Auth::user()->id);
        // $dataVisit = GeneralController::ListAllVisit();
        // dd(GeneralController::ListAllVisit());
        dd(GeneralController::countVisitCust());

        if($request->ajax()){
            $data = GeneralController::ListAllVisit();

            if ($request->filled('from_date') && $request->filled('to_date')) {
                $data = $data->whereBetween('dateVisit', [$request->from_date, $request->to_date]);
            }

            // if ($request->filled('staff')) {
            //     $data = $data->where('staffId', '=', $request->staff);
            // }

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('visited', function($row){
                        return intval($row->custVisited)+intval($row->outletVisited);
                    })
                    ->addColumn('dateVisit', function($row){
                        return date('d F Y', strtotime($row->dateVisit));
                    })
                    // ->addColumn('custVisit', function($row){
                    //     return GeneralController::ListAllVisit()->where('m_customers.type', '=', '0')->count();
                    // })
                    ->addColumn('action', function($row){
                        
                        $btn = '<a href="'.route("call.show", ['date'=>$row->dateVisit, 'staff'=>$row->staffId]).'" data-toggle="tooltip" data-original-title="Detail" class="edit btn btn-primary btn-sm editDetail"><i class="fa fa-info"></i> <span>  Detail</span></a> ';
   
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        // CREATING LOG ACTIVITY
        GeneralController::addToLog($request, 'Listing Visited', Auth::user()->id);

        // RETURNING & SEND DATA TO VIEW
        return view('visit/list', compact('dataStaff', 'dataVisit'));
    }

    public function scheduledCustomer(Request $request)
    {
        $dataStaff = GeneralController::searchStaffUserId(Auth::user()->id);
        $customers = GeneralController::lisCustomerCard(false, false);
        // mCustomer:: //latest()
        // join('m_branches', 'm_customers.branch_id', '=', 'm_branches.id')
        // ->select('m_customers.*', 'm_branches.name AS branch_name')
        // ->paginate(20);

        // RETURNING & SEND DATA TO VIEW
        return view('visit/schedule', compact('customers' ,'dataStaff'));
    }
    
    public function scheduledOutlet(Request $request)
    {
        $dataStaff = GeneralController::searchStaffUserId(Auth::user()->id);
        $customers = GeneralController::lisCustomerCard(false, true);
        // mCustomer:: //latest()
        // join('m_branches', 'm_customers.branch_id', '=', 'm_branches.id')
        // ->select('m_customers.*', 'm_branches.name AS branch_name')
        // ->paginate(20);

        // RETURNING & SEND DATA TO VIEW
        return view('visit/schedule', compact('customers' ,'dataStaff'));
    }

    public function searchCust(Request $request)
    {
        $dataStaff = GeneralController::searchStaffUserId(Auth::user()->id);
        $customers = GeneralController::searchCustomerCard(false, false, $request->search);
        // mCustomer:: //latest()
        // join('m_branches', 'm_customers.branch_id', '=', 'm_branches.id')
        // ->select('m_customers.*', 'm_branches.name AS branch_name')
        // ->where('m_customers.code', 'like', '%'.$request->search.'%')
        // ->orWhere('m_customers.name', 'like', '%'.$request->search.'%')
        // ->paginate(20);
        
        return view('visit/schedule', compact('customers' ,'dataStaff'));

    }

    public function searchOutlet(Request $request)
    {
        $dataStaff = GeneralController::searchStaffUserId(Auth::user()->id);
        $customers = GeneralController::searchCustomerCard(false, true, $request->search);
        // mCustomer:: //latest()
        // join('m_branches', 'm_customers.branch_id', '=', 'm_branches.id')
        // ->select('m_customers.*', 'm_branches.name AS branch_name')
        // ->where('m_customers.code', 'like', '%'.$request->search.'%')
        // ->orWhere('m_customers.name', 'like', '%'.$request->search.'%')
        // ->paginate(20);
        
        return view('visit/schedule', compact('customers' ,'dataStaff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $date = date('Y-m-d');
        $customers = GeneralController::detailCustomer($id);
        $order = 0;
        $categories = GeneralController::listAllCategory();
        $displays = GeneralController::listAllDisplay();
        $product = GeneralController::listAllProduct();
        $cekOrderVisit = GeneralController::cekOrderVisit(Auth::user()->id, $date);
        
        if($cekOrderVisit->isEmpty()){
            $order = 1;
        }else{
            $order = $cekOrderVisit->first()->ord+1;
        }
        $ip = $request->ip(); //Get Real IP User
        $position = json_decode(file_get_contents("http://ip-api.com/json/{$ip}")); //get location IP by ip-api directly
        // dd($position->status);
        // if($customers->LA==NULL){
        //     if($position->status == 'fail'){
        //         $ip = '180.242.156.214';
        //         $position = json_decode(file_get_contents("http://ip-api.com/json/{$ip}"));
        //     }

        //     GeneralController::updateLocCustomer($id, $position->lat, $position->lon, Auth::user()->id);
            
        // }
        GeneralController::addVisit($order, $id, Auth::user()->id);
        
        $idVisit = GeneralController::getLastIdVisit();
        return view('visit/form', compact('customers','displays', 'categories', 'idVisit'));
    }

    public function storeVisitCustMd(Request $request){
        $destinationPathVisit = 'visit';
        $destinationPathBanner = 'banner';
        $destinationPathDisplay = 'display';
        $destinationPathCustomer = 'customer-photo';
        $idVisit = $request->id;

        $customers = GeneralController::detailCustomer($request->customerId);
        // dd($customers);
        if($customers->photo = NULL && $request->mFoto){
            $extf = $request->mFoto->getClientOriginalExtension();
            $masterPhoto = 'customer_photo-'.$request->code.' - '.$request->name."-".date('d M Y').".".$extf;
            $request->mFoto->move(public_path($destinationPathCustomer), $masterPhoto);
            $upPhoto = GeneralController::updatePhotoCustomer($request->customerId, $masterPhoto, Auth::user()->id);
        }else{
            $masterPhoto = null;
        }

        
        if($customers->LA == NULL){
            GeneralController::updateLocCustomer($request->customerId, $request->lat, $request->lon, Auth::user()->id);
        }

        if($customers->type == 0){

            if($request->searchCat != NULL){
                if($request->photo == NULL){
                    $extCat = "";
                    $displayPhoto = "";
                }else{
                    $extCat = $request->photo->getClientOriginalExtension();
                    $displayPhoto = 'display_customer-'.$request->code.' - '.$request->name."-".date('d M Y').".".$extCat;
                    $request->photo->move(public_path($destinationPathDisplay), $displayPhoto);
                    $upDisplay = GeneralController::addFoto($displayPhoto, 'D', $displayPhoto, $idVisit, Auth::user()->id);
                }
                $storeDetail = GeneralController::addDetailVisitCustomer($idVisit, json_encode($request->searchCat), json_encode($request->searchDis), json_encode($request->searchBrand), $request->reason);
                    if(!$storeDetail){
                        return false;
                    }
            }

            // $timeInDb = tVisit::find($idVisit)->timeIn;
            // $in = strtotime($timeInDb);
            // $out = strtotime("now");
            // $duration = date("H:i", $out - $in);

            if($customers->banner == NULL && $request->bannerPhoto){
                $ext4 = $request->bannerPhoto->getClientOriginalExtension();
                $bannerPhotos = 'banner_customer-'.$request->code.' - '.$request->name."-".date('d M Y').".".$ext4;
                $request->bannerPhoto->move(public_path($destinationPathBanner), $bannerPhotos);
                $upBanner = GeneralController::updateBannerCustomer($customers->id, $bannerPhotos, Auth::user()->id);
            }else{
                $bannerPhotos = null;
            }
            
            $visitCustMD = GeneralController::updateVisitCustomer($idVisit, $request->lat, $request->lon, FALSE, NULL, 0, $request->banner, $request->activity, $request->notes, 'N', 0);
            
            if($visitCustMD){
                GeneralController::addToLog($request, 'Visiting Customer '.$request->name, Auth::user()->id);
                if($request->actPhoto){
                    $ext1 = $request->actPhoto->getClientOriginalExtension();
                    $namePhoto = 'visit_customer-'.$request->code.' - '.$request->name." 1-".date('d M Y').".".$ext1;
                    $request->actPhoto->move(public_path($destinationPathVisit), $namePhoto);
                    $upVisit = GeneralController::addFoto($namePhoto, 'V', $namePhoto, $idVisit, Auth::user()->id);
                }else{
                    $namePhoto = null;
                }
                
                return redirect()
                            ->route('visit.listCustomer')
                            ->with([
                                'success' => 'Berhasil Menyimpan Data Visit'
                            ]);
            }else{
                return redirect()
                            ->back()
                            ->withInput()
                            ->with([
                                'error' => 'Gagal Menyimpan Data Customer'
                            ]);
            }
        }else{
            if($request->usedProduct != NULL){
                for($i = 0;$i<count($request->usedProduct);$i++){
                    $storeDetail = GeneralController::addDetailVisitOutlet($idVisit, $request->usedProduct[$i], $request->pricebuy[$i], json_encode($request->reason), $request->store,$request->pasar, $request->patokan, Auth::user()->id);
                    if(!$storeDetail){
                        return false;
                    }
                }
            }else{
                $storeDetail = GeneralController::addDetailVisitOutlet($idVisit, NULL, NULL, json_encode($request->reason), $request->store,$request->pasar, $request->patokan, Auth::user()->id);
                    if(!$storeDetail){
                        return false;
                    }
            }

            // dd($request->register);

            $visitCustMD = GeneralController::updateVisitCustomer($idVisit, $request->lat, $request->lon, FALSE, json_encode($request->sample),intval($request->qtysample), FALSE, 'visit', $request->notes, $request->register, intval($request->qtysell));
            
            if($visitCustMD){
                GeneralController::addToLog($request, 'Visiting Customer '.$request->name, Auth::user()->id);
                if($request->actPhoto){
                    $ext1 = $request->actPhoto->getClientOriginalExtension();
                    $namePhoto = 'visit_gerai-'.$request->code.' - '.$request->name." 1-".date('d M Y').".".$ext1;
                    $request->actPhoto->move(public_path($destinationPathVisit), $namePhoto);
                    $upVisit = GeneralController::addFoto($namePhoto, 'V', $namePhoto, $idVisit, Auth::user()->id);
                }else{
                    $namePhoto = null;
                }
                
                return redirect()
                            ->route('visit.listOutlet')
                            ->with([
                                'success' => 'Berhasil Menyimpan Data Visit'
                            ]);
            }else{
                return redirect()
                            ->back()
                            ->withInput()
                            ->with([
                                'error' => 'Gagal Menyimpan Data Customer'
                            ]);
            }
        }
    }

    public function tesLoc(Request $request)
    {
       
        // $userIp = $request->ip();
        // $userIp = '180.252.114.61';
        // $userIp = '140.213.35.119';
        $userIp = '180.242.156.214';
        // $userIp = $_SERVER['REMOTE_ADDR'];
        // $userIp = '66.102.0.0';
        // $location = Location::get($userIp);
        // $location = Location::get();
        // $location = json_decode(file_get_contents("http://ipinfo.io/{$userIp}/json"));
        // $location = json_decode(file_get_contents("http://ip-api.com/json/{$userIp}"));

        // $location = geoip()->getLocation($userIp);
        $location = geoip($userIp);
        // $location = app('geocoder')->geocode($userIp)->get();
        
        dd($location);
    }

    public function maps()
    {
        $customer = GeneralController::listAreaAllCustomer(false);
        $outlet = GeneralController::listAreaAllOutlet(true);
        return view('mapsLayout', compact('customer', 'outlet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tVisit  $tVisit
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $date, $staff)
    {
        $sumVisit = GeneralController::detailVisit($date, $staff);
        $detailVisit = GeneralController::ListDetailVisit($date, $staff);
        // dd($detailVisit);

        if($request->ajax()){
            $data = GeneralController::ListDetailVisit($date, $staff);

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        
                        $btn = '<a href="'.route("visit.detail", ['id'=>$row->id]).'" data-toggle="tooltip" data-original-title="Detail" class="edit btn btn-primary btn-sm editDetail"><i class="fa fa-info"></i> <span>  Detail</span></a> ';

                        return $btn;
                    })
                    ->addColumn('image', function ($row) {
                        if($row->photo){
                            $url= asset('visit/'.$row->photo);
                        }else{
                            $url= asset('images/no-photo.png');
                        }
                        return $url;
                        // return '<img src="'.$url.'" border="0" width="40" class="img-rounded" align="center" />';
                        // return '<img src="'.$url.'">"';
                        // return '<img src="'.$url.'" class="img img-rounded">';
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

        return view('visit/detail', compact('sumVisit', 'detailVisit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tVisit  $tVisit
     * @return \Illuminate\Http\Response
     */
    public function edit(tVisit $tVisit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tVisit  $tVisit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tVisit $tVisit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tVisit  $tVisit
     * @return \Illuminate\Http\Response
     */
    public function destroy(tVisit $tVisit)
    {
        //
    }

    public function reportDisplay(Request $request){
        $dataStaff = GeneralController::searchStaffUserId(Auth::user()->id);
        $dataVisit = GeneralController::ListAllDisplayVisit();
        // dd(count(json_decode(GeneralController::ListAllDisplayVisit())));

        if($request->ajax()){
            $data = GeneralController::ListAllDisplayVisit();

            if ($request->filled('from_date') && $request->filled('to_date')) {
                $data = $data->whereBetween('dateVisit', [$request->from_date, $request->to_date]);
            }

            // if ($request->filled('staff')) {
            //     $data = $data->where('staffId', '=', $request->staff);
            // }

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('dateVisit', function($row){
                        return date('d F Y', strtotime($row->dateVisit));
                    })
                    // ->addColumn('custVisit', function($row){
                    //     return GeneralController::ListAllVisit()->where('m_customers.type', '=', '0')->count();
                    // })
                    ->addColumn('action', function($row){
                        
                        // $btn = '<a href="'.route("call.show", ['date'=>$row->dateVisit, 'staff'=>$row->staffId]).'" data-toggle="tooltip" data-original-title="Detail" class="edit btn btn-primary btn-sm editDetail"><i class="fa fa-info"></i> <span>  Detail</span></a> ';
   
                        // return $btn;
                    })
                    ->addColumn('category', function($row){
                        $category = [];
                        $dataCat = json_decode($row->idCat);
                        for($i = 0; $i<count($dataCat); $i++){
                            array_push($category ,GeneralController::detailCategory($dataCat[$i])->name);
                        }
                        return $category;
                    })
                    ->addColumn('display', function($row){
                        $display = [];
                        $dataDisplay = json_decode($row->idDisplay);
                        if($dataDisplay == NULL){
                            $display = [];
                        }else{
                            for($i = 0; $i<count($dataDisplay); $i++){
                                array_push($display ,GeneralController::detailDisplay($dataDisplay[$i])->name);
                            }
                        }
                        return $display;
                    })
                    ->addColumn('image', function ($row) {
                        if($row->photoDisplay){
                            $url= asset('display/'.$row->photoDisplay);
                        }else{
                            $url= asset('images/no-photo.png');
                        }
                        return $url;
                        // return '<img src="'.$url.'" border="0" width="40" class="img-rounded" align="center" />';
                        // return '<img src="'.$url.'">"';
                        // return '<img src="'.$url.'" class="img img-rounded">';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        // CREATING LOG ACTIVITY
        GeneralController::addToLog($request, 'Listing Visited', Auth::user()->id);

        // RETURNING & SEND DATA TO VIEW
        return view('report/display', compact('dataStaff', 'dataVisit'));
    }

    public function reportProduct(Request $request){
        $dataStaff = GeneralController::searchStaffUserId(Auth::user()->id);
        $dataVisit = GeneralController::ListAllUsedProduct();
        // dd(json_decode(GeneralController::ListAllUsedProduct()));

        if($request->ajax()){
            $data = GeneralController::ListAllUsedProduct();

            if ($request->filled('from_date') && $request->filled('to_date')) {
                $data = $data->whereBetween('dateVisit', [$request->from_date, $request->to_date]);
            }

            // if ($request->filled('staff')) {
            //     $data = $data->where('staffId', '=', $request->staff);
            // }

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('dateVisit', function($row){
                        return date('d F Y', strtotime($row->dateVisit));
                    })
                    // ->addColumn('custVisit', function($row){
                    //     return GeneralController::ListAllVisit()->where('m_customers.type', '=', '0')->count();
                    // })
                    // ->addColumn('action', function($row){
                        
                    //     // $btn = '<a href="'.route("call.show", ['date'=>$row->dateVisit, 'staff'=>$row->staffId]).'" data-toggle="tooltip" data-original-title="Detail" class="edit btn btn-primary btn-sm editDetail"><i class="fa fa-info"></i> <span>  Detail</span></a> ';

                    //     // return $btn;
                    // })
                    ->addColumn('toko', function($row){
                        $toko = "";
                        $dataToko = GeneralController::detailCustomer($row->custId);
                        if($dataToko){
                            $toko = $dataToko->code." - ".$dataToko->name;
                        }else{
                            $toko = "";
                        }
                        return $toko;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        // CREATING LOG ACTIVITY
        GeneralController::addToLog($request, 'Listing Visited', Auth::user()->id);

        // RETURNING & SEND DATA TO VIEW
        return view('report/used-produk', compact('dataStaff', 'dataVisit'));
    }

    public function reportSample(Request $request){
        $dataStaff = GeneralController::searchStaffUserId(Auth::user()->id);
        $dataVisit = GeneralController::ListAllVisit();
        // dd(GeneralController::ListAllVisit());

        if($request->ajax()){
            $data = GeneralController::ListAllVisit();

            if ($request->filled('from_date') && $request->filled('to_date')) {
                $data = $data->whereBetween('dateVisit', [$request->from_date, $request->to_date]);
            }

            // if ($request->filled('staff')) {
            //     $data = $data->where('staffId', '=', $request->staff);
            // }

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('dateVisit', function($row){
                        return date('d F Y', strtotime($row->dateVisit));
                    })
                    // ->addColumn('custVisit', function($row){
                    //     return GeneralController::ListAllVisit()->where('m_customers.type', '=', '0')->count();
                    // })
                    ->addColumn('action', function($row){
                        
                        $btn = '<a href="'.route("call.show", ['date'=>$row->dateVisit, 'staff'=>$row->staffId]).'" data-toggle="tooltip" data-original-title="Detail" class="edit btn btn-primary btn-sm editDetail"><i class="fa fa-info"></i> <span>  Detail</span></a> ';

                        return $btn;
                    })
                    // ->addColumn('toko', function($row){
                    //     $toko = "";
                    //     $dataToko = GeneralController::detailCustomer($row->custId);
                    //     if($dataToko){
                    //         $toko = $dataToko->code." - ".$dataToko->name;
                    //     }else{
                    //         $toko = "";
                    //     }
                    //     return $toko;
                    // })
                    ->addColumn('sample', function($row){
                        return $row->sample." Pcs";
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        // CREATING LOG ACTIVITY
        GeneralController::addToLog($request, 'Listing Visited', Auth::user()->id);

        // RETURNING & SEND DATA TO VIEW
        return view('report/sample', compact('dataStaff', 'dataVisit'));
    }

    public function export(Request $request)
    {
        GeneralController::addToLog($request, 'Exporting Report Visit', Auth::user()->id);

        return Excel::download(new VisitExport, 'Visit-Eksport '.date('d M Y H:i:s').'.xlsx');
    } 
}
