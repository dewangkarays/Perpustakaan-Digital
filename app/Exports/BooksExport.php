<?php

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BookExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    public function query()
    {
        return Book::query();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Judul',
            'Deskripsi',
            'Jumlah',
            'File Buku',
            'Cover Buku',
            'Kategori',
        ];
    }

    public function map($book): array
    {
        return [
            $book->id,
            $book->title,
            $book->deskripsi,
            $book->jumlah,
            $book->file_buku,
            $book->cover_buku,
            $book->category->name,
        ];
    }
}
