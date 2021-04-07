require('./bootstrap');

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');
let VanillaToasts = window.VanillaToasts = require('vanillatoasts');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});

let id=$('meta[name=user_id]').attr('content');
window.Echo.channel(`Chat.${id}`)
    .listen('ChatEvent', (e) => {
        let element =$('#appendMessages-'+e.message.sender_id);
        $('#typing-'+e.message.sender_id).remove();
        if(e.message.type == 'text'){
            element.append(' <div class="message mb-0 notMe" id="message-'+e.message.id+'">' +
                '<img class="avatar-md" src="'+e.message.senderImage+'" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">' +
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
            element.append('<div class="message mb-0 notMe" id="message-'+e.message.id+'">' +
                '<img class="avatar-md" src="'+e.message.senderImage+'" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">' +
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
            element.append('<div class="message mb-0 notMe" id="message-'+e.message.id+'">' +
                ' <img class="avatar-md" src="'+e.message.senderImage+'" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">\n' +
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
        element.has('div .no-messages') ? element.children('div .no-messages').remove(): null;

        changeListChatItem(e.message);
        getUnReadMessages(e.message.sender_id);
        getAllUnreadMessages();
        pushMessageInNavbar(e);
        scrollToBottom(document.getElementById('content'));

    })
    .listen('ClearChatEvent',(e)=>{
        $('#appendMessages-'+e.sender.id).children('.notMe').remove();
    })
    .listen('DeleteMessageEvent',(e)=>{
        $('#message-'+e.message_id).remove();
    });

window.Echo.join(`chat`)
    .here((users) => {
        users.forEach(function (user){
            $('#list-chat-'+user.id).children('div .status').removeClass('d-none');
            $('#inside'+user.id).children('div .status').removeClass('d-none');
            $('.notificationAuthor-'+user.id).children('div .status').removeClass('d-none');
            $('#activeNow'+user.id).removeClass('d-none');
        })
    })
    .joining((user) => {
        $('#list-chat-'+user.id).children('div .status').removeClass('d-none');
        $('#inside'+user.id).children('div .status').removeClass('d-none');
        $('.notificationAuthor-'+user.id).children('div .status').removeClass('d-none');
        $('#activeNow'+user.id).removeClass('d-none');
    })
    .leaving((user) => {
        $('#list-chat-'+user.id).children('div .status').addClass('d-none');
        $('#inside'+user.id).children('div .status').addClass('d-none');
        $('.notificationAuthor-'+user.id).children('div .status').addClass('d-none');
        $('#activeNow'+user.id).addClass('d-none');
    })


//listen for event
let myId=$('meta[name=user_id]').attr('content');
let userImage=$('#userImage-'+myId).attr('src');
window.Echo.private(`whisper-${myId}`)
    .listenForWhisper('typing', (e) => {
        if(!$('#typing-'+e.id).length){
            $('#appendMessages-'+e.id).append('<div id="typing-'+e.id+'" class="message mb-0 ">' +
                ' <img class="avatar-md" src="'+e.image+'" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">\n' +

                '                                                            <div class="text-main">' +
               '                                                                <div class="text-group">' +
               '                                                                    <div class="text typing">' +
               '                                                                        <div class="wave">' +
               '                                                                            <span class="dot"></span>' +
               '                                                                            <span class="dot"></span>' +
               '                                                                            <span class="dot"></span>' +
               '                                                                        </div>' +
               '                                                                    </div>' +
               '                                                                </div>' +
               '                                                            </div>' +
               '                                                        </div>')

            setTimeout(function (){
                $('#typing-'+e.id).remove();
            },4000)
            scrollToBottom(document.getElementById('content'));

        }
    });

//fire event
$(document).on('keydown','.textarea',function (){
    let receiver_id=$(this).data('receiver');

    setTimeout(function(){
        window.Echo.private(`whisper-${receiver_id}`)
            .whisper('typing', {
                id: myId,
                image: userImage,

            });
    },1000)


})


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
    parentDiv.has('.no-messages') ? parentDiv.children('.no-messages').remove(): null;
    parentDiv.has('#userChatInNavbar-'+e.message.sender_id) ? $('#userChatInNavbar-'+e.message.sender_id).remove() :null;
    parentDiv.prepend('' +
        '<a href="#" id="userChatInNavbar-'+e.message.sender_id+'">' +
        '   <div class="inbox-item" >' +
        '       <div class="inbox-item-img"><img src="'+e.message.senderImage+'" class="rounded-circle" alt=""></div>' +
        '       <p class="inbox-item-author">'+e.sender.name+'</p>' +
        '       <p class="inbox-item-text text-truncate text-black-50">'+e.lastMessage+'</p>' +
        '    </div>' +
        ' </a>')
}

window.Echo.private('user.' + myId)
    .notification((notification) => {


        pushNotificationInNavbar(notification);
        pushNotificationInAsideBar(notification);
        NumberOfUnreadNotifications();
        addTicketInDashboard(notification);
        popNotificationToWindow(notification)

    });

function popNotificationToWindow(notification){

    let image=notification.userImage.slice(notification.userImage.search('/images'),notification.userImage.length)
    setTimeout(function(){
        window.VanillaToasts.create({

            // notification title
            title: notification.notification_text,

            // notification message
            text: notification.details,

            // success, info, warning, error   / optional parameter
            type: 'warning',
            timeout:5000,

            // path to notification icon
            icon: image,

            // topRight, topLeft, topCenter, bottomRight, bottomLeft, bottomCenter
            positionClass: 'topRight',

            // auto dismiss after 5000ms

        });

    },2000)
}
function addTicketInDashboard(notification){
    if (notification.type == 'App\\Notifications\\AddNewTicket'){
        $('#tickets').prepend('<a href="#">' +
            '                                    <div class="inbox-item">' +
            '                                        <div class="inbox-item-img">' +
            '                                            <img src="'+notification.userImage+'" class="rounded-circle" alt="">' +
            '                                        </div>' +
            '                                        <p class="inbox-item-author">'+notification.userName+' ( '+notification.ticketName+' )</p>' +
            '                                        <p class="inbox-item-text font-12">'+notification.details+'</p>' +
            '                                        <p class="inbox-item-date">'+notification.created_at+'</p>' +
            '                                    </div>' +
            '                                </a>')
    }
}
function pushNotificationInNavbar(e){
    let image=e.userImage.slice(e.userImage.search('/images'),e.userImage.length)

    $('#pushNotificationInNavbar').prepend('<a href="/Chat#notifications" class="dropdown-item notify-item">' +
        '                            <div class="notify-icon bg-secondary">' +
        '                                <img src="'+image+'" class="rounded-circle w-100" alt="image">' +
        '                            </div>\n' +
        '                            <p class="notify-details ml-1">' +
        '                                '+e.userName+'' +
        '                                <span class="text-info">'+e.notification_text+'</span>' +
        '                                <small class="text-muted">'+e.created_at+'</small>\n' +
        '                            </p>\n' +
        '                        </a>')
}

function pushNotificationInAsideBar(e){
    let image=e.userImage.slice(e.userImage.search('/images'),e.userImage.length)
    $('.pushNotificationInAsideBar').prepend('<a href="#"  class="notificationAuthor-'+e.userId+' filterNotifications all latest notification bg-warning" data-toggle="list">' +
        '                                                                <img class="avatar-md" src="'+image+'" data-toggle="tooltip" data-placement="top" title="Janette" alt="avatar">' +
        '                                                                <div class="status">' +
        '                                                                    <i class="material-icons online">fiber_manual_record</i>' +
        '                                                                </div>' +
        '                                                                <div class="data">' +
        '                                                                    <p> <b>'+e.userName+' </b><b class="text-info">'+e.notification_text+'</b> </p>' +
        '                                                                    <p>'+e.details+'</p>' +
        '                                                                    <span>'+e.created_at+'</span>' +
        '                                                                </div>' +
        '                                                            </a>')

}

function NumberOfUnreadNotifications(){
    $.ajax({
        method:"post",
        url:"/NumberOfNotifications",
        data:{
            '_token':$('meta[name=csrf-token]').attr('content')
        },
        success:function (result){
            if (result == 0) {
                $('#badgeSidebarNotifications').addClass('d-none')
            }else{
                $('#badgeSidebarNotifications').removeClass('d-none')
                $('#badgeSidebarNotifications').html(result);
            }

        }
    })


}

function scrollToBottom(el)
{ el.scrollTop = el.scrollHeight; }


$('.showAllNotifications').on('click',function(e) {
    e.preventDefault();
    if(window.location.pathname.search('/Chat') < 0){
        window.location='/Chat#notifications'
    }
    $('#menuSidebar a[href="#notifications"]').tab('show');
    scrollToBottom(document.getElementById('content'));
});
const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success mx-2',
        cancelButton: 'btn btn-danger mx-2'
    },
    buttonsStyling: false
})

$(document).on('click','.DeleteButton',function(e){
    e.preventDefault();
    let url = $(this).attr('href');
    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.dismiss !== Swal.DismissReason.cancel) {

           window.location=url;
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
            )
        }
    })
})


