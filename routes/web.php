<?php

use App\Http\Controllers\Admin\AuthenticateController;
use App\Http\Controllers\Admin\DeviceController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectFileController;
use App\Http\Controllers\Admin\ProjectInvoiceController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SurveyController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\SocialController;
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


Route::get('login/{provider}', [SocialController::class, 'redirect'])->name('auth.social.redirect');
Route::get('login/{provider}/callback',[SocialController::class, 'Callback'])->name('auth.social.callback');



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
        Route::post('roles/attachPermission', [RoleController::class, 'attach_permission'])
            ->name('admin.roles.attach_permission');

        Route::get('roles/getPermission/{id}', [RoleController::class, 'getRolePermission'])
            ->name('admin.roles.getRolePermission');
        Route::post('roles/remove_permission', [RoleController::class, 'remove_permission'])
            ->name('admin.roles.remove_permission');
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

        Route::get('/users/userDetail/{id}', [UserController::class, 'userDetail'])
            ->name('admin.users.userDetail');
        Route::get('users/getPermission/{id}', [UserController::class, 'getUserPermission'])
            ->name('admin.users.getUserPermission');
        Route::post('users/attachPermission', [UserController::class, 'attach_permission'])
            ->name('admin.users.attach_permission');
        Route::post('users/remove_permission', [UserController::class, 'remove_permission'])
            ->name('admin.users.remove_permission');

        Route::post('users/controlRole', [UserController::class, 'controlRole'])
            ->name('admin.users.controlRole');


        Route::get('/users/user_without_role', [UserController::class, 'un_role'])
            ->name('admin.users.un_role');
        Route::get('/get/getUnRoleUser', [UserController::class, 'getUnRoleUser'])
            ->name('admin.users.getUnRoleUser');


        Route::post('users/save_user', [UserController::class, 'save_user'])
            ->name('admin.users.save_user');

        Route::put('/users/deactivate/{id}', [UserController::class, 'deactivate_user'])
            ->name('admin.users.deactivate_user');
        Route::put('/users/activate/{id}', [UserController::class, 'activate_user'])
            ->name('admin.users.activate_user');
//        End for users routes



        Route::get('/members', [UserController::class, 'members'])
            ->name('admin.members.index');
        Route::get('/get/members', [UserController::class, 'getMemberList'])
            ->name('admin.members.getMemberList');



        Route::post('/users/file-import', [UserController::class, 'fileImport'])->name('admin.users.file-import');
        Route::get('/users/file-export', [UserController::class, 'fileExport'])->name('admin.users.file-export');



//devices routes


        Route::get('/devices', [DeviceController::class, 'index'])
            ->name('admin.devices.index');
        Route::get('/get/devices', [DeviceController::class, 'getDeviceList'])
            ->name('admin.devices.getMemberList');

        Route::post('devices/saveDevices', [DeviceController::class,'saveDevices'])->name('admin.devices.saveDevices');
        Route::post('devices/updateDevices',[DeviceController::class,'updateDevices'])->name('admin.devices.updateDevices');
        Route::get('/devices/admin/show/{id}',[DeviceController::class,'showDevice'])->name('admin.devices.showDevice');

        Route::delete('/devices/admin/delete/{id}',[DeviceController::class,'destroyDevice'])->name('admin.devices.destroyDevice');

        Route::get('devices/available_device',[DeviceController::class,'availableDevice'])->name('admin.devices.available_device');
        Route::get('devices/getAvailableDevices',[DeviceController::class,'getAvailableDevices'])->name('admin.devices.getAvailableDevices');
        Route::get('devices/unavailable_device',[DeviceController::class,'unavailableDevice'])->name('admin.devices.unavailable_device');
        Route::get('devices/getUnavailableDevices',[DeviceController::class,'getUnavailableDevices'])->name('admin.devices.getUnavailableDevices');
        Route::get('devices/historical',[DeviceController::class,'historical'])->name('admin.devices.historical');
        Route::get('devices/getHistorical',[DeviceController::class,'getHistorical'])->name('admin.devices.getHistorical');

        Route::post('devices/assignDevices',[DeviceController::class,'assignDevices'])->name('admin.devices.assignDevices');
        Route::post('devices/releaseDevices/{id}',[DeviceController::class,'releaseDevice'])->name('admin.devices.releaseDevice');
        Route::get('/devices/detail/{id}',[DeviceController::class,'deviceDetail'])->name('admin.devices.deviceDetail');
        Route::post('devices/destroyDevices/{id}',[DeviceController::class,'destroyDevice'])->name('admin.devices.destroyDevice');



        Route::post('/devices/file-import', [DeviceController::class, 'fileImport'])->name('admin.devices.file-import');
        Route::get('/devices/file-export', [DeviceController::class, 'fileExport'])->name('admin.devices.file-export');


//        end devices routes

//        start for project routes

        Route::get('/projects', [ProjectController::class, 'index'])->name('admin.projects.index');
        Route::get('/get/projects', [ProjectController::class, 'getProjectList'])->name('admin.projects.getProjectList');

        Route::post('projects/saveProject', [ProjectController::class,'saveProject'])->name('admin.projects.saveProject');
        Route::post('projects/updateProjects',[ProjectController::class,'updateProject'])->name('admin.projects.updateDevices');
        Route::get('/projects/admin/show/{id}',[ProjectController::class,'showProject'])->name('admin.projects.showDevice');


//            The end for projects routes


        Route::get('/project_files', [ProjectFileController::class, 'index'])->name('admin.files.index');
        Route::get('/get/project_files', [ProjectFileController::class, 'getFileList'])->name('admin.files.getFileList');




        Route::get('/projects/invoices', [ProjectInvoiceController::class, 'index'])->name('admin.invoices.index');
        Route::get('/get/project_invoices', [ProjectInvoiceController::class, 'getInvoiceList'])->name('admin.invoices.getInvoiceList');




        Route::get('/surveys', [SurveyController::class, 'index'])->name('admin.surveys.index');
        Route::get('/get/surveys', [SurveyController::class, 'getSurveyList'])->name('admin.surveys.getSurveyList');
        Route::get('/surveys/detail/{slug}',[SurveyController::class,'surveyDetail'])->name('admin.surveys.surveyDetail');
        Route::get('/assign/surveys_assign', [SurveyController::class, 'assignSurvey'])->name('admin.surveys.assignSurvey');
        Route::get('/get/surveys_member', [SurveyController::class, 'getMemberSurvey'])->name('admin.surveys.getMemberSurvey');
        Route::post('/store/surveys', [SurveyController::class, 'sendSurvey'])->name('admin.surveys.sendSurvey');



    });



require __DIR__.'/auth.php';


