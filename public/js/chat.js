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
            let element= $('#appendMessages-'+receiver_id);
            if (element.data('current-page') == 1) {
                if (result.type == 'file'){
                    element.append('<div class="message me mb-0" id="message-'+result.id+'"><div class="text-main">' +
                        '<div class="dropleft d-inline">' +
                        ' <a  class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons md-30">more_vert</i></a>' +
                        '                                                                            <div class="dropdown-menu dropdown-menu-left" >' +
                        '                                                                                <button class="dropdown-item deleteMessage" data-message="'+result.id+'"><i class="material-icons">clear</i>Delete Message</button>' +
                        '                                                                            </div>' +
                        '                                                                        </div>' +
                        '                                                                        <div class="text-group me d-inline"> <div class="text me"><div class="attachment">'
                        +'   <a href="Chat/'+result.id+'" class="btn attach"><i class="material-icons md-18">insert_drive_file</i></a>'
                        +' <div class="file"><h5>'
                        +'    <a href="Chat/'+result.id+'">'+result.name +'  </a>' +' </h5>' +' <span>Document</span>' +'</div> </div> </div></div>' +
                        ' <span>'+result.dateForHumans+'</span></div></div>')
                }else if(result.type == 'image'){
                    let url="{{asset('chat_files/'.':name')}}";
                    let name=result.text;
                    url=url.replace(':name',name);
                    element.append('<div class="message me mb-0" id="message-'+result.id+'"><div class="text-main">' +
                        '<div class="row flex-row justify-content-end">' +
                        '   <div class="dropleft row flex-column justify-content-center mr-3">' +
                        '       <a  class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons md-30">more_vert</i></a>' +
                        '       <div class="dropdown-menu dropdown-menu-left" >' +
                        '          <button class="dropdown-item deleteMessage" data-message="'+result.id+'"><i class="material-icons">clear</i>Delete Message</button>' +
                        '        </div>' +
                        '   </div>' +
                        ' <div class="text-group me w-50">  ' +
                        ' <img class="w-100 float-right" src="'+url+'" alt="'+result.text+'">' +
                        '</div>'
                        +'</div>'
                        +'<span>'+result.dateForHumans+'</span>' +
                        '</div>' +
                        '</div> ')
                }

            }
            element.has('div .no-messages') ? element.children('div .no-messages').remove(): null;
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
            let element= $('#appendMessages-'+receiver_id);
            if (element.data('current-page') == 1){
                element.append('<div class="message me mb-0" id="message-'+result.id+'"><div class="text-main">' +
                    '<div class="dropleft d-inline">' +
                    ' <a  class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons md-30">more_vert</i></a>' +
                    '                                                                            <div class="dropdown-menu dropdown-menu-left" >' +
                    '                                                                                <button class="dropdown-item deleteMessage" data-message="'+result.id+'"><i class="material-icons">clear</i>Delete Message</button>' +
                    '                                                                            </div>' +
                    '                                                                        </div>' +
                    '                                                                        <div class="text-group me d-inline"> '
                    +'<div class="text me">'
                    +'<p>'+result.text+'</p>'
                    +'</div>'
                    +'</div>'
                    +'<span><i class="material-icons"></i>'+result.dateForHumans+'</span>'
                    +'</div>'
                    +'</div>')
            }

            element.has('div .no-messages') ? element.children('div .no-messages').remove(): null;
            $('textarea[name=message]').val('');
            changeListChatItem(result);
            pushMessageInNavbar(result);
            scrollToBottom(document.getElementById('content'));

        }


    })
    scrollToBottom(document.getElementById('content'));

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
    readMessages(receiver_id,$('#list-chat-'+receiver_id));
    getAllUnreadMessages();
    scrollToBottom(document.getElementById('content'));

});

