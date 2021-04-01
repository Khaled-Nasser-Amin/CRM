require('./bootstrap');

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});

let id=$('meta[name=user_id]').attr('content');
window.Echo.channel(`Chat.${id}`)
    .listen('ChatEvent', (e) => {
        if(e.message.type == 'text'){
            $('#appendMessages-'+e.message.sender_id).append(' <div class="message mb-0 e">' +
                '<img class="avatar-md" src="/dist/img/avatars/avatar-female-5.jpg" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">' +
                '<div class="text-main">' +
                '<div class="text-group">' +
                '  <div class="text bg-info text-white">' +
                '    <p>'+e.message.text+'</p>'+
                '   </div>' +
                '</div>' +
                '<span>'+e.message.dateForHumans+'</span>' +
                '</div>' +
                '</div>')

        }
        else if(e.message.type == 'file'){
            let url = "/Chat/"+e.message.id;
            $('#appendMessages-'+e.message.sender_id).append('<div class="message mb-0 ">' +
                '<img class="avatar-md" src="/dist/img/avatars/avatar-female-5.jpg" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">' +
                '   <div class="text-main">' +
                '       <div class="text-group">' +
                '          <div class="text">' +
                '               <div class="attachment">' +
                '                    <a href="'+url+'" class="btn attach"><i class="material-icons md-18">insert_drive_file</i></a>' +
                '                       <div class="file">' +
                '                            <h5>' +
                '                               <a href="'+url+'">' +
                                                  e.message.name  +
                '                               </a>' +
                '                            </h5>' +
                '                         <span>Document</span>' +
                '                    </div>' +
                '                </div>' +
                '             </div>' +
                '          </div>' +
                '       <span>'+e.message.dateForHumans+'</span>' +
                '   </div>' +
                ' </div>')

        }else if(e.message.type == 'image'){
            $('#appendMessages-'+e.message.sender_id).append('<div class="message mb-0 ">' +
                ' <img class="avatar-md" src="/dist/img/avatars/avatar-female-5.jpg" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">\n' +
                '    <div class="text-main row flex-column">' +
                '       <div class="text-group">' +
                '             <div class="">' +
                '                   <img class="w-25 float-left" src="/chat_files/'+e.message.text+'" alt="'+e.message.text+'">' +
                '              </div>' +
                '     </div>' +
                '     <span>'+e.message.dateForHumans+'</span>' +
                '  </div>' +
                '</div>')
        }
        changeListChatItem(e.message);
        getUnReadMessages(e.message.sender_id);
        getAllUnreadMessages();
        pushMessageInNavbar(e);
        scrollToBottom(document.getElementById('content'));

    });



function changeListChatItem(message){
    let item=$('#textOnSidebarMessage'+message.sender_id);
    switch (message.type){
        case 'text':item.html(message.text);break;
        case 'file':
        case 'image':item.html(message.name);break;
    }
    $('#timeOnSidebarMessage'+message.sender_id).html(message.dateForHumans);

}

function getUnReadMessages(sender_id){
    $.ajax({
        url:"/Chat/getUnReadMessages/"+sender_id,
        method:"post",
        data:{
            '_token':$('meta[name=csrf-token]').attr('content')
        },
        success:function (result){
            $('#badgeSidebarMessage'+sender_id).html(result);
        }
    })
    let item =$('#list-chat-'+sender_id);
    item.addClass('unread').removeClass('read');
    item.children('div .new').removeClass('d-none');

}

function getAllUnreadMessages(){
    $.ajax({
        url:'/Chat/getAllUnreadMessages',
        method:'post',
        data:{
            '_token':$('meta[name=csrf-token]').attr('content')
        },
        success:function(result){
            $('#navBarBadgeMessages').hasClass('d-none') ? $('#navBarBadgeMessages').removeClass('d-none'): null;
            $('#navBarBadgeMessages').html(result);
        }
    })
}

function pushMessageInNavbar(e){
    let parentDiv = $('#parentForUserChatInNavbar');
    parentDiv.has('#userChatInNavbar-'+e.message.sender_id) ? $('#userChatInNavbar-'+e.message.sender_id).remove() :null;
    parentDiv.prepend('' +
        '<a href="#" id="userChatInNavbar-'+e.message.sender_id+'">' +
        '   <div class="inbox-item" >' +
        '       <div class="inbox-item-img"><img src="/images/users/avatar-1.jpg" class="rounded-circle" alt=""></div>' +
        '       <p class="inbox-item-author">'+e.sender.name+'</p>' +
        '       <p class="inbox-item-text text-truncate text-black-50">'+e.lastMessage+'</p>' +
        '    </div>' +
        ' </a>')
}
function scrollToBottom(el)
{ el.scrollTop = el.scrollHeight; }
