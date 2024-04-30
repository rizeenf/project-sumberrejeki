<?php

namespace App\Imports;

use App\Models\mProduct;
use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Illuminate\Support\Str;

class ProductImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        foreach($row as $rows){
            $generator;$code;$lastCodeProd;
            $countProd = GeneralController::searchLastCodeProduct('PROD');

            // CHECK CODE 
            if($row['kode_produk'] == null){
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
                $code = $row['kode_produk'];
            }
        }

        // $codenow = GeneralController::searchProduct($code);
        // if($codenow){
        //     $lastDigit = intval(substr($codenow->first()->code,4));
        //         if($lastDigit < 10){
        //             if($lastDigit == 0){
        //                 $generator = '001';    
        //             }else{
        //                 $generator = '00'.$lastDigit+1;
        //             }
        //         }elseif($lastDigit >= 10 && $lastDigit <100){
        //             $generator = '0'.$lastDigit+1;
        //         }else{
        //             $generator = $lastDigit+1;
        //         }
        //     $code = 'PROD'.$generator;
        // }

        return new mProduct([
            'code' => $code,
            'name' => $row['nama_produk'],
            'description' =>$row['deskripsi'],
            'competitor' =>$row['kompetitor'],
            'competitor_name' =>$row['nama_kompetitor'],
            'category_id' =>$row['kategori'],
            'brand_id' =>$row['brand'],
            'subbrand_id' =>$row['subbrand'],
            'status' =>$row['status'],
            'created_at' =>date('Y-m-d H:i:s'),
            'created_by' =>Auth::user()->id,
        ]);
    }
}
