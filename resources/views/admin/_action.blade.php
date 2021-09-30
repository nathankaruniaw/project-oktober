<ul class="icons-list">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="icon-menu9"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-right">
            @if (isset($edit))
                {{-- <li><a href="#" onclick="edit('{!! $edit !!}')"><i class="icon-printer2"></i> Edit</a></li> --}}
                <li><a data-id="{!! $edit !!}" class="edit-button"><i class="icon-pencil6"></i> Edit</a></li>
            @endif

            @if (isset($delete))
                <li><a data-link="{!! $delete !!}" class="delete-button"><i class="icon-x"></i>Delete</a></li>
            @endif
        </ul>
    </li>
</ul>
