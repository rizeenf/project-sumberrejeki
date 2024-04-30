<?php

namespace App\Imports;

use App\Models\mCustomer;
use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Illuminate\Support\Str;

class CustomerImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        foreach($row as $rows){
        $codeBranch = GeneralController::detailBranch($row['cabang'])->code;
        $lastCodeCust = GeneralController::searchLastCodeCustomer($codeBranch);

        if($row['kode_customer'] == null){
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
            if(!$codenow->isEmpty()){
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
        }else{
            $code = $row['kode_customer'];
        }

            // dd($row['kode_customer']);
            
            return new mCustomer([
                'code' => $code,
                'name' => $row['nama_customer'],
                'phone' =>$row['no_telfon'],
                'address' =>$row['alamat'],
                'LA' =>$row['latitude'],
                'LO' =>$row['longitude'],
                'area' =>$row['area_customer'],
                'subarea' =>$row['subarea_customer'],
                'status' =>$row['status'],
                'regist' =>$row['registrasi'],
                'branch_id' =>$row['cabang'],
                'disabled' =>'0',
                'type' =>'0',
                'created_at' =>date('Y-m-d H:i:s'),
                'created_by' =>Auth::user()->id,
            ]);
        }
    }
}
