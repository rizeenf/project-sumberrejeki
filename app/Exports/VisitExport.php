<?php

namespace App\Exports;

use App\Models\tVisit;
use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Facades\DB;

class VisitExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $index = 0;

    public function collection()
    {
        // return mProduct::all();
        $result = DB::select('select distinct
        t_visits.date,
        m_staff.code as CodeStaff,
        m_staff.name as NameStaff,
        t_visits.order,
        t_visits.timeIn,
        t_visits.timeOut,
        t_visits.LA as LAVisit,
        t_visits.LO as LOVisit,
        m_customers.code as CodeCust,
        m_customers.name as NameCust,
        m_customers.address,
        m_customers.LA as LACust,
        m_customers.LO as LOCust
        from t_visits
        inner join m_customers on m_customers.id = t_visits.customer_id
        inner join m_staff on m_staff.id = t_visits.staff_id
        inner join m_fotos on m_fotos.visit_id = t_visits.id
        where m_fotos.type = "V"
        order by t_visits.date DESC, t_visits.staff_id DESC, t_visits.order ASC
        ');
        // $result = tVisit::all();
        return collect($result);
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Kode Staff',
            'Nama Staff',
            'Urutan Visit',
            'Waktu Cekin',
            'Waktu Cekout',
            'Latitude Cekin',
            'Longitude Cekin',
            'Kode Customer',
            'Nama Customer',
            'Alamat Customer',
            'Latitude Customer',
            'Longitude Customer'
        ];
    }
}
