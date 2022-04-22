<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\Student;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PDFController extends Controller
{
    public function biodata($id)
    {
        $data = Student::findOrFail($id);
        $pdf = PDF::loadView('pdf.biodata', compact('data'));
        return $pdf->stream('filename.pdf');
        // return view('pdf.biodata', compact('data'));
        // return $pdf->download('bio-'.$data->nama_lengkap.'.pdf');
    }
    public function mou($id)
    {
        $data = Student::findOrFail($id);
        $pdf = PDF::loadView('pdf.mou', compact('data'));
        return $pdf->stream('filename.pdf');
        // return $pdf->download('mou-'.$data->nama_lengkap.'.pdf');    
    }
    public function kirimWa($id)
    {  
        $CS = Student::where('id',$id)->first();
        
        $date = Carbon::parse($CS->jadwal->tanggal)->locale('id');
        $date->settings(['formatFunction' => 'translatedFormat']);
        $tgl = $date->format('l, j F Y');
        $jam = $CS->jadwal->jam;
        $number = $CS->mom_phone;
        $message = "Assalamualaikum wr wb. Mengingatkan kepada Ayah/Bunda dan Ananda :\n*".$CS->full_name."* \nuntuk hadir mengikuti Psikotes di SDIT Harapan Umat Jember pada: \n*".$tgl."*, \nJam : *".$jam."* \nTerima kasih atas perhatiannya. Waasalamualaikum wrb wb. \n \n_(Wa ini dikirim otomatis. untuk informasi lebih lanjut 088289378109)_";
        $client = new Client();
        try {
            $res = $client->post('http://sister.sditharum.id:7000/send-message', [
                
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                'form_params' => [
                    // 'number' => sprintf('%08d', 85233002598),
                    'number' => $number,
                    'message' => $message
                    ]
                ]);
                $res = json_decode($res->getBody()->getContents(), true);
                return back()->with('success','Terkirim');
            }
            catch (Exception $e) {
                $response = $e->getresponse();
                $result =  json_decode($response->getBody()->getContents());
                return response()->json(['data' => $result]);
            }
            
        }

    public function kts($id)
    {
        $data = Student::findOrFail($id);
        return view('pdf.kts', compact('data'));
    }
}