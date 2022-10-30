@extends('layouts.master')
@section('content')
<div class="content">
    <!-- Dynamic Table Full -->
    <div class="block block-rounded">
        <div class="block-header">
            <h3 class="block-title">All Customers <small>Full</small></h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full text-center">
                <thead>
                    <tr>
                        <th class="d-none d-sm-table-cell" style="width: 20%;">Name</th>
                        <th class="d-none d-sm-table-cell" style="width: 20%;">Email</th>
                        <th class="d-none d-sm-table-cell" style="width: 20%;">Phone</th>
                        <th class="d-none d-sm-table-cell" style="width: 20%;">Address</th>
                        <th class="d-none d-sm-table-cell" style="width: 20%;">Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)


                    <tr>
                        <td class="font-w600 font-size-sm">
                            {{ $customer->name }}
                        </td>
                        <td class="d-none d-sm-table-cell font-size-sm">
                            {{ $customer->email }}
                        </td>
                        <td class="d-none d-sm-table-cell">
                            {{ $customer->phone }}
                        </td>
                        <td>
                            <em class="text-muted font-size-sm">{{ $customer->address }}</em>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-sm btn-success px-3 m-2" href="{{ route('customers.edit',$customer->id) }}" data-toggle="tooltip" title="Edit Client">
                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('customers.destroy',$customer->id) }}" method="post">
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
