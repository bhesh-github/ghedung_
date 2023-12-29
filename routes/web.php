<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Company
use App\Http\Controllers\CompanyProfileController;
// home
use App\Http\Controllers\SliderController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticlePdfController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\SamitiMemberCardController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ContactController as AdminContactController;
//  
use App\Http\Controllers\SamitiController;
use App\Http\Controllers\SallahakarController;
use App\Http\Controllers\SamitiActivityPdfController;
// 
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\DownloadTypeController;
// 
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GalleryImageController;



// Sub Company 
use App\Http\Controllers\SubCompanyController;
use App\Http\Controllers\SubCompanySectionController;
use App\Http\Controllers\SubCompanySectionContentController;
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
        Route::get('/article-pdf', 'pdfIndex')->name('article-pdf.index');
        Route::get('/article/create', 'create')->name('article.create');
        Route::post('/article/add', 'store')->name('article.store');
        Route::get('/article/edit/{id}', 'edit')->name('article.edit');
        Route::post('/article/update', 'update')->name('article.update');
        Route::post('/article/delete', 'destroy')->name('article.delete');
        Route::get('/article/status/change/{id}', 'changeStatus')->name('article.status');
    });

    // // article pdfs
    // Route::controller(ArticlePdfController::class)->group(function () {
    //     Route::get('/article-pdf', 'index')->name('article-pdf.index');
    //     Route::get('/article-pdf/create', 'create')->name('article-pdf.create');
    //     Route::post('/article-pdf/add', 'store')->name('article-pdf.store');
    //     Route::get('/article-pdf/edit/{id}', 'edit')->name('article-pdf.edit');
    //     Route::post('/article-pdf/update', 'update')->name('article-pdf.update');
    //     Route::get('/article-pdf/status/change/{id}', 'changeStatus')->name('article-pdf.status');
    //     Route::post('/article-pdf/delete', 'destroy')->name('article-pdf.delete');
    // });

    // activities
    Route::controller(ActivityController::class)->group(function () {
        Route::get('/activity', 'index')->name('activity.index');
        Route::get('/activity-pdf', 'pdfIndex')->name('activity-pdf.index');
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

    // samiti
    Route::get('samiti', [SamitiController::class, 'index'])->name('samiti.index');
    Route::post('samiti/add', [SamitiController::class, 'store'])->name('samiti.store');
    Route::post('samiti/update', [SamitiController::class, 'update'])->name('samiti.update');
    Route::post('samiti/delete', [SamitiController::class, 'destroy'])->name('samiti.delete');
    Route::get('samiti/status/change/{id}', [SamitiController::class, 'changeStatus'])->name('samiti.status');

    // samiti member card
    Route::prefix('/samiti')->group(function () {
        Route::controller(SamitiMemberCardController::class)->group(function () {
            Route::get('/member-card/${samiti_slug}', 'index')->name('samiti-member-card.index');
            Route::get('/member-card/create/${samiti_slug}', 'create')->name('samiti-member-card.create');
            Route::post('/member-card/add', 'store')->name('samiti-member-card.store');
            Route::get('/member-card/edit/{id}/${samiti_slug}', 'edit')->name('samiti-member-card.edit');
            Route::post('/member-card/update', 'update')->name('samiti-member-card.update');
            Route::post('/member-card/delete/${id}', 'destroy')->name('samiti-member-card.delete');
            Route::get('/member-card/status/change/{id}', 'changeStatus')->name('samiti-member-card.status');
        });
    });

    // samiti activity
    Route::prefix('/samiti')->group(function () {
        Route::controller(SamitiActivityPdfController::class)->group(function () {
            Route::get('/activity/${samiti_slug}', 'index')->name('samiti.activity.index');
            Route::get('/activity/create/${samiti_slug}', 'create')->name('samiti.activity.create');
            Route::post('/activity/add', 'store')->name('samiti.activity.store');
            Route::get('/activity/edit/{id}/${samiti_slug}', 'edit')->name('samiti.activity.edit');
            Route::post('/activity/update', 'update')->name('samiti.activity.update');
            Route::get('/activity/status/change/{id}', 'changeStatus')->name('samiti.activity.status');
            Route::post('/activity/delete', 'destroy')->name('samiti.activity.delete');
        });
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
        // sections
        Route::controller(SubCompanySectionController::class)->group(function () {
            Route::get('/sections/{company_slug}', 'index')->name('sub-company.sections.index');
            // Route::get('/section/{sec_slug}/{comp_slug}', 'section')->name('sub-company.section');
            Route::post('/section/add', 'store')->name('sub-company.section.store');
            Route::post('/section/update', 'update')->name('sub-company.section.update');
            Route::get('/section/status/change/{id}', 'changeStatus')->name('sub-company.section.status');
            Route::post('/section/delete', 'destroy')->name('sub-company.section.delete');
        });
        // section contents
        Route::controller(SubCompanySectionContentController::class)->group(function () {
            Route::get('/section-contents/{company_slug}/{section_slug}', 'index')->name('sub-company.section-contents.index');
            Route::post('/section-content/add', 'store')->name('sub-company.section-content.store');
            Route::post('/section-content/update', 'update')->name('sub-company.section-content.update');
            Route::get('/section-content/status/change/{id}', 'changeStatus')->name('sub-company.section-content.status');
            Route::post('/section-content/delete', 'destroy')->name('sub-company.section-content.delete');
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


Route::redirect('/register', '/login');

