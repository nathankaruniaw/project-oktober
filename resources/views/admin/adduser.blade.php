@extends('layouts.navbar')

@section('title', 'Dashboard Odoroki Florist')

@section('breadcrumb', 'Dashboard')

@section('content')

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">
                <label for="name">Nama</label>
                <input type="text" name="name" id="name"><br>
                <label for="email">Email</label>
                <input type="text" name="email" id="email"><br>
                <label for="password">Password</label>
                <input type="password" name="password" id="password"><br>
                <button type="button" onclick="addUser()">SIMPAN</button>
            </div>

        </div>

        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Shad Decker</td>
                <td>Regional Director</td>
                <td>Edinburgh</td>
                <td>51</td>
                <td>2008/11/13</td>
                <td>$183,000</td>
            </tr>
            <tr>
                <td>Michael Bruce</td>
                <td>Javascript Developer</td>
                <td>Singapore</td>
                <td>29</td>
                <td>2011/06/27</td>
                <td>$183,000</td>
            </tr>
            <tr>
                <td>Donna Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td>27</td>
                <td>2011/01/25</td>
                <td>$112,000</td>
            </tr>
        </tbody>
    </table>

    </div>

@endsection

@section('javascript')
    <script src="/js/pages/dashboard.js"></script>
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
            console.log(name)
            console.log(email)
            console.log(password)
            if (name != '' && email != '' && password != ''){
                console.log('MASUK IF')
                $.ajax({
                    type: 'POST',
                    url: '/admin/insert-user',
                    data: {
                        name: name,
                        email: email,
                        password: password
                    },
                    success: function(data){
                        console.log(data)
                        Swal.fire({
                            icon: 'success',
                            title: 'User Berhasil Ditambahkan!',
                            timer: 900,
                        })
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
