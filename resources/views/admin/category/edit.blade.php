@extends('admin.layouts.admin')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">

        <div class="col-lg-12">
            <h4 class="c-grey-900 mT-10 mB-15">Categories</h4>
        </div>
        <div class="col-lg-12 mb-1">
            <button type="submit" form="categoryForm" data-toggle="tooltip" data-placement="top" title="Save" class="ti-save-alt mr-1"
                    style="border: none; background-color: transparent; cursor: pointer; outline:none;  font-size: 2em; color: blue;">

            </button>
            <a href="/admin/categories" data-toggle="tooltip" data-placement="top" title="Back" class="ti-back-left"
               style="font-size: 2em; color: orange;"></a>
        </div>
    </div>

    <ul class="nav nav-tabs" id="categoryTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab"
               aria-controls="general" aria-selected="true">General</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="seo-tab" data-toggle="tab" href="#seo" role="tab" aria-controls="seo"
               aria-selected="false">SEO</a>
        </li>
    </ul>


    <div class="tab-content" id="categoryContent">
        <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
            <div class="mt-3">
                <form action="{{ route('categories.update', $category->id) }}" method="POST" id="categoryForm">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label for="parent">Parent</label>
                        <select class="form-control" id="parent" name="parent_id">
                            <option></option>
                            @forelse($categories as $itemCategory)
                                <option value="{{ $itemCategory->id }}" {{ $itemCategory->id == $category->parent_id ?  'selected' : '' }}> {{ $itemCategory->path }} </option>
                            @empty

                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" class="form-control" id="category" name="name"  value="{{ $category->name }}">
                    </div>

                    <div class="form-group">
                        <label for="category">Slug</label>
                        <input type="text" class="form-control" id="slug"  name="slug" value="{{ $category->slug }}">
                    </div>


                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" {{ $category->status }}>
                            <option value="1">Active</option>
                            <option value="1">UnActive</option>
                        </select>
                    </div>

                </form>
            </div>
        </div>

        <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">SEO</div>
    </div>
@endsection
