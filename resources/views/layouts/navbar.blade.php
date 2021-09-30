<!DOCTYPE html>
<html lang="en">

<head>

    <title>@yield('title')</title>

    <link rel="shortcut icon" href="/dashboardAssets/Assets/icon/odoroki.png">

    @include('layouts.header')

</head>

<body>

    <!-- Main navbar -->
    <div class="navbar navbar-inverse" style="background-color: #E0D5BB;">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">LOGO SIDJI</a>

            <ul class="nav navbar-nav visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
            </ul>
        </div>

        <div class="navbar-collapse collapse" id="navbar-mobile">
            <ul class="nav navbar-nav">
                <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a>
                </li>
            </ul>

            <div class="navbar-right">
                <p class="navbar-text">Welcome, {{ Auth::user()->name }}!</p>
                <p class="navbar-text"><span class="label bg-success-400">Online</span></p>
            </div>
        </div>
    </div>
    <!-- /main navbar -->


    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main sidebar -->
            <div class="sidebar sidebar-main sidebar-default">
                <div class="sidebar-content">

                    <!-- User menu -->
                    <div class="sidebar-user-material">
                        <div class="category-content">
                            <div class="sidebar-user-material-content">
                                <h6>{{ Auth::user()->name }}</h6>
                                <span class="text-size-small"></span>
                            </div>

                            <div class="sidebar-user-material-menu">
                                <a href="#user-nav" data-toggle="collapse"><span>My account</span> <i
                                        class="caret"></i></a>
                            </div>
                        </div>

                        <div class="navigation-wrapper collapse" id="user-nav">
                            <ul class="navigation">
                                {{-- <li><a href="#"><i class="icon-user-plus"></i> <span>My profile</span></a></li>
								<li><a href="#"><i class="icon-coins"></i> <span>My balance</span></a></li>
								<li><a href="#"><i class="icon-comment-discussion"></i> <span><span class="badge bg-teal-400 pull-right">58</span> Messages</span></a></li>
								<li class="divider"></li>
								<li><a href="#"><i class="icon-cog5"></i> <span>Account settings</span></a></li> --}}
                                <li>
                                    <a id="buttonModal" class="btn btn-info" data-toggle="modal" data-target="#modal"><i class="icon-plus2"></i>Best Pick</a>

                                    <!-- Modal -->
                                    <div class="modal fade text-left" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="" id="modalLabel">Add to Best Pick</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <i class="icon-cross"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="container-fluid">

                                                        <table class="table table-striped">

                                                            <thead>
                                                                <th>No</th>
                                                                <th>Kategori</th>
                                                                <th>Sub Kategori</th>
                                                                <th>Nama Barang</th>
                                                                <th>Detail</th>
                                                            </thead>

                                                            <tbody id="tableAddBestPick">

                                                            </tbody>

                                                        </table>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                </li>
                                <li>
                                    <button class="btn btn-default" data-toggle="modal" data-target="#changePassword">
                                    Change Password
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="changePassword">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- header-->
                                                <div class="modal-header">
                                                    <button class="close" data-dismiss="modal"><span>&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Change Password</h4>
                                                </div>
                                                <!--body-->
                                                <div class="modal-body">
                                                    <input type="text" id="email" value="{{ Auth::user()->name }}" hidden>
                                                    <input type="password" name="password" id="password">
                                                    <input type="password" name="confirmPassword" id="confirmPassword">
                                                    <button type="button" class="btn btn-primary" onclick="changePassword()">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();$('#logout-form').submit();">
                                        <i class="icon-switch2"></i> <span>Logout</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /user menu -->


                    <!-- Main navigation -->
                    <div class="sidebar-category sidebar-category-visible">
                        <div class="category-content no-padding">
                            <ul class="navigation navigation-main navigation-accordion">
                                @include('layouts.menu')

                            </ul>
                        </div>
                    </div>
                    <!-- /main navigation -->
                </div>
            </div>
            <!-- /main sidebar -->


            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header page-header-default">

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><a href="/admin"><i class="icon-home2 position-left"></i> Home</a></li>
                            <li class="active">@yield('breadcrumb')</li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    {{-- Template Panel --}}
                    @yield('content')

                    <!-- Footer -->
                    <div class="footer text-muted">
                        SIDJI <i class="icon-x"></i> <a href="https://www.instagram.com/larv.studio/"
                            class="text-muted">LARVSTD</a>
                    </div>
                    <!-- /footer -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->

    @yield('modal')

    @yield('javascript')

    <script>
        function changePassword(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            let email = $('#email').val();
            let password = $('#password').val();
            let confirmPassword = $('#confirmPassword').val();

            console.log(email);
            console.log(password);
            console.log(confirmPassword);

            if (password != confirmPassword){
                console.log('TIDAK SAMA')
                Swal.fire({
                    icon: 'error',
                    title: 'Password dan Confirm Password tidak sama!',
                    timer: 500,
                })
            } else if (password == confirmPassword){
                console.log('SAMA')
                $.ajax({
                    type: 'POST',
                    url: '/admin/change-password',
                    data: {
                        email: email,
                        password: password
                    },
                    success: function(data){
                        console.log(data)
                        Swal.fire({
                            icon: 'success',
                            title: 'User Berhasil Ganti Password!',
                            timer: 900,
                        })
                        location.reload()
                    },
                    error: function(data){
                        console.log('Error ', data);
                    }
                })
            }
        }
    </script>
</body>

</html>