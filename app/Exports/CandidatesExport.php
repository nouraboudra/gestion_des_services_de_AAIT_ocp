<?php

namespace App\Exports;

use App\Models\Candidat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class CandidatesExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    private $candidatsIds;

    public function __construct($candidatsIds)
    {
        $this->candidatsIds = $candidatsIds;
    }
    public function collection()
    {
        return DB::table('candidats')
            ->join('users', 'candidats.id', '=', 'users.userable_id')
            ->where('users.userable_type', Candidat::class)
            ->whereIn('candidats.id', $this->candidatsIds)
            ->select(
                'candidats.id as ID',
                'users.nom',
                'users.prenom',
                DB::raw('NULL as Action'),
                DB::raw('NULL as Motif'),
                DB::raw('NULL as Signature')
            )
            ->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'NOM',
            'PRÉNOM',
            'Action',
            'Motif',
            'Signature',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:F1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ]
                ]);
            },
        ];
    }
}