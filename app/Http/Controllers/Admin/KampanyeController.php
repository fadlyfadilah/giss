<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKampanyeRequest;
use App\Http\Requests\StoreKampanyeRequest;
use App\Http\Requests\UpdateKampanyeRequest;
use App\Models\Kampanye;
use App\Models\Koordinat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
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

        $centrepoint = Koordinat::get()->first();

        return view('admin.kampanyes.create', compact('centrepoint'));
    }

    public function store(StoreKampanyeRequest $request)
    {
        $this->validate($request, [
            'image' => 'image|mimes:png,jpg,jpeg',
        ]);

        $attr = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $uploadFile = time() . '_' . $file->getClientOriginalName();
            $file->move('uploads/imgCover/', $uploadFile);
            $attr['image'] = $uploadFile;
        }

        $attr['slug'] = Str::slug($attr['nama_kampanye'], '-');

        $kampanye = Kampanye::create($attr);

        return redirect()->route('admin.kampanyes.index');
    }

    public function edit(Kampanye $kampanye)
    {
        abort_if(Gate::denies('kampanye_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kampanyes.edit', compact('kampanye'));
    }

    public function update(UpdateKampanyeRequest $request, Kampanye $kampanye)
    {
        $this->validate($request, [
            'image' => 'image|mimes:png,jpg,jpeg',
        ]);

        $attr = $request->all();
        if ($request->hasFile('image')) {
            
            if (File::exists("uploads/imgCover/" . $kampanye->image)) {
                File::delete("uploads/imgCover/" . $kampanye->image);
            }
            
            $file = $request->file("image");
            //$uploadFile = StoreImage::replace($kampanye->image,$file->getRealPath(),$file->getClientOriginalName());
            $uploadFile = time() . '_' . $file->getClientOriginalName();
            $file->move('uploads/imgCover/', $uploadFile);
            $kampanye->image = $uploadFile;
        }
        
        $attr['slug'] = Str::slug($attr['nama_kampanye'], '-');

        $kampanye->update($attr);

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
        if (File::exists("uploads/imgCover/" . $kampanye->image)) {
            File::delete("uploads/imgCover/" . $kampanye->image);
        }
        $kampanye->delete();

        return back();
    }

    public function massDestroy(MassDestroyKampanyeRequest $request)
    {
        $kampanyes = Kampanye::find(request('ids'));

        foreach ($kampanyes as $kampanye) {
            if (File::exists("uploads/imgCover/" . $kampanye->image)) {
                File::delete("uploads/imgCover/" . $kampanye->image);
            }
            $kampanye->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}