<nav class="navbar navbar-vertical navbar-expand-lg" style="display:block;">
    <script>
        var navbarStyle = window.config.config.phoenixNavbarStyle;
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('body').classList.add(`navbar-${navbarStyle}`);
        }
    </script>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">

                <!-- Dashboard Link -->
                <li class="nav-item">
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 @if (Route::is('admin.dashboard*')) active @endif"
                           href="{{ route('admin.dashboard') }}" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><span data-feather="pie-chart"></span></span>
                                <span class="nav-link-text-wrapper"><span class="nav-link-text">Dashboard</span></span>
                            </div>
                        </a>
                    </div>
                </li>

                <!-- Total Payments Count Link -->
                <li class="nav-item">
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 @if (Route::is('admin.payments.total*')) active @endif"
                           href="{{ route('admin.payments.total') }}" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><span data-feather="dollar-sign"></span></span>
                                <span class="nav-link-text-wrapper"><span class="nav-link-text">Total Payments Count</span></span>
                            </div>
                        </a>
                    </div>
                </li>

                <!-- Paid User Count Link -->
                <li class="nav-item">
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 @if (Route::is('admin.payments.users*')) active @endif"
                           href="{{ route('admin.payments.users') }}" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><span data-feather="users"></span></span>
                                <span class="nav-link-text-wrapper"><span class="nav-link-text">Paid User Count</span></span>
                            </div>
                        </a>
                    </div>
                </li>
                
                <!-- Users -->
                <li class="nav-item">
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 @if (Route::is('admin.users.*')) active @endif"
                           href="{{ route('admin.users.index') }}" role="button">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><span data-feather="users"></span></span>
                                <span class="nav-link-text-wrapper">
                                    <span class="nav-link-text">Users</span>
                                </span>
                            </div>
                        </a>
                    </div>
                </li>

                <!-- Services -->
                <li class="nav-item">
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 @if (Route::is('admin.services.*')) active @endif"
                           href="{{ route('admin.services.index') }}" role="button">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><span data-feather="briefcase"></span></span>
                                <span class="nav-link-text-wrapper">
                                    <span class="nav-link-text">Services</span>
                                </span>
                            </div>
                        </a>
                    </div>
                </li>
                    <!-- Domains -->
                <li class="nav-item">
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 @if (Route::is('admin.domains.*')) active @endif"
                           href="{{ route('admin.domains.index') }}" role="button">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><span data-feather="globe"></span></span>
                                <span class="nav-link-text-wrapper">
                                    <span class="nav-link-text">Domains</span>
                                </span>
                            </div>
                        </a>
                    </div>
                </li>

                <li class="nav-item">
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 @if (Route::is('admin.faqs.*')) active @endif"
                           href="{{ route('admin.faqs.index') }}" role="button">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><span data-feather="help-circle"></span></span>
                                <span class="nav-link-text-wrapper">
                                    <span class="nav-link-text">Faqs</span>
                                </span>
                            </div>
                        </a>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</nav>
