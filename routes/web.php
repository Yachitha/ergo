<?php
use App\Http\Middleware\SessionCheck;
use App\Http\Middleware\AuthCheck;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/landing', function () {
//     return view('landing');
// });

/*Route::get('/addmember',function(){
	return view('addmember');
});*/
/*Route::get('/getdata','GuzzleController@getRemoteData');
Route::get('editprofile',function(){
	return view('profile');
});
*/
Route::get('/getdata1', function () {
   return view('getdata1');
});

//Route::post('/addmember', 'AdminController@getLoginData');

// routes in saras part 
// Route::get('/viewProjects', function () {
//     return view('viewProjects');
// });

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/forgotPassword', function () {
    return view('forgotPassword');
});

Route::get('/connectionError', function () {
    return view('errors/connectionError');
});

Route::get('/clientError', function () {
    return view('errors/clientError');
});

Route::get('/serverError', function () {
    return view('errors/serverError');
});
// Route::get('/viewmember', function () {
//     return view('viewmember');
// });

// Route::get('/createProjects', function () {
//     return view('createProjects');
// });

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/events', function () {
    return view('events');
});

Route::get('/milestones', function () {
    return view('milestones');
});

Route::get('/tasks', function () {
    return view('tasks');
});

Route::get('/projects', function () {
    return view('projects');
});
// Route::get('/addmember', function () {
//     return view('addmember');
// });

//user routes

Route::get('/dashboard', 'ChartController@getAdminData')->middleware(SessionCheck::class);

Route::get('/addmember','AdminController@loadmember')->middleware(SessionCheck::class);

Route::get('/landing','AdminController@loading');

Route::post('/adminRegister','AdminController@getRegistration');

Route::post('/adminLogin','AdminController@getLoginData');

Route::get('/viewUser','AdminController@viewUserData');

Route::post('/viewsubmitUser','AdminController@viewsubmitUser')->middleware(AuthCheck::class);

Route::get('/viewAllUsers','AdminController@viewAllUsers')->middleware(AuthCheck::class);

Route::get('/logout','LogoutController@logout');


//project route

Route::post('/submitProjects','projectController@getProjectData')->middleware(SessionCheck::class);

Route::get('/createProjects','projectController@createProject')->middleware(SessionCheck::class);
// Route::get('/createProjects', function () {
//     return view('createProjects');
// })->middleware(SessionCheck::class);

Route::get('viewProjects','projectController@viewProjects')->middleware(SessionCheck::class);
// Route::get('/viewProjects',function(){
//     return view('viewProjects');
// });
Route::post('viewProject','projectController@viewProject')->middleware(SessionCheck::class);


// task routes
Route::post('/createTasks','TaskController@createTasks')->middleware(SessionCheck::class);
// Route::get('/createTasks', function () {
//     return view('createTasks');
// });

Route::post('/submitTask','TaskController@getTaskData')->middleware(SessionCheck::class);

Route::post('/viewAllTasks','TaskController@viewAllTasks')->middleware(SessionCheck::class);

Route::get('/viewTasks','TaskController@viewMyTask')->middleware(SessionCheck::class);

// Route::get('/viewTasks',function(){
//     return view('viewTasks');
// });

//event routes

Route::get('/createEvent','EventController@createEvent')->middleware(SessionCheck::class);

Route::post('/submitEvent','EventController@submitEvent')->middleware(SessionCheck::class);

Route::get('/viewEvents', 'EventController@viewEvents')->middleware(SessionCheck::class);

Route::get('/companyProfile','CompanyController@getCompanyData')->middleware(SessionCheck::class);

Route::post ('/deleteProject','projectController@deleteProject')->middleware(SessionCheck::class);

Route::post('/updateProfilePicture','AdminController@updateProfilePicture')->middleware(SessionCheck::class);

Route::post('/updateProfile','AdminController@updateProfile')->middleware(SessionCheck::class);

Route::get('/updateProfile','AdminController@viewUpdateData')->middleware(SessionCheck::class);