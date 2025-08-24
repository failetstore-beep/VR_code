<?php
use App\Http\Controllers\{LandingController,AuthController,DashboardController,ProductController,EmbedController,WidgetController};

Route::get('/', [LandingController::class,'index']);

Route::get('/login',  [AuthController::class,'showLogin'])->name('login');
Route::post('/login', [AuthController::class,'login']);
Route::get('/signup', [AuthController::class,'showSignup']);
Route::post('/signup', [AuthController::class,'signup']);
Route::post('/logout', [AuthController::class,'logout'])->middleware('auth');

Route::middleware(['auth','setlocale'])->group(function(){
    Route::get('/dashboard', [DashboardController::class,'index']);
    Route::resource('/dashboard/products', ProductController::class);
    Route::resource('/dashboard/embeds',  EmbedController::class)->only(['index','create','store','show','destroy']);
});

Route::middleware('setlocale')->group(function(){
    Route::get('/w/{slug}', [WidgetController::class,'show']);
    Route::get('/embed/{token}', [WidgetController::class,'embed']);
    Route::get('/embed/{token}.js', [WidgetController::class,'embedJs']);
});
