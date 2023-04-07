<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Color\StoreRequest;
use App\Http\Requests\Admin\Color\UpdateRequest;
use App\Models\Color;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();

        return view('admin.color.index', compact('colors'));
    }

    public function create()
    {
        return view('admin.color.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Color::query()->firstOrCreate($data);

        return redirect()->route('color.index');
    }

    public function show(Color $color)
    {
        return view('admin.color.show', compact('color'));
    }

    public function edit(Color $color)
    {
        return view('admin.color.edit', compact('color'));
    }

    public function update(UpdateRequest $request, Color $color)
    {
        $data = $request->validated();
        $color->update($data);

        return view('admin.color.show', compact('color'));
    }

    public function destroy(Color $color)
    {
        $color->delete();

        return redirect()->route('color.index');
    }
}
