<div class="sidebar">
    <div class="scrollbar-inner sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{ asset('dashboard/assets/img/profile.jpg') }}">
            </div>
            <div class="info">
                <a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                    <span>
                        {{ Auth::user()->name }}
                        <span class="user-level">{{ Auth::user()->email }}</span>
                        <span class="caret"></span>
                    </span>
                </a>
                <div class="clearfix"></div>

                <div class="collapse in" id="collapseExample" aria-expanded="true" style="">
                    <ul class="nav">
                        <li>
                            <a href="#profile">
                                <span class="link-collapse">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#edit">
                                <span class="link-collapse">Edit Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#settings">
                                <span class="link-collapse">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route('manager.show') }}">
                    <i class="la la-dashboard"></i>
                    <p>show properties</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('manager.add') }}">
                    <i class="la la-dashboard"></i>
                    <p>add properties</p>
                </a>
            </li>
        </ul>
    </div>
</div>