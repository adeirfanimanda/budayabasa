<?php

namespace App\Http\Controllers;

use App\Charts\AnswerQuizChart;
use App\Models\User;
use App\Models\Thread;
use App\Models\Application;
use App\Models\Dictionary;
use App\Models\Material;

class AdminDashboardController extends Controller
{
    public function index(AnswerQuizChart $chart)
    {
        return view('admin.dashboard.index', [
            'app' => Application::all(),
            'title' => 'Dashboard',
            'totalDictionary' => Dictionary::count(),
            'totalMaterial' => Material::count(),
            'totalLakiLaki' => User::where('gender', 'Laki-Laki')->where('is_admin', '!=', 1)->count(),
            'totalPerempuan' => User::where('gender', 'Perempuan')->where('is_admin', '!=', 1)->count(),
            'members' => User::where('is_admin', 0)->latest()->take(4)->select('name', 'image', 'created_at')->get(),
            'totalMember' => User::where('is_admin', false)->count(),
            'threads' => Thread::all()->count(),
            'chart' => $chart->build()
        ]);
    }
}
