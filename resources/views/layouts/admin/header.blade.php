<div class="page-header">
    <nav class="navbar navbar-default">
        <!--================================-->
        <!-- Brand and Logo Start -->
        <!--================================-->
        <div class="navbar-header">
            <div class="navbar-brand">
                <ul class="list-inline">
                    <!-- Mobile Toggle and Logo -->
                    <li class="list-inline-item"><a class="hidden-md hidden-lg" href="#" id="sidebar-toggle-button"><i
                                data-feather="menu" class="wd-20"></i></a></li>
                    <!-- PC Toggle and Logo -->
                    <li class="list-inline-item"><a class=" hidden-xs hidden-sm" href="#"
                            id="collapsed-sidebar-toggle-button"><i data-feather="menu" class="wd-20"></i></a></li>
                </ul>
            </div>
        </div>
        <!--/ Brand and Logo End -->
        <!--================================-->
        <!-- Header Right Start -->
        <!--================================-->

        <div class="header-right pull-right">
            <ul class="list-inline justify-content-end">
                <!--================================-->
                <!-- Notifications Dropdown Start -->
                <!--================================-->
                <li class="list-inline-item dropdown hidden-xs">
                    <a class=" notification-icon" href="" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i data-feather="bell" class="wd-20"></i>
                        <span class="notification-count wave in"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- Top Notifications Area -->
                        <div class="top-notifications-area">
                            <!-- Heading -->
                            <div class="notifications-heading">
                                <div class="heading-title">
                                    <h6>Notifications</h6>
                                </div>
                                <span>5+ New Notifications</span>
                            </div>
                            <div class="notifications-box" id="notificationsBox">
                                <a class="dropdown-item list-group-item" href="">
                                    <div class="d-flex justify-content-between">
                                        <div
                                            class="wd-35 ht-35 mg-r-10 d-flex align-items-center justify-content-center rounded-circle card-icon-success">
                                            <i data-feather="smile" class="wd-20"></i>
                                        </div>
                                    </div>
                                    <div class="wd-100p">
                                        <div class="d-flex justify-content-between">
                                            <h3 class="tx-13 tx-semibold mb-0">Your order is placed</h3>
                                            <span class="small tx-gray-500 ft-right">Mar 15, 12:32pm</span>
                                        </div>
                                        <div class="tx-gray-700">System reboot has been successfully completed</div>
                                    </div>
                                </a>
                            </div>
                            <div class="notifications-footer">
                                <a href="">View all Notifications</a>
                            </div>
                        </div>
                    </div>
                </li>
                <!--/ Notifications Dropdown End -->
                <!--================================-->
                <!-- Profile Dropdown Start -->
                <!--================================-->
                <li class="list-inline-item dropdown">
                    <a href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('') }}images/users-face/1.png" class="img-fluid wd-30 ht-30 rounded-circle"
                            alt="">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-profile">
                        <div class="user-profile-area">
                            <div class="user-profile-heading">
                                <div class="profile-thumbnail">
                                    <img src="{{ asset('') }}images/users-face/1.png"
                                        class="img-fluid wd-35 ht-35 rounded-circle" alt="">
                                </div>
                                <div class="profile-text">
                                    <h6>Ruhul Hasan</h6>
                                    <span>email@example.com</span>
                                </div>
                            </div>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i data-feather="power" class="wd-16 mr-2"></i>Sign-out
                                </button>
                            </form>
                        </div>
                    </div>
                </li>
                <!-- Profile Dropdown End -->
            </ul>
        </div>


        <!--/ Header Right End -->
    </nav>
</div>
