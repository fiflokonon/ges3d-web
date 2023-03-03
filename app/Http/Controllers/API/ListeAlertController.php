<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alert;
use Illuminate\Support\Facades\DB;

class ListeAlertController extends Controller

{
    public function attribuer(){
        $alerts=DB::select("Select id,ville_id From alerts
        WHERE valide=1
        AND statut=0
        AND isDelete=0");
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

    public function alertsAgentStandBy($ville_id){
        $alerts = Alert::where()
    }


    public function change_statut($id,$alert){
        $alert=Alert::Find($id);
        if($alert->statut)
        {
            return $message="Cette demande a été déjà accepté";
        }
        else{
            $alert->statut=1;
            $resultat=$alert->save();
            return $message="Alert accepté";
        }
    }
}
