<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Session;

class projectController extends Controller
{
    //
    protected $adminData;

    // public function __construct( AdminController $admin)
    // {
    // 	$this->adminData= $admin;
    // }
     public function getProjectData(Request $Request)
    {
        //$token=session('Cdata')->uid;
        //dd(session('Cdata'));

        $name=$Request->input('name');
        $category=$Request->input('category');
        $description = $Request->input ('description');
        $start_date=$Request->input('start_date');
        $end_date=$Request->input('end_date');
        $company_id=session('Cdata')->user->company_id;
        $developers=$Request->input('developers');
        //dd($developers);
        $client = new Client([
            'headers' => ['Accept'=>'application/json','Authorization'=>'Bearer '.session('Cdata')->uid]
        ]);

        $response = $client->request('POST','http://kinna.000webhostapp.com/api/v1/projects',[
            'form_params'=> [
                'name'=> $name,
                'category'=> $category,
                'description'=> $description,
                'start_date'=>$start_date,
                'end_date'=>$end_date, 
                'company_id'=>$company_id,
                'developers'=>$developers,
                ]
        ]);
        
        $data= $response->getBody();
        $Cdata= json_decode($data);

        //dd($Cdata);
        return redirect ('createProjects');
        
    }
//view all projects
    public function viewProjects(Request $Request)
    {
        $client = new Client([
            'headers' => ['Accept'=>'application/json','Authorization'=>'Bearer '.session('Cdata')->uid]
        ]);

        $response = $client->request('POST','http://kinna.000webhostapp.com/api/v1/companyProjects',[
            'form_params'=> [
                'company_id'=>session('Cdata')->user->company_id,
                 ]
        ]);

        $data= $response->getBody();
        $Cdata= json_decode($data);
        
        //dd($Cdata) ;
        return view('/viewProjects',compact('Cdata'));
        
    }

//view specific project
    public function viewProject(Request $Request)
    {

        $project_id=$Request->input('id');
        //dd($project_id);
        $client = new Client([
            'headers' => ['Accept'=>'application/json','Authorization'=>'Bearer '.session('Cdata')->uid]
        ]);

        $response = $client->request('POST','http://kinna.000webhostapp.com/api/v1/projectTeamMembers',[
            'form_params'=> [
                'project_id'=>$project_id,
                 ]
        ]);

        $data= $response->getBody();
        $Cdata= json_decode($data);
        
        //dd($Cdata);
        return view('/viewProjectOne',compact('Cdata')) ;
    }

//direct to project creation
    public function createProject(Request $Request)
    {   

       $company_id = session('Cdata')->user->company_id;
       $client = new Client([
            'headers' => ['Accept'=>'application/json','Authorization'=>'Bearer '.session('Cdata')->uid]
        ]);

        $response = $client->request('POST','http://kinna.000webhostapp.com/api/v1/availableUsers',[
            'form_params'=> [
                'company_id'=>$company_id,
                 ]
        ]); 

        $data= $response->getBody();
        $Cdata= json_decode($data);
        //dd($Cdata) ;
        return view('/createProjects',compact('Cdata'));
    }

    public function deleteProject(Request $request){
         try{
             $projectId = $request->input ('project_id');
             //dd ($projectId);
             $client = new Client([
                 'headers'=>['Accept'=>'application/json','Authorization'=>'Bearer '.session ('Cdata')->uid]
             ]);

             $response = $client->request ('POST','http://kinna.000webhostapp.com/api/v1/deleteProject',[
                 'form-params'=>[
                     'project_id'=>$projectId
                 ]
             ]);

             $data = $response->getBody ();
             $Cdata = json_decode ($data);
             //dd ($Cdata);
             if($Cdata->error == false){
                 return redirect ('/dashboard');
             }else{
                 dd ($Cdata);
             }
         }catch(ClientException $ce){
             return redirect ('/clientError');
         }catch (ConnectException $c){
             return redirect ('/connectionError');
         }catch (ServerException $se){
             return redirect ('/serverError');
         }
    }

