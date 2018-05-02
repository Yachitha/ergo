<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use ConsoleTVs\Charts\Facades\Charts;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class DeveloperDashboardController extends Controller
{

    public function developerData(){
        $user_id = session('Cdata')->user->userid;
        $token = session ('Cdata')->uid;
        $notLateCount =0;
        $lateCount =0;
        $deadlineCount=0;
        try {
            $client = new Client([
                'headers'=> [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer '.$token
                ]
            ]);
            $response = $client->request ('POST','http://kinna.000webhostapp.com/api/v1/userProjects',[
               'form_params'=>[
                   'user_id' =>$user_id
               ]
            ]);
            $responseData = $response->getBody ();
            $data = json_decode ($responseData);
            $userProjects = collect ($data);
            $allProjects = $userProjects->count ();
            $progress = [];
            $lateProjectsArray = [];
            $notLateProjectsArray = [];
            foreach ($userProjects as $userProject){
                $tasks = $userProject->tasks;
                $notCompletedTasks = 0;
                $allTasks=0;
                $completedPercentage=0;
                foreach ($tasks as $task){
                    if ($task->status == "not completed"){
                        $notCompletedTasks++;
                    }
                    $allTasks++;
                }
                if ($allTasks!=0){
                    $completedPercentage = ($allTasks - $notCompletedTasks)*100/$allTasks;
                }
                $entry = [
                    'name'=>$userProject->name,
                    'percentage' =>$completedPercentage,
                ];
                $progress[]=$entry;
                $projectEndDate = Carbon::parse ($userProject->end_date);
                $currentDate = Carbon::now ();
                $deadlineReached = $projectEndDate->subDays (2);
                if ($projectEndDate->gt($currentDate)){
                    $entry1 = [

                    ];

                    $notLateProjectsArray [] =$entry1;

                    $notLateCount++;
                }else{
                    $entry2 = [
                        $userProject
                    ];
                    $lateProjectsArray[]=$entry2;
                    $lateCount++;
                }

                if ($deadlineReached->eq($currentDate)){
                    $deadlineCount++;
                }
            }
            $userLateProjects = Charts::create('percentage', 'justgage')
                ->title('Late Projects')
                ->elementLabel('Late')
                ->values([$lateCount,0,$allProjects])
                ->responsive(false)
                ->height(300)
                ->width(0);
            $userOngingProjects = Charts::create('percentage', 'justgage')
                ->title('Ongoing Projects')
                ->elementLabel('Ongoing')
                ->values([$notLateCount,0,$allProjects])
                ->colors(['#008599','#991c00'])
                ->responsive(false)
                ->height(300)
                ->width(0);

            $deadlineReachedProjects = Charts::create('percentage', 'justgage')
                ->title('Deadline reached')
                ->elementLabel('2 days more')
                ->values([$deadlineCount,0,$allProjects])
                ->colors(['#008599','#991c00'])
                ->responsive(false)
                ->height(300)
                ->width(0);

            return view('Developer.developerDashboard',[
                    'userProjects'=>$userProjects,
                    'userOngoingProjects'=>$userOngingProjects,
                    'deadlineReached'=>$deadlineReachedProjects,
                    'projectProgresses'=>collect ($progress),
                    'lateProjectsArray'=>$lateProjectsArray,
                    'notLateProjectsArray'=>$notLateProjectsArray,
                    'userLateProjects'=>$userLateProjects
                ]);
        }
        catch (ClientException $e){
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
