<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span class="badge badge-pill badge-info float-right">03</span>
                        <span>Dashboard</span>
                    </a>
                </li>
                @if(Auth::check() && Auth::user()->role == 'admin')
                    <li class="menu-title">Admin Module</li>

                    <li>
                        <a href="javascript:void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-layout"></i>
                            <span>User Module</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('create-user') }}">Create User</a></li>
                            <li><a href="{{ route('manage-user') }}">Manage User</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-layout"></i>
                            <span>Role</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('create-role') }}">Create Role</a></li>
                            <li><a href="">Manage Role</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('manage-enroll') }}" class="waves-effect">
                            <i class="bx bx-home-circle"></i><span class="badge badge-pill badge-info float-right">03</span>
                            <span>Manage Enroll</span>
                        </a>
                    </li>
                @endif

                @if(Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->role == 'teacher'))
                    <li class="menu-title">Teacher Module</li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-layout"></i>
                            <span>Teacher</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @if(Auth::user()->role == 'teacher')
                                <li><a href="{{ route('create-profile') }}">Create Profile</a></li>
                            @endif
                            @if(Auth::user()->role == 'admin')
                                <li><a href="{{ route('manage-profile') }}">Manage Profile</a></li>
                            @endif
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-layout"></i>
                            <span>Subject</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @if(Auth::user()->role == 'teacher')
                                <li><a href="{{ route('create-subject') }}">Create Subject</a></li>
                            @endif
                            <li><a href="{{ route('manage-subject') }}">Manage Subject</a></li>
                        </ul>
                    </li>
                @endif

                @if(Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->role == 'user'))
                    <li class="menu-title">Student Module</li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-store"></i>
                            <span>Student Info</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @if(Auth::user()->role == 'user')
                                <li><a href="{{ route('create-student-info') }}">Add Student Info</a></li>
                            @endif
                            @if(Auth::user()->role == 'admin')
                                <li><a href="{{ route('manage-student-info') }}">Manage Student Info</a></li>
                            @endif
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
