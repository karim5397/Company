     <!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->

        <aside class="left-sidebar bg-sidebar">

            <div id="sidebar" class="sidebar sidebar-with-footer">
                            <!-- Aplication Brand -->
                            <div class="app-brand">
                                <a href="/index.html">
                                <svg
                                    class="brand-icon"
                                    xmlns="http://www.w3.org/2000/svg"
                                    preserveAspectRatio="xMidYMid"
                                    width="30"
                                    height="33"
                                    viewBox="0 0 30 33"
                                >
                                    <g fill="none" fill-rule="evenodd">
                                    <path
                                        class="logo-fill-blue"
                                        fill="#7DBCFF"
                                        d="M0 4v25l8 4V0zM22 4v25l8 4V0z"
                                    />
                                    <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                                    </g>
                                </svg>
                                <span class="brand-name">Admin Dashboard</span>
                                </a>
                            </div>
                            <!-- begin sidebar scrollbar -->
                    <div class="sidebar-scrollbar">

                                <!-- sidebar menu -->
                                <ul class="nav sidebar-inner" id="sidebar-menu">



                                    <li  class="has-sub active expand" >
                                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
                                            aria-expanded="false" aria-controls="dashboard">
                                            <i class="mdi mdi-view-dashboard-outline"></i>
                                            <span class="nav-text">Home</span> <b class="caret"></b>
                                        </a>
                                        <ul  class="collapse show"  id="dashboard"
                                            data-parent="#sidebar-menu">
                                            <div class="sub-menu">



                                                <li>
                                                    <a class="sidenav-item-link" href="{{route('home.slider')}}">
                                                    <span class="nav-text">Slider</span>

                                                    </a>
                                                </li>

                                                <li>
                                                    <a class="sidenav-item-link" href="{{route('home.about')}}">
                                                    <span class="nav-text">Home About</span>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="sidenav-item-link" href="{{route('all.pics')}}">
                                                    <span class="nav-text">Home Portoflio</span>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="sidenav-item-link" href="{{route('all.brands')}}">
                                                    <span class="nav-text">Home Brand</span>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="sidenav-item-link" href="{{route('home.service')}}">
                                                    <span class="nav-text">Home Services</span>

                                                    </a>
                                                </li>
                                            </div>
                                        </ul>
                                    </li>





                                    <li  class="has-sub" >
                                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#ui-elements"
                                            aria-expanded="false" aria-controls="ui-elements">
                                            <i class="mdi mdi-email"></i>
                                            <span class="nav-text">Contacts</span> <b class="caret"></b>
                                        </a>
                                        <ul  class="collapse"  id="ui-elements" data-parent="#sidebar-menu">
                                            <div class="sub-menu">

                                                <li>
                                                    <a class="sidenav-item-link" href="{{route('contacts.index')}}">
                                                    <span class="nav-text">Contact Profile</span>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="sidenav-item-link" href="{{route('show.form')}}">
                                                    <span class="nav-text">Contact Message</span>

                                                    </a>
                                                </li>




                                            </div>
                                        </ul>
                                    </li>

                                    <li  class="has-sub" >
                                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#user"
                                            aria-expanded="false" aria-controls="user">
                                            <i class="mdi mdi-account-group"></i>
                                            <span class="nav-text">All Users</span> <b class="caret"></b>
                                        </a>
                                        <ul  class="collapse"  id="user" data-parent="#sidebar-menu">
                                            <div class="sub-menu">

                                                <li>
                                                    <a class="sidenav-item-link" href="{{route('users.index')}}">
                                                    <span class="nav-text">Show Users</span>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="sidenav-item-link" href="{{route('users.create')}}">
                                                    <span class="nav-text">Create User</span>

                                                    </a>
                                                </li>




                                            </div>
                                        </ul>
                                    </li>
                            </ul>

                    </div>

                    <hr class="separator" />


            </div>
        </aside>
