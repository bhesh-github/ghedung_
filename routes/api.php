<?php

use App\Http\Controllers\Api\V1\NavController;
use App\Http\Controllers\Api\V1\CompanyProfileController;
use App\Http\Controllers\Api\V1\HomeController;
use App\Http\Controllers\Api\V1\ContactController;
use App\Http\Controllers\Api\V1\TeamController;
use App\Http\Controllers\Api\V1\SallahakarController;
use App\Http\Controllers\Api\V1\DownloadController;
use App\Http\Controllers\Api\V1\GalleryController;
use App\Http\Controllers\Api\V1\VideoController;
use App\Http\Controllers\Api\V1\ArticleController;
use App\Http\Controllers\Api\V1\NewsController;
use App\Http\Controllers\Api\V1\NoticeController;
use App\Http\Controllers\Api\V1\ActivityController;
use App\Http\Controllers\Api\V1\SubCompanyController;
use App\Http\Controllers\Api\V1\SubCompanyTeamController;
use App\Http\Controllers\Api\V1\SubCompanyActivityController;









use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Company Profile
Route::get('/company-profile', [CompanyProfileController::class, 'profile']);

// Navbar
Route::get('/nav/sub-companies', [NavController::class, 'subCompanies']);

// Home
Route::get('/sliders', [HomeController::class, 'slider']);
Route::get('/home/news', [HomeController::class, 'news']);
Route::get('/home/videos', [HomeController::class, 'videos']);
Route::get('/home/notices', [HomeController::class, 'notices']);
Route::get('/home/articles', [HomeController::class, 'articles']);
Route::get('/home/teams', [HomeController::class, 'teams']);

// Contact
Route::post('/contact/store', [ContactController::class, 'contact']);

// News
Route::get('/news/list', [NewsController::class, 'news']);
Route::get('/news/details/{slug}', [NewsController::class, 'details']);

// Noitces
Route::get('/notices/list', [NoticeController::class, 'notices']);
Route::get('/notice/details/{slug}', [NoticeController::class, 'details']);


// Teams
Route::get('/teams', [TeamController::class, 'teams']);

// Advisors
Route::get('/sallahakar', [SallahakarController::class, 'sallahakar']);

// Download
Route::get('/downloads', [DownloadController::class, 'downloads']);

// Gallery
Route::get('/gallery', [GalleryController::class, 'gallery']);
Route::get('/gallery/{slug}', [GalleryController::class, 'galleryImages']);

// Videos
Route::get('/videos', [VideoController::class, 'videos']);

// Articles
Route::get('/articles/list', [ArticleController::class, 'articles']);
Route::get('/article/details/{slug}', [ArticleController::class, 'details']);

// Activities
Route::get('/activities/list', [ActivityController::class, 'activities']);
Route::get('/activity/details/{slug}', [ActivityController::class, 'details']);

// Sub Companies
Route::get('/sub-company/details/{slug}', [SubCompanyController::class, 'details']);

// Sub Companies Teams
Route::get('/sub-company/teams/{slug}', [SubCompanyTeamController::class, 'teams']);

// Sub Companies Activities
Route::get('/sub-company/activities/list/{slug}', [SubCompanyActivityController::class, 'activities']);
Route::get('/sub-company/activity/details/{companySlug}/{activitySlug}', [SubCompanyActivityController::class, 'details']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
