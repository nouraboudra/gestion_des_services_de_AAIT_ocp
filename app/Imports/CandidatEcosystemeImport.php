<?php

namespace App\Imports;

use App\Models\Candidat;
use App\Models\CandidatEcosysteme;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class CandidatEcosystemeImport implements ToModel, WithStartRow
{


    private $users = [];

    // ...

    public function getUsers()
    {
        return $this->users;
    }


    public function startRow(): int
    {
        return 2;
    }
    
    public function mapCells(array $row, array $header): array
    {
        // Map the columns based on the header row
        return [
            'matricule' => $row[array_search('CIN', $header)],
            'nom' => $row[array_search('Nom', $header)],
            'prenom' => $row[array_search('Prenom', $header)],
            'email' => $row[array_search('email', $header)],
            'password' => Str::random(10), // Generate a random password
        ];
    }
    public function model(array $row)
    {
        if (!empty($row[0])) {
            $candidat_ecoSystem = new CandidatEcosysteme();
            $candidat_ecoSystem->CIN = $row[0];
            $candidat_ecoSystem->societe = $row[4];
            $candidat_ecoSystem->save();
    
            $user = new User();
            $user->nom = $row[1];
            $user->prenom = $row[2];
            $user->email = $row[3];
            $user->Matricule = $candidat_ecoSystem->CIN;
            $password = Str::random(10); //to send this later to the user via mail
            $user->password = bcrypt($password );
            $user->save();
    
            $candidat = new Candidat();
            $candidat_ecoSystem->candidat()->save($candidat);
            $candidat->user()->save($user);
            
            $this->users[] = [
                'matricule' => $row[0],
                'nom' => $row[1],
                'prenom' => $row[2],
                'email' => $row[3],
                'password' => $password,
            ];
            return $candidat_ecoSystem;
        }
    
        return null;
    }
    public function import(Import $import)
{
    foreach ($import->toArray() as $row) {
        $user = new User();
        $user->matricule = $row['CIN'];
        $user->nom = $row['Nom'];
        $user->prenom = $row['Prenom'];
        $user->email = $row['email'];
        // Set other user properties if needed
        $user->save();

        $candidatEcosysteme = new CandidatEcosysteme();
        $candidatEcosysteme->CIN = $row['CIN'];
        $candidatEcosysteme->Societe = $row['Societe'];
        // Set other CandidatEcosysteme properties if needed
        $candidatEcosysteme->save();

        $candidat = new Candidat();
        $candidat->candidatable_id = $candidatEcosysteme->id;
        $candidat->candidatable_type = CandidatEcosysteme::class;
        $candidat->save();

        $candidatEcosysteme->candidat()->save($candidat);

        $user->userable_type = CandidatEcosysteme::class;
        $user->userable_id = $candidatEcosysteme->id;
        $user->save();
    }
}
}
