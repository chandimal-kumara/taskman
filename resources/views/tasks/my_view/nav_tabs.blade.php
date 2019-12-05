
<!-- Nav tabs -->
<ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx">
    <li class="nav-item">
        <a href="{{ route('task.assigned_tasks') }}" class="@if ($tabName == 'assigned') active @endif"><span>Assigned</span></a>
    </li>
    <li class="nav-item">
        <a href="{{ route('task.active_tasks') }}" class="@if ($tabName == 'active') active @endif"><span>Working in Progress Tasks</span></a>
    </li>
    <li class="nav-item">
        <a href="{{ route('task.onhold_tasks') }}" class="@if ($tabName == 'onhold') active @endif"><span>Onhold Tasks</span></a>
    </li>
    <li class="nav-item">
        <a href="{{ route('task.cancelled_tasks') }}" class="@if ($tabName == 'cancelled') active @endif"><span>Cancelled Tasks</span></a>
    </li>
    <li class="nav-item">
        <a href="{{ route('task.completed_tasks') }}" class="@if ($tabName == 'completed') active @endif"><span>Completed Tasks</span></a>
    </li>
</ul>