$('.filterDiscussions').on('click',function (){

    let receiver_id = $(this).data('receiver');
    readMessages(receiver_id,$(this));
    getAllUnreadMessages();
    scrollToBottom(document.getElementById('content'));
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


//pushMessageInNavbar
function pushMessageInNavbar(e){
    let parentDiv = $('#parentForUserChatInNavbar');
    parentDiv.has('.no-messages') ? parentDiv.children('.no-messages').remove(): null;
    parentDiv.has('#userChatInNavbar-'+e.receiver_id) ? $('#userChatInNavbar-'+e.receiver_id).remove() :null;
    parentDiv.prepend('' +
        '<a href="#" id="userChatInNavbar-'+e.receiver_id+'">' +
        '   <div class="inbox-item" >' +
        '       <div class="inbox-item-img"><img src="'
        +
        (e.receiverImage ?? "https://ui-avatars.com/api/?name="+encodeURI(e.receiverName)+"&color=7F9CF5&background=EBF4FF")
        +
        '" class="rounded-circle" alt=""></div>' +
        '       <p class="inbox-item-author">'+e.receiverName+'</p>' +
        '       <p class="inbox-item-text text-truncate text-black-50">'+e.lastMessage+'</p>' +
        '    </div>' +
        ' </a>')

}


//mark all messages as read
$('#markAllAsRead').on('click',function (){
    $.ajax({
        method:'post',
        url:'/markAllAsRead',
        data:{
            '_token':$('meta[name=csrf-token]').attr('content')
        },
        success:function(){
            $('.filterNotifications').removeClass('bg-warning')
            $('#badgeSidebarNotifications').addClass('d-none')

        }
    })

})
//scroll function
function scrollToBottom(el)
{ el.scrollTop = el.scrollHeight; }

//active chat when click in aside bar
$(document).ready(function() {
    activeTab();
    scrollToBottom(document.getElementById('content'));

});
$('.userChat').on('click',function() {
    let href=$(this).attr('href');
    let hash=href.slice(href.search('#'),href.length);
    $('#chats a[href="'+hash+'"]').tab('show');
    $('#menuSidebar a[href="#discussions"]').tab('show');
    scrollToBottom(document.getElementById('content'));

});
function activeTab(){
    var hash =window.location.hash ;

    if (hash != "")
        $('#chats a[href="'+hash +'"]').tab('show');
    if(hash == '#notifications')
        $('#menuSidebar a[href="#notifications"]').tab('show');
    else
        $('#chats a:first').tab('show');
}

//clear chat
$('.clearChat').on('click',function (){
    let userId=$(this).data('receiver');
    $.ajax({
        'method':'post',
        url:'/Chat/clearChat/'+userId,
        data:{
            '_token': $('meta[name=csrf-token]').attr('content')
        },
        success:function (result){
            $('#appendMessages-'+userId).children('.me').remove();
            updateMessageForCurrentPage(userId,result)

        }
    })
})

//delete specific message
$(document).on('click','.deleteMessage',function (){
    let messageId=$(this).data('message');
    $.ajax({
        method:"post",
        url:'Chat/deleteMessage/'+messageId,
        data:{
            '_token':$('meta[name=csrf-token]').attr('content')
        },
        success:function (result){
            $('#message-'+messageId).remove()
        }
    })
})

//show more paginate ajax
$(document).on('click','.showMore',function (e){
    e.preventDefault();
    let currentPage=$(this).data('current-page');
    let user_id=$(this).data('user')
    $.ajax({
        'method':'get',
        'url':'/Chat?page='+(currentPage+1)+'&user='+user_id,
        success:function (e){
            updateMessageForCurrentPage(user_id,e)
        }
    })
})


//show less paginate ajax
$(document).on('click','.showLess',function (e){
    e.preventDefault();
    let currentPage=$(this).data('current-page')
    let user_id=$(this).data('user')
    $.ajax({
        'method':'get',
        'url':'/Chat?page='+(currentPage-1)+'&user='+user_id,
        success:function (e){
            updateMessageForCurrentPage(user_id,e)
        }
    })
})
//update message for current page
function updateMessageForCurrentPage(user_id,viewResult){
    let element=$('#appendMessages-'+user_id).parent();
    element.empty();
    element.html($('#appendMessages-'+user_id,viewResult).parent().html());
}

