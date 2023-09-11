<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Group\StoreRequest;
use App\Http\Requests\Admin\Group\UpdateRequest;
use App\Models\Admin\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();

        return view('admin.group.index', compact('groups'));
    }

    public function create()
    {
        return view('admin.group.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Group::query()->firstOrCreate($data);

        return redirect()->route('group.index');
    }

    public function show(Group $group)
    {
        return view('admin.group.show', compact('group'));
    }

    public function edit(Group $group)
    {
        return view('admin.group.edit', compact('group'));
    }

    public function update(UpdateRequest $request, Group $group)
    {
        $data = $request->validated();

        $group->update($data);

        return view('admin.group.show', compact('group'));
    }

    public function destroy(Group $group)
    {
       $group->delete();

       return redirect()->route('group.index');
    }
}
