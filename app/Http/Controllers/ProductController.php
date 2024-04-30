<?php

namespace App\Http\Controllers;

// USED MODEL
use App\Models\mStaff;

use App\Http\Controllers\GeneralController;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Exports\ProductExport;
use App\Imports\ProductImport;
use App\Imports\ProductImportUpdate;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends GeneralController
{
    public function index(Request $request)
    {
        // GET DATA
        $products = GeneralController::trashProduct(false);
        $dataStaff = mStaff::where('user_id', '=', Auth::user()->id)->first();
        // dd($products);

        // PREPARING DATATABLE & CREATING COLUMN 'ACTION'
        if($request->ajax()){
            $data = GeneralController::trashProduct(false);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('category', function($row){
                        if($row->category){
                            return $row->category;
                        }else{
                            return 'Tidak Diketahui';
                        }
                    })
                    ->addColumn('brand', function($row){
                        if($row->brand){
                            return $row->brand;
                        }else{
                            return 'Tidak Diketahui';
                        }
                    })
                    ->addColumn('subbrand', function($row){
                        if($row->subbrand){
                            return $row->subbrand;
                        }else{
                            return 'Tidak Diketahui';
                        }
                    })
                    ->addColumn('competitor', function($row){
                        if($row->competitor == 1){
                            return 'Ya';
                        }else{
                            return 'Tidak';
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
                        
                        $btn = '<a href="'.route("product.show", ['product'=>$row->id]).'" data-toggle="tooltip" data-original-title="Detail" class="edit btn btn-primary btn-sm detailProduct"><i class="fa fa-info"></i> <span>  Detail</span></a> ';

                        $btn1 ='<a href="'.route("product.edit", ['product'=>$row->id]).'"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-warning btn-sm editProduct"><i class="fa fa-pencil"></i> <span>Edit </span></a> ';
   
                        $btn2 = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"><i class="fa fa-trash"></i> <span>Hapus </span></a>';
   
                        return $btn.$btn1.$btn2;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        // CREATING LOG ACTIVITY
        GeneralController::addToLog($request, 'Listing Product', Auth::user()->id);

        // RETURNING & SEND DATA TO VIEW
        // return view('customer/list', compact('customers'));
        return view('product/list', compact('products', 'dataStaff'));
    }

    public function create()
    {
        // RETURNING & SEND DATA TO VIEW
        $categories = GeneralController::trashCategory(false);
        $brands = GeneralController::trashBrand(false);
        $subbrands = GeneralController::trashSubBrand(false);
        return view('product/form', compact('categories', 'brands', 'subbrands'));
    }

    public function store(Request $request)
    {
        $generator;$code;$extPhoto;$namePhoto;$destinationPath = 'product';$lastCodeProd;
        $countProd = GeneralController::searchLastCodeProduct('PROD');
        $this->validate($request, [
            'name' => 'required',
            'competitor' => 'required',
        ]);
        // dd($countProd);

        // CHECK CODE 
        if($request->code == null){
            if($countProd->isEmpty()){ 
                $code = 'PROD001';
            }else{
                $lastCodeProd = intval(substr($countProd->first()->code,4));
                if($lastCodeProd < 10){
                    if($lastCodeProd == 0){
                        $generator = '001';    
                    }else{
                        $generator = '00'.$lastCodeProd+1;
                    }
                }elseif($lastCodeProd >= 10 && $lastCodeProd <100){
                    $generator = '0'.$lastCodeProd+1;
                }else{
                    $generator = $lastCodeProd+1;
                }
                $code = 'PROD'.$generator;
            }
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

        $products = GeneralController::addProduct(
            $code,
            $request->name,
            $request->desc,
            $namePhoto,
            $request->competitor,
            $request->cmp_name,
            $request->category,
            $request->brand,
            $request->subbrand,
            Auth::user()->id
        );
        // GeneralController::addToLog($request, 'Creating Product '.$request->name, Auth::user()->id);

        if($products){
            // CREATING LOG ACTIVITY
            GeneralController::addToLog($request, 'Creating Product '.$request->name, Auth::user()->id);
            return redirect()
                        ->route('product.index')
                        ->with([
                            'success' => 'Berhasil Menyimpan Data Product'
                        ]);
        }else{
            return redirect()
                        ->back()
                        ->withInput()
                        ->with([
                            'error' => 'Gagal Menyimpan Data Product'
                        ]);
        };
    }

    public function show(Request $request, $id){
        $products = GeneralController::detailProduct($id);

        GeneralController::addToLog($request, 'Showing Data Product '.$products->name, Auth::user()->id);

        return view('product/detail', compact('products')); 
    }

    public function edit(Request $request, $id)
    {
        $products = GeneralController::detailProduct($id);

        GeneralController::addToLog($request, 'Editing Data Product '.$products->name, Auth::user()->id);

        if($products->category_id == null){
            $categories = GeneralController::trashCategory(false);
        }else{
            $categories = GeneralController::exceptCategoryId($products->category_id);
        }

        if($products->brand_id == null){
            $brands = GeneralController::trashBrand(false);
        }else{
            $brands = GeneralController::exceptBrandId($products->brand_id);
        }

        if($products->subbrand_id == null){
            $subbrands = GeneralController::trashSubBrand(false);
        }else{
            $subbrands = GeneralController::exceptSubBrandId($products->subbrand_id);
        }

        return view('product/form', compact('products', 'categories', 'brands', 'subbrands')); 
    }

    public function update(Request $request, $id)
    {
        $products = GeneralController::updateProduct($id,
            $request->name,
            $request->desc,
            $request->competitor,
            "",
            $request->category,
            $request->brand,
            $request->subbrand,
            Auth::user()->id
        );

        // dd($products);
        if($products){
            // CREATING LOG ACTIVITY
            GeneralController::addToLog($request, 'Updating Products '.$request->name, Auth::user()->id);
            return redirect()
                        ->route('product.index')
                        ->with([
                            'success' => 'Berhasil Menyimpan Data Produk'
                        ]);
        }else{
            return redirect()
                        ->back()
                        ->withInput()
                        ->with([
                            'error' => 'Gagal Menyimpan Data Produk'
                        ]);
        };
    }

    public function destroy(Request $request, $id){
        // PREPARING ELOQUENT
        $data = GeneralController::detailProduct($id);
        $name = $data->name;
        $products = GeneralController::deleteTemporaryProduct($id, Auth::user()->id);

        // CONDITION IF SUCCESS DELETE DATA
        if($products)
        {
            // SEND TO LOG ACTIVITY
            GeneralController::addToLog($request, 'Deleting Temporary Products '.$name, Auth::user()->id);
        }
     
        // SEND NOTIFICATION TO CONSOLE
        return response()->json(['success'=>'Products '.$name.' Berhasil Dihapus.']);
    }

    public function export(Request $request){
        GeneralController::addToLog($request, 'Exporting Master Product', Auth::user()->id);

        return Excel::download(new ProductExport, 'Product-Eksport '.date('d M Y H:i:s').'.xlsx');
    }

    public function import(Request $request)
    {
        if($request->type == 'create'){
            GeneralController::addToLog($request, 'Importing Create Master Product', Auth::user()->id);
            Excel::import(new ProductImport,request()->file('file'));

            return back();
        }else{
            GeneralController::addToLog($request, 'Importing Update Master Product', Auth::user()->id);
            Excel::import(new ProductImportUpdate,request()->file('file'));

            return back();
        }
    }

    public function autocomplete(Request $request){
        $data = [];
  
        if($request->filled('q')){
            $data = GeneralController::searchProduct($request->get('q'));
        }
    
        return response()->json($data);
    }
}
