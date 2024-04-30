<?php

namespace App\Exports;

use App\Models\mProduct;
use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Facades\DB;

class ProductExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    protected $index = 0;

    public function collection()
    {
        // return mProduct::all();
        $result = DB::select('select 
        ROW_NUMBER() OVER() as num_row,
        m_products.code,
        m_products.name,
        m_products.description,
        IF(m_products.competitor = 1, "Ya", "Tidak"),
        m_products.competitor_name,
        IF(m_products.category_id = NULL, "Tidak Diketahui", m_category_products.name),
        IF(m_products.brand_id = NULL, "Tidak Diketahui", m_brand_products.name),
        IF(m_products.subbrand_id = NULL, "Tidak Diketahui", m_sub_brand_products.name),
        IF(m_products.status=1, "Aktif", "Non-Aktif")
        from m_products
        inner join m_category_products on m_products.category_id = m_category_products.id
        inner join m_brand_products on m_products.brand_id = m_brand_products.id
        inner join m_sub_brand_products on m_products.subbrand_id = m_sub_brand_products.id
        where m_products.disabled=0');
        return collect($result);
    }

    public function headings(): array
    {
        return [
            'No',
            'Kode Produk',
            'Nama Produk',
            'Deskripsi',
            'Competitor',
            'Nama Competitor',
            'Kategori Produk',
            'Brand Produk',
            'Sub Brand Produk',
            'Status'
        ];
    }
}
