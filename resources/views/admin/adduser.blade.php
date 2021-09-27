@extends('layouts.navbar')

@section('title', 'Dashboard Odoroki Florist')

@section('breadcrumb', 'Dashboard')

@section('content')

    <div class="container-fluid">

        <div class="row" style="background-color: #bc1d2a; border-radius: 10px; padding: 15px; margin-top:20px;">

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

        <div class="row" style="background-color: #13bd32; border-radius: 10px; padding: 15px; margin-top:20px;">

            <table id="example" class="display" style="width:100%;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($Users as $User)
                    <tr>
                        <td>{{ $User->name }}</td>
                        <td>{{ $User->role }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>

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
    </script>
@endsection
