<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ListeAlertController extends Controller

{
    public function alertsAgentStandBy($ville_id){

        $alerts = Alert::where('isDelete', 0)->where('valide', 1)->where('statut', 0)->where('ville_id', $ville_id)->get();
        if($alerts)
        {
            return ['success' => true, 'response' => $alerts];
        }else{
            return json_encode(['success' => false, 'message' => 'Pas d\'alerte']);

        }
    }

    public function alertsAgentAccepted($user_id){

        $alerts = Alert::where('isDelete', 0)->where('valide', 1)->where('statut', 1)->where('close', 0)->where('agent_id', $user_id)->get();
        if($alerts)
        {
            return json_encode(['success' => true, 'response' => $alerts]);
        }else{
            return json_encode(['success' => false, 'message' => 'Pas d\'alerte Accepted']);

        }
    }

    public function alertsAgentClose($user_id){

        $alerts = Alert::where('isDelete', 0)->where('valide', 1)->where('statut', 1)->where('close', 1)->where('agent_id', $user_id)->get();
        if($alerts)
        {
            return json_encode(['success' => true, 'response' => $alerts]);
        }else{
            return json_encode(['success' => false, 'message' => 'Pas d\'alerte collectée']);

        }
    }

    public function closeAlerts($alert_id, $poids){

        $alerts = Alert::find($alert_id);
        $alerts->poids = $poids;
        $alerts->close = 1;
        $alerts->save();
        $user_id = $alerts->user->id;
        $user = User::find($user_id);
        $user->total_waste = 10 * $poids;
        $user->save();
        return json_encode(['success' => true, 'message' => 'Terminée']);

    }


    public function change_statut($agent_id, $alert_id){
        $alert = Alert::find($alert_id);

        if($alert->statut)
        {
            return json_encode(['success' => false, 'message' => 'Cette demande a été déjà accepté']);
        }
        else{
            $alert->statut=1;
            $alert->agent_id = $agent_id;
            $alert->save();
            return json_encode(['success' => true, 'message' => 'Alerte accepté"']);
        }
    }
}
