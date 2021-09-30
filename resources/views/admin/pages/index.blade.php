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

            <div class="container-fluid">

                <div class="row">

                    <button class="btn btn-tambah" type="button" id="addPage">
                        Add Pages
                    </button>

                </div>

                <div class="row">

                    <table class="table" id="tableData">

                        <thead>
                            <th>No</th>
                            <th>Pages Name</th>
                            <th>Action</th>
                        </thead>

                    </table>

                </div>

            </div>

        </div>
    </div>

@endsection

@section('modal')

    <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" style="width: 90%!important;">
            <div class="modal-content">

                <div class="modal-header">
                    <h5>Edit Pages :</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    {{-- ID --}}
                    <input type="hidden" id="idPage" value="">

                    <div class="container-fluid">

                        {{-- Page --}}
                        <div class="row">

                            <div class="col-lg-5">

                                <label>Page's Name : </label>

                                <input type="text" id="namaPage" class="form-control namaPage" data-id=""
                                    placeholder="Page's name" value="" data-kolom="namaPage">

                            </div>

                            <div class="col-lg-5">

                                <label>Page's Status : </label>

                                <select id="statusPage" class="form-control statusPage" data-id="" data-kolom="statusPage">

                                </select>

                            </div>

                        </div>

                        {{-- SubPage --}}
                        <div class="row">

                            <hr>
                            <h5>Sub Page :</h5>

                            {{-- Add Sub Page --}}
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control"
                                            placeholder="Sub page's name" id="subPageNama">
                                    </div>
                                    <div class="col-lg-3">
                                        <select class="form-control" id="subPageStatus">

                                            <option value="Online" selected>Online</option>
                                            <option value="Offline">Offline</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <button class="btn btn-tambah" id="subPageAddButton">
                                            Add
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <br>

                            {{-- Sub Page --}}
                            <div class="col-lg-12" id="containerSubPage">

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="AddModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Add Pages :</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-md-3">
                                <label>Page's Name : </label>
                            </div>

                            <div class="col-md-6">
                                <input type="text" name="addNamaPage" id="addNamaPage" class="form-control"
                                    placeholder="Page's name">
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-3">
                                <label>Page's Status : </label>
                            </div>

                            <div class="col-md-6">
                                <select class="form-control" name="addStatusPage" id="addStatusPage">
                                    <option value="Online" selected> Online</option>
                                    <option value="Offline"> Offline</option>
                                </select>
                            </div>

                        </div>

                        <div class="row text-right">

                            <button class="btn btn-tambah" id="btnTambahPage" type>
                                Add
                            </button>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script src="/js/admin/pages.js"></script>
@endsection
