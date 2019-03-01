@extends('admin.layouts.admin')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="c-grey-900 mT-10 mB-15" style="display: inline-block">Manufacturers</h4>
            </div>
            <div class="col-lg-12 mb-1">
                <a href="{{ route('manufacturers.create') }}" data-toggle="tooltip" data-placement="top" title="Add category" class="fas fa-plus-circle" style="font-size: 2.5em; color: green" ></a>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h4 class="c-grey-900 mB-20">Manufacturers list</h4>
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
                        @forelse($manufacturers as $manufacturer)
                            <tr>
                               <td>{{ $manufacturer->id }}</td>
                               <td>{{ $manufacturer->name }}</td>
                                     @include('admin.layouts.actions',[
                                    'id' => $manufacturer->id,
                                    'edit' => 'manufacturers.edit',
                                    'destroy' => 'manufacturers.destroy',
                                    ])
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