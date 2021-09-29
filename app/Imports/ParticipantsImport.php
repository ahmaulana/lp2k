<?php

namespace App\Imports;

use App\Participant;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
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
    private $rows = 0;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function __construct($id)
    {
        $this->id = (int)$id;
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
            'training_id' => $this->id
        ]);
    }

    public function rules(): array
    {
        return [
            '*.nidn' => ['required'],
            '*.nama_peserta' => ['required'],
            '*.perguruan_tinggi' => ['required'],
            '*.program_studi' => ['required'],
            '*.status' => ['required', 'in:lulus,tidak lulus,LULUS,TIDAK LULUS'],
            '*.skor' => ['integer'],
            '*.nidn' => function ($attribute, $value, $onFailure) {
                if (Participant::where('nidn', $value)->where('training_id', $this->id)->exists()) {
                    $onFailure('('. $attribute . ' NID/NIDN sudah terdaftar!)');
                }
            }
        ];
    }
}
