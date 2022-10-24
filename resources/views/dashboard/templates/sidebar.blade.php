<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/students') ? 'active' : '' }}" href="/dashboard/students">
            <span data-feather="file" class="align-text-bottom"></span>
            Students
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/course') ? 'active' : '' }}" href="/dashboard/course">
            <span data-feather="shopping-cart" class="align-text-bottom"></span>
            Course
          </a>
        </li>
      </ul>
  </nav>