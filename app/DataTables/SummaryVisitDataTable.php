<?php

namespace App\DataTables;

// use App\Models\SummaryVisit;
use App\Http\Controllers\GeneralController;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SummaryVisitDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'summaryvisit.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\SummaryVisit $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SummaryVisit $model)
    {
        // return $model->newQuery();
        return GeneralController::ListAllVisit();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('summaryvisit-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(true)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('No'),
            Column::make('Tanggal Kunjungan'),
            Column::make('Staff'),
            Column::make('Total Kunjungan'),
            Column::make('Action'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'SummaryVisit_' . date('YmdHis');
    }
}
