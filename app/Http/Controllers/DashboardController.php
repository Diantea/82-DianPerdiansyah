<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index() {
        $informations = Information::orderBy('date', 'desc')->get();
        return view('dashboard', compact('informations'));
    }

    public function pending() {
        return view('pending.pending');
    }
}
