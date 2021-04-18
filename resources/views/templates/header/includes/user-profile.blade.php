<li>
    <div class="dropdown drp-user">
        <a href="#!" class="dropdown-toggle" data-toggle="dropdown">
            <img src="assets/images/user/avatar-1.jpg" class="img-radius wid-40" alt="User-Profile-Image">
        </a>
        <div class="dropdown-menu dropdown-menu-right profile-notification">
            <div class="pro-head">
                <img src="assets/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
                <span>{{Auth::user()->name}}</span>
                <a class="dud-logout" href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="feather icon-log-out"></i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>

        </div>
    </div>
</li>
