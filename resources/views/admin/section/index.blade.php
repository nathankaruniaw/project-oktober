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

            <div id="example"></div>

            <div class="container-fluid">

                <div class="row">

                    <table class="table" id="tableData">

                        <thead>
                            <th>No</th>
                            <th>Pages</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            <?php $no=1; ?>
                            @foreach($pages as $page)

                                <?php $count=0; ?>
                                @foreach($subPages as $subPage)

                                    @if($page->idPage == $subPage->idSubPage)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $page->namaPage }} - {{ $subPage->namaPage }}</td>
                                            <td>{{ $subPage->statusPage }}</td>
                                            <td>
                                                <ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                            <i class="icon-menu9"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="/admin/section/add-data/{{ $subPage->idPage }}" class="edit-button"><i class="icon-pencil6"></i> Detail</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <?php $no++; $count++; ?>
                                    @endif

                                @endforeach

                                @if($count == 0)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $page->namaPage }}</td>
                                        <td>{{ $page->statusPage }}</td>
                                        <td>
                                            <ul class="icons-list">
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                        <i class="icon-menu9"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="/admin/section/add-data/{{ $page->idPage }}" class="edit-button"><i class="icon-pencil6"></i> Detail</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                @endif

                            @endforeach
                        </tbody>

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
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
@endsection
