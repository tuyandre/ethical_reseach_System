<?php

use App\Http\Controllers\Admin\AuthenticateController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LangController;
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

//<Languages>

Route::get('lang/home', 'LangController@index');
Route::get('/lang/change', [LangController::class, 'change'])
    ->name('changeLang');
//</Languages>

Route::get('/about_us', [FrontendController::class, 'about_us'])
    ->name('frontend.about_us');

Route::get('/our_partners', [FrontendController::class, 'our_partners'])
    ->name('frontend.our_partners');
Route::get('/consumer_studies', [FrontendController::class, 'consumer_studies'])
    ->name('frontend.consumer_studies');

Route::get('/contact_us', [FrontendController::class, 'contact_us'])
    ->name('frontend.contact_us');

Route::get('/careers', [FrontendController::class, 'careers'])
    ->name('frontend.careers');
Route::get('/faq', [FrontendController::class, 'frontend_faq'])
    ->name('frontend.faq');
Route::get('/our_resources', [FrontendController::class, 'resources'])
    ->name('frontend.resources');
Route::get('/terms_of_use', [FrontendController::class, 'terms_of_use'])
    ->name('frontend.terms_of_use');
Route::get('/privacy_policy', [FrontendController::class, 'privacy_policy'])
    ->name('frontend.privacy_policy');
Route::get('/legal_terms', [FrontendController::class, 'legal_terms'])
    ->name('frontend.legal_terms');






//frontend cosumers routes
Route::get('/Consumer/connect', [FrontendController::class, 'consumer_connect'])
    ->name('frontend.consumer.connect');
Route::get('/Consumer/data_analysis', [FrontendController::class, 'consumer_data_analysis'])
    ->name('frontend.consumer.data_analysis');
Route::get('/Consumer/data_visualization', [FrontendController::class, 'consumer_data_visualization'])
    ->name('frontend.consumer.data_visualization');
Route::get('/Consumer/questionnaire', [FrontendController::class, 'consumer_questionnaire'])
    ->name('frontend.consumer.questionnaire');
Route::get('/Consumer/sampling', [FrontendController::class, 'consumer_sampling'])
    ->name('frontend.consumer.sampling');

//end for frontend consumer routers




Route::get('/ethical/admin/register', [AuthenticateController::class, 'adminRegister'])
    ->name('admin.register');
Route::post('/admin/register', [AuthenticateController::class, 'saveFirstRegister'])
    ->name('admin.store_register');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('/Administration/')->middleware(['auth'])->group(
    function () {

//        Roles routes
        Route::get('/roles', [RoleController::class, 'index'])
            ->name('admin.roles.index');
        Route::get('/get/roles', [RoleController::class, 'getRoles'])
            ->name('admin.roles.getRoles');
        Route::get('/show/roles/{id}', [RoleController::class, 'showRoles'])
            ->name('admin.roles.showRoles');
        Route::delete('/delete/roles/{id}', [RoleController::class, 'deleteRoles'])
            ->name('admin.roles.deleteRoles');
        Route::post('/update/roles', [RoleController::class, 'updateRoles'])
            ->name('admin.roles.updateRoles');
        Route::post('/save/roles', [RoleController::class, 'saveRole'])
            ->name('admin.roles.saveRole');

        Route::get('/roleDetail/{id}', [RoleController::class, 'roleDetail'])
            ->name('admin.roles.roleDetail');

        Route::get('getUser/roleDetail/{id}', [RoleController::class, 'getRoleUser'])
            ->name('admin.roles.role_user');
//        end for roles routes


//        Permission routes
        Route::get('/permissions', [PermissionController::class, 'index'])
            ->name('admin.permissions.index');
        Route::get('/get/permissions', [PermissionController::class, 'getPermission'])
            ->name('admin.permissions.getPermission');
        Route::get('/show/permissions/{id}', [PermissionController::class, 'showPermission'])
            ->name('admin.permissions.showPermission');
        Route::delete('/delete/permissions/{id}', [PermissionController::class, 'deletePermission'])
            ->name('admin.permissions.deletePermission');
        Route::post('/update/permissions', [PermissionController::class, 'updatePermission'])
            ->name('admin.permissions.updatePermission');
        Route::post('/save/permissions', [PermissionController::class, 'savePermission'])
            ->name('admin.permissions.savePermission');

//        end for Permission routes



//        users all routes

        Route::get('/users', [UserController::class, 'index'])
            ->name('admin.users.index');
        Route::get('/get/users', [UserController::class, 'getUserList'])
            ->name('admin.users.getUserList');

//        End for users routes

});



require __DIR__.'/auth.php';


