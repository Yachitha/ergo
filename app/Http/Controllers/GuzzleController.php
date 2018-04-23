<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GuzzleController extends Controller
{
    public function getRemoteData()
    {
    //
    $accessToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImNjMjA3OGE3MjZhMDY5NzNhNjMzZWM2YWY0NDBlN2E2OTQzOGVmNDYzYzJkN2NhNWRkMGEyMjczMTcwZTc2OGMzMWE3NDE2NTE5MmQzMmNiIn0.eyJhdWQiOiIxIiwianRpIjoiY2MyMDc4YTcyNmEwNjk3M2E2MzNlYzZhZjQ0MGU3YTY5NDM4ZWY0NjNjMmQ3Y2E1ZGQwYTIyNzMxNzBlNzY4YzMxYTc0MTY1MTkyZDMyY2IiLCJpYXQiOjE1MTYzNjY3MTQsIm5iZiI6MTUxNjM2NjcxNCwiZXhwIjoxNTQ3OTAyNzE0LCJzdWIiOiIyMDciLCJzY29wZXMiOltdfQ.aPh2Jyvs0-rlrCiJfUmxjpP0RQW5f_Sthi-Lhy8PrJkFTqhFHqZE95Hn81WhdlsQnbQrvGaTRdvHw0ihtQ8x0vkuO1KN4z9DPvvU1c-wPONa_jUCCcmWp9WNFAV9P2r4m7Z7GUBTJcu0Oqu8Uy3HHNu_mJMfeL7Cv5fL9u8Zm2BKMoll8YIE8V7Dheh6MbWzq1m-DQFXICbZMZcFpsNwDCUaFBAWkKoc14g1eojd_ObaID-JawobeZ6MjM8X_CzcD00V73V4Gld8FZdkWr--vUHraFip3-e3FEnoNBVk7ch1Vme5u6fO8fVk4fhLFlXvSH95GW5yK-vrQUIQMe-JpoYD5SMfr94FcmWfN-qnL4yBSgnDrqsPbfCGLEXAbV4kfxY4eXft7eQoosdskvp8quZTAN3gJXlspghrysF-1DZ4tFXMm1ruDclvrEdMmfc9E_aBbSdp6oXPvkVpw9FeSiM8tdoQHiSQzhrM8ynhV3AdHZnXetDhas_co01-uYJkuLHn7VGpHMW5Xxxx-5Sg7ApnhRI_nh8Svco3dwly0iDFr4ypewjUHZdyBnjq3YD1gEAcBB5e7_6EaWXJS-9gZWZ_Vu65r3HWj_Sj5s3TjqhDq7BV71TYwfOxgtWjdVMrj0TG3xRJP3mBvif5Y4ySZyNt5BfhqUnUMFEP7znEQlc';

        $client = new Client();

        /*$request = $client->createRequest('POST','http://kinna.000webhostapp.com/api/login',[
            'body'=> [
                'email'=> "yachi@gmail.com",
                'password'=>"yachi@123"
            ]
        ]);*/
        //$request = $client->createRequest('GET','http://kinna.000webhostapp.com/api/v1/users');
        //$response = $client->send($request);
        $request = $client->request('GET','http://kinna.000webhostapp.com/api/v1/tasks',[
            'headers' => ['Accept'=>'application/json',
            'Authorization' => 'Bearer '.$accessToken,],
        ]);
        //$response = $client->send($request);
        $data = $request->getBody();
        $Cdata = json_decode($data);
        //$code = $response->getStatusCode();
        //$header = $response->getHeader()[1];
        //dd($Cdata);
        return view('getdata',compact('Cdata'));
        //return view('greetings', ['name' => 'Victoria']);

    }  
    public function getProjects(){
    $accessToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImNjMjA3OGE3MjZhMDY5NzNhNjMzZWM2YWY0NDBlN2E2OTQzOGVmNDYzYzJkN2NhNWRkMGEyMjczMTcwZTc2OGMzMWE3NDE2NTE5MmQzMmNiIn0.eyJhdWQiOiIxIiwianRpIjoiY2MyMDc4YTcyNmEwNjk3M2E2MzNlYzZhZjQ0MGU3YTY5NDM4ZWY0NjNjMmQ3Y2E1ZGQwYTIyNzMxNzBlNzY4YzMxYTc0MTY1MTkyZDMyY2IiLCJpYXQiOjE1MTYzNjY3MTQsIm5iZiI6MTUxNjM2NjcxNCwiZXhwIjoxNTQ3OTAyNzE0LCJzdWIiOiIyMDciLCJzY29wZXMiOltdfQ.aPh2Jyvs0-rlrCiJfUmxjpP0RQW5f_Sthi-Lhy8PrJkFTqhFHqZE95Hn81WhdlsQnbQrvGaTRdvHw0ihtQ8x0vkuO1KN4z9DPvvU1c-wPONa_jUCCcmWp9WNFAV9P2r4m7Z7GUBTJcu0Oqu8Uy3HHNu_mJMfeL7Cv5fL9u8Zm2BKMoll8YIE8V7Dheh6MbWzq1m-DQFXICbZMZcFpsNwDCUaFBAWkKoc14g1eojd_ObaID-JawobeZ6MjM8X_CzcD00V73V4Gld8FZdkWr--vUHraFip3-e3FEnoNBVk7ch1Vme5u6fO8fVk4fhLFlXvSH95GW5yK-vrQUIQMe-JpoYD5SMfr94FcmWfN-qnL4yBSgnDrqsPbfCGLEXAbV4kfxY4eXft7eQoosdskvp8quZTAN3gJXlspghrysF-1DZ4tFXMm1ruDclvrEdMmfc9E_aBbSdp6oXPvkVpw9FeSiM8tdoQHiSQzhrM8ynhV3AdHZnXetDhas_co01-uYJkuLHn7VGpHMW5Xxxx-5Sg7ApnhRI_nh8Svco3dwly0iDFr4ypewjUHZdyBnjq3YD1gEAcBB5e7_6EaWXJS-9gZWZ_Vu65r3HWj_Sj5s3TjqhDq7BV71TYwfOxgtWjdVMrj0TG3xRJP3mBvif5Y4ySZyNt5BfhqUnUMFEP7znEQlc';

        $client = new Client();

        /*$request = $client->createRequest('POST','http://kinna.000webhostapp.com/api/login',[
            'body'=> [
                'email'=> "yachi@gmail.com",
                'password'=>"yachi@123"
            ]
        ]);*/
        //$request = $client->createRequest('GET','http://kinna.000webhostapp.com/api/v1/users');
        //$response = $client->send($request);
        $response = $client->request('GET','http://kinna.000webhostapp.com/api/v1/projects',[
            'headers' => ['Accept'=>'application/json',
            'Authorization' => 'Bearer '.$accessToken,],
        ]);
       
        $data = $response->getBody();
        $Cdata = json_decode($data);
        return view('viewProjects',compact('Cdata'));
    }

    public function getTasks(){
        $accessToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImNjMjA3OGE3MjZhMDY5NzNhNjMzZWM2YWY0NDBlN2E2OTQzOGVmNDYzYzJkN2NhNWRkMGEyMjczMTcwZTc2OGMzMWE3NDE2NTE5MmQzMmNiIn0.eyJhdWQiOiIxIiwianRpIjoiY2MyMDc4YTcyNmEwNjk3M2E2MzNlYzZhZjQ0MGU3YTY5NDM4ZWY0NjNjMmQ3Y2E1ZGQwYTIyNzMxNzBlNzY4YzMxYTc0MTY1MTkyZDMyY2IiLCJpYXQiOjE1MTYzNjY3MTQsIm5iZiI6MTUxNjM2NjcxNCwiZXhwIjoxNTQ3OTAyNzE0LCJzdWIiOiIyMDciLCJzY29wZXMiOltdfQ.aPh2Jyvs0-rlrCiJfUmxjpP0RQW5f_Sthi-Lhy8PrJkFTqhFHqZE95Hn81WhdlsQnbQrvGaTRdvHw0ihtQ8x0vkuO1KN4z9DPvvU1c-wPONa_jUCCcmWp9WNFAV9P2r4m7Z7GUBTJcu0Oqu8Uy3HHNu_mJMfeL7Cv5fL9u8Zm2BKMoll8YIE8V7Dheh6MbWzq1m-DQFXICbZMZcFpsNwDCUaFBAWkKoc14g1eojd_ObaID-JawobeZ6MjM8X_CzcD00V73V4Gld8FZdkWr--vUHraFip3-e3FEnoNBVk7ch1Vme5u6fO8fVk4fhLFlXvSH95GW5yK-vrQUIQMe-JpoYD5SMfr94FcmWfN-qnL4yBSgnDrqsPbfCGLEXAbV4kfxY4eXft7eQoosdskvp8quZTAN3gJXlspghrysF-1DZ4tFXMm1ruDclvrEdMmfc9E_aBbSdp6oXPvkVpw9FeSiM8tdoQHiSQzhrM8ynhV3AdHZnXetDhas_co01-uYJkuLHn7VGpHMW5Xxxx-5Sg7ApnhRI_nh8Svco3dwly0iDFr4ypewjUHZdyBnjq3YD1gEAcBB5e7_6EaWXJS-9gZWZ_Vu65r3HWj_Sj5s3TjqhDq7BV71TYwfOxgtWjdVMrj0TG3xRJP3mBvif5Y4ySZyNt5BfhqUnUMFEP7znEQlc';
    
            $client = new Client();
    
            /*$request = $client->createRequest('POST','http://kinna.000webhostapp.com/api/login',[
                'body'=> [
                    'email'=> "yachi@gmail.com",
                    'password'=>"yachi@123"
                ]
            ]);*/
            //$request = $client->createRequest('GET','http://kinna.000webhostapp.com/api/v1/users');
            //$response = $client->send($request);
            $response = $client->request('GET','http://kinna.000webhostapp.com/api/v1/tasks',[
                'headers' => ['Accept'=>'application/json',
                'Authorization' => 'Bearer '.$accessToken,],
            ]);
           
            $data = $response->getBody();
            $Cdata = json_decode($data);
            return view('tasks',compact('Cdata'));
        }

        public function getMilestones(){
            $accessToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImNjMjA3OGE3MjZhMDY5NzNhNjMzZWM2YWY0NDBlN2E2OTQzOGVmNDYzYzJkN2NhNWRkMGEyMjczMTcwZTc2OGMzMWE3NDE2NTE5MmQzMmNiIn0.eyJhdWQiOiIxIiwianRpIjoiY2MyMDc4YTcyNmEwNjk3M2E2MzNlYzZhZjQ0MGU3YTY5NDM4ZWY0NjNjMmQ3Y2E1ZGQwYTIyNzMxNzBlNzY4YzMxYTc0MTY1MTkyZDMyY2IiLCJpYXQiOjE1MTYzNjY3MTQsIm5iZiI6MTUxNjM2NjcxNCwiZXhwIjoxNTQ3OTAyNzE0LCJzdWIiOiIyMDciLCJzY29wZXMiOltdfQ.aPh2Jyvs0-rlrCiJfUmxjpP0RQW5f_Sthi-Lhy8PrJkFTqhFHqZE95Hn81WhdlsQnbQrvGaTRdvHw0ihtQ8x0vkuO1KN4z9DPvvU1c-wPONa_jUCCcmWp9WNFAV9P2r4m7Z7GUBTJcu0Oqu8Uy3HHNu_mJMfeL7Cv5fL9u8Zm2BKMoll8YIE8V7Dheh6MbWzq1m-DQFXICbZMZcFpsNwDCUaFBAWkKoc14g1eojd_ObaID-JawobeZ6MjM8X_CzcD00V73V4Gld8FZdkWr--vUHraFip3-e3FEnoNBVk7ch1Vme5u6fO8fVk4fhLFlXvSH95GW5yK-vrQUIQMe-JpoYD5SMfr94FcmWfN-qnL4yBSgnDrqsPbfCGLEXAbV4kfxY4eXft7eQoosdskvp8quZTAN3gJXlspghrysF-1DZ4tFXMm1ruDclvrEdMmfc9E_aBbSdp6oXPvkVpw9FeSiM8tdoQHiSQzhrM8ynhV3AdHZnXetDhas_co01-uYJkuLHn7VGpHMW5Xxxx-5Sg7ApnhRI_nh8Svco3dwly0iDFr4ypewjUHZdyBnjq3YD1gEAcBB5e7_6EaWXJS-9gZWZ_Vu65r3HWj_Sj5s3TjqhDq7BV71TYwfOxgtWjdVMrj0TG3xRJP3mBvif5Y4ySZyNt5BfhqUnUMFEP7znEQlc';
        
                $client = new Client();
        
                /*$request = $client->createRequest('POST','http://kinna.000webhostapp.com/api/login',[
                    'body'=> [
                        'email'=> "yachi@gmail.com",
                        'password'=>"yachi@123"
                    ]
                ]);*/
                //$request = $client->createRequest('GET','http://kinna.000webhostapp.com/api/v1/users');
                //$response = $client->send($request);
                $response = $client->request('GET','http://kinna.000webhostapp.com/api/v1/milestones',[
                    'headers' => ['Accept'=>'application/json',
                    'Authorization' => 'Bearer '.$accessToken,],
                ]);
               
                $data = $response->getBody();
                $Cdata = json_decode($data);
                return view('milestones',compact('Cdata'));
            }

            
}

