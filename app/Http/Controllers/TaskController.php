<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Session;

class TaskController extends Controller
{
    public function getTaskData(Request $Request)
    {
        //$token=session('Cdata')->uid;
        //dd(session('Cdata'));
        //$project=$Request->input('project');
        $project_id=$Request->input('project_id');
        $user=$Request->input('user');
        $task_name=$Request->input('name');
        $description=$Request->input('description');
        $start_date=$Request->input('start_date');
        $end_date=$Request->input('end_date');
        $assigned_user_id=session('Cdata')->user->userid;

       	//dd($task_name);


        $client = new Client([
            'headers' => ['Accept'=>'application/json','Authorization'=>'Bearer '.session('Cdata')->uid]
        ]);

        $response = $client->request('POST','http://kinna.000webhostapp.com/api/v1/tasks',[
            'form_params'=> [
                'project_id'=>$project_id,
                'user_id'=> $user,
                'assigned_user_id'=>$assigned_user_id,
                'name'=> $task_name,
                'description'=> $description,
                'start_date'=>$start_date,
                'end_date'=>$end_date, ]
        ]);
        
        $data= $response->getBody();
        $Cdata= json_decode($data);
        dd($Cdata);
        //return view('/dashboard', compact('Cdata') );
        
    } //

    public function createTasks(Request $Request)
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
        return view('/createTasks',compact('Cdata')) ;
    }
    public function viewAllTasks(Request $Request)
    {
        $project_id=$Request->input('id');
        $client = new Client([
            'headers' => ['Accept'=>'application/json','Authorization'=>'Bearer '.session('Cdata')->uid]
        ]);

        $response = $client->request('POST','http://kinna.000webhostapp.com/api/v1/projectTasks',[
            'form_params'=> [
                'project_id'=>$project_id,
                 ]
        ]);

        $data= $response->getBody();
        $Cdata= json_decode($data);
        dd($Cdata);
    }
    public function viewMyTask(Request $Request)
    {
        $user_id= session('Cdata')->user->userid;
        //dd($user_id);
        $client = new Client([
            'headers' => ['Accept'=>'application/json','Authorization'=>'Bearer '.session('Cdata')->uid]
        ]);

        $response = $client->request('POST','http://kinna.000webhostapp.com/api/v1/userTasks',[
            'form_params'=> [
                'user_id'=>$user_id,
                 ]
        ]);
        $data=$response->getBody();
        $Cdata = json_decode($data);
        //dd($Cdata);
        return view('/viewTasks',compact('Cdata'));
    }

}
