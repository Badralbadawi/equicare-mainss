<?php

namespace App\Imports;

use App\Directorate;
use App\Governorate;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class DirectorateImport
{
    public function import($file)
    {
        $reader = new Xlsx();
        $spreadsheet = $reader->load($file);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        // Skip the header row
        array_shift($sheetData);

        foreach ($sheetData as $row) {
            $governorate = Governorate::where('short_name', $row[2])->first();

            Directorate::create([
                'name' => $row[0],
                'short_name' => $row[1],
                'governorate' => $governorate->short_name,
            ]);
        }
    }
}