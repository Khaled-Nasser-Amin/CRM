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
                <div class="col-12">


                    <main>


                        <div class="layout">
                            <!-- Start of Navigation -->
                            <div class="navigation">
                                <div class="container">
                                    <div class="inside">
                                        <div class="nav nav-tab menu">
                                            <button class="btn"><img class="avatar-xl" src="{{asset('dist/img/avatars/avatar-male-1.jpg')}}" alt="avatar"></button>
                                            <a href="#discussions" data-toggle="tab" class="active"><i class="material-icons active">chat_bubble_outline</i></a>
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
                                                                <img class="avatar-md" src="{{asset('dist/img/avatars/avatar-female-1.jpg')}}" data-toggle="tooltip" data-placement="top" title="Janette" alt="avatar">
                                                                <div class="status">
                                                                    <i class="material-icons online">fiber_manual_record</i>
                                                                </div>

                                                                <div class="new bg-yellow {{auth()->user()->messages->where('sender_id',$user->id)->where('state',0)->count() == 0 ? 'd-none' : ''}}">
                                                                    <span id="badgeSidebarMessage{{$user->id}}">{{auth()->user()->messages->where('sender_id',$user->id)->where('state',0)->count()}}</span>
                                                                </div>

                                                                <div class="data">
                                                                    <h5>{{$user->name}}</h5>
                                                                    <span id="timeOnSidebarMessage{{$user->id}}">{{ messagesForAuthenticatedUser($user->id)->last() ? messagesForAuthenticatedUser($user->id)->last()->created_at->diffForHumans() :''}}</span>
                                                                    <p id="textOnSidebarMessage{{$user->id}}">{{messagesForAuthenticatedUser($user->id)->last()->text ?? 'Start Conversation'}}</p>
                                                                </div>
                                                            </a>
                                                        @empty
                                                        @endforelse
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End of Discussions -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Sidebar -->

                            <!-- Start of Create Chat -->
                            <div class="main">
                                <div class="tab-content" id="nav-tabContent">

                                    @forelse($users as $user)
                                        <div aria-labelledby="list-chat-{{$user->id}}" id="Chat{{$user->id}}"  class="babble tab-pane fade " role="tabpanel"  >
                                            <!-- Start of Chat -->
                                            <div class="chat" id="chat1">
                                                <div class="top">
                                                    <div class="container">
                                                        <div class="col-md-12">
                                                            <div class="inside">
                                                                <a href="#"><img class="avatar-md" src="{{asset('dist/img/avatars/avatar-female-5.jpg')}}" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar"></a>
                                                                <div class="status">
                                                                    <i class="material-icons online">fiber_manual_record</i>
                                                                </div>
                                                                <div class="data">
                                                                    <h5><a href="#"> {{$user->name}}</a></h5>
                                                                    <span>Active now</span>
                                                                </div>
                                                                <div class="dropdown">
                                                                    <a class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons md-30">more_vert</i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <hr>
                                                                        <button class="dropdown-item"><i class="material-icons">clear</i>Clear History</button>
                                                                        <button class="dropdown-item"><i class="material-icons">block</i>Block Contact</button>
                                                                        <button class="dropdown-item"><i class="material-icons">delete</i>Delete Contact</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="content" id="content" >
                                                    <div class="container">
                                                        <div class="col-md-12" id="appendMessages-{{$user->id}}">
                                                    @forelse(messagesForAuthenticatedUser($user->id) as $message)

                                                        @if($message->type == 'text')
                                                            @if($message->sender_id == auth()->user()->id)
                                                                <div class="message me mb-0">
                                                                    <div class="text-main">
                                                                        <div class="text-group me">
                                                                            <div class="text me">
                                                                                <p>{{$message->text}}</p>
                                                                            </div>
                                                                        </div>
                                                                        <span><i class="material-icons">{{$loop->last ? ($message->state == 1 ? 'check':'') : ''}}</i>{{$message->created_at->diffForHumans()}}</span>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="message mb-0 ">
                                                                    <img class="avatar-md" src="{{asset('dist/img/avatars/avatar-female-5.jpg')}}" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
                                                                    <div class="text-main">
                                                                        <div class="text-group">
                                                                            <div class="text bg-info text-white">
                                                                                <p> {{$message->text}} </p>
                                                                            </div>
                                                                        </div>
                                                                        <span>{{$message->created_at->diffForHumans()}}</span>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @elseif($message->type == 'file')
                                                            @if($message->sender_id == auth()->user()->id)
                                                                <div class="message me mb-0">
                                                                    <div class="text-main">
                                                                        <div class="text-group me">
                                                                            <div class="text me">
                                                                                <div class="attachment">
                                                                                    <a href="{{route('chat.downloadDocumentation',$message->id)}}" class="btn attach"><i class="material-icons md-18">insert_drive_file</i></a>
                                                                                    <div class="file">
                                                                                        <h5>
                                                                                            <a href="{{route('chat.downloadDocumentation',$message->id)}}">
                                                                                               {{collect(explode('_',$message->text))->last()}}
                                                                                            </a>
                                                                                        </h5>
                                                                                        <span>Document</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <span>{{$message->created_at->diffForHumans()}}</span>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="message mb-0 ">
                                                                    <img class="avatar-md" src="{{asset('dist/img/avatars/avatar-female-5.jpg')}}" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
                                                                    <div class="text-main">
                                                                        <div class="text-group">
                                                                            <div class="text">
                                                                                <div class="attachment">
                                                                                    <a href="{{route('chat.downloadDocumentation',$message->id)}}" class="btn attach"><i class="material-icons md-18">insert_drive_file</i></a>
                                                                                    <div class="file">
                                                                                        <h5>
                                                                                            <a href="{{route('chat.downloadDocumentation',$message->id)}}">
                                                                                                {{collect(explode('_',$message->text))->last()}}
                                                                                            </a>
                                                                                        </h5>
                                                                                        <span>Document</span>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <span>{{$message->created_at->diffForHumans()}}</span>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @elseif($message->type == 'image')
                                                            @if($message->sender_id == auth()->user()->id)
                                                                <div class="message me mb-0">
                                                                    <div class="text-main">
                                                                        <div class="text-group me">
                                                                            <div>
                                                                                <img class="w-25 float-right" src="{{asset('chat_files/'.$message->text)}}" alt="{{$message->text}}">
                                                                            </div>
                                                                        </div>
                                                                        <span>{{$message->created_at->diffForHumans()}}</span>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="message mb-0 ">
                                                                    <img class="avatar-md" src="{{asset('dist/img/avatars/avatar-female-5.jpg')}}" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
                                                                    <div class="text-main row flex-column">
                                                                        <div class="text-group">
                                                                            <div class="">
                                                                                <img class="w-25 float-left" src="{{asset('chat_files/'.$message->text)}}" alt="{{$message->text}}">
                                                                            </div>
                                                                        </div>
                                                                        <span>{{$message->created_at->diffForHumans()}}</span>
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

                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="container">
                                                    <div class="col-md-12">
                                                        <div class="bottom">
                                                            <form class="position-relative w-100" >
                                                                @csrf
                                                                <textarea data-receiver="{{$user->id}}" name="message" class="form-control" placeholder="Start typing for reply..." rows="1"></textarea>
                                                                <button id="btnChat{{$user->id}}"  data-receiver="{{$user->id}}" class="btnChat btn send"><i class="material-icons">send</i></button>
                                                            </form>
                                                            <form enctype="multipart/form-data" id="formAttachFile">
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
        scrollToBottom(document.getElementById('content'));

        //sending file or image
        $('.attachFile').on('change',function(){
            var form = new FormData();
            form.append('fileName',$(this).get(0).files[0])
            let token=$('meta[name=csrf-token]').attr('content');
            let receiver_id=$(this).data('receiver');
            form.append('_token',token);
            form.append('receiver_id',receiver_id);
            readMessages(receiver_id,$('#list-chat-'+receiver_id));
            getAllUnreadMessages();
            $.ajax({
                url:'/Chat',
                method:'post',
                data:form,
                cache: false,
                contentType: false,
                processData: false,
                success:function (result){
                    if (result.type == 'file'){
                        $('#appendMessages-'+receiver_id).append('<div class="message me mb-0"><div class="text-main"><div class="text-group me"> <div class="text me"><div class="attachment">'
                            +'   <a href="Chat/'+result.id+'" class="btn attach"><i class="material-icons md-18">insert_drive_file</i></a>'
                            +' <div class="file"><h5>'
                            +'    <a href="Chat/'+result.id+'">'+result.name +'  </a>' +' </h5>' +' <span>Document</span>' +'</div> </div> </div></div>' +
                            ' <span>'+result.dateForHumans+'</span></div></div>')
                    }else if(result.type == 'image'){
                        let url="{{asset('chat_files/'.':name')}}";
                        let name=result.text;
                        url=url.replace(':name',name);
                        $('#appendMessages-'+receiver_id).append(' <div class="message me mb-0"> <div class="text-main"> <div class="text-group me"> <div>'
                            +'<img class="w-25 float-right" src="'+url+'" alt="'+result.text+'"> </div></div>'
                            +'<span>'+result.dateForHumans+'</span></div></div> ')
                    }
                    changeListChatItem(result);
                    pushMessageInNavbar(result);
                    scrollToBottom(document.getElementById('content'));

                }
            })
        });
        //click button to send message
        $('.btnChat').on('click',function(e){
            e.preventDefault();
            let form=$(this).parent();
            let receiver_id=$(this).data('receiver');
            let data=form.serialize()+'&receiver_id='+receiver_id;
            readMessages(receiver_id,$('#list-chat-'+receiver_id));
            getAllUnreadMessages();
            $.ajax({
                url:'/Chat/store' ,
                type:'post',
                data:data,
                success:function (result){
                    $('#appendMessages-'+receiver_id).append('<div class="message me mb-0">'
                        +'<div class="text-main">'
                        +'<div class="text-group me">'
                        +'<div class="text me">'
                        +'<p>'+result.text+'</p>'
                        +'</div>'
                        +'</div>'
                        +'<span><i class="material-icons"></i>'+result.dateForHumans+'</span>'
                        +'</div>'
                        +'</div>')
                    changeListChatItem(result);
                    pushMessageInNavbar(result);
                    scrollToBottom(document.getElementById('content'));

                }

            })
        })

        //press enter to send message
        $('textarea[name=message]').on('keyup',function(e){
            if (e.keyCode == 13){
                e.preventDefault();
                $(this).parent().children('button').click();
                $(this).val('');
                scrollToBottom(document.getElementById('content'));
            }
        })
        $('textarea[name=message]').on('click',function(e){
            scrollToBottom(document.getElementById('content'));
            let receiver_id=$(this).data('receiver');
            console.log(receiver_id);
            readMessages(receiver_id,$('#list-chat-'+receiver_id));
            getAllUnreadMessages();
            scrollToBottom(document.getElementById('content'));

        });

        $('.filterDiscussions').on('click',function (){

            let receiver_id = $(this).data('receiver');
            readMessages(receiver_id,$(this));
            getAllUnreadMessages();
            scrollToBottom(document.getElementById('content'));
            console.log('clickable');
        })
        function readMessages(receiver_id,item){
            $.ajax({
                url:"/Chat/readMessages/"+receiver_id,
                method:"post",
                data:{
                    '_token':$('meta[name=csrf-token]').attr('content')
                }
            })

            item.hasClass('unread') ? item.removeClass('unread').addClass('read') : null;
            item.children('div .new').addClass('d-none');
        }
        function changeListChatItem(message){
            let element=$('#textOnSidebarMessage'+message.receiver_id);
            switch (message.type){
                case 'text': element.html(message.text);break;
                case 'file':
                case 'image':element.html(message.name);break;
            }
            $('#timeOnSidebarMessage'+message.receiver_id).html(message.dateForHumans);

        }
        function getAllUnreadMessages(){
            $.ajax({
                url:'/Chat/getAllUnreadMessages',
                method:'post',
                data:{
                    '_token':$('meta[name=csrf-token]').attr('content')
                },
                success:function(result){
                    let element=$('#navBarBadgeMessages');
                    element.hasClass('d-none') ? element.removeClass('d-none'): null;
                    element.html(result);
                    result == 0 ? element.addClass('d-none') : null;
                }
            })
        }

        function pushMessageInNavbar(e){
            console.log(e);
            let parentDiv = $('#parentForUserChatInNavbar');
            parentDiv.has('#userChatInNavbar-'+e.receiver_id) ? $('#userChatInNavbar-'+e.receiver_id).remove() :null;
            parentDiv.prepend('' +
                '<a href="#" id="userChatInNavbar-'+e.receiver_id+'">' +
                '   <div class="inbox-item" >' +
                '       <div class="inbox-item-img"><img src="/images/users/avatar-1.jpg" class="rounded-circle" alt=""></div>' +
                '       <p class="inbox-item-author">'+e.receiverName+'</p>' +
                '       <p class="inbox-item-text text-truncate text-black-50">'+e.lastMessage+'</p>' +
                '    </div>' +
                ' </a>')
        }
        //scroll function
        function scrollToBottom(el)
        { el.scrollTop = el.scrollHeight; }

        $(document).ready(function() {
            activeTab();
            scrollToBottom(document.getElementById('content'));

        });
        $('.userChat').on('click',function() {
            activeTab();
            let href=$(this).attr('href');
            let hash=href.slice(href.search('#'),href.length);
            $('#chats a[href="'+hash+'"]').tab('show');

            scrollToBottom(document.getElementById('content'));

        });
        function activeTab(){
            var hash =window.location.hash ;

            if (hash != "")
                $('#chats a[href="'+hash +'"]').tab('show');
            else
                $('#chats a:first').tab('show');
        }

    </script>
    <script src="{{asset('dist/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('dist/js/swipe.min.js')}}"></script>



@endpush

