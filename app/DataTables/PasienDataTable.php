<?php

namespace App\DataTables;

use App\Models\Pasien;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PasienDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($pasien){
                return '
                <button class="btn btn-outline-primary mb-1 btn-sm riwayat" data-id="'.$pasien->id.'"><i class="ti-book"></i> Riwayat</button>
                    <button class="btn btn-info btn-sm action" data-id="'.$pasien->id.'" data-jenis="edit"><i class="ti-pencil"></i></button>
                    <button class="btn btn-danger btn-sm action" data-id="'.$pasien->id.'" data-jenis="delete"><i class="ti-trash"></i></button>';
            })
            ->addColumn('checkup', function ($pasien){
                return '
                    <button class="btn btn-outline-secondary mb-1 btn-sm action-checkup" data-id="'.$pasien->id.'"><i class="ti-plus"></i> Check UP</button>';
            })
            ->addColumn('imunisasi', function ($pasien){
                return '
                    <button class="btn btn-outline-warning mb-1 btn-sm action-checkup" data-id="'.$pasien->id.'"><i class="ti-plus"></i> Imunisasi</button>';
            })
            ->addColumn('no_kk', function ($pasien){
                return $pasien->keluarga->no_kk;
            })
            ->addColumn('posyandu', function ($pasien){
                return '<span class="badge bg-success">'.$pasien->posyandu->nama_posyandu.'</span>';
            })
            ->addIndexColumn()
            ->setRowId('id')
            ->rawColumns(['checkup','action', 'imunisasi', 'posyandu']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Pasien $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Pasien $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('pasien-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    // ->dom('Bfrtip')
                    ->orderBy(1);
                    // ->buttons(
                    //     Button::make('create'),
                    //     Button::make('export'),
                    //     Button::make('print'),
                    //     Button::make('reset'),
                    //     Button::make('reload')
                    // );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->searchable(false)->orderable(false)->title('No')->addClass('text-center align-middle'),
            Column::make('nama_anak')->addClass('text-center align-middle'),
            Column::make('jk')->addClass('text-center align-middle')->orderable(false),
            Column::make('tgl_lahir')->addClass('text-center align-middle')->orderable(false),
            Column::make('no_kk')->addClass('text-center align-middle')->orderable(false),
            Column::make('posyandu')->addClass('text-center align-middle')->orderable(false),
            Column::make('checkup')->addClass('text-center align-middle')->orderable(false)->width(90),
            Column::make('imunisasi')->addClass('text-center align-middle')->orderable(false)->width(90),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center align-middle')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Pasien_' . date('YmdHis');
    }
}
