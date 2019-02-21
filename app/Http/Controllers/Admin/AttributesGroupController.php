<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateArrtibuteGroupRequest;
use App\Models\Admin\AttributeGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttributesGroupController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AttributeGroup $attributeGroup)
    {
        $nameColumns = $attributeGroup->nameColumns();
        $attributesGroup = $attributeGroup->all();

        return view('admin.attributes_group.index', compact('attributesGroup', 'nameColumns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attributes_group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateArrtibuteGroupRequest $request)
    {

        AttributeGroup::create($request->all());

        return redirect()->route('attributes_group.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\AttributeGroup  $attributeGroup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attributeGroup = AttributeGroup::find($id);

        return view('admin.attributes_group.edit', compact('attributeGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(CreateArrtibuteGroupRequest $request, $id)
    {

        $attributeGroup = AttributeGroup::find($id);
        $attributeGroup->update($request->all());

        return redirect()->route('attributes_group.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attributeGroup = AttributeGroup::find($id);
        $attributeGroup->delete();
        return redirect()->route('attributes_group.index');
    }
}
