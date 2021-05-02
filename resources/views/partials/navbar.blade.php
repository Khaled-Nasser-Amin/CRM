<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="mdi mdi-bell noti-icon"></i>
                <span id="badgeSidebarNotifications" class="badge badge-success rounded-circle noti-icon-badge {{auth()->user()->unreadNotifications->count() == 0 ? 'd-none' : ''}}">{{auth()->user()->unreadNotifications->count()}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                <!-- item-->
                <div class="dropdown-item noti-title row justify-content-between" style="margin: -8px 0">
                    <h5 class="font-16 m-0 d-inline">
                        Notification
                    </h5>
                    <span class="float-right">
                            @if(auth()->user()->notifications->count())
                            <a href="{{route('notification.DeleteNotifications')}}" class="text-dark DeleteButton">
                                <small>Clear All</small>
                            </a>
                        @endif
                    </span>
                </div>

                <div class="slimscroll noti-scroll" id="pushNotificationInNavbar" style="max-height: 350px!important; min-height: 350px!important;">
                    @forelse(auth()->user()->notifications()->latest()->take(15)->get() as $notification)
                        <a href="javascript:void(0);" class="dropdown-item showAllNotifications notify-item">
                            <div class="notify-icon bg-secondary">
                                <img src="{{ $notification->user->image ?? 'https://ui-avatars.com/api/?name='.urlencode($notification->user->name).'&color=7F9CF5&background=EBF4FF' }}" class="rounded-circle w-100" alt="image">
                            </div>
                            <p class="notify-details ml-1">
                                {{$notification->user->name}}
                                <span class="text-info">{{$notification->notification_text}}</span>
                                <small class="text-muted">{{$notification->created_at->diffForHumans()}}</small>
                            </p>
                        </a>
                    @empty

                    @endforelse

                </div>

                <!-- All-->
                @if(auth()->user()->notifications->count())

                <a href="/Chat" class="dropdown-item showAllNotifications text-center text-secondary notify-item notify-all">
                    See all Notification
                    <i class="fi-arrow-right"></i>
                </a>
                @endif
            </div>
        </li>

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="mdi mdi-email noti-icon"></i>
                <span class="badge badge-danger rounded-circle noti-icon-badge {{auth()->user()->messagesAsReceiver->where('state',0)->count() == 0 ? 'd-none' : ''}}" id="navBarBadgeMessages">{{auth()->user()->messagesAsReceiver->where('state',0)->count()}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-lg" >
                <div class="slimscroll noti-scroll">

                    <div  class="inbox-widget" id="parentForUserChatInNavbar" style="max-height: 350px!important; min-height: 350px!important;">
                        @forelse(UsersWhichHasMessagesWithAuthenticatedUser() as $user)
                            <a class="userChat" href="/Chat#Chat{{$user['id']}}" id="userChatInNavbar-{{$user['id']}}">
                                <div class="inbox-item" >
                                    <div class="inbox-item-img"><img src="{{ $user['image']?? 'https://ui-avatars.com/api/?name='.urlencode($user['name']).'&color=7F9CF5&background=EBF4FF' }}" class="rounded-circle" alt=""></div>
                                    <p class="inbox-item-author">{{$user['name']}}</p>
                                    <p class="inbox-item-text text-truncate">{{$user['lastMessage']}}</p>
                                </div>
                            </a>
                        @empty
                            <a href="/Chat" class="no-messages">
                                <div class="inbox-item">
                                    <p class="text-muted">You don't have any conversation yet! <span class="text-info">Start New Chat</span></p>
                                </div>

                            </a>
                        @endforelse

                    </div>

                </div>
                <!-- All-->
                @if(auth()->user()->messages->count())
                <a href="{{route('chat.index')}}" class="dropdown-item text-center text-secondary notify-item notify-all">
                    See all Messages
                    <i class="fi-arrow-right"></i>
                </a>
                @endif
            </div>
        </li>

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img id="userImage-{{auth()->user()->id}}" src="{{ auth()->user()->image ?? 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name).'&color=7F9CF5&background=EBF4FF' }}" alt="user-image" class="rounded-circle " style="height: 50px;width: 50px">
                <span class="d-none d-sm-inline-block ml-1">{{auth()->user()->name}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>
                <a href="{{route('profile.show')}}" class="dropdown-item mdi mdi-account-key">
                    <span>Profile</span>
                </a>

                <div class="dropdown-divider"></div>

                <!-- item-->
                <a href="#" onclick="event.preventDefault(); document.getElementById('form-logout').submit()" class="dropdown-item notify-item">
                    <i class="mdi mdi-logout-variant"></i>
                    <span>Logout</span>
                </a>
                <form action="{{route('logout')}}" method="post" id="form-logout">
                    @csrf
                </form>

            </div>
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
