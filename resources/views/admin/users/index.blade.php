@extends('layouts.navbar')

@section('title', 'Sidji')

@section('breadcrumb', 'Dashboard')

@section('content')

    <div class="panel panel-flat">
        <div class="panel-heading">
            <h6 class="panel-title">Add User</h6>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    {{-- <li><a data-action="reload"></a></li> --}}
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-md-12">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="name" id="name"><br>
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email"><br>
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password"><br>
                        <label for="role">Role</label>
                        <select name="role" class="form-control" id="role">
                            <option value="OWNER">Owner</option>
                            <option value="ADMIN">Admin</option>
                        </select><br>
                        <button class="btn btn-tambah"type="button" onclick="addUser()">Add</button>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="panel panel-flat">
        <div class="panel-heading">
            <h6 class="panel-title">User Management</h6>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    {{-- <li><a data-action="reload"></a></li> --}}
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">

            <div class="container-fluid">

                <div class="row">

                    <table id="example" class="display table table-striped" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($Users as $User)
                            <tr>
                                <td>{{ $User->name }}</td>
                                <td>{{ $User->role }}</td>
                                <td>
                                @if(Auth::user()->role =='OWNER')
                                    <button class="btn btn-danger" style="margin: 5px;" onclick="deleteAccount({{$User->id}})">Delete!</button>
                                    <button class="btn btn-success" style="margin: 5px;" onclick="editAccount({{$User->id}})">Edit!</button>
                                @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>

    {{-- <div class="container-fluid">

        <div class="row" style="background-color: #ffe291; border-radius: 10px; padding: 15px; margin-top:20px;">

            <div class="col-md-12">
                <label for="name">Nama</label>
                <input type="text" class="form-control" name="name" id="name"><br>
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email"><br>
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password"><br>
                <label for="role">Role</label>
                <select name="role" class="form-control" id="role">
                    <option value="OWNER">Owner</option>
                    <option value="ADMIN">Admin</option>
                </select><br>
                <button type="button" onclick="addUser()">SIMPAN</button>
            </div>

        </div>

        <div class="row" style="background-color: #b7b0ff; border-radius: 10px; padding: 15px; margin-top:20px;">

            <table id="example" class="display" style="width:100%;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($Users as $User)
                    <tr>
                        <td>{{ $User->name }}</td>
                        <td>{{ $User->role }}</td>
                        <td>
                        @if(Auth::user()->role =='OWNER')
                            <button class="btn btn-danger" style="margin: 5px;" onclick="deleteAccount({{$User->id}})">Delete!</button>
                            <button class="btn btn-success" style="margin: 5px;" onclick="editAccount({{$User->id}})">Edit!</button>
                        @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div> --}}

@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );

        function addUser(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            let name = $('#name').val();
            let email = $('#email').val();
            let password = $('#password').val();
            let role = $('#role').val();
            console.log(name)
            console.log(email)
            console.log(password)
            console.log(role)
            if (name != '' && email != '' && password != '' && role != ''){
                console.log('MASUK IF')
                $.ajax({
                    type: 'POST',
                    url: '/admin/insert-user',
                    data: {
                        name: name,
                        email: email,
                        password: password,
                        role: role
                    },
                    success: function(data){
                        console.log(data)
                        Swal.fire({
                            icon: 'success',
                            title: 'User Berhasil Ditambahkan!',
                            timer: 900,
                        })
                        location.reload()
                    },
                    error: function(data){
                        console.log('Error ', data);
                    }
                })
            }
            else{
                Swal.fire({
                    icon: 'error',
                    title: 'Data belum lengkap!',
                    timer: 300,
                })
            }
        }

        function deleteAccount(id){

            $.ajax({
                type: 'POST',
                url: '/admin/delete-user',
                data: {
                    id: id
                },
                success: function(data) {
                    console.log('Success :  ', data);
                    Swal.fire({
                        icon: 'success',
                        title: 'Delete User Berhasil!',
                        timer: 900,
                    });
                    location.reload();
                },
                error: function(data){
                    console.error('Error :  ', data);
                }
            })

        }
    </script>
@endsection
