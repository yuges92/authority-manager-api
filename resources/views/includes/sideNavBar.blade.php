<aside class="left-sidebar" style="transition: 0.2s;">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav" class="in">
        <li class=""><a href="/" aria-expanded="false"><i class="fas fa-tachometer-alt"></i><span class="hide-menu"> Dashboard</span></a></li>
        <li class="{{ Request::is('authorities*') ? 'active' : '' }}">
          <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fas fa-users"></i><span class="hide-menu"> API Accounts </span></a>
          <ul aria-expanded="false" class="collapse">
            <li><a href="/authorities"><i class="fas fa-user"></i> View All</a></li>
            <li><a href="/authorities/create"><i class="fas fa-plus"></i> New API Account</a></li>
          </ul>
        </li>

        <li class="{{ Request::is('packages*') ? 'active' : '' }}"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fas fa-cubes"></i><span class="hide-menu"> Sara packages</span></a>
          <ul aria-expanded="false" class="collapse">
            <li><a href="/packages"><i class="fas fa-cubes"></i> View All</a></li>
            <li><a href="/packages/create"><i class="fas fa-plus"></i> New Package</a></li>
          </ul>
        </li>

        <li class="{{ Request::is('mainTopics*') ? 'active' : '' }}"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fas fa-cubes"></i><span class="hide-menu"> Main Topics</span></a>
          <ul aria-expanded="false" class="collapse">
            <li><a href="/mainTopics"><i class="fas fa-cubes"></i> View All</a></li>
            <li><a href="/mainTopics/create"><i class="fas fa-plus"></i> New Main Topic</a></li>
          </ul>
        </li>
        @if (Auth::user()->isDeveloper())
        <li class="{{ Request::is('users*') ? 'active' : '' }}"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fas fa-user"></i><span class="hide-menu"> User Accounts</span></a>
          <ul aria-expanded="false" class="collapse">
            <li><a href="/users"><i class="fas fa-users"></i> View All</a></li>
            <li><a href="/users/create"><i class="fas fa-plus"></i> New Account</a></li>
          </ul>
        </li>
        @endif
      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
  <!-- Bottom points-->
  <div class="sidebar-footer">
    <a href="" class="link" data-toggle="tooltip" title="Settings"><i class="fas fa-cogs"></i></a>
    <a href="" class="link" data-toggle="tooltip" title="Email"><i class="fas fa-envelope"></i></a>
    <a href="/logout" class="link" data-toggle="tooltip" title="Logout"><i class="fas fa-power-off"></i></a>
  </div>
  <!-- End Bottom points-->
</aside>
