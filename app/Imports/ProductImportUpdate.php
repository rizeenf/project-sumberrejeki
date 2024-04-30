<?php

namespace App\Imports;

use App\Models\mProduct;
use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Illuminate\Support\Str;

class ProductImportUpdate implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        foreach($row as $rows){
            $cek = mProduct::where('code',$row['kode_produk'])->get();
            if($cek){
                $update = mProduct::where('code',$row['kode_produk'])
                ->update([
                    'name' => $row['nama_produk'],
                    'description' =>$row['deskripsi'],
                    'competitor' =>$row['kompetitor'],
                    'competitor_name' =>$row['nama_kompetitor'],
                    'category_id' =>$row['kategori'],
                    'brand_id' =>$row['brand'],
                    'subbrand_id' =>$row['subbrand'],
                    'status' =>$row['status'],
                    'updated_at' =>date('Y-m-d H:i:s'),
                    'updated_by' =>Auth::user()->id,
                ]);
            }
        }
    }
}
