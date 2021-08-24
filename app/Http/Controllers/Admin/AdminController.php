<?php

namespace App\Http\Controllers\Admin;

use App\Services\ReportService;
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
