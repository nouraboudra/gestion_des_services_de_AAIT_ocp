<?php

namespace App\Exports;


use App\Models\Formation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class FormationsExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithEvents
{
    public function collection()
    {
        // get all formations with their sessions
        return Formation::with('sessionFormations')->get();
    }

    public function headings(): array
    {
        return ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
    }

    public function map($formation): array
    {
        // Initialize an array with empty strings for each day of the week
        $week = array_fill(0, 7, '');

        // For each session of the formation, add its intitulé to the correct day of the week
        foreach ($formation->sessionFormations as $session) {
            $dayOfWeek = Carbon::parse($session->date_debut)->dayOfWeek;
            // Concatenate the formation name and the session title with a newline
            $week[$dayOfWeek] = $formation->Intitulé . "\n" . $session->intitule . "\n" . $session->formateur->user->nom . "\n" . $session->groupe->nom;
        }

        return $week;
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