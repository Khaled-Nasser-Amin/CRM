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
        console.log(e);
    });
