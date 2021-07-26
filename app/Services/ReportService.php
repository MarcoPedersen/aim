<?php


namespace App\Services;


use App\Models\User;
use Illuminate\Support\Facades\DB;

class ReportService
{
    public function getNewUsers()
    {
        $users = User::select(DB::raw('COUNT(*) as count'))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw('Month(created_at)'))
            ->pluck('count');
        $months = User::select(DB::raw('Month(created_at) as month'))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw('Month(created_at)'))
            ->pluck('month');

        $dataset = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach ($months as $index => $month)
        {
            $dataset[$month-1]=$users[$index];
        }
        return $dataset;
    }
}
