@extends('layouts.navbar')

@section('title', 'Sidji')

@section('breadcrumb')
    <li><a href="{{ route('section') }}"> Section</a></li>
    <li class="active">Add Section</li>
@endsection

@section('content')

    <div class="panel panel-flat">
        <div class="panel-heading">
            <h6 class="panel-title">Add Section</h6>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">

            <input type="hidden" id="idPage" value="{{ $data->idPage }}">

            <div class="container-fluid">

                <div class="row">

                    {{-- Container Section --}}
                    <div class="col-lg-6" id="containerSection">

                    </div>

                    {{-- Container Section yang telah ditambahkan --}}
                    <div class="col-lg-6 container" id="containerChoosenSection">

                    </div>

                </div>

                <div class="row text-right mt-20" id="containerButton">

                    <button class="btn btn-edit" id="buttonSaveList" type="button">
                        Save Changes
                    </button>

                </div>

            </div>

        </div>
    </div>

@endsection

@section('modal')

    {{-- Landing Page Modal --}}
    @include('admin.section.modals.landingPage')

@endsection

@section('javascript')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/admin/drag.css">
    <script src="/js/admin/drag.js"></script>
@endsection
