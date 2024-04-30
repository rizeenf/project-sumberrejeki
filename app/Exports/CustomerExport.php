<?php

namespace App\Exports;

use App\Models\mCustomer;
use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Facades\DB;

class CustomerExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $index = 0;

    public function collection()
    {
        $result = DB::select('select 
        ROW_NUMBER() OVER() as num_row,
        CONCAT(IF(m_customers.regist=1, "RO-", "NRO-"),m_customers.code),
        m_customers.name,
        m_customers.phone,
        m_customers.address,
        m_customers.LA,
        m_customers.LO,
        m_customers.area,
        m_customers.subarea,
        IF(m_customers.status=1, "Aktif", "Non-Aktif"),
        m_branches.name AS branch_name 
        from m_customers
        inner join m_branches on m_customers.branch_id = m_branches.id
        where m_customers.disabled=0 and m_customers.type = 0');
        return collect($result);
    }

    public function headings(): array
    {
        return [
            'No',
            'Kode Customer',
            'Nama Customer',
            'No. Telpon',
            'Alamat Lengkap',
            'Latitude',
            'Longitude',
            'Area',
            'Sub Area',
            'Status Customer',
            'Cabang'
        ];
    }
}
