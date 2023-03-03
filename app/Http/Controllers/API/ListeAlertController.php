<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alert;
use Illuminate\Support\Facades\DB;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\AndroidConfig;
use Kreait\Firebase\Messaging\ApnsConfig;
use Kreait\Firebase\Messaging\MulticastMessage;
use Kreait\Firebase\Messaging\Notification;
use Kreait\Firebase\Messaging\WebpushConfig;
use Kreait\Firebase\ServiceAccount;


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


    public function statut($id){
        $statut=Alert::Find($id);
        $statut->statut=1;
        $resultat=$statut->save();

        $alerts=DB::select("Select * From alerts
        WHERE statut=0");

        return $alerts;
    }



    public function sendFirebaseNotification($topic, $title, $body, $data = []) {
    // Initialiser Firebase Messaging avec la clé privée
    $serviceAccount = ServiceAccount::fromJsonFile($serviceAccount = ServiceAccount::fromJsonFile(storage_path('hackathon-e6f1f-firebase-adminsdk-kni0l-daf48d7f11.json')));
    $firebase = (new Factory)->withServiceAccount($serviceAccount)->create();

    // Créer l'objet de notification
    $notification = Notification::create($title, $body);

    // Créer les configurations pour Android, APNS et Webpush
    /*$android = AndroidConfig::fromArray($androidConfig);
    $apns = ApnsConfig::fromArray($apnsConfig);
    $webpush = WebpushConfig::fromArray($webpushConfig);*/

    // Créer l'objet de message multicast pour envoyer des notifications à tous les périphériques inscrits au topic
    $multicastMessage = MulticastMessage::fromArray([
        'topic' => $topic,
        'notification' => $notification,
        'android' => $android,
        'data' => $data
    ]);

    // Envoyer le message multicast
    $firebase->getMessaging()->sendMulticast($multicastMessage);
}

    
}
