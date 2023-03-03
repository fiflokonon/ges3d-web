<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alert;
use Illuminate\Support\Facades\DB;

class ListeAlertController extends Controller
{
    public function liste(){
        $alerts=DB::select("Select * From alerts
        WHERE statut=0");
        return $alerts;
    }

    public function valider($id){
        $statut=Alert::Find($id);
        $statut->statut=1;
        $resultat=$statut->save();

        $alerts=DB::select("Select * From alerts
        WHERE statut=0");

        return $alerts;
    }
}
