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

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Page's Name : </label>
                                    </div>

                                    <div class="col-md-6">
                                        <input type="text" name="namaPage" id="namaPage" class="form-control" placeholder="Page's name">
                                    </div>

                                    <div class="col-md-3 text-right">
                                        <button class="btn btn-primary" id="pageButton" type="button">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>

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

                            <div class="col-lg-12">

                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Page's Name : </label>
                                    </div>

                                    <div class="col-md-6">
                                        <input type="text" name="addNamaPage" id="addNamaPage" class="form-control" placeholder="Page's name">
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-12">

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
