<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Application\UserLogController;
use App\Http\Controllers\Application\HomeController;
use App\Http\Controllers\Application\AdminController;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {

    Route::get('/', function () {
        // dd(tenant()->toArray());
        // return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
        $users = User::all();
        return view('app.welcome', [
            'users' => $users,
        ]);
    })->name('welcome');
    Route::get('/login', [HomeController::class, 'login'])->name('loginpage');
    Route::get('/register', [HomeController::class, 'register'])->name('registerpage');
    Route::get('/app/dashboard', [HomeController::class, 'dash'])->middleware(['tauth', 'verified'])->name('dash');

    Route::post('/register/request', [HomeController::class, 'registerrequest'])->name('register.tenant');
    Route::post('/login/request', [HomeController::class, 'logvalidate'])->name('login.tenant');
    Route::get('/profile', [HomeController::class, 'profile'])->middleware(['tauth', 'verified'])->name('profile.tenant');
    Route::post('/logout/request', [HomeController::class, 'logoutrequest'])->middleware(['auth', 'verified'])->name('logout.tenant');

    Route::resource('/user', UserLogController::class);

    Route::get('/admin/edit/user/{id}', [AdminController::class, 'index'])->middleware(['tauth', 'verified'])->name('admin.edit.user');
    Route::post('/admin/user/edit', [AdminController::class, 'edit'])->middleware(['tauth', 'verified'])->name('admin.user.edit');
    Route::get('/admin/user/{id}/reset', [AdminController::class, 'reset'])->middleware(['tauth', 'verified'])->name('admin.reset.user');
    Route::get('/admin/user/{id}/delete', [AdminController::class, 'delete'])->middleware(['tauth', 'verified'])->name('admin.delete.user');
    Route::post('/admin/edit/user/roles', [AdminController::class, 'roles'])->name('admin.edit.user.role');










    
});
