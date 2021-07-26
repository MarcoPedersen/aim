<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Services\ReportService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        $reportService = new ReportService();
        $dataset = $reportService->getNewUsers();
        return view('admin.dashboard',compact('dataset'));
    }
}
