<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class DonasiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('donasi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $donasis = Donasi::with(['user', 'kampanye'])->get();

        return view('admin.donasis.index', compact('donasis'));
    }
}