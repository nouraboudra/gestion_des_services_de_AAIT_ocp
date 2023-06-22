<?php
namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class UserImport implements ToCollection
{
    private $filePath;
    private $users = [];

    public function setFilePath($path)
    {
        $this->filePath = $path;
    }

    public function collection(Collection $rows)
    {
        

        foreach ($rows as $row) {
            $user = [
                'matricule' => $row[0],
                'email' => $row[1],
                'prenom' => $row[2],
                'nom' => $row[3],
                'password' => $row[4],
            ];

            $this->users[] = $user;
        }
    }

    public function getUsers()
    {
        return $this->users;
    }
}