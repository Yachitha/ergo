<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Session;

class EventController extends Controller
{
    /**
     * @param Request $Request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createEvent(Request $Request)
    {
    	$company_id = session('Cdata')->user->company_id;
       $client = new Client([
            'headers' => ['Accept'=>'application/json','Authorization'=>'Bearer '.session('Cdata')->uid]
        ]);

        $response = $client->request('POST','http://kinna.000webhostapp.com/api/v1/companyUsers',[
            'form_params'=> [
                'company_id'=>$company_id,
                 ]
        ]); 

        $data= $response->getBody();
        $Cdata= json_decode($data);
        //dd($Cdata) ;
        return view('createEvent',compact('Cdata'));
    }

    /**
     * @param Request $Request
     */
    public function submitEvent(Request $Request)
    {
    	$company_id=$Request->input('company_id');
    	$name=$Request->input('name');
    	$description=$Request->input('description');
    	$date=$Request->input('date');
    	$user_id=$Request->input('user_id');
    	//dd($user_id);
    	$client = new Client([
            'headers' => ['Accept'=>'application/json','Authorization'=>'Bearer '.session('Cdata')->uid]
        ]);

        $response = $client->request('POST','http://kinna.000webhostapp.com/api/v1/events',[
            'form_params'=> [
            	'company_id'=>$company_id,
                'name'=> $name,
                //'category'=> $category,
                'involve_user_id'=>session ('Cdata')->user->id,
                'description'=> $description,
                'start_date'=>$date,
                'organizer_id'=>$user_id,
                ]
        ]);
        
        $data= $response->getBody();
        $Cdata= json_decode($data);
        dd($Cdata);
    }

    public function viewEvents(){
        $token = session ('Cdata')->uid;
        $company_id = session ('Cdata')->user->company_id;
        $client2 = new Client( [
            'headers' => [
                'Accept' => 'application/json' ,
                'Authorization' => 'Bearer ' . $token
            ]
        ] );


        $response2 = $client2->request ( 'POST' , 'http://kinna.000webhostapp.com/api/v1/companyEvents' , [
            'form_params' => [
                'company_id' => $company_id
            ]
        ] );

        $data2 = $response2->getBody ();
        $Cdata2 = json_decode ($data2);
        //dd ($Cdata2);
        $events = collect ($Cdata2);
        $entry = [];
        foreach ($events as $event){
            $entry[] = Calendar::event(
                $event->name,
                true,
                $event->start_date,
                $event->end_date
            );
        }

        $calendar = Calendar::addEvents($entry);
        return view ('/viewEvents',['calendar'=>$calendar]);
    }

}
