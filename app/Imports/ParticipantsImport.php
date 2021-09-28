<?php

namespace App\Imports;

use App\Participant;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Throwable;

class ParticipantsImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation
{
    use Importable, SkipsErrors;
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

    public function rules(): array
    {
        return [
            '*.nidn' => ['required'],
            '*.nama_peserta' => ['required'],
            '*.perguruan_tinggi' => ['required'],
            '*.program_studi' => ['required'],
            '*.status' => ['required','in:lulus,tidak lulus,LULUS,TIDAK LULUS'],
            '*.skor' => ['integer'],
        ];
    }
}
