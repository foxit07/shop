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
            <h4 class="c-grey-900 mT-10 mB-15">Provider</h4>
        </div>
        <div class="col-lg-12 mb-1">
            <button type="submit" form="providerForm" data-toggle="tooltip" data-placement="top" title="Save" class="ti-save-alt mr-1"
                    style="border: none; background-color: transparent; cursor: pointer; outline:none;  font-size: 2em; color: blue;">

            </button>
            <a href="{{ route('providers.index') }}" data-toggle="tooltip" data-placement="top" title="Back" class="ti-back-left"
               style="font-size: 2em; color: orange;"></a>
        </div>
    </div>

    <ul class="nav nav-tabs" id="providerTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab"
               aria-controls="general" aria-selected="true">General</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="seo-tab" data-toggle="tab" href="#seo" role="tab" aria-controls="seo"
               aria-selected="false">SEO</a>
        </li>
    </ul>


    <div class="tab-content" id="manufacturerContent">
        <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
            <div class="mt-3">
                <form action="{{ route('providers.update', $provider->id) }}" method="POST" id="providerForm">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label for="provider">Provider</label>
                        <input type="text" class="form-control" id="provider" name="name"  value="{{ $provider->name }}">
                    </div>
                </form>
            </div>
        </div>

        <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">SEO</div>
    </div>
@endsection
