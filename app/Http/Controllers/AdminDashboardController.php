<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function getAdminData(){
        try{
            $user_id = session ('Cdata')->user->userid;
            $company_id = session ('Cdata')->user->company_id;
            $token = session ('Cdata')->uid;

            $client = new Client([
                'headers' =>[
                    'Accept'=>'application/json',
                    'Authorization'=>'Bearer '.$token
                ]
            ]);

            $response = $client->request ('POST','http://kinna.000webhostapp.com/api/v1/companyUsers',[
               'form_params' => [
                   'company_id' => $company_id
               ]
            ]);

            $data = $response->getBody ();
            $Cdata = json_decode ($data);
            //dd($Cdata);
            $companyUsers = collect ($Cdata);

            $client1 = new Client([
                'headers'=>[
                    'Accept'=>'application/json',
                    'Authorization'=>'Bearer '.$token
                ]
            ]);

            $response1 = $client1->request ('POST','http://kinna.000webhostapp.com/api/v1/companyProjects',[
               'form_params'=>[
                   'company_id'=>$company_id
               ]
            ]);

            $data1 = $response1->getBody ();
            $Cdata1 = json_decode ($data1);
            //dd ($Cdata1);
            $ongoing = 0;
            $late = 0;
            $userProjects = collect ($Cdata1);
            foreach ($userProjects as $userProject){
                $current = Carbon::now ();
                $end_date = Carbon::parse ($userProject->end_date);
                if ($end_date->gt ($current)){
                    $ongoing++;
                }else{
                    $late++;
                }
            }

            return view('admin.adminDashboard',[
                'companyUsers'=>$companyUsers,
                'ongoing'=>$ongoing,
                'late'=>$late,
                'all'=>$userProjects->count ()

            ]);

        }catch (ClientException $e){
            return redirect ('/clientError');
        }
        catch (ConnectException $ce) {
            return redirect ('/connectionError');
        }
        catch (RequestException $re){
            return redirect ('/serverError');
        }
    }
}
