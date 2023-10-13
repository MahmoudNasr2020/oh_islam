<!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
<li class="nav-header"></li>
<li class="nav-item">
  <a href="{{ aurl('') }}" class="nav-link {{ active_link(null,'active') }}">
    <i class="nav-icon fas fa-home"></i>
    <p>
      {{ trans('admin.dashboard') }}
    </p>
  </a>
</li>
<!--categories_start_route-->
@if(admin()->user()->role("categories_show"))
    <li class="nav-item {{active_link('categories','menu-open')}} ">
        <a href="#" class="nav-link {{active_sidebar('categories')['permanent']}}">
            <i class="nav-icon fas fa-th-list"></i>
            <p>
                {{trans('admin.categories')}}
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{aurl('categories')}}" class="nav-link  {{active_sidebar('categories')['first']}}">
                    <i class="fas fa-th-list nav-icon"></i>
                    <p>{{trans('admin.categories')}} </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ aurl('categories/create') }}" class="nav-link {{active_sidebar('categories','create')['second']}}">
                    <i class="fas fa-plus nav-icon"></i>
                    <p>{{trans('admin.create')}} </p>
                </a>
            </li>
        </ul>
    </li>
@endif
<!--categories_end_route-->

<!--azkars_start_route-->
@if(admin()->user()->role("azkars_show"))
    <li class="nav-item {{active_link('azkars','menu-open')}} ">
        <a href="#" class="nav-link {{active_sidebar('azkars')['permanent']}}">
            <i class="nav-icon fas fa-kaaba"></i>
            <p>
                {{trans('admin.azkars')}}
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{aurl('azkars')}}" class="nav-link  {{active_sidebar('azkars')['first']}}">
                    <i class="fas fa-kaaba nav-icon"></i>
                    <p>{{trans('admin.azkars')}} </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ aurl('azkars/create') }}" class="nav-link {{active_sidebar('azkars')['second']}}">
                    <i class="fas fa-plus nav-icon"></i>
                    <p>{{trans('admin.create')}} </p>
                </a>
            </li>
        </ul>
    </li>
@endif
<!--azkars_end_route-->

<!--werds_start_route-->
@if(admin()->user()->role("werds_show"))
    <li class="nav-item {{active_link('werds','menu-open')}} ">
        <a href="#" class="nav-link {{active_sidebar('werds')['permanent']}}">
            <i class="nav-icon fas fa-quran"></i>
            <p>
                {{trans('admin.werds')}}
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{aurl('werds')}}" class="nav-link  {{active_sidebar('werds')['first']}}">
                    <i class="fas fa-quran nav-icon"></i>
                    <p>{{trans('admin.werds')}} </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ aurl('werds/create') }}" class="nav-link {{active_sidebar('werds')['second']}}">
                    <i class="fas fa-plus nav-icon"></i>
                    <p>{{trans('admin.create')}} </p>
                </a>
            </li>
        </ul>
    </li>
@endif
<!--werds_end_route-->

<!--videos_start_route-->
@if(admin()->user()->role("videos_show"))
    <li class="nav-item {{active_link('videos','menu-open')}} ">
        <a href="#" class="nav-link {{active_sidebar('videos')['permanent']}}">
            <i class="nav-icon fas fa-video"></i>
            <p>
                {{trans('admin.videos')}}
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{aurl('videos')}}" class="nav-link  {{active_sidebar('videos')['first']}}">
                    <i class="fas fa-video nav-icon"></i>
                    <p>{{trans('admin.videos')}} </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ aurl('videos/create') }}" class="nav-link {{active_sidebar('videos')['second']}}">
                    <i class="fas fa-plus nav-icon"></i>
                    <p>{{trans('admin.create')}} </p>
                </a>
            </li>
        </ul>
    </li>
@endif
<!--videos_end_route-->

@if(admin()->user()->role('settings_show'))
<li class="nav-item">
  <a href="{{ aurl('settings') }}" class="nav-link  {{ active_link('settings','active') }}">
    <i class="nav-icon fas fa-cogs"></i>
    <p>
      {{ trans('admin.settings') }}
    </p>
  </a>
</li>
@endif
@if(admin()->user()->role("admins_show"))
<li class="nav-item {{ active_link('admins','menu-open') }}">
  <a href="#" class="nav-link  {{active_sidebar('admins')['permanent']}}">
    <i class="nav-icon fas fa-users"></i>
    <p>
      {{trans('admin.admins')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('admins')}}" class="nav-link {{active_sidebar('admins')['first']}}">
        <i class="fas fa-users nav-icon"></i>
        <p>{{trans('admin.admins')}}</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('admins/create') }}" class="nav-link {{active_sidebar('admins')['second']}}">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}}</p>
      </a>
    </li>
  </ul>
</li>
@endif
@if(admin()->user()->role("admingroups_show"))
<li class="nav-item {{ active_link('admingroups','menu-open') }}">
  <a href="#" class="nav-link  {{active_sidebar('admingroups')['permanent']}}">
    <i class="nav-icon fas fa-users"></i>
    <p>
      {{trans('admin.admingroups')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('admingroups')}}" class="nav-link {{active_sidebar('admingroups')['first']}}">
        <i class="fas fa-users nav-icon"></i>
        <p>{{trans('admin.admingroups')}}</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('admingroups/create') }}" class="nav-link {{active_sidebar('admingroups')['second']}}">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}}</p>
      </a>
    </li>
  </ul>
</li>
@endif
