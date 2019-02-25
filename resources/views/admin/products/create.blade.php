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
            <h4 class="c-grey-900 mT-10 mB-15">Product</h4>
        </div>
        <div class="col-lg-12 mb-1">
            <button type="submit" form="productsForm" data-toggle="tooltip" data-placement="top" title="Save"
                    class="ti-save-alt mr-1"
                    style="border: none; background-color: transparent; cursor: pointer; outline:none;  font-size: 2em; color: blue;">

            </button>
            <a href="{{ route('products.index') }}" data-toggle="tooltip" data-placement="top" title="Back"
               class="ti-back-left"
               style="font-size: 2em; color: orange;"></a>
        </div>
    </div>

    <ul class="nav nav-tabs" id="productsTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab"
               aria-controls="general" aria-selected="true">General</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="data-tab" data-toggle="tab" href="#data" role="tab" aria-controls="data"
               aria-selected="false">Data</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="links-tab" data-toggle="tab" href="#links" role="tab" aria-controls="links"
               aria-selected="false">Links</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="attribute-tab" data-toggle="tab" href="#attribute" role="tab"
               aria-controls="attribute"
               aria-selected="false">Attribute</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="seo-tab" data-toggle="tab" href="#seo" role="tab" aria-controls="seo"
               aria-selected="false">SEO</a>
        </li>
    </ul>

    <form action="{{ route('products.store') }}" method="POST" id="productsForm">
        {{ csrf_field() }}
        <div class="tab-content" id="products">

            <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                <div class="mt-3">

                    <div class="form-group">
                        <label for="product">Product Name</label>
                        <input type="text" class="form-control" id="product" placeholder="Product" name="name">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="1">Active</option>
                            <option value="0">UnActive</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="data" role="tabpanel" aria-labelledby="data-tab">
                <div class="mt-3">

                    <div class="form-group">
                        <label for="sku">Sku</label>
                        <input type="text" class="form-control" id="sku" placeholder="Sku" name="sku">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" placeholder="Price" name="price">
                    </div>

                </div>
            </div>

            <div class="tab-pane fade" id="links" role="tabpanel" aria-labelledby="links-tab">
                <div class="mt-3">

                    <div class="form-group">
                        <label for="manufacturer">Manufacturer</label>
                        <input type="text" class="form-control" id="manufacturer" placeholder="Manufacturer" name="manufacturer_id">
                    </div>
                    <div class="form-group">
                        <label for="categories">Categories</label>
                        <select class="form-control" id="categories" name="categories[]" multiple>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->path }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="attribute" role="tabpanel" aria-labelledby="attribute-tab">
                <div class="mt-3">

                    @forelse($groups as $group)

                        <div class="form-group">
                            <label for="{{ $group->name }}">{{ $group->name }}</label>
                            <select class="form-control" id="{{ $group->name }}" name="attributes[]">
                                @foreach($group->attributes as $attribute)
                                    <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @empty

                    @endforelse
                </div>
            </div>
        </div>
    </form>
@endsection
