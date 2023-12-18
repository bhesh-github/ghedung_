<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Company
use App\Http\Controllers\SliderController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GalleryImageController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\SallahakarController;
use App\Http\Controllers\ContactController as AdminContactController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\DownloadTypeController;

// Sub Company 
use App\Http\Controllers\SubCompanyController;
use App\Http\Controllers\SubCompanySectionController;
use App\Http\Controllers\SubCompanyTeamController;
use App\Http\Controllers\SubCompanyActivityController;








// 
// use App\Http\Controllers\Frontend\FrontendController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/api/slider', [FrontendController::class, 'getSliders']);
// Route::post('/api/contact/add', [FrontendController::class, 'addContact']);


// admin
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home')->middleware('auth');

// //gallery
Route::get('/admin/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::post('/admin/gallery/add', [GalleryController::class, 'store'])->name('gallery.store');
Route::post('/admin/gallery/update', [GalleryController::class, 'update'])->name('gallery.update');
Route::post('/admin/gallery/delete', [GalleryController::class, 'destroy'])->name('gallery.delete');
Route::get('/admin/gallery/status/change/{id}', [GalleryController::class, 'changeStatus'])->name('gallery.status');

Route::get('/admin/gallery/{slug}', [GalleryImageController::class, 'index'])->name('gallery-images.index');
Route::post('/admin/gallery/store', [GalleryImageController::class, 'store'])->name('gallery-images.store');
Route::delete('/admin/gallery/destroy/{id}', [GalleryImageController::class, 'destroy'])->name('gallery-images.destroy');
Route::get('/admin/gallery/images/status/{id}', [GalleryImageController::class, 'status'])->name('gallery-images.status');

Route::prefix('admin')->group(function () {
    // company profile
    Route::controller(CompanyProfileController::class)->group(function () {
        Route::get('/company-profile', 'index')->name('admin.company.profile');
        Route::post('/company-profile/add', 'store')->name('company.profile.add');
        Route::post('/company-profile/edit', 'update')->name('company.profile.update');
    });

    //slider
    Route::controller(SliderController::class)->group(function () {
        Route::get('/slider/add', 'index')->name('admin.slider');
        Route::post('/slider/add', 'store')->name('slider.add');
        Route::get('/slider/show', 'show')->name('slider.show');
        Route::get('/slider/edit/{id}', 'edit')->name('slider.edit');
        Route::post('/slider/update', 'update')->name('slider.update');
        Route::post('/slider/delete', 'destroy')->name('slider.delete');
        Route::get('/slider/status/change/{id}', 'changeStatus')->name('slider.status');
    });

    //news
    Route::controller(NewsController::class)->group(function () {
        Route::get('/news', 'index')->name('news.index');
        Route::get('/news/create', 'create')->name('news.create');
        Route::post('/news/add', 'store')->name('news.store');
        Route::get('/news/edit/{id}', 'edit')->name('news.edit');
        Route::post('/news/update', 'update')->name('news.update');
        Route::post('/news/delete', 'destroy')->name('news.delete');
        Route::get('/news/status/change/{id}', 'changeStatus')->name('news.status');
    });

    //gallery
    // Route::controller(GalleryImageController::class)->group(function () {
    //     Route::get('/gallery', 'index')->name('gallery.index');
    //     Route::post('/gallery/add', 'store')->name('gallery.store');
    //     Route::post('/gallery/update', 'update')->name('gallery.update');
    //     Route::post('/gallery/delete', 'destroy')->name('gallery.delete');
    //     Route::get('/gallery/status/change/{id}', 'changeStatus')->name('gallery.status');

    //     Route::get('/gallery/{slug}', 'index')->name('gallery-images.index');
    //     Route::post('/gallery/store', 'store')->name('gallery-images.store');
    //     Route::delete('/gallery/destroy/{id}', 'destroy')->name('gallery-images.destroy');
    //     Route::get('/gallery/images/status/{id}', 'status')->name('gallery-images.status');
    // });

    //videos
    Route::controller(VideoController::class)->group(function () {
        Route::get('/video', 'index')->name('video.index');
        Route::get('/video/create', 'create')->name('video.create');
        Route::post('/video/add', 'store')->name('video.store');
        Route::get('/video/edit/{id}', 'edit')->name('video.edit');
        Route::post('/video/update', 'update')->name('video.update');
        Route::post('/video/delete', 'destroy')->name('video.delete');
        Route::get('/video/show-in-home/change/{id}', 'changeShowInHome')->name('video.show-in-home');
        Route::get('/video/status/change/{id}', 'changeStatus')->name('video.status');
    });

    // notices
    Route::controller(NoticeController::class)->group(function () {
        Route::get('/notice', 'index')->name('notice.index');
        Route::get('/notice/create', 'create')->name('notice.create');
        Route::post('/notice/add', 'store')->name('notice.store');
        Route::get('/notice/edit/{id}', 'edit')->name('notice.edit');
        Route::post('/notice/update', 'update')->name('notice.update');
        Route::post('/notice/delete', 'destroy')->name('notice.delete');
        Route::get('/notice/status/change/{id}', 'changeStatus')->name('notice.status');
    });

    // articles
    Route::controller(ArticleController::class)->group(function () {
        Route::get('/article', 'index')->name('article.index');
        Route::get('/article/create', 'create')->name('article.create');
        Route::post('/article/add', 'store')->name('article.store');
        Route::get('/article/edit/{id}', 'edit')->name('article.edit');
        Route::post('/article/update', 'update')->name('article.update');
        Route::post('/article/delete', 'destroy')->name('article.delete');
        Route::get('/article/status/change/{id}', 'changeStatus')->name('article.status');
    });

    // activities
    Route::controller(ActivityController::class)->group(function () {
        Route::get('/activity', 'index')->name('activity.index');
        Route::get('/activity/create', 'create')->name('activity.create');
        Route::post('/activity/add', 'store')->name('activity.store');
        Route::get('/activity/edit/{id}', 'edit')->name('activity.edit');
        Route::post('/activity/update', 'update')->name('activity.update');
        Route::post('/activity/delete', 'destroy')->name('activity.delete');
        Route::get('/activity/status/change/{id}', 'changeStatus')->name('activity.status');
    });

    // our team
    Route::controller(TeamController::class)->group(function () {
        Route::get('/team', 'index')->name('team.index');
        Route::get('/team/create', 'create')->name('team.create');
        Route::post('/team/add', 'store')->name('team.store');
        Route::get('/team/edit/{id}', 'edit')->name('team.edit');
        Route::post('/team/update', 'update')->name('team.update');
        Route::post('/team/delete/${id}', 'destroy')->name('team.delete');
        Route::get('/team/status/change/{id}', 'changeStatus')->name('team.status');
    });

    // sallahakar
    Route::controller(SallahakarController::class)->group(function () {
        Route::get('/sallahakar', 'index')->name('sallahakar.index');
        Route::get('/sallahakar/create', 'create')->name('sallahakar.create');
        Route::post('/sallahakar/add', 'store')->name('sallahakar.store');
        Route::get('/sallahakar/edit/{id}', 'edit')->name('sallahakar.edit');
        Route::post('/sallahakar/update', 'update')->name('sallahakar.update');
        Route::post('/sallahakar/delete/${id}', 'destroy')->name('sallahakar.delete');
        Route::get('/sallahakar/status/change/{id}', 'changeStatus')->name('sallahakar.status');
    });

    // contact
    Route::controller(AdminContactController::class)->group(function () {
        Route::get('/contact', 'index')->name('admin.contact');
        Route::post('/contact/delete', 'destroy')->name('contact.delete');
    });

    // Download Type
    Route::get('/download-types', [DownloadTypeController::class, 'index'])->name('download.type.index')->middleware('auth');
    Route::post('/download-type/add', [DownloadTypeController::class, 'store'])->name('download.type.store')->middleware('auth');
    Route::post('/download-type/update', [DownloadTypeController::class, 'update'])->name('download.type.update')->middleware('auth');
    Route::post('/download-type/delete', [DownloadTypeController::class, 'destroy'])->name('download.type.delete')->middleware('auth');
    Route::get('/download-type/status/change/{id}', [DownloadTypeController::class, 'changeStatus'])->name('download.type.status')->middleware('auth');


    // Download
    Route::get('download', [DownloadController::class, 'index'])->name('downloads.index');
    Route::post('downloads/add', [DownloadController::class, 'store'])->name('downloads.store');
    Route::post('downloads/update', [DownloadController::class, 'update'])->name('downloads.update');
    Route::post('downloads/delete', [DownloadController::class, 'destroy'])->name('downloads.delete');
    Route::get('downloads/status/change/{id}', [DownloadController::class, 'changeStatus'])->name('downloads.status');

    // Sub Company
    Route::controller(SubCompanyController::class)->group(function () {
        Route::get('/sub-company', 'index')->name('sub-company.index');
        Route::get('/sub-company/create', 'create')->name('sub-company.create');
        Route::post('/sub-company/add', 'store')->name('sub-company.store');
        Route::get('/sub-company/edit/{id}', 'edit')->name('sub-company.edit');
        Route::post('/sub-company/update', 'update')->name('sub-company.update');
        Route::post('/sub-company/delete', 'destroy')->name('sub-company.delete');
        Route::get('/sub-company/status/change/{id}', 'changeStatus')->name('sub-company.status');
        // profile
        Route::get('/sub-company/profile/{slug}', 'profile')->name('sub-company.profile');
        // Route::get('/sub-company/status/change/{id}', 'changeStatus')->name('sub-company.status');
    });

    // ----------------------------------------------------------------------------------------------------- 
    // Sub Company Sections
    Route::prefix('/sub-company')->group(function () {
        Route::controller(SubCompanySectionController::class)->group(function () {
            Route::get('/sections/{slug}', 'index')->name('sub-company.sections.index');
            Route::get('/section/{sec_slug}/{comp_slug}', 'section')->name('sub-company.section');
            // Route::get('/create', 'create')->name('sub-company.create');
            // Route::post('/add', 'store')->name('sub-company.store');
            // Route::get('/edit/{id}', 'edit')->name('sub-company.edit');
            // Route::post('/update', 'update')->name('sub-company.update');
            // Route::post('/delete', 'destroy')->name('sub-company.delete');
            // Route::get('/status/change/{id}', 'changeStatus')->name('sub-company.status');
            // // profile
            // Route::get('/profile/{slug}', 'profile')->name('sub-company.profile');
            // Route::get('/sections/{slug}', 'sections')->name('sub-company.sections');
            // Route::get('/sub-company/status/change/{id}', 'changeStatus')->name('sub-company.status');
        });
    });

    // Sub Company Team
    Route::prefix('/sub-company')->group(function () {
        Route::controller(SubCompanyTeamController::class)->group(function () {
            // Route::get('/team', 'index')->name('team.index');
            Route::get('/team/create/${sec_slug}/${comp_slug}', 'create')->name('sub-company.team.create');
            Route::post('/team/add', 'store')->name('sub-company.team.store');
            Route::get('/team/edit/{id}/${comp_slug}/${sec_slug}', 'edit')->name('sub-company.team.edit');
            Route::post('/team/update', 'update')->name('sub-company.team.update');
            Route::post('/team/delete/${id}', 'destroy')->name('sub-company.team.delete');
            Route::get('/team/status/change/{id}', 'changeStatus')->name('sub-company.team.status');
            // 
        });
    });

    // Sub Company Activity
    Route::prefix('/sub-company')->group(function () {
        Route::controller(SubCompanyActivityController::class)->group(function () {
            // Route::get('/activity', 'index')->name('activity.index');
            Route::get('/activity/create/${sec_slug}/${comp_slug}', 'create')->name('sub-company.activity.create');

            // 
            Route::post('/activity/add', 'store')->name('sub-company.activity.store');
            Route::get('/activity/edit/{id}/${comp_slug}/${sec_slug}', 'edit')->name('sub-company.activity.edit');
            Route::post('/activity/update', 'update')->name('sub-company.activity.update');
            Route::post('/activity/delete', 'destroy')->name('sub-company.activity.delete');
            Route::get('/activity/status/change/{id}', 'changeStatus')->name('sub-company.activity.status');
            // 
        });
    });

    // Route::get('/team/create', 'create')->name('team.create');
    // Route::post('/team/add', 'store')->name('team.store');
    // Route::get('/team/edit/{id}', 'edit')->name('team.edit');
    // Route::post('/team/update', 'update')->name('team.update');
    // Route::post('/team/delete/${id}', 'destroy')->name('team.delete');
    // Route::get('/team/status/change/{id}', 'changeStatus')->name('team.status');

});

Auth::routes();

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('{path1}/{path2?}/{path3?}/{path4?}/{path5?}/{path6?}', function () {
    return view('index');
});


// Route::redirect('/register', '/login');

