<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKampanyeRequest;
use App\Http\Requests\StoreKampanyeRequest;
use App\Http\Requests\UpdateKampanyeRequest;
use App\Models\Kampanye;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KampanyeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('kampanye_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kampanyes = Kampanye::all();

        return view('admin.kampanyes.index', compact('kampanyes'));
    }

    public function create()
    {
        abort_if(Gate::denies('kampanye_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kampanyes.create');
    }

    public function store(StoreKampanyeRequest $request)
    {
        $kampanye = Kampanye::create($request->all());

        return redirect()->route('admin.kampanyes.index');
    }

    public function edit(Kampanye $kampanye)
    {
        abort_if(Gate::denies('kampanye_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kampanyes.edit', compact('kampanye'));
    }

    public function update(UpdateKampanyeRequest $request, Kampanye $kampanye)
    {
        $kampanye->update($request->all());

        return redirect()->route('admin.kampanyes.index');
    }

    public function show(Kampanye $kampanye)
    {
        abort_if(Gate::denies('kampanye_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kampanyes.show', compact('kampanye'));
    }

    public function destroy(Kampanye $kampanye)
    {
        abort_if(Gate::denies('kampanye_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kampanye->delete();

        return back();
    }

    public function massDestroy(MassDestroyKampanyeRequest $request)
    {
        $kampanyes = Kampanye::find(request('ids'));

        foreach ($kampanyes as $kampanye) {
            $kampanye->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}