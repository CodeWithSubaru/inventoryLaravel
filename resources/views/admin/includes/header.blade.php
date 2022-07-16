<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-light">
                    <span class="logo-lg d-flex justify-content-evenly mt-4">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="30" fill="white" viewBox="0 0 450.001 450.001" style="enable-background:new 0 0 450.001 450.001;" xml:space="preserve">
                            <g>
                                <path d="M448.554,177.103c0,0-42.15-56.307-42.175-56.339c-0.011-0.015-0.93-1.647-3.762-2.548L226.973,68.62
		c-1.291-0.364-2.655-0.364-3.946,0L47.383,118.216c0,0-2.398,0.692-3.839,2.637c-0.577,0.779-42.097,56.25-42.097,56.25
		c-1.392,1.862-1.81,4.278-1.122,6.499c0.689,2.221,2.4,3.978,4.601,4.725l37.171,12.615v100.874c0,2.938,1.771,5.585,4.487,6.707
		l175.645,72.581c0.522,0.216,1.184,0.551,2.771,0.551s2.771-0.551,2.771-0.551l175.646-72.581c2.716-1.122,4.486-3.77,4.486-6.707
		V200.94l37.171-12.615c2.201-0.747,3.912-2.505,4.601-4.725C450.363,181.381,449.945,178.965,448.554,177.103z M19.062,177.794
		l33.138-44.28l13.403,3.692l75.431,20.778l71.335,19.652l-41.837,51.565L19.062,177.794z M217.743,363.542l-161.13-66.581v-91.094
		l114.04,38.708c0.764,0.261,1.551,0.384,2.332,0.384c2.145,0,4.231-0.953,5.635-2.686l39.124-48.219L217.743,363.542
		L217.743,363.542z M225,166.062L76.37,125.116L225,83.146l148.63,41.97L225,166.062z M393.388,296.961l-161.131,66.581V194.056
		l39.124,48.219c1.404,1.731,3.49,2.686,5.635,2.686c0.781,0,1.568-0.123,2.333-0.384l114.039-38.708V296.961L393.388,296.961z
		 M279.469,229.203l-41.837-51.565l160.169-44.124l33.139,44.28L279.469,229.203z" />
                            </g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                        </svg>
                        <h4 class="text-white col-md-6 col-sm-2 logo-lg d-sm-none">Organizatory</h4>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="ri-search-line"></span>
                </div>
            </form>
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ri-search-line"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="mb-3 m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ url((!empty(Auth::user()->profile_image)) ? 'uploads/admin_img/' . Auth::user()->profile_image : 'uploads/admin_img/no_image.jpg') }}" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1"> {{ Auth::user()->name }} </span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                    <a class="dropdown-item" href="{{ route('admin.change-password') }}"><i class="ri-wallet-2-line align-middle me-1"></i> Change Password</a>
                    <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end mt-1">11</span><i class="ri-settings-2-line align-middle me-1"></i> Settings</a>
                    <a class="dropdown-item" href="#"><i class="ri-lock-unlock-line align-middle me-1"></i> Lock screen</a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}" class="dropdown-item text-danger" style="cursor: pointer;">

                        @csrf

                        <i class="ri-shut-down-line align-middle me-1 text-danger"></i>
                        <a :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </a>
                    </form>
                    </a>
                </div>
            </div>

        </div>
    </div>
</header>