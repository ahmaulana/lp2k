<?php

namespace App\Imports;

use App\Participant;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ParticipantsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function model(array $row)
    {
        return new Participant([
            'nidn' => $row['nidn'],
            'nama' => $row['nama_peserta'],
            'perguruan_tinggi' => $row['perguruan_tinggi'],
            'program_studi' => $row['program_studi'],
            'status' => $row['status'],
            'skor'  => $row['skor'],
            'training_id' => (int)$this->id
        ]);
    }
}
