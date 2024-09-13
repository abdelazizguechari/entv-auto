<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class LogsController extends Controller
{
    public function index(Request $request)
    {

        $description = $request->input('description', '');
        $userId = $request->input('user_id', '');
        $dateFrom = $request->input('date_from', '');
        $dateTo = $request->input('date_to', '');

        $query = Activity::query();

        if ($description) {
            $query->where('description', 'like', "%$description%");
        }

        if ($userId) {
            $query->where('causer_id', $userId);
        }

        if ($dateFrom) {
            $query->whereDate('created_at', '>=', $dateFrom);
        }

        if ($dateTo) {
            $query->whereDate('created_at', '<=', $dateTo);
        }

        $logs = $query->latest()->get();

        return view('admin.webapp.logs', compact('logs'));
    }
}
