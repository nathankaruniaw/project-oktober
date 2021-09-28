@extends('layouts.navbar')

@section('title', 'Sidji')

@section('breadcrumb', 'Page Management')

@section('content')

    <div class="panel panel-flat">
        <div class="panel-heading">
            <h6 class="panel-title">Pages</h6>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">



        </div>
    </div>

@endsection

@section('javascript')
    <script src="/js/admin/pages.js"></script>
@endsection
