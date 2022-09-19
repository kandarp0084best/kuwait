<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
          <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
        </li>
         <li class="{{ request()->is('admin/alumni') ? 'active' : '' }}">
          <a href="{{route('alumni.index')}}"><i class="fa fa-dashboard"></i> <span>Alumni</span></a>
        </li>
         <li class="{{ request()->is('admin/employer') ? 'active' : '' }}">
          <a href="{{route('employer.index')}}"><i class="fa fa-dashboard"></i> <span>employer</span></a>
        </li>
        
        <li class="header">Exit</li>
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        <i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>