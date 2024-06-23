<?php

use Illuminate\Support\Facades\Route;
use App\Models\Application;
use App\Models\Dictionary;
use App\Models\Material;
use App\Models\User;
use App\Http\Controllers\{
    QuizController,
    LoginController,
    RegisterController,
    NilaiQuizController,
    PengaturanUsersController,
    AdminDataQuizController,
    AdminDashboardController,
    AdminPengaturanController,
    AdminPenggunaController,
    AdminLaporanController,
    DictionaryController,
    DiscussController,
    ForgotPasswordController,
    GoogleAuthController,
    MaterialController
};

// Homepage
Route::get('/', function () {
    $app = Application::first();
    return view('home', [
        'users' => User::where('is_admin', 0)->count(),
        'dictionaries' => Dictionary::count(),
        'materials' => Material::count(),
        'app' => $app,
        'title' => $app->name_app . ' - ' . $app->description_app
    ]);
});

// Kamus
Route::get('/kamus', [DictionaryController::class, 'index_users']);
Route::get('/kamus/search', [DictionaryController::class, 'search_redis']);

// Authentication
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/forgot-password', [ForgotPasswordController::class, 'forgotpassword'])->name('forgot-password');
    Route::get('/reset-password', [ForgotPasswordController::class, 'resetpassword'])->name('reset-password');
});
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/logout', fn () => redirect('/'));

// login with google
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);

// Documentation App
Route::prefix('docs/v1')->group(function () {
    Route::get('/', function () {
        return view('dokumentasi.index', [
            'app' => Application::first(),
            'title' => 'Dokumentasi'
        ]);
    });
    Route::get('/start', function () {
        return view('dokumentasi.start', [
            'app' => Application::first(),
            'title' => 'Dokumentasi'
        ]);
    });
});

// Member
Route::middleware('member')->group(function () {
    Route::get('/materi', [MaterialController::class, 'show'])->name('materi');
    Route::get('/materi/search', [MaterialController::class, 'search_users']);
    Route::get('/quiz', [QuizController::class, 'index']);
    Route::post('/quiz', [QuizController::class, 'store']);
    Route::get('/quiz/start/{quiz:slug}', [QuizController::class, 'show']);
    Route::get('/nilai/search', [NilaiQuizController::class, 'search']);
    Route::get('/nilai', [NilaiQuizController::class, 'index']);
    Route::get('/nilai/details/{nilai:code}', [NilaiQuizController::class, 'show']);
    Route::post('/nilai/delete/{result:code}', [NilaiQuizController::class, 'destroy']);
    Route::prefix('pengaturan')->group(function () {
        Route::get('/', [PengaturanUsersController::class, 'index']);
        Route::post('/', [PengaturanUsersController::class, 'store']);
        Route::post('/verify', [PengaturanUsersController::class, 'verify']);
        Route::post('/setemail', [PengaturanUsersController::class, 'setemail']);
        Route::get('/setemail', fn () => back());
        Route::get('/verify', fn () => back());
        Route::post('/changepassword', [PengaturanUsersController::class, 'changepassword']);
        Route::get('/changepassword', fn () => back());
    });
});

