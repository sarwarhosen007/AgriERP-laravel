<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
        <li class="{{ Request::is('admin/farmer') ? 'active' : '' }}">

          <a href="{{ route('farmer.index') }}">
            <i class="fa fa-users"></i> <span>SHOW ALL FARMERS</span>
          </a>

        </li>
        <li class="{{ Request::is('admin/crop') ? 'active' : '' }}">
          <a href="{{ route('crop.index') }}">
            
            <i class="fa fa-pie-chart"></i>
            <span>CROP</span>
            </span>
          </a>
        </li>

        <li class="{{ Request::is('admin/region') ? 'active' : '' }}">

          <a href="{{ route('region.index') }}">
            <i class="fa fa-users"></i> <span>REGION</span>
          </a>

        </li>
        <li class="{{ Request::is('admin/fertilizer') ? 'active' : '' }}">

          <a href="{{ route('fertilizer.index') }}">
            <i class="fa fa-users"></i> <span>FERTILIZER</span>
          </a>

        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>