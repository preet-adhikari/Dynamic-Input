<div class="offcanvas offcanvas-start sidebar-nav bg-dark text-white" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
            <ul class="navbar-nav">
                <li>
                    <div class="text-muted fw-bold text-uppercase px-3">
                        ADMIN PANEL
                    </div>
                </li>
                <li>
                    <a href="#" class="nav-link px-3 active">
                        <span class="me-2"><i class="bi bi-speedometer"></i></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="my-4">
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#multiCollapseExample2" role="button"
                       aria-expanded="false" aria-controls="multiCollapseExample1">
                        <span class="me-2"><i class="bi bi-stickies"></i></span>
                        <span>Bloggers</span>
                        <span class="right-icon ms-auto">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="collapse multi-collapse" id="multiCollapseExample2">
                        <ul class="navbar-nav ps-3">
                            <li>
                                <a href="#" class="nav-link px-3 text-white">View Bloggers</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-3 text-white">Add Bloggers</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="my-4">
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button"
                       aria-expanded="false" aria-controls="multiCollapseExample1">
                        <span class="me-2"><i class="bi bi-stickies"></i></span>
                        <span>Posts</span>
                        <span class="right-icon ms-auto">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                        <ul class="navbar-nav ps-3">
                            <li>
                                <a href="{{route('view.posts')}}" class="nav-link px-3 text-white">View Posts</a>
                            </li>
                            <li>
                                <a href="{{route('add.post')}}" class="nav-link px-3 text-white">Add Posts</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
