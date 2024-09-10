<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;



class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('admin.admin_login'); // Adjust the view as necessary
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
    
        $request->session()->regenerate();
    
        // Define redirection based on user role (optional)
        $url = '/admin/home'; // Change this as needed
    
        Log::info('User authenticated. Redirecting to: ' . $url);
    
        return redirect()->to($url); 
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        Log::info('Session invalidated: ', $request->session()->all());
    
        return redirect('/admin/login'); 
    }

    

}