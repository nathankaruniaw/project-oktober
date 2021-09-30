@extends('layouts.navbar')

@section('title', 'Sidji')

@section('breadcrumb')
    <li class="active">Section</li>
@endsection

@section('content')

    <div class="panel panel-flat">
        <div class="panel-heading">
            <h6 class="panel-title">Section</h6>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">

            <div class="container-fluid">

                <div class="row">

                    <table class="table" id="tableData">

                        <thead>
                            <th>No</th>
                            <th>Status</th>
                            <th>Pages</th>
                            <th>Sub Page</th>
                            <th>Action</th>
                        </thead>

                    </table>

                </div>

            </div>

        </div>
    </div>

@endsection

@section('javascript')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script src="/js/admin/section.js"></script>
@endsection
