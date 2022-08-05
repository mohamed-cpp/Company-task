@extends('layouts.app')

@push('scriptsSrc')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
@endpush


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <a href="{{route('admin.companies.create')}}">Create Company</a>
                    <hr>
                    <div>
                        <input type="hidden" id="companies-get" value="{{route('admin.companies.datatable')}}">
                        <input type="hidden" id="companies-edit"
                               value="{{route('admin.companies.edit','@replaceid@')}}">
                        <input type="hidden" id="companies-delete"
                               value="{{route('admin.delete.companies.datatable','@replaceid@')}}">

                        <table id="companies" class="hover table-bordered border-top-0 border-bottom-0" >
                            <thead>
                            <tr>
                                <th>@lang("Id")</th>
                                <th>@lang("Name")</th>
                                <th>@lang("Address")</th>
                                <th>@lang("Logo")</th>
                                <th>@lang("Actions")</th>

                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>@lang("Id")</th>
                                <th>@lang("Name")</th>
                                <th>@lang("Address")</th>
                                <th>@lang("Logo")</th>
                                <th>@lang("Actions")</th>

                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <hr>
                    <div>
                        <input type="hidden" id="employees-get" value="{{route('admin.employees.datatable')}}">
                        <input type="hidden" id="employees-delete" value="{{route('admin.delete.employees.datatable','@replaceid@')}}">

                        <table id="employees" class="hover table-bordered border-top-0 border-bottom-0" >
                            <thead>
                            <tr>
                                <th>@lang("Id")</th>
                                <th>@lang("Name")</th>
                                <th>@lang("Company Name")</th>
                                <th>@lang("Image")</th>
                                <th>@lang("Actions")</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>@lang("Id")</th>
                                <th>@lang("Name")</th>
                                <th>@lang("Company Name")</th>
                                <th>@lang("Image")</th>
                                <th>@lang("Actions")</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script defer src="{{mix('/js/admin/datatables.js')}}"></script>
@endpush