// Admin
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index']);
    Route::prefix('data-kamus')->group(function () {
        Route::get('/', [DictionaryController::class, 'index']);
        Route::post('/', [DictionaryController::class, 'store']);
        Route::post('/update', [DictionaryController::class, 'update']);
        Route::get('/update', fn () => back());
        Route::post('/delete', [DictionaryController::class, 'destroy']);
        Route::get('/delete', fn () => back());
        Route::get('/search', [DictionaryController::class, 'search']);
    });
    Route::prefix('data-materi')->group(function () {
        Route::get('/', [MaterialController::class, 'index']);
        Route::post('/', [MaterialController::class, 'store']);
        Route::post('/update', [MaterialController::class, 'update']);
        Route::get('/update', fn () => back());
        Route::post('/delete', [MaterialController::class, 'destroy']);
        Route::get('/delete', fn () => back());
        Route::get('/search', [MaterialController::class, 'search']);
    });
    Route::prefix('data-quiz')->group(function () {
        Route::get('/', [AdminDataQuizController::class, 'index']);
        Route::get('/search', [AdminDataQuizController::class, 'search']);
        Route::post('/', [AdminDataQuizController::class, 'store']);
        Route::post('/update', [AdminDataQuizController::class, 'update']);
        Route::post('/delete/{quiz:slug}', [AdminDataQuizController::class, 'destroy']);
        Route::get('/delete/{quiz:slug}', fn () => back());
        Route::get('/update', fn () => back());
    });
    Route::prefix('pengaturan')->group(function () {
        Route::get('/', [AdminPengaturanController::class, 'index']);
        Route::post('/', [AdminPengaturanController::class, 'store']);
        Route::post('/verify', [AdminPengaturanController::class, 'verify']);
        Route::post('/setemail', [AdminPengaturanController::class, 'setemail']);
        Route::get('/setemail', fn () => back());
        Route::get('/verify', fn () => back());
        Route::post('/changepassword', [AdminPengaturanController::class, 'changepassword']);
        Route::get('/changepassword', fn () => back());
        Route::post('/app', [AdminPengaturanController::class, 'updateapp']);
        Route::get('/app', fn () => back());
    });
    Route::prefix('pengguna')->group(function () {
        Route::get('/', [AdminPenggunaController::class, 'index']);
        Route::post('/', [AdminPenggunaController::class, 'store']);
        Route::post('/edit', [AdminPenggunaController::class, 'update']);
        Route::get('/edit', fn () => back());
        Route::post('/getuser', [AdminPenggunaController::class, 'getuser']);
        Route::get('/getuser', fn () => back());
        Route::post('/delete/{user:id}', [AdminPenggunaController::class, 'destroy']);
        Route::get('/delete/{user:id}', fn () => back());
        Route::get('/search', [AdminPenggunaController::class, 'search']);
    });
    Route::prefix('laporan')->group(function () {
        Route::get('/', [AdminLaporanController::class, 'index']);
        Route::get('/{quiz:slug}', [AdminLaporanController::class, 'show']);
        Route::get('/details/{nilai:code}', [AdminLaporanController::class, 'details']);
        Route::get('/{quiz:slug}/search', [AdminLaporanController::class, 'searchAccess']);
    });
});

// admin quiz > q&a
Route::get('/admin/data-quiz/q&a/{quiz:slug}', [AdminDataQuizController::class, 'show'])->middleware('admin');
Route::post('/admin/data-quiz/q&a/{quiz:slug}', [AdminDataQuizController::class, 'addquestion'])->middleware('admin');
Route::post('/admin/data-quiz/q&a/delete/{question:id}', [AdminDataQuizController::class, 'destroyquestion'])->middleware('admin');
Route::post('/admin/data-quiz/getanswer', [AdminDataQuizController::class, 'getanswer'])->middleware('admin');
Route::get('/admin/data-quiz/q&a/delete/{question:id}', function () {
    return back();
})->middleware('admin');
Route::post('/admin/data-quiz/q&a/update/question', [AdminDataQuizController::class, 'updatequestion'])->middleware('admin');
Route::get('/admin/data-quiz/q&a/update/question', function () {
    return back();
})->middleware('admin');
Route::get('/admin/data-quiz/q&a/{quiz:slug}/search', [AdminDataQuizController::class, 'searchquestion'])->middleware('admin');

// Access Admin & Member
// Discuss Thread
Route::middleware('auth')->prefix('view/discuss')->group(function () {
    Route::get('/', [DiscussController::class, 'index']);
    Route::post('/', [DiscussController::class, 'store']);
    Route::post('/thread/delete', [DiscussController::class, 'deleteThread']);
    Route::get('/thread/delete', fn () => back());
    Route::get('/search', [DiscussController::class, 'search']);
    Route::post('/like', [DiscussController::class, 'like']);
    Route::get('/like', fn () => back());
    Route::get('/thread/{thread}', [DiscussController::class, 'details']);
    Route::post('/thread/{thread}', [DiscussController::class, 'comment']);
    Route::post('/comment/delete/{comment}', [DiscussController::class, 'destroy']);
    Route::get('/comment/delete/{comment}', fn () => back());
});
