<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function getAdminData(){
        try{
            $user_id = session ('Cdata')->user->userid;
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
