<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TodoController;
use App\Mail\taskadded;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Route::get('/test', function(){
 
    return 'done';
});


Route::get('/', function () {
    return view('welcome');
});
//Display the register page
Route::get('/register', 'App\Http\Controllers\Auth\registerController@register_show')->name('register_show');
//register users
Route::post('/register_user', 'App\Http\Controllers\Auth\registerController@register_user')->name('register');
//display the login page
Route::get('login', 'App\Http\Controllers\Auth\registerController@login_show')->name('login_show');
//login users
Route::post('/login_user', 'App\Http\Controllers\Auth\loginController@login_user')->name('login');
//Logout Users
Route::post('/logout', 'App\Http\Controllers\Auth\loginController@logout_user')->name('logout');
Route::get('/dashboard', 'App\Http\Controllers\dashboardController@dashboard')->name('dashboard')->middleware('auth');
Route::get('/index', 'App\Http\Controllers\TodoController@index')->name('index');
//show the pages that display all the task(Task List)
Route::get('/Task_list', 'App\Http\Controllers\TodoController@Task_list')->name('Task_list');

Route::get('/Add_task', 'App\Http\Controllers\TodoController@Add_task')->name('Add_task');
// display the list of user todo(the authenticated user)
Route::get('/user_todo', 'App\Http\Controllers\TodoController@User_todo')->name('user_todo');
// create new task item/todo
Route::post('/create_todo', 'App\Http\Controllers\TodoController@create_todo')->name('create_todo');
//user delete Todo
Route::get('/delete_todo/{id}', 'App\Http\Controllers\TodoController@delete_todo')->name('delete_todo');
// show the edit page
Route::get('/edit_show/{id}', 'App\Http\Controllers\TodoController@edit_show')->name('edit_show');

Route::post('/update_todo/{id}', 'App\Http\Controllers\TodoController@update_todo')->name('update_todo');

//Route::post('/edit/{id}', 'App\Http\Controllers\TodoController@edit_todo')->name('edit_todo');
//for the search bar
Route::get('/search', 'App\Http\Controllers\TodoController@search')->name('search');

Route::get('/profile', 'App\Http\Controllers\profileController@profile')->name('profile');

Route::get('/setting', 'App\Http\Controllers\profileController@setting')->name('setting');

Route::get('/manage_task', 'App\Http\Controllers\profileController@manage_task')->name('manage_task');
Route::get('/notifications', [NotificationController::class, 'show_notifications'])
    ->name('show_notifications');

Route::get('/assign-task', [TodoController::class, 'showAssignForm'])->name('assign.task');
Route::post('/assign-task', [TodoController::class, 'assignTodo'])->name('assign.todo');
Route::patch('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])
    ->name('notifications.markAsRead');
Route::patch('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])
    ->name('notifications.markAllAsRead');



Route::PUT('/update_profile', 'App\Http\Controllers\UpdateprofileController@update_profile')->name('update_profile');

