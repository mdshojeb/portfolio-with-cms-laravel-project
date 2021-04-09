<?php

use App\Http\Controllers\About\AboutMe;
use App\Http\Controllers\About\Skill;
use App\Http\Controllers\Service;
use App\Http\Controllers\Home;
use App\Http\Controllers\MainIntro;
use App\Http\Controllers\UserAuthentication;
use App\Http\Controllers\UserProfile;
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

Route::get('/',[Home::class,'homepage']);

Route::view('/blog','frontend.single-blog');
Route::view('/web-admin', 'frontend.login');
Route::post('/login-post',[UserAuthentication::class,'login']);
Route::view('/register', 'frontend.register');
Route::post('/create-user-post',[UserAuthentication::class,'UserReg']);

//All backend Routes
Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard',function(){
        return view('backend.dashboard');
    });
    Route::get('/logout',[UserAuthentication::class,'logout']);
    Route::get('/myaccount',[UserProfile::class,'myaccount']);
    Route::post('/user-update/{id}',[UserProfile::class,'userupdate']);

    //Main intro page CRUD
    Route::get('/main-intro-edit',[MainIntro::class,'intropage']);
    Route::post('/main-intro-post/{id}',[MainIntro::class,'update']);
    // About me
    Route::get('/about-me',[AboutMe::class,'show']);
    Route::post('/about-me-post/{id}',[AboutMe::class,'update']);
    Route::get('/add-skill',[Skill::class,'show']);
    Route::post('/add-skill-post',[Skill::class,'insert']);
    Route::get('/skill-delete/{id}',[Skill::class,'delete']);

    //service section CRUD
    Route::get('/service-section',[Service::class,'show']);
    Route::post('/section-detail-post/{id}',[Service::class,'update']);

    Route::view('/add-service','backend.service-section.services.create');
});


