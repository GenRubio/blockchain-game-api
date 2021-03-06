<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i
            class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class="nav-title">GAME MANAGER</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#">
        <i class="nav-icon la la-group"></i> Authentication
    </a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('user') }}'>
                <i class='nav-icon la la-user'></i> Users
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('admin') }}'>
                <i class="las la-user-tie"></i> Admins
            </a>
        </li>
    </ul>
</li>
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('authorizedapiagent') }}'>
        <i class="las la-unlock"></i> Authorized Api Agents
    </a>
</li>
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('character') }}'>
        <i class="las la-dragon"></i> Characters
    </a>
</li>
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('mission') }}'>
        <i class="las la-tasks"></i> Missions
    </a>
</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#">
        <i class="las la-apple-alt"></i> Objects
    </a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('item') }}'>
                <i class="las la-box"></i> Objects
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('object-type') }}'>
                <i class="las la-clipboard-list"></i> Types
            </a>
        </li>
    </ul>
</li>
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('transport') }}'>
        <i class="las la-car"></i> Transports
    </a>
</li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('setting') }}'><i class='nav-icon la la-cog'></i> <span>Settings</span></a></li>