<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Archive;
use App\Models\Tache;

use PDF;
use Illuminate\Http\Request;

class ArchiveCardController extends Controller
{
    public function index(){
        $tache =Tache::where('status',1)->get();
        $user = Auth::user();
        $data = [
            'titre' => 'Rapport des tâches ',
            'nom' => $user->name,
            'tache' => $tache,

        ];
        $pdf = PDF::loadView('pdf.archivePdf',$data);
         return $pdf->Stream('fichier du rapport des tâches.pdf');
    }
}
