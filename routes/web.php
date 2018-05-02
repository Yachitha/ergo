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
Route::get('/getdata1', function () {
   return view('getdata1');
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
Route::get ('/adminDashboard',function (){
   return view ('admin.adminDashboard');
});
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

Route::get('viewProjects','projectController@viewProjects')->middleware(SessionCheck::class);

Route::post('viewProject','projectController@viewProject')->middleware(SessionCheck::class);


// task routes
Route::post('/createTasks','TaskController@createTasks')->middleware(SessionCheck::class);

Route::post('/submitTask','TaskController@getTaskData')->middleware(SessionCheck::class);

Route::post('/viewAllTasks','TaskController@viewAllTasks')->middleware(SessionCheck::class);

Route::get('/viewTasks','TaskController@viewMyTask')->middleware(SessionCheck::class);

//event routes

Route::get('/createEvent','EventController@createEvent')->middleware(SessionCheck::class);

Route::post('/submitEvent','EventController@submitEvent')->middleware(SessionCheck::class);

Route::get('/viewEvents', 'EventController@viewEvents')->middleware(SessionCheck::class);

Route::get('/companyProfile','CompanyController@getCompanyData')->middleware(SessionCheck::class);

Route::post ('/deleteProject','projectController@deleteProject')->middleware(SessionCheck::class);

Route::post('/updateProfilePicture','AdminController@updateProfilePicture')->middleware(SessionCheck::class);

Route::post('/updateProfile','AdminController@updateProfile')->middleware(SessionCheck::class);

Route::get('/updateProfile','AdminController@viewUpdateData')->middleware(SessionCheck::class);

Route::get('/userProfilePic','UserController@updateUserProfile')->middleware(SessionCheck::class);

Route::get ('/developerDashboard','DeveloperDashboardController@developerData')->middleware(SessionCheck::class);

Route::get ('/pmDashboard','PMDashboardController@getPMData')->middleware(SessionCheck::class);

Route::get ('/ceoDashboard','CEODashboardController@getCEOData')->middleware(SessionCheck::class);