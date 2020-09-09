  <div class="page-sidebar">
      <div class="logo">
          <a class="logo-img" href="index.html" aria-label="Home">
              <img class="desktop-logo" src="{{ asset('') }}images/logo.png" alt="">
              <img class="small-logo" src="{{ asset('') }}images/small-logo.png" alt="">
          </a>
          <a id="sidebar-toggle-button-close"><i class="wd-20" data-feather="x"></i> </a>
      </div>
      <!--================================-->
      <!-- Sidebar Menu Start -->
      <!--================================-->


      {{-- =================================== --}}
      {{-- Admin Sidebar Start --}}
      {{-- =================================== --}}
      <div class="page-sidebar-inner">
          <div class="page-sidebar-menu">
              <ul class="accordion-menu">
                  <li class="mg-l-20-force mg-t-25-force menu-navigation">Admin</li>
                  <li class="active">
                      <a href="{{ route('admin.dashboard') }}">
                          <i data-feather="home"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li>
                      <a href=""><i data-feather="lock"></i>
                          <span>Roles & Permissions</span><i class="accordion-icon fa fa-angle-left"></i>
                      </a>
                      <ul class="sub-menu" style="display: block;">
                          <li><a href="{{ route('admin.roles.index') }}">Roles</a></li>
                          <li><a href="{{ route('admin.permissions.index') }}">Permission</a></li>
                      </ul>
                  </li>
                  <li>
                      <a href=""><i data-feather="shield"></i>
                          <span>Authorization</span><i class="accordion-icon fa fa-angle-left"></i>
                      </a>
                      <ul class="sub-menu" style="display: block;">
                          <li><a href="{{ route('admin.users.index') }}">Users</a></li>
                      </ul>
                  </li>
              </ul>
          </div>
      </div>
      {{-- =================================== --}}
      {{-- Admin Sidebar End --}}
      {{-- =================================== --}}


      <!--/ Sidebar Menu End -->
      <!--================================-->
      <!-- Sidebar Footer Start -->
      <!--================================-->
      <div class="sidebar-footer">
          <a class="pull-left" href="pages-profile.html" data-toggle="tooltip" data-placement="top"
              data-original-title="Profile">
              <i data-feather="user" class="wd-16"></i></a>
          <a class="pull-left " href="mailbox.html" data-toggle="tooltip" data-placement="top"
              data-original-title="Mailbox">
              <i data-feather="mail" class="wd-16"></i></a>
          <a class="pull-left" href="aut-unlock.html" data-toggle="tooltip" data-placement="top"
              data-original-title="Lockscreen">
              <i data-feather="lock" class="wd-16"></i></a>
          <a class="pull-left" href="aut-signin.html" data-toggle="tooltip" data-placement="top"
              data-original-title="Sing Out">
              <i data-feather="log-out" class="wd-16"></i></a>
      </div>
      <!--/ Sidebar Footer End -->
  </div>
