<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BooksExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
//        return Book::all();
        return Book::with('editor')->get()->map(function ($book) {
            return [
                $book->id,
                $book->isbn,
                $book->name,
                $book->editor->name,
                $book->price,
                $book->cover_book,
                $book->bibliography,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'ISBN',
            'Name',
            'Editor',
            'Price',
            'Cover Book',
            'Bibliography'

        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

            // Styling a specific column
            'E' => ['font' => ['italic' => true, 'size' => 12]],
        ];
    }
}
