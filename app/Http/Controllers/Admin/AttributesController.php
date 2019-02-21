<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Attribute;
use App\Models\Admin\AttributeGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Attribute $attribute)
    {
        $attributes = $attribute->with('group')->get();
        $nameColumns = $attribute->nameColumns();

        return view('admin.attributes.index', compact('attributes', 'nameColumns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = AttributeGroup::all();

        return view('admin.attributes.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Attribute::create($request->all());

        return redirect()->route('attributes.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Characteristics  $characteristics
     * @return \Illuminate\Http\Response
     */
    public function show(Characteristics $characteristics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Characteristics  $characteristics
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute, AttributeGroup $group)
    {
        $groups = $group->all();

        return view('admin.attributes.edit', compact('attribute', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Characteristics  $characteristics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attribute $attribute)
    {
        $attribute->update($request->all());
        return redirect()->route('attributes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Characteristics  $characteristics
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();

        return redirect()->route('attributes.index');
    }
}
