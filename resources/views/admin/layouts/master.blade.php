<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Admin Panel - @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('storage/logo/toetet.svg') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"rel="stylesheet">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/icons/flags/flags.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/media.css') }}">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
            text-decoration: none !important;
        }
    </style>
</head>

<body>
    <div class="loading d-flex justify-content-center align-items-center" id="loader">
        <div class="">
            <div class="text-center">
                <i class="fa-solid fa-spinner text-primary fs-2 spin my-2"></i>
                <h6 class="text-primary">Please wait for a few moment!</h6>
            </div>
        </div>
    </div>
    <div class="main-wrapper">

        <div class="header">

            <div class="header-left">
                <a href="index.html" class="logo">
                    <a href="" class="text-primary d-none d-lg-block ms-2">TOE TET Private High School</a>
                </a>
                <a href="index.html" class="logo logo-small">
                    <img src="{{ asset('storage/logo/toetet.svg') }}" alt="Logo" width="30" height="30">
                </a>
            </div>
            <div class="menu-toggle">
                <a href="javascript:void(0);" id="toggle_btn">
                    <i class="fas fa-bars"></i>
                </a>
            </div>


            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>

            <ul class="nav user-menu">
                <li class="nav-item zoom-screen me-2">
                    <a href="#" class="nav-link header-nav-list win-maximize">
                        <img src="{{ asset('admin/assets/img/icons/header-icon-04.svg') }}" alt="">
                    </a>
                </li>

                <li class="nav-item dropdown has-arrow new-user-menus">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="{{ asset('admin/assets/img/profiles/avatar-01.jpg') }}"
                                width="31">
                            <div class="user-text">
                                <h6>{{ Auth::user()->username }}</h6>
                                <p class="text-muted mb-0">{{ Auth::user()->role }}</p>
                            </div>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="{{ asset('admin/assets/img/profiles/avatar-01.jpg') }}" alt="User Image"
                                    class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6>{{ Auth::user()->username }}</h6>
                                <p class="text-muted mb-0">{{ Auth::user()->role }}</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="profile.html">My Profile</a>
                        <a class="dropdown-item" href="inbox.html">Inbox</a>
                        <form class="dropdown-item" action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="btn btn-primary" type="submit">Log Out</button>
                        </form>

                    </div>
                </li>

            </ul>

        </div>

        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                            <span>Main Menu</span>
                        </li>



                        <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                            <a href="{{ route('admin#dashboard') }}">
                                <i class="feather-grid"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>


                        <li class="submenu {{ Request::is('admin/' . 'student' . '*') ? 'active' : '' }}">
                            <a href=""><i class="fas fa-graduation-cap"></i> <span> Students</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>

                                <li><a class="{{ Request::is('admin/student/students-list') ? 'active' : '' }}"
                                        href="{{ route('admin#studentslist') }}">Students List</a></li>
                                <li><a class="{{ Request::is('admin/student/add') ? 'active' : '' }}"
                                        href="{{ route('admin#addStudentPage') }}">Add New Student</a></li>
                                <li><a class="{{ Request::is('admin/student/grade') ? 'active' : '' }}"
                                        href="{{ route('admin#grade') }}">Grades</a></li>


                            </ul>
                        </li>

                        <li class="submenu {{ Request::is('admin/' . 'parent' . '*') ? 'active' : '' }}">
                            <a href=""><i class="fas fa-chalkboard-teacher"></i> <span> Parents</span> <span
                                    class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li>
                                    <a
                                        class="{{ Request::is('admin/parent/list') ? 'active' : '' }}"href="{{ route('admin#parentsList') }}">Parents
                                        List</a>
                                </li>

                                <li>
                                    <a
                                        class="{{ Request::is('admin/parent/add') ? 'active' : '' }}"href="{{ route('admin#addParentPage') }}">Add
                                        New Parent</a>
                                </li>

                                <li>
                                    <a class="{{ Request::is('admin/parent/blank/parents') ? 'active' : '' }}"
                                        href="{{ route('admin#noStudentParents') }}" class="">No Student</a>
                                </li>
                            </ul>
                        </li>

                        <li class="submenu {{ Request::is('admin/' . 'post' . '*') ? 'active' : '' }}">
                            <a href=""><i class="fas fa-pencil-alt"></i> <span> Post </span> <span
                                    class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li>
                                    <a
                                        class="{{ Request::is('admin/post/posts') ? 'active' : '' }}"href="{{ route('admin#posts') }}">Posts
                                        List</a>
                                </li>

                                <li>
                                    <a
                                        class="{{ Request::is('admin/posts/add') ? 'active' : '' }}"href="{{ route('admin#addPostPage') }}">Add
                                        New Post</a>
                                </li>
                            </ul>
                        </li>

                        <li class="submenu {{ Request::is('admin/' . 'manage' . '*') ? 'active' : '' }}">
                            <a href=""><i class="fas fa-circle-user"></i> <span> Admins</span> <span
                                    class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li>
                                    <a
                                        class="{{ Request::is('admin/manage/list') ? 'active' : '' }}"href="{{ route('admin#list') }}">Admin
                                        List</a>
                                </li>

                                <li>
                                    <a
                                        class="{{ Request::is('admin/manage/add/page') ? 'active' : '' }}"href="{{ route('admin#addAdminPage') }}">Add
                                        New Admin</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>




        <div class="page-wrapper">

            @yield('content')
            <footer>
                <p>Copyright © 2022 Dreamguys.</p>
            </footer>
        </div>
    </div>

    <script src="{{ asset('admin/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/feather.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/script.js') }}"></script>
    <script src="{{ asset('admin/assets/js/loading.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/toastr.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/apexchart/chart-data.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js"></script>
    <script src="{{ asset('admin/assets/js/bug-fix.js') }}"></script>
    @yield('myScript')


</body>

</html>