    public function editProjects(){
         try{
             $token = session('Cdata')->uid;
             $company_id = session('Cdata')->user->company_id;
             $client = new Client([
                 'headers' => ['Accept'=>'application/json',
                     'Authorization'=>'Bearer '. $token
                 ]
             ]);

             $response = $client->request('POST','http://kinna.000webhostapp.com/api/v1/companyProjects',[
                 'form_params'=> [
                     'company_id'=>$company_id,
                 ]
             ]);

             $data= $response->getBody();
             $Cdata= json_decode($data);

             //dd($Cdata) ;
             return view('/Projects.editProjects',compact('Cdata'));

        }catch(ClientException $ce){
            return redirect ('/clientError');
        }catch (ConnectException $c){
            return redirect ('/connectionError');
        }catch (ServerException $se){
            return redirect ('/serverError');
        }
    }

    public function saveEditProject(Request $request){
         try{
             $id = $request->input ('project_id');
             $name = $request->input ('name');
             $description = $request->input ('description');
             $token = session ('Cdata')->uid;

             $client = new Client([
                 'headers'=>[
                     'Accept'=>'application/json',
                     'Authorization'=>'Bearer '.$token
                 ]
             ]);

             $response = $client->request ('POST','http://kinna.000webhostapp.com/api/v1/saveEditProject',[
                 'form_params'=>[
                     'id'=>$id,
                     'name'=>$name,
                     'description'=>$description
                 ]
             ]);

             $data = $response->getBody ();
             $Cdata = json_decode ($data);
             if(!$Cdata->error) {
                 return redirect ( '/editProjects' )->with ('status','Project Updated!');
             }

         }catch (ClientException $ce){
             return redirect ('/clientError');
         }catch (ConnectException $e){
             return redirect ('/connectionError');
         }catch (ServerException $se){
             return redirect ('/serverError');
         }
    }

    public function extendDeadline(Request $request){
         try{
             $id = $request->input ('project_id');
             $end_date = $request->input ('extended_date');
             $token = session ('Cdata')->uid;

             $client = new Client([
                 'headers'=>[
                     'Accept'=>'application/json',
                     'Authorization'=>'Bearer '.$token
                 ]
             ]);

             $response = $client->request ('POST','http://kinna.000webhostapp.com/api/v1/extendDeadline',[
                 'form_params'=>[
                     'id'=>$id,
                     'end_date'=>$end_date
                 ]
             ]);

             $data = $response->getBody ();
             $Cdata = json_decode ($data);
             //dd($Cdata);
             if(!$Cdata->error) {
                 return redirect ( '/editProjects' )->with ('status',$Cdata->message);
             }else{
                 return redirect ('/editProjects')->with('error',$Cdata->message);
             }

         }catch (ClientException $ce){
             return redirect ('/clientError');
         }catch (ConnectException $e){
             return redirect ('/connectionError');
         }catch (ServerException $se){
             return redirect ('/serverError');
         }
    }

    public function viewProjectsToDelete(){
        try{
            $token = session('Cdata')->uid;
            $company_id = session('Cdata')->user->company_id;
            $client = new Client([
                'headers' => ['Accept'=>'application/json',
                    'Authorization'=>'Bearer '. $token
                ]
            ]);

            $response = $client->request('POST','http://kinna.000webhostapp.com/api/v1/companyProjects',[
                'form_params'=> [
                    'company_id'=>$company_id,
                ]
            ]);

            $data= $response->getBody();
            $Cdata= json_decode($data);

            //dd($Cdata) ;
            return view('/Projects.deleteProjects',compact('Cdata'));

        }catch(ClientException $ce){
            return redirect ('/clientError');
        }catch (ConnectException $c){
            return redirect ('/connectionError');
        }catch (ServerException $se){
            return redirect ('/serverError');
        }
    }
}
