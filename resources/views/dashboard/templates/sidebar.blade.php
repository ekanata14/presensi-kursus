<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">
            <i class="fa fas fa-home"></i>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/students*') ? 'active' : '' }}" href="/dashboard/students">
            <i class="fa fas fa-graduation-cap"></i>
            Students
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/course*') ? 'active' : '' }}" href="/dashboard/course">
            <i class="fa fas fa-book"></i>
            Course
          </a>
        </li>
      </ul>
  </nav>