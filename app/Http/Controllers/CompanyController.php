<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class CompanyController extends Controller
{
   public function getCompanyData(){
    
    try{
        $client = new Client([
            'headers' => ['Accept'=>'application/json','Authorization'=>'Bearer '.session('Cdata')->uid]
        ]);
            $response = $client->request('POST','http://kinna.000webhostapp.com/api/v1/companyDetails',[
                'form_params'=> [
                'company_id'=> session('Cdata')->user->company_id,
                ]
        ]);
        $data= $response->getBody();
        $Cdata= json_decode($data);
        //dd($Cdata);
        return view('/companyProfile',compact('Cdata'));
    }catch(ClientException $e){
        echo "error occured!";
    }
   }
}
