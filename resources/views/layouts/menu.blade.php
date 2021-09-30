<!-- Main -->
    {{-- <li class="navigation-header"><span>Main</span>
        <i class="icon-menu" title="Main pages"></i>
    </li> --}}

{{-- Dashboard --}}
<li>
    <a href="/admin">
        <i class="icon-home2"></i><span>Dashboard</span>
    </a>
</li>

{{-- Page --}}
<li>
    <a href="#"><i class="icon-crown"></i> <span>Page Controller</span></a>
    <ul>
        <li><a href="{{ route('page') }}"><i class="icon-crown"></i>Page</a></li>
        <li><a href="{{ route('section') }}"><i class="icon-crown"></i>Section</a></li>
    </ul>
</li>

{{-- Users Management --}}
<li>
    <a href="/admin/user-management">
        <i class="icon-crown"></i>
        <span>Users Management</span>
    </a>
</li>
