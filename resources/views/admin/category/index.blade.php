@extends('admin.layouts.admin')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
        <h4 class="c-grey-900 mT-10 mB-15" style="display: inline-block">Categories</h4>
            </div>
            <div class="col-lg-12 mb-1">
        <a href="/admin/categories/create" data-toggle="tooltip" data-placement="top" title="Add category" class="fas fa-plus-circle" style="font-size: 2.5em; color: green" ></a>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h4 class="c-grey-900 mB-20">Category list</h4>
                    <table id="dataTable" class="table table-striped table-bordered table-responsive-sm" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            @foreach($nameColumns as $nameColumn)
                                <th>{{ $nameColumn }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            @foreach($nameColumns as $nameColumn)
                                <th>{{ $nameColumn }}</th>
                            @endforeach
                        </tr>
                        </tfoot>
                        <tbody>
                        @forelse($categories as $category)
                            <tr>
                                @if($category->isRoot())
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->path }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    @include('admin.layouts.actions',[
                                        'id' => $category->id,
                                        'edit' => 'categories.edit',
                                        'destroy' => 'categories.destroy'
                                    ])
                                @else
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->path }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    @include('admin.layouts.actions', [
                                        'id' => $category->id,
                                        'edit' => 'categories.edit',
                                        'destroy' => 'categories.destroy'
                                    ])
                                @endif
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection