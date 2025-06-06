<div class="sidebar">
    <div class="scrollbar-inner sidebar-wrapper">
        <div class="user">
            <div class="photo">
                
            </div>
            <div class="info">
                <a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                    <span>
                        {{ Auth::user()->name }}
                        <span class="user-level">
                            {{ Auth::user()->email }}
                            </span>
                        <span class="caret"></span>
                    </span>
                </a>
                <div class="clearfix"></div>

             
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item">
                <a href="{{ url('admin/view_properties')}}">
                    <i class="la "></i>
                    <p>properties</p>
                    <span class="badge badge-count"></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/show-property')}}">
                    <i class=""></i>
                    <p>List properties</p>
                    <span class="badge badge-count"></span>
                </a>
            </li>
      @if(Auth::user()->role == 1)
            <li class="nav-item">
                <a href="{{ url('create_Property')}}">
                    <i class=""></i>
                    <p>create Property</p>
                    <span class="badge badge-count"></span>
                </a>
            </li>
        @endif
        </ul>
    </div>
</div>