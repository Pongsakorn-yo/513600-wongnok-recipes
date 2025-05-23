<?php

use App\Http\Controllers\AttendworkController;
use App\Http\Controllers\FoodmenuController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\Settings\BranchController;
use App\Http\Controllers\Settings\PermissionController;
use App\Http\Controllers\Settings\ProvinceController;
use App\Http\Controllers\Settings\RoleController;
use App\Http\Controllers\Settings\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::post('/menus/{menu}/rate', [MenuController::class, 'rate'])->name('menus.rate');

    Route::get('/', [FoodmenuController::class, 'welcome']);   
    Route::prefix('foodmenu')->group(function () {
        Route::get('/', [FoodmenuController::class, 'index'])->name('foodmenu.index');           // หน้าแสดงรายการ
        Route::get('/create', [FoodmenuController::class, 'create'])->name('foodmenu.create');   // หน้าเพิ่มข้อมูล
        Route::post('/', [FoodmenuController::class, 'store'])->name('foodmenu.store');          // บันทึกข้อมูลใหม่
        Route::get('/{id}', [FoodmenuController::class, 'show'])->name('foodmenu.show');         // ดูรายละเอียดเมนู
        Route::get('/{id}/edit', [FoodmenuController::class, 'edit'])->name('foodmenu.edit');    // หน้าแก้ไขข้อมูล
        Route::put('/{id}', [FoodmenuController::class, 'update'])->name('foodmenu.update');     // อัปเดตข้อมูล
        Route::delete('/{id}', [FoodmenuController::class, 'destroy'])->name('foodmenu.destroy'); // ลบข้อมูล
    });

    Route::prefix('provinces')->group(function () {
        Route::get('/',  [ProvinceController::class, 'index'])->name('get-provinces-index');
        Route::get('/create',  [ProvinceController::class, 'create'])->name('get-provinces-create');
        Route::post('/',  [ProvinceController::class, 'store'])->name('post-provinces-store');
        Route::get('/{id}/edit',  [ProvinceController::class, 'edit'])->name('get-provinces-edit');
        Route::get('/{id}/show',  [ProvinceController::class, 'show'])->name('get-provinces-show');
    });

    Route::prefix('branch')->group(function () {
        Route::get('/',  [BranchController::class, 'index'])->name('get-branch-index');
        Route::get('/create',  [BranchController::class, 'create'])->name('get-branch-create');
        Route::post('/',  [BranchController::class, 'store'])->name('post-branch-store');
        Route::get('/{id}/edit',  [BranchController::class, 'edit'])->name('get-branch-edit');
        Route::get('/{id}/show',  [BranchController::class, 'show'])->name('get-branch-show');
    });

    Route::prefix('user')->group(function () {
        Route::get('/',  [UserController::class, 'index'])->name('get-user-index');
        Route::get('/create',  [UserController::class, 'create'])->name('get-user-create');
        Route::post('/',  [UserController::class, 'store'])->name('post-user-store');
        Route::get('/{id}/edit',  [UserController::class, 'edit'])->name('get-user-edit');
        Route::get('/{id}/show',  [UserController::class, 'show'])->name('get-user-show');
    });

    Route::prefix('role')->group(function () {
        Route::get('/',  [RoleController::class, 'index'])->name('get-role-index');
        Route::get('/create',  [RoleController::class, 'create'])->name('get-role-create');
        Route::post('/',  [RoleController::class, 'store'])->name('post-role-store');
        Route::get('/{role}/edit',  [RoleController::class, 'edit'])->name('get-role-edit');
        Route::patch('/{role}/update',  [RoleController::class, 'update'])->name('patch-role-update');
    });

    Route::prefix('permission')->group(function () {
        Route::get('/',  [PermissionController::class, 'index'])->name('get-permission-index');
        Route::get('/create',  [PermissionController::class, 'create'])->name('get-permission-create');
        Route::post('/',  [PermissionController::class, 'store'])->name('post-permission-store');
        Route::get('/{permission}/edit',  [PermissionController::class, 'edit'])->name('get-permission-edit');
        Route::patch('/{permission}/update',  [PermissionController::class, 'update'])->name('patch-permission-update');
    });
});
require __DIR__ . '/auth.php';

Route::get('/register', function () {
    return view('register');
});
Route::post('/user/store',  [UserController::class, 'store']);