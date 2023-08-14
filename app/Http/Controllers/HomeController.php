<?php

namespace App\Http\Controllers;

use App\Models\Kampanye;
use App\Models\Koordinat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $koordinat = Koordinat::first();
        $kampanyes = Kampanye::with(['donasis' => function ($query) {
            $query->where('status', 'success');
        }])
            ->take(3)
            ->get();

        return view('welcome', compact('kampanyes', 'koordinat'));
    }

    public function show(Kampanye $kampanye)
    {
        return view('show', compact('kampanye'));
    }

    public function kampanye()
    {
        $kampanyes = Kampanye::all();

        return view('kampanye', compact('kampanyes'));
    }
}
