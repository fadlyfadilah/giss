<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDonaturRequest;
use App\Http\Requests\StoreDonaturRequest;
use App\Http\Requests\UpdateDonaturRequest;
use App\Models\Donatur;
use App\Models\Kampanye;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DonaturController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('donatur_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $donaturs = Donatur::with(['user', 'kampanye'])->get();

        return view('admin.donaturs.index', compact('donaturs'));
    }

    public function create()
    {
        abort_if(Gate::denies('donatur_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kampanyes = Kampanye::pluck('nama_kampanye', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.donaturs.create', compact('kampanyes', 'users'));
    }

    public function store(StoreDonaturRequest $request)
    {
        $donatur = Donatur::create($request->all());

        return redirect()->route('admin.donaturs.index');
    }

    public function edit(Donatur $donatur)
    {
        abort_if(Gate::denies('donatur_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kampanyes = Kampanye::pluck('nama_kampanye', 'id')->prepend(trans('global.pleaseSelect'), '');

        $donatur->load('user', 'kampanye');

        return view('admin.donaturs.edit', compact('donatur', 'kampanyes', 'users'));
    }

    public function update(UpdateDonaturRequest $request, Donatur $donatur)
    {
        $donatur->update($request->all());

        return redirect()->route('admin.donaturs.index');
    }

    public function show(Donatur $donatur)
    {
        abort_if(Gate::denies('donatur_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $donatur->load('user', 'kampanye');

        return view('admin.donaturs.show', compact('donatur'));
    }

    public function destroy(Donatur $donatur)
    {
        abort_if(Gate::denies('donatur_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $donatur->delete();

        return back();
    }

    public function massDestroy(MassDestroyDonaturRequest $request)
    {
        $donaturs = Donatur::find(request('ids'));

        foreach ($donaturs as $donatur) {
            $donatur->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}