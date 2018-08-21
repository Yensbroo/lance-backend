<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Project;
use App\User;
use App\Bid;

class DashboardController extends Controller
{
    public function __construct() {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth()->user();
        $projectData = DB::table('projects')->select(DB::raw('count(DATE(created_at)) as total_projects, DATE(created_at) as days'))->whereRaw('DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= DATE(created_at)')->groupBy('days')->get();
        $userData = DB::table('users')->select(DB::raw('DATE(created_at) as days, count(DATE(created_at)) as total_users'))->whereRaw('DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= DATE(created_at)')->groupBy('days')->get();
        return view('dashboard.index', compact(['user', 'projectData', 'userData']));
    }


}
