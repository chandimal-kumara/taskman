<!-- Nav tabs -->  
<ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx">
    <li class="nav-item">
        <a href="{{ route('task.new_tasks') }}" class="@if ($tabName == 'new') active @endif"><span>New Tasks</span></a>
    </li>
    <li class="nav-item">
        <a href="{{ route('task.dispatched_tasks') }}" class="@if ($tabName == 'assigned') active @endif"><span>Dispatched Tasks</span></a>
    </li>
</ul>