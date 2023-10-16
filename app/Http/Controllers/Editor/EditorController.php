<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;

class EditorController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('users.editor.dashboard');
    }
}
