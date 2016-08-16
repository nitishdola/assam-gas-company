<!-- Navigation -->
<div class="navbar navbar-fixed-top scroll-hide">
  <div class="container-fluid top-bar">
    <div class="pull-right">
      <ul class="nav navbar-nav pull-right">
        <li class="dropdown user hidden-xs"><a data-toggle="dropdown" class="dropdown-toggle" href="#">
           {{ Auth::guard('admin')->user()->name}}<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">
              <i class="icon-user"></i>My Account</a>
            </li>
            <li><a href="#">
              <i class="icon-gear"></i>Account Settings</a>
            </li>
            <li><a href="{{ route('admin.logout') }}">
              <i class="icon-signout"></i>Logout</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <a class="logo" href="{{ route('admin.dashboard') }}">Assam Gas Company</a>
  </div>
  <div class="container-fluid main-nav clearfix">
    <div class="nav-collapse">
      <ul class="nav">
        <li>
          <a class="current" href="{{ route('admin.dashboard') }}"><span aria-hidden="true" class="se7en-home"></span>Dashboard</a>
        </li>

        <li class="dropdown"><a data-toggle="dropdown" href="#">
          <span aria-hidden="true" class="se7en-tables"></span>Department and Section<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li>
              <a href="{{ route('department.create') }}">Add Department</a>
            </li>
            <li>
              <a href="{{ route('department.index') }}">View Departments</a>
            </li>
            <li>
              <a href="{{ route('section.create') }}">Add Section</a>
            </li>
            <li>
              <a href="{{ route('section.index') }}">View Sections</a>
            </li>
          </ul>
        </li>

        <li class="dropdown"><a data-toggle="dropdown" href="#">
          <span aria-hidden="true" class="se7en-tables"></span>Item Group &amp; Sub-group<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li>
              <a href="{{ route('item_group.create') }}">Add Item Group</a>
            </li>
            <li>
              <a href="{{ route('item_group.index') }}">View Item Group</a>
            </li>
            <li>
              <a href="{{ route('item_sub_group.create') }}">Add Item Sub Group</a>
            </li>
            <li>
              <a href="{{ route('item_sub_group.index') }}">View All Item Sub Group</a>
            </li>
          </ul>
        </li>

        <li class="dropdown"><a data-toggle="dropdown" href="#">
          <span aria-hidden="true" class="se7en-star"></span>Features<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li>
              <a href="buttons.html">Buttons</a>
            </li>
            <li>
              <a href="fontawesome.html">Font Awesome Icons</a>
            </li>
            <li><a href="glyphicons.html">
              <span class="notifications label label-warning">New</span>
              <p>
                Glyphicons
              </p></a>
              
            </li>
            <li>
              <a href="components.html">Components</a>
            </li>
            <li>
              <a href="widgets.html">Widgets</a>
            </li>
            <li>
              <a href="typo.html">Typography</a>
            </li>
            <li>
              <a href="grid.html">Grid Layout</a>
            </li>
          </ul>
        </li>
        
        
        <li><a href="charts.html">
          <span aria-hidden="true" class="se7en-charts"></span>Charts</a>
        </li>
        <li class="dropdown"><a data-toggle="dropdown" href="#">
          <span aria-hidden="true" class="se7en-pages"></span>Pages<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="chat.html">
              <span class="notifications label label-warning">New</span>
              <p>
                Chat
              </p></a>
              
            </li>
            <li>
              <a href="calendar.html">Calendar</a>
            </li>
            <li><a href="timeline.html">
              <span class="notifications label label-warning">New</span>
              <p>
                Timeline
              </p></a>
              
            </li>
            <li><a href="login1.html">
              <span class="notifications label label-warning">New</span>
              <p>
                Login 1
              </p></a>
              
            </li>
            <li>
              <a href="login2.html">Login 2</a>
            </li>
            <li><a href="signup1.html">
              <span class="notifications label label-warning">New</span>
              <p>
                Sign Up 1
              </p></a>
              
            </li>
            <li>
              <a href="signup2.html">Sign Up 2</a>
            </li>
            <li><a href="invoice.html">
              <span class="notifications label label-warning">New</span>
              <p>
                Invoice
              </p></a>
              
            </li>
            <li><a href="faq.html">
              <span class="notifications label label-warning">New</span>
              <p>
                FAQ
              </p></a>
              
            </li>
            <li>
              <a href="filters.html">Filter Results</a>
            </li>
            <li>
              <a href="404-page.html">404 Page</a>
            </li>
          </ul>
        </li>
        <li><a href="gallery.html">
          <span aria-hidden="true" class="se7en-gallery"></span>Gallery</a>
        </li>
      </ul>
    </div>
  </div>
</div>