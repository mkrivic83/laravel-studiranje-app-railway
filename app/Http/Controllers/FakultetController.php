<?php

namespace App\Http\Controllers;
use App\Models\Fakultet;
use Illuminate\Http\Request;

class FakultetController extends Controller
{
    public function index()
    {
        $fakultets = Fakultet::orderBy('naziv')->get();
        return view('fakultets.index', compact('fakultets'));
    }
}
