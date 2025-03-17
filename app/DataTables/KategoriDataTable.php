<?php

namespace App\DataTables;

use App\Models\Kategori;
use App\Models\KategoriModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class KategoriDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
                return '
            <div style="display: flex; gap: 5px; align-items: center;">
    <a href="' . route('kategori.edit', $row->kategori_id) . '" class="btn btn-warning btn-sm" style="width: 80px; height: 36px; display: flex; justify-content: center; align-items: center;">
        ✏ Edit
    </a>
    <form action="' . route('kategori.destroy', $row->kategori_id) . '" method="POST" onsubmit="return confirm(\'Apakah Anda yakin ingin menghapus kategori ini?\');" style="margin: 0;">
        ' . csrf_field() . '
        ' . method_field('DELETE') . '
        <button type="submit" class="btn btn-danger btn-sm" style="width: 80px; height: 36px; display: flex; justify-content: center; align-items: center;">
            🗑 Hapus
        </button>
    </form>
</div>
            ';
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }
    /*
     * Get the query source of dataTable.
     */
    public function query(KategoriModel $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('kategori-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('<"row"<"col-md-12 mb-2"B>>' . // Tombol export di atas, rata kiri
                '<"row align-items-center"<"col-md-6"l><"col-md-6 text-end"f>>' . // Show entries & search sejajar
                'rt' . // Tabel
                '<"row align-items-center"<"col-md-6 d-flex align-items-center"i><"col-md-6 d-flex justify-content-end p-0"p>>') // Pagination tanpa jarak
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }
    /*
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::make('kategori_id'),
            Column::make('kategori_kode'),
            Column::make('kategori_nama'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Kategori_' . date('YmdHis');
    }
}
