<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class UserController extends Controller
{
    public function updateUserProfile(){
       $token = session ('Cdata')->uid;
       $user_id = session ('Cdata')->user->userid;

        $client = new Client([
            'headers' => ['Accept'=>'application/json','Authorization'=>'Bearer '.$token]
        ]);

        $response = $client->request('POST','http://kinna.000webhostapp.com/api/v1/userProfilePic',[
            'form_params'=> [
                'user_id'=>$user_id,
            ]
        ]);

        $data = $response->getBody ();
        $finalData = json_decode ($data);

        return response ()->json ($finalData);
    }
}
