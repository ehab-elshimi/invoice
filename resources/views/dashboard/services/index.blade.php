@extends('layouts.master')
@section('content')
<div class="content">
    <!-- Dynamic Table Full -->
    <div class="block block-rounded">
        <div class="block-header">
            <h3 class="block-title">All Services <small>Full</small></h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full text-center">
                <thead>
                    <tr>
                        <th class="d-none d-sm-table-cell" style="width: 25%;">Name</th>
                        <th class="d-none d-sm-table-cell" style="width: 40%;">Description</th>
                        <th class="d-none d-sm-table-cell" style="width: 20%;">Price $</th>
                        <th class="d-none d-sm-table-cell" style="width: 20%;">Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                    <tr>
                        <td class="font-w600 font-size-sm">
                            {{ $service->name }}
                        </td>
                        <td class="d-none d-sm-table-cell font-size-sm">
                            {{ $service->desc }}
                        </td>
                        <td class="d-none d-sm-table-cell">
                            {{ $service->price }}
                            <em class="text-muted">$</em>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-sm btn-success px-3 m-2" href="{{ route('services.edit',$service->id) }}" data-toggle="tooltip" title="Edit Client">
                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('services.destroy',$service->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger px-3 m-2" data-toggle="tooltip" title="Remove Client">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table Full -->

        </div>
    </div>
    <!-- END Dynamic Table with Export Buttons -->
</div>
@endsection
