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
        $valider=Alert::Find($id);
        $valider->valide=1;
        $resultat=$valider->save();

        $alerts=DB::select("Select * From alerts
        WHERE statut=0");

        return $alerts;
    }


    public function attribuer(){
        $alerts=DB::select("Select id,ville_id From alerts
        WHERE valide=1
        AND statut=0
        AND isDelete=0 Limit 1");
        $id_ville=$alerts[0]->ville_id;
        $id=$alerts[0]->id;

        if($alerts){
            $argent=DB::select("Select id From users
            WHERE ville_id=$id_ville");
            $alert=DB::select("Select * From alerts
            WHERE id=$id");
            return [$argent,$alert];
        }
    }


    public function statut($id){
        $statut=Alert::Find($id);
        $statut->statut=1;
        $resultat=$statut->save();

        $alerts=DB::select("Select * From alerts
        WHERE statut=0");

        return $alerts;
    }
}
