<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\Models\User;

class LogsController extends Controller
{
    public function index(Request $request)
    {
        $description = $request->input('description', '');
        $username = $request->input('username', ''); 
        $dateFrom = $request->input('date_from', '');
        $dateTo = $request->input('date_to', '');

        $query = Activity::query();

        if ($description) {
            $query->where('description', 'like', "%$description%");
        }

        if ($username) {
            $user = User::where('firstname', $username)->first();
            if ($user) {
                $query->where('causer_id', $user->id);
            } else {
                $query->whereNull('causer_id');
            }
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