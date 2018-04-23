<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\Facades\Charts;
use GuzzleHttp\Client;
use Carbon\Carbon;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class ChartController extends Controller
{
    public function getAdminData(){
        $user_id = session('Cdata')->user->userid;
        $company_id = session ('Cdata')->user->company_id;
        $token = session ('Cdata')->uid;
        $late = 0;
        $notLate = 0;
        $developer =0;
        $pm =0;
        $notAvailableDevelopers=0;
        $availableDevelopers=0;
        $notAvailablePms=0;
        $availablePms=0;
        $lateCount=0;
        $notLateCount =0;
        $deadlineCount=0;

        try {
            $client = new Client( [
                'headers' => [
                    'Accept' => 'application/json' ,
                    'Authorization' => 'Bearer ' . $token
                ]
            ] );


            $response = $client->request ( 'POST' , 'http://kinna.000webhostapp.com/api/v1/adminChartsData' , [
                'form_params' => [
                    'user_id' => $user_id ,
                    'company_id' => $company_id
                ]
            ] );

            $data = $response->getBody ();
            $Cdata = json_decode ( $data );
            $projects = collect ( $Cdata->projects );
            $user = $Cdata->user;
            //dd ($projects);
            $client1 = new Client([
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer '.$token
                ]
            ]);

            $response1 = $client1->request ('POST','http://kinna.000webhostapp.com/api/v1/companyUsers',[
                'form_params'=>[
                    'company_id'=>$company_id
                ]
            ]);

            $data1 = $response1->getBody ();
            $Cdata1 = json_decode ($data1);
            $companyUsers = collect ($Cdata1);
            //dd($companyUsers);
            $donutChart = Charts::database ( $projects , 'donut' , 'chartjs' )
                ->title ( 'Popular Categories' )
                ->responsive ( false )
                ->width ( 0 )
                ->height ( 300 )
                ->colors ( ['#ff0000' , '#00ff00' , '#0000ff' , '#FF2CE7' , '#1BFF0E' , '#FF9610' , '#08FF84' , '#62DBFF' , '#FF66A2'] )
                ->groupBy ( 'category' );

            $lineChart = Charts::database ( $projects , 'line' , 'chartjs' )
                ->title ( 'Project Trends' )
                ->responsive ( false )
                ->width ( 0 )
                ->height ( 400 )
                ->elementLabel ( "Projects" )
                ->groupByMonth ( '2018' , true );

            foreach ($projects as $project) {
                $endDate = Carbon::parse ( $project->end_date );
                $currentDate = Carbon::now ();

                if ( $endDate->gt ( $currentDate ) ) {
                    $notLate++;
                } else {
                    $late++;
                }
            }

            $lateProjects = collect ( [$late] );
            $notLateProjects = collect ( [$notLate] );
            $lateProjectsChart = Charts::create ( 'donut' , 'chartjs' )
                ->title ( 'Late Projects' )
                ->responsive ( false )
                ->width ( 0 )
                ->height ( 300 )
                ->colors ( ['#ff0000' , '#00ff00'] )
                ->labels ( ['late' , 'not late'] )
                ->values ( [$lateProjects , $notLateProjects] );

            $companyUsersChart = Charts::database($companyUsers , 'area', 'morris')
                ->title('User registered')
                ->responsive(false)
                ->width(0)
                ->height(300)
                ->elementLabel("Users")
                ->groupByMonth('2018',true);
            foreach ($companyUsers as $companyUser){
                $role = $companyUser->role;
                if ($role == "Developer"){
                    $developer++;
                    if ($companyUser->status == true){
                        $notAvailableDevelopers++;
                    }else{
                        $availableDevelopers++;
                    }
                }elseif ($role == "Project Manager"){
                    $pm++;
                    if($companyUser->status == true){
                        $notAvailablePms++;
                    }else{
                        $availablePms++;
                    }
                }
            }
            $employeeTypeChart = Charts::create( 'pie' ,'chartjs')
                ->title('Employee categorisation')
                ->responsive(false)
                ->width(0)
                ->height(300)
                ->labels(['Developers','Project Managers'])
                ->colors(['#99bbff','#ff99ff'])
                ->values([$developer,$pm]);

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
            $sortedEvents = $events->sortByDesc('start_date');
            $topEvents=$sortedEvents->take(3);

            $client3 = new Client( [
                'headers' => [
                    'Accept' => 'application/json' ,
                    'Authorization' => 'Bearer ' . $token
                ]
            ] );


            $response3 = $client3->request ( 'POST' , 'http://kinna.000webhostapp.com/api/v1/userProjects' , [
                'form_params' => [
                    'user_id' => $user_id
                ]
            ] );

            $data3 = $response3->getBody ();
            $Cdata3 = json_decode ($data3);
            $userProjects = collect ($Cdata3);
            //dd ($userProjects);
            $allProjects = $userProjects->count ();
            $progress=[];
            $userProjectStatus = [];
            $lateProjectsArray = [];
            $notLateProjectsArray = [];
            foreach ($userProjects as $userProject){
                $tasks = $userProject->tasks;
                $notCompletedTasks=0;
                $allTasks=0;
                $completedPercentage=0;
                foreach ($tasks as $task){
                    if ($task->status == "not completed"){
                        $notCompletedTasks++;
                    }
                    $allTasks++;
                }
                if ($allTasks!=0) {
                    $completedPercentage = ($allTasks - $notCompletedTasks) * 100 / $allTasks;
                }
                $entry1 =[
                        'name'=>$userProject->name,
                        'percentage'=>$completedPercentage,
                    ];


                $progress[]=$entry1;

                $projectEndDate = Carbon::parse ( $userProject->end_date );
                $currentDate = Carbon::now ();
                $deadlineReached = $projectEndDate->subDays (2);

                if ( $projectEndDate->gt( $currentDate ) ) {
                    $entry2 = [
                        $userProject
                    ];

                    $notLateProjectsArray[] = $entry2;

                    $notLateCount++;
                } else {
                    $entry3 =[
                        $userProject
                    ];

                    $lateProjectsArray[] = $entry3;

                    $lateCount++;
                }

                if( $deadlineReached->eq ($currentDate)){
                    $deadlineCount++;
                }
            }
            //dd ($lateProjectsArray);
            //dd (collect ($progress));
            $userLateProjects = Charts::create('percentage', 'justgage')
                ->title('Late Projects')
                ->elementLabel('Late')
                ->values([$lateCount,0,$allProjects])
                ->responsive(false)
                ->height(300)
                ->width(0);
            //change the algo late projects may ongoing
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

            return view ('/Dashboard',['lineChart'=>$lineChart,
                'donutChart'=>$donutChart,
                'user'=>$user,
                'lateProjectChart'=>$lateProjectsChart,
                'companyUsersChart'=>$companyUsersChart,
                'employeeTypeChart'=>$employeeTypeChart,
                'availableDevelopers'=>$availableDevelopers,
                'notAvailableDevelopers'=>$notAvailableDevelopers,
                'availablePms'=>$availablePms,
                'notAvailablePms'=>$notAvailablePms,
                'events'=>$events,
                'calendar'=>$calendar,
                'topEvents'=>$topEvents,
                'userProjects'=>$userProjects,
                'userLateProjects'=>$userLateProjects,
                'userOngoingProjects'=>$userOngingProjects,
                'deadlineReached'=>$deadlineReachedProjects,
                'projectProgresses'=>collect ($progress),
                'companyUsers'=>$companyUsers,
                'lateProjectsArray'=>$lateProjectsArray,
                'notLateProjectsArray'=>$notLateProjectsArray]);

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
