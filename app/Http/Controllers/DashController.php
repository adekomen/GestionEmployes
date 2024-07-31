<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employer;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function index()
    {
        $totalDepartment = Department::all()->count();
        $totalEmploye = Employer::all()->count();
        return view('dash.accueil', compact('totalDepartment', 'totalEmploye'));
    }
}
