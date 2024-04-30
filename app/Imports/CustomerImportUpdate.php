<?php

namespace App\Imports;

use App\Models\mCustomer;
use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Illuminate\Support\Str;

class CustomerImportUpdate implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // $uniqueId = Str::random(10);
        // $cek = mCustomer::where('code',$row['kode_customer'])->get();
            foreach($row as $rows){
                $cek = mCustomer::where('code',$row['kode_customer'])->get();
                if($cek){
                    $update = mCustomer::where('code',$row['kode_customer'])
                    ->update([
                        'name' => $row['nama_customer'],
                        'phone' =>$row['no_telfon'],
                        'address' =>$row['alamat'],
                        'LA' =>$row['latitude'],
                        'LO' =>$row['longitude'],
                        'area' =>$row['area_customer'],
                        'status' =>$row['status'],
                        'regist' =>$row['registrasi'],
                        'branch_id' =>$row['cabang'],
                        'disabled' =>'0',
                        'type' =>'0',
                        'updated_at' =>date('Y-m-d H:i:s'),
                        'updated_by' =>Auth::user()->id,
                    ]);
                }
            }
    }
}