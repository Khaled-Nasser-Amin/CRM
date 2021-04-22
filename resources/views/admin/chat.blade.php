@extends('layouts.appLogged')
@section('title','TRACKS/CRM/CHATS')
@push('css')
    <!-- Swipe core CSS -->
    <link href="{{asset('dist/css/swipe.min.css')}}" type="text/css" rel="stylesheet">
    <!-- Favicon -->
    <link href="{{asset('dist/img/favicon.png')}}" type="image/png" rel="icon">
@endpush
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12 pl-0">
                    <main>
                        <div class="layout">
                            <!-- Start of Navigation -->
                            <div class="navigation">
                                <div class="container">
                                    <div class="inside">
                                        <div class="nav nav-tab menu" id="menuSidebar">
                                            <button class="btn"><img class="avatar-xl" src="{{ auth()->user()->image ?? 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name).'&color=7F9CF5&background=EBF4FF' }}" alt="avatar"></button>
                                            <a href="#discussions" data-toggle="tab" class="active"><i class="material-icons active">chat_bubble_outline</i></a>
                                            <a href="#notifications" data-toggle="tab" class=""><i class="material-icons">notifications_none</i></a>
                                            <button class="btn power" onclick="event.preventDefault(); document.getElementById('form-logout').submit()"><i class="material-icons">power_settings_new</i></button>
                                            <form action="{{route('logout')}}" method="post" id="form-logout">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Navigation -->

                            <!-- Start of Sidebar -->
                            <div class="sidebar" id="sidebar">
                                <div class="container">
                                    <div class="col-md-12">
                                        <div class="tab-content">
                                            <!-- Start of Discussions -->
                                            <div id="discussions" class="tab-pane fade active show">
                                                <div class="search">
                                                    <form class="form-inline position-relative">
                                                        <input type="search" class="form-control" id="conversations" placeholder="Search for conversations...">
                                                        <button type="button" class="btn btn-link loop"><i class="material-icons">search</i></button>
                                                    </form>
                                                </div>
                                                <div class="list-group sort">
                                                    <button class="btn filterDiscussionsBtn active show" data-toggle="list" data-filter="all">All</button>
                                                    <button class="btn filterDiscussionsBtn" data-toggle="list" data-filter="read">Read</button>
                                                    <button class="btn filterDiscussionsBtn" data-toggle="list" data-filter="unread">Unread</button>
                                                </div>

                                                <div class="discussions">
                                                    <h1>Discussions</h1>

                                                    <div class="list-group" id="chats" role="tablist">

                                                        @forelse($users as $user)
                                                            <a href="#Chat{{$user->id}}" id="list-chat-{{$user->id}}" data-toggle="list" role="tab" data-receiver="{{$user->id}}" class="filterDiscussions all {{  $user->messagesAsSender->where('receiver_id',auth()->user()->id)->last() ? ($user->messagesAsSender->where('receiver_id',auth()->user()->id)->last()->state == 0 ? 'unread' :'read'):''}} single" >
                                                                <img class="avatar-md" src="{{ $user->image ?? 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&color=7F9CF5&background=EBF4FF' }}" data-toggle="tooltip" data-placement="top" title="Janette" alt="avatar">
                                                                <div class="status d-none">
                                                                    <i class="material-icons online">fiber_manual_record</i>
                                                                </div>

                                                                <div class="new bg-yellow {{auth()->user()->messages->where('sender_id',$user->id)->where('state',0)->count() == 0 ? 'd-none' : ''}}">
                                                                    <span id="badgeSidebarMessage{{$user->id}}">{{auth()->user()->messages->where('sender_id',$user->id)->where('state',0)->count()}}</span>
                                                                </div>

                                                                <div class="data">
                                                                    <h5>{{$user->name}}</h5>
                                                                    <span id="timeOnSidebarMessage{{$user->id}}">{{ lastMessage($user->id) ? lastMessage($user->id)->created_at->diffForHumans() :''}}</span>
                                                                    <p id="textOnSidebarMessage{{$user->id}}">{{lastMessage($user->id)->text ?? 'Start Conversation'}}</p>
                                                                </div>
                                                            </a>
                                                        @empty
                                                        @endforelse
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- End of Discussions -->
                                            <div id="notifications" class="tab-pane fade">
                                                <div class="search">
                                                    <form class="form-inline position-relative">
                                                        <input type="search" class="form-control" id="notice" placeholder="Filter notifications...">
                                                        <button type="button" class="btn btn-link loop"><i class="material-icons filter-list">filter_list</i></button>
                                                    </form>
                                                </div>
                                                <div class="list-group sort">
                                                    <button class="btn filterNotificationsBtn active show" data-toggle="list" data-filter="all">All</button>
                                                    <button class="btn filterNotificationsBtn" data-toggle="list" data-filter="latest">Latest</button>
                                                    <button class="btn filterNotificationsBtn" data-toggle="list" data-filter="oldest">Oldest</button>
                                                </div>
                                                <div class="notifications">
                                                    <div class="row justify-content-between">
                                                        <h1 class="mt-0">Notifications</h1>
                                                        @if(auth()->user()->notifications->count())
                                                            <a href="#" id="markAllAsRead">Mark all as read</a>
                                                        @endif
                                                    </div>

                                                    <div class="list-group pushNotificationInAsideBar" id="alerts" role="tablist" id="">
                                                        @forelse(auth()->user()->notifications as $notification)
                                                            <a href="#"  class="notificationAuthor-{{$notification->user->id}} filterNotifications all {{date_format($notification->created_at,'Y-m-d') == date_format(now(),'Y-m-d') ? 'latest' :'oldest'}} notification {{$notification->read_at == null ? 'bg-warning' : ''}}" data-toggle="list">
                                                                <img class="avatar-md" src="{{ $notification->user->image ?? 'https://ui-avatars.com/api/?name='.urlencode($notification->user->name).'&color=7F9CF5&background=EBF4FF' }}" data-toggle="tooltip" data-placement="top" title="Janette" alt="avatar">
                                                                <div class="status d-none">
                                                                    <i class="material-icons online">fiber_manual_record</i>
                                                                </div>
                                                                <div class="data">
                                                                    <p> <b>{{$notification->user->name}} </b><b class="text-info">{{$notification->notification_text}}</b> </p>
                                                                    <p>{{$notification->details}}</p>
                                                                    <span>{{$notification->created_at->diffForHumans()}}</span>
                                                                </div>
                                                            </a>
                                                        @empty
                                                        @endforelse

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Sidebar -->

                            <!-- Start of Create Chat -->
                            <div class="main">
                                <div class="tab-content pt-0" id="nav-tabContent">

                                    @forelse($users as $user)
                                        <div aria-labelledby="list-chat-{{$user->id}}" id="Chat{{$user->id}}"  class="babble tab-pane fade " role="tabpanel"  >
                                            <!-- Start of Chat -->
                                            <div class="chat" id="chat1">
                                                <div class="top">
                                                    <div class="container">
                                                        <div class="col-md-12">
                                                            <div class="inside" id="inside{{$user->id}}">
                                                                <a href="#"><img class="avatar-md" src="{{ $user->image ?? 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&color=7F9CF5&background=EBF4FF' }}" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar"></a>
                                                                <div class="status d-none">
                                                                    <i class="material-icons online">fiber_manual_record</i>
                                                                </div>
                                                                <div class="data">
                                                                    <h5><a href="#"> {{$user->name}}</a></h5>
                                                                    <span id="activeNow{{$user->id}}" class=" d-none">Active now</span>
                                                                </div>
                                                                <div class="dropdown">
                                                                    <a class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons md-30">more_vert</i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <hr>
                                                                        <button class="dropdown-item clearChat" data-receiver="{{$user->id}}"><i class="material-icons">clear</i>Clear Chat</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="content" id="content" >
                                                    <div class="container">
                                                        <div class="col-md-12" id="appendMessages-{{$user->id}}" data-current-page="{{messagesForAuthenticatedUser($user->id)->currentPage()}}">
                                                            @if (messagesForAuthenticatedUser($user->id)->lastPage() != messagesForAuthenticatedUser($user->id)->currentPage() && $user->id == messagesForAuthenticatedUser($user->id)['user_id'])
                                                                <a href="#" class="clearfix d-block text-center showMore" data-user="{{$user->id}}" data-current-page="{{messagesForAuthenticatedUser($user->id)->currentPage()}}">Show More</a>
                                                            @endif
                                                            @forelse(collect(messagesForAuthenticatedUser($user->id)->items()['data'])->reverse() as $message)
                                                                @if($message['type'] == 'text')
                                                                    @if($message['sender_id'] == auth()->user()->id)
                                                                        <div class="message me mb-0" id="message-{{$message['id']}}">
                                                                            <div class="text-main ">
                                                                                <div class="dropleft d-inline">
                                                                                    <a  class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons md-30">more_vert</i></a>
                                                                                    <div class="dropdown-menu dropdown-menu-left" >
                                                                                        <button class="dropdown-item deleteMessage" data-message="{{$message['id']}}"><i class="material-icons">clear</i>Delete Message</button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="text-group me d-inline">
                                                                                    <div class="text me">
                                                                                        <p>{{$message['text']}}</p>
                                                                                    </div>
                                                                                </div>
                                                                                <span><i class="material-icons">{{$loop->last ? ($message['state'] == 1 ? 'check':'') : ''}}</i>{{\Carbon\Carbon::create($message['created_at'])->diffForHumans()}}</span>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <div class="message mb-0 notMe">
                                                                            <img class="avatar-md" src="{{ $user->image ?? 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&color=7F9CF5&background=EBF4FF' }}" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
                                                                            <div class="text-main">
                                                                                <div class="text-group">
                                                                                    <div class="text bg-info text-white">
                                                                                        <p> {{$message['text']}} </p>
                                                                                    </div>
                                                                                </div>
                                                                                <span>{{\Carbon\Carbon::create($message['created_at'])->diffForHumans()}}</span>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @elseif($message['type'] == 'file')
                                                                    @if($message['sender_id'] == auth()->user()->id)
                                                                        <div class="message me mb-0" id="message-{{$message['id']}}">
                                                                            <div class="text-main">
                                                                                <div class="dropleft d-inline">
                                                                                    <a  class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons md-30">more_vert</i></a>
                                                                                    <div class="dropdown-menu dropdown-menu-left" >
                                                                                        <button class="dropdown-item deleteMessage" data-message="{{$message['id']}}"><i class="material-icons">clear</i>Delete Message</button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="text-group me d-inline">
                                                                                    <div class="text me">
                                                                                        <div class="attachment">
                                                                                            <a href="{{route('chat.downloadDocumentation',$message['id'])}}" class="btn attach"><i class="material-icons md-18">insert_drive_file</i></a>
                                                                                            <div class="file">
                                                                                                <h5>
                                                                                                    <a href="{{route('chat.downloadDocumentation',$message['id'])}}">
                                                                                                       {{collect(explode('_',$message['text']))->last()}}
                                                                                                    </a>
                                                                                                </h5>
                                                                                                <span>Document</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <span>{{\Carbon\Carbon::create($message['created_at'])->diffForHumans()}}</span>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <div class="message mb-0 notMe">
                                                                            <img class="avatar-md" src="{{ $user->image ?? 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&color=7F9CF5&background=EBF4FF' }}" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
                                                                            <div class="text-main">
                                                                                <div class="text-group">
                                                                                    <div class="text">
                                                                                        <div class="attachment">
                                                                                            <a href="{{route('chat.downloadDocumentation',$message['id'])}}" class="btn attach"><i class="material-icons md-18">insert_drive_file</i></a>
                                                                                            <div class="file">
                                                                                                <h5>
                                                                                                    <a href="{{route('chat.downloadDocumentation',$message['id'])}}">
                                                                                                        {{collect(explode('_',$message['text']))->last()}}
                                                                                                    </a>
                                                                                                </h5>
                                                                                                <span>Document</span>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                                <span>{{\Carbon\Carbon::create($message['created_at'])->diffForHumans()}}</span>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @elseif($message['type'] == 'image')
                                                                    @if($message['sender_id'] == auth()->user()->id)
                                                                        <div class="message me mb-0" id="message-{{$message['id']}}">
                                                                            <div class="text-main">
                                                                                <div class="row flex-row justify-content-end">
                                                                                    <div class="dropleft row flex-column justify-content-center mr-3">
                                                                                        <a  class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons md-30">more_vert</i></a>
                                                                                        <div class="dropdown-menu dropdown-menu-left" >
                                                                                            <button class="dropdown-item deleteMessage" data-message="{{$message['id']}}"><i class="material-icons">clear</i>Delete Message</button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="text-group me w-50">
                                                                                        <img class="w-100 float-right" src="{{asset('chat_files/'.$message['text'])}}" alt="{{$message['text']}}">
                                                                                    </div>
                                                                                </div>

                                                                                <span >{{\Carbon\Carbon::create($message['created_at'])->diffForHumans()}}</span>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <div class="message mb-0 notMe">
                                                                            <img class="avatar-md" src="{{ $user->image ?? 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&color=7F9CF5&background=EBF4FF' }}" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
                                                                            <div class="text-main row flex-column">
                                                                                <div class="text-group">
                                                                                    <div class="">
                                                                                        <img class="w-25 float-left" src="{{asset('chat_files/'.$message['text'])}}" alt="{{$message['text']}}">
                                                                                    </div>
                                                                                </div>
                                                                                <span>{{\Carbon\Carbon::create($message['created_at'])->diffForHumans()}}</span>
                                                                            </div>
                                                                        </div>
                                                                    @endif

                                                                @endif

                                                            @empty
                                                                <div class="no-messages">
                                                                    <i class="material-icons md-48">forum</i>
                                                                    <p>Seems people are shy to start the chat. Break the ice send the first message.</p>
                                                                </div>
                                                            @endforelse
                                                            @if (!messagesForAuthenticatedUser($user->id)->onFirstPage()  && $user->id == messagesForAuthenticatedUser($user->id)['user_id'])
                                                                <a href="#"  class="clearfix d-block text-center showLess" data-user="{{$user->id}}" data-current-page="{{messagesForAuthenticatedUser($user->id)->currentPage()}}">Show Less</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="container">
                                                    <div class="col-md-12">
                                                        <div class="bottom">
                                                            <form class="position-relative w-100" >
                                                                @csrf
                                                                <textarea data-receiver="{{$user->id}}" name="message" class="form-control textarea" placeholder="Start typing for reply..." rows="1"></textarea>
                                                                <button id="btnChat{{$user->id}}"  data-receiver="{{$user->id}}" class="btnChat btn send"><i class="material-icons">send</i></button>
                                                            </form>
                                                            <form enctype="multipart/form-data">
                                                                <label>
                                                                    <input type="file" name="file" class="attachFile" data-receiver="{{$user->id}}">
                                                                    <span class="btn attach d-sm-block d-none"><i class="material-icons">attach_file</i></span>
                                                                </label>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End of Chat -->
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>

                        </div>


                    </main>


                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>

    </script>

    <script src="{{asset('js/chat.js')}}"></script>
    <script src="{{asset('dist/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('dist/js/swipe.min.js')}}"></script>

@endpush

