<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function switch(Request $request)
    {
        $theme = $request->input('theme', 'dark'); // Default to 'dark'
        $request->session()->put('theme', $theme);
        return response()->json(['status' => 'success']);
    }
}
