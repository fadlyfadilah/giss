<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKoordinatRequest;
use App\Http\Requests\StoreKoordinatRequest;
use App\Http\Requests\UpdateKoordinatRequest;
use App\Models\Koordinat;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KoordinatController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('koordinat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $koordinats = Koordinat::all();

        return view('admin.koordinats.index', compact('koordinats'));
    }

    public function create()
    {
        abort_if(Gate::denies('koordinat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.koordinats.create');
    }

    public function store(StoreKoordinatRequest $request)
    {
        $koordinat = Koordinat::create($request->all());

        return redirect()->route('admin.koordinats.index');
    }

    public function edit(Koordinat $koordinat)
    {
        abort_if(Gate::denies('koordinat_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.koordinats.edit', compact('koordinat'));
    }

    public function update(UpdateKoordinatRequest $request, Koordinat $koordinat)
    {
        $koordinat->update($request->all());

        return redirect()->route('admin.koordinats.index');
    }

    public function show(Koordinat $koordinat)
    {
        abort_if(Gate::denies('koordinat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.koordinats.show', compact('koordinat'));
    }

    public function destroy(Koordinat $koordinat)
    {
        abort_if(Gate::denies('koordinat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $koordinat->delete();

        return back();
    }

    public function massDestroy(MassDestroyKoordinatRequest $request)
    {
        $koordinats = Koordinat::find(request('ids'));

        foreach ($koordinats as $koordinat) {
            $koordinat->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}