<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="mdi mdi-bell noti-icon"></i>
                <span class="badge badge-success rounded-circle noti-icon-badge">4</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="font-16 m-0">
                                <span class="float-right">
                                    <a href="" class="text-dark">
                                        <small>Clear All</small>
                                    </a>
                                </span>Notification
                    </h5>
                </div>

                <div class="slimscroll noti-scroll">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-success">
                            <i class="mdi mdi-settings-outline"></i>
                        </div>
                        <p class="notify-details">New settings
                            <small class="text-muted">There are new settings available</small>
                        </p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-info">
                            <i class="mdi mdi-bell-outline"></i>
                        </div>
                        <p class="notify-details">Updates
                            <small class="text-muted">There are 2 new updates available</small>
                        </p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-danger">
                            <i class="mdi mdi-account-plus"></i>
                        </div>
                        <p class="notify-details">New user
                            <small class="text-muted">You have 10 unread messages</small>
                        </p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-info">
                            <i class="mdi mdi-comment-account-outline"></i>
                        </div>
                        <p class="notify-details">Adham Ali commented on Admin
                            <small class="text-muted">4 days ago</small>
                        </p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-secondary">
                            <i class="mdi mdi-heart"></i>
                        </div>
                        <p class="notify-details">Mickel Adel liked
                            <b>Admin</b>
                            <small class="text-muted">13 days ago</small>
                        </p>
                    </a>
                </div>

                <!-- All-->
                <a href="javascript:void(0);" class="dropdown-item text-center text-secondary notify-item notify-all">
                    See all Notification
                    <i class="fi-arrow-right"></i>
                </a>

            </div>
        </li>

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="mdi mdi-email noti-icon"></i>
                <span class="badge badge-danger rounded-circle noti-icon-badge {{auth()->user()->messagesAsReceiver->where('state',0)->count() == 0 ? 'd-none' : ''}}" id="navBarBadgeMessages">{{auth()->user()->messages->where('state',0)->count()}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-lg">
                <div class="slimscroll noti-scroll">

                    <div class="inbox-widget" id="parentForUserChatInNavbar">
                        @forelse(UsersWhichHasMessagesWithAuthenticatedUser() as $user)
                            <a class="userChat" href="/Chat#Chat{{$user['id']}}" id="userChatInNavbar-{{$user['id']}}">
                                <div class="inbox-item" >
                                    <div class="inbox-item-img"><img src="{{$user['image']}}" class="rounded-circle" alt=""></div>
                                    <p class="inbox-item-author">{{$user['name']}}</p>
                                    <p class="inbox-item-text text-truncate">{{$user['lastMessage']}}</p>
                                </div>
                            </a>
                        @empty
                            <a href="/Chat" class="no-messages">
                                <div class="inbox-item">
                                    <p class="text-muted">You don't have any conversation yet!</p>
                                </div>
                                Start New Chat
                            </a>
                        @endforelse

                    </div>

                </div>
                <!-- All-->
                <a href="{{route('chat.index')}}" class="dropdown-item text-center text-secondary notify-item notify-all">
                    See all Messages
                    <i class="fi-arrow-right"></i>
                </a>

            </div>
        </li>

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="{{auth()->user()->image}}" alt="user-image" class="rounded-circle">
                <span class="d-none d-sm-inline-block ml-1">{{auth()->user()->name}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-outline"></i>
                    <span>Profile</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-settings-outline"></i>
                    <span>Settings</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-lock-outline"></i>
                    <span>Lock Screen</span>
                </a>

                <div class="dropdown-divider"></div>

                <!-- item-->
                <a  onclick="event.preventDefault(); document.getElementById('form-logout').submit()" class="dropdown-item notify-item">
                    <i class="mdi mdi-logout-variant"></i>
                    <span>Logout</span>
                </a>
                <form action="{{route('logout')}}" method="post" id="form-logout">
                    @csrf
                </form>

            </div>
        </li>

        <li class="dropdown notification-list">
            <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect">
                <i class="mdi mdi-settings noti-icon"></i>
            </a>
        </li>

    </ul>

    <!-- LOGO -->
    <div class="logo-box" style="background-image: url({{asset('images/22.jpg')}})">
        <a href="{{route('dashboard')}}" class="logo text-center">
                    <span class="logo-lg">
                        <img src="{{asset('images/logo-light.png')}}" alt="" height="">
                        <!-- <span class="logo-lg-text-light">Zircos</span> -->
                    </span>
            <span class="logo-sm">
                        <!-- <span class="logo-sm-text-dark">Z</span> -->
                        <img src="{{asset('images/logo-sm.png')}}" alt="" height="24">
                    </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect">
                <i class="mdi mdi-menu"></i>
            </button>
        </li>

      {{--  <li class="d-none d-sm-block">
            <form class="app-search">
                <div class="app-search-box">
                    <div class="input-group flex-nowrap">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn pb-0" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </li>--}}

        <li class="d-none d-lg-block pt-2">
            <div class="col-3 mb-4 text-left mt-2">
                <a href="{{route('viewCalculator')}}">   <button type="submit" class="btn btn-secondary waves-effect waves-light mdi mdi-calculator  bg-dark"><i class=""></i> </button></a>
            </div>
        </li>



    </ul>

</div>
<!-- end Topbar -->
