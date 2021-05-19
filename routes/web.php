<?php

use App\Http\Controllers\About\AboutMe;
use App\Http\Controllers\About\Skill;
use App\Http\Controllers\Service;
use App\Http\Controllers\Counter;
use App\Http\Controllers\Home;
use App\Http\Controllers\MainIntro;
use App\Http\Controllers\Portfolio;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserAuthentication;
use App\Http\Controllers\UserProfile;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostStatusController;
use App\Http\Controllers\blogPageController;
use App\Http\Controllers\WebsiteSetting;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\DB;


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

//single blog page route
Route::get('/blog/{id}/{slug}',[BlogPageController::class,'show']);

Route::view('/blog','frontend.single-blog');
Route::get('/web-admin', [UserAuthentication::class,'loginPage']);
Route::post('/login-post',[UserAuthentication::class,'login']);
// Route::view('/register', 'frontend.register');
// Route::post('/create-user-post',[UserAuthentication::class,'UserReg']);

//User Message
Route::post('/send-message',[MessageController::class,'getMessage']);

//All backend Routes
Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index']);
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
    //adding service 
    Route::view('/add-service','backend.service-section.services.create');
    Route::post('/add-service-post',[Service::class,'store']);
    Route::get('/service-list',[Service::class,'listing']);
    Route::get('/edit-service/{id}',[Service::class,'edit']);
    Route::post('/service-update/{id}',[Service::class,'servicUpdate']);
    Route::get('/delete-service/{id}',[Service::class,'delete']);

    // couter section
    Route::get('/counter-section',[Counter::class,'show']);
    Route::post('/counter-post/{id}',[Counter::class,'update']);

    //add portfolio item 
    Route::view('/add-portfolio','backend.portfolio.create');
    Route::post('/add-portfolio-post',[Portfolio::class,'create']);
    Route::get('/portfolio-list',[Portfolio::class,'listing']);
    Route::get('/delete-portfolio/{id}',[Portfolio::class,'delete']);

    //review routes
    Route::view('/add-review','backend.review.create');
    Route::post('/add-review-post',[ReviewController::class,'create']);
    Route::get('/review-list',[ReviewController::class,'listing']);
    Route::get('/delete-review/{id}',[ReviewController::class,'delete']);
    Route::get('/review-bg-edit',[ReviewController::class,'index']);
    Route::post('/review-bg-update/{id}',[ReviewController::class,'updateBg']);

    //post catagory route
    Route::resource('category', CategoryController::class);

    //blog post routes
    Route::resource('post', PostController::class);
    Route::get('/published/post',[PostStatusController::class,'published']);
    Route::get('/unpublished/post',[PostStatusController::class,'unpublished']);

    //contact section 
    Route::get('/contact-edit',[ContactController::class,'edit']);
    Route::post('/contact-update/{id}',[ContactController::class,'update']);

    //message handling
    Route::get('/message/inbox',[MessageController::class,'inbox']);
    Route::get('/message/show/{id}',[MessageController::class,'show']);
    Route::get('/message/all-message',[MessageController::class,'allMsg']);
    Route::get('/message/unseen-message',[MessageController::class,'UnseenMsg']);
    Route::delete('/message/delete/{id}',[MessageController::class,'delete']);

    //message reply
    Route::post('/message/reply/{id}',[MessageController::class,'reply']);

    //website setting
    Route::get('/website-settings',[WebsiteSetting::class,'show']);
    Route::post('/website-settings/{id}',[WebsiteSetting::class,'update']);
    //password changing
    Route::post('/user/change-password/{id}',[WebsiteSetting::class,'changePass']);

});
