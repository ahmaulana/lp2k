<?php

namespace App\Http\Controllers;

use App\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SearchCertificateController extends Controller
{
    public function search()
    {
        $certificates = Participant::select('participants.id', 'nama_pelatihan', 'pelatihan_tanggal_mulai', 'status', 'no_sertifikat', 'sertifikat', 'surat_pengesahan')->join('trainings', 'training_id', 'trainings.id')->where('nidn', request()->nidn)->get();

        $table = [];
        if ($certificates->isEmpty()) {
            $table[] = '
                <tr>
                    <td colspan="5">Data Tidak Ditemukan!</td>
                </tr>';
        } else {
            foreach ($certificates as $certificate) {
                $certificate_btn = (empty($certificate->sertifikat) || !isset(json_decode($certificate->sertifikat)[0]->download_link)) ? "" : '<a href="' . Storage::disk(config('voyager.storage.disk'))->url(json_decode($certificate->sertifikat)[0]->download_link) . '" class="view" title="" data-toggle="tooltip" data-original-title="View">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                    <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z" />
                </svg></a>';

                $letter_btn = (empty($certificate->surat_pengesahan) || !isset(json_decode($certificate->surat_pengesahan)[0]->download_link)) ? "" : '<a href="' . Storage::disk(config('voyager.storage.disk'))->url(json_decode($certificate->surat_pengesahan)[0]->download_link) . '" class="view" title="" data-toggle="tooltip" data-placement="top">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-check" viewBox="0 0 16 16">
                <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                </svg></a>';
                
                $html = '
                    <tr>
                        <td>' . $certificate->nama_pelatihan . '</td>
                        <td>' . date('d-m-Y', strtotime($certificate->pelatihan_tanggal_mulai)) . '</td>
                        <td>' . $certificate->status . '</td>
                        <td>' . $certificate->no_sertifikat . '</td>
                        <td>
                            <div class="d-inline">
                                <a href="#" onclick="detail(' . $certificate->id . ')"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                    </svg></a>
                            </div>
                            <div class="d-inline pl-1">' . $certificate_btn . '</div>
                            <div class="d-inline">' . $letter_btn . '</div>
                        </td>
                    </tr>
                ';

                $table[] = $html;
            }
        }

        return $table;
    }

    public function detail()
    {
        $detail = Participant::join('trainings', 'trainings.id', 'training_id')->join('coordinators', 'coordinators.id', 'coordinator_id')->join('categories', 'categories.id', 'category_id')->where('participants.id', request()->id)->first();

        return $detail;
    }
}
