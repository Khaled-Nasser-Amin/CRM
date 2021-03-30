function inactiveNotify(obj)
{
    obj.title = obj.title || 'Notification';
    obj.body = obj.body || obj.title;
    obj.icon = obj.icon || '/app/img/favicon.ico';
    obj.url = obj.url || window.location.href;

    if (! ('Notification' in window)) {
        alert('Web Notification is not supported');
    }
    else
    {
        Notification.requestPermission( permission => {
            var notification = new Notification(obj.title, obj);

            notification.onclick = () => {
                // window.open(obj.url);
                window.focus()

            };
        });
    }
};

(function() {
    var hidden = "hidden";
  
    // Standards:
    if (hidden in document)
      document.addEventListener("visibilitychange", onchange);
    else if ((hidden = "mozHidden") in document)
      document.addEventListener("mozvisibilitychange", onchange);
    else if ((hidden = "webkitHidden") in document)
      document.addEventListener("webkitvisibilitychange", onchange);
    else if ((hidden = "msHidden") in document)
      document.addEventListener("msvisibilitychange", onchange);
    // IE 9 and lower:
    else if ("onfocusin" in document)
      document.onfocusin = document.onfocusout = onchange;
    // All others:
    else
      window.onpageshow = window.onpagehide
      = window.onfocus = window.onblur = onchange;
  
    function onchange (evt) {
      var v = "visible", h = "hidden",
          evtMap = {
            focus:v, focusin:v, pageshow:v, blur:h, focusout:h, pagehide:h
          };
  
      evt = evt || window.event;
      if (evt.type in evtMap)
        Window.is_active = evtMap[evt.type];
      else
        Window.is_active = this[hidden] ? "hidden" : "visible";
    }
  
    // set the initial state (but only if browser supports the Page Visibility API)
    if( document[hidden] !== undefined )
      onchange({type: document[hidden] ? "blur" : "focus"});
  });


  ////////////////////// Methods ///////////////////////
var pushNotifications = {
    /**
     * Register the service worker.
     */
    registerServiceWorker : function () {
        
        if (!('serviceWorker' in navigator)) {
          console.log('Service workers aren\'t supported in this browser.')
          return
        }
  
        navigator.serviceWorker.register(service_worker_url)
          .then(() => this.initialiseServiceWorker())
    },
  
    initialiseServiceWorker : function () {
        
        if (!('showNotification' in ServiceWorkerRegistration.prototype)) {
          console.log('Notifications aren\'t supported.')
          return
        }
  
        if (Notification.permission === 'denied') {
          console.log('The user has blocked notifications.')
          return
        }
  
        if (!('PushManager' in window)) {
          console.log('Push messaging isn\'t supported.')
          return
        }
  
        navigator.serviceWorker.ready.then(registration => {

          registration.pushManager.getSubscription()
            .then(subscription => {
                this.pushButtonDisabled = false
    
                if (!subscription) {
                    return
                }
    
                this.updateSubscription(subscription)
    
                this.isPushEnabled = true
            })
            .catch(e => {
                console.log('Error during getSubscription()', e)
            })
            registration.update(); 
        })
    },
  
    /**
     * Subscribe for push notifications.
     */
    subscribe : function () {

        navigator.serviceWorker.ready.then(registration => {
            const options = { userVisibleOnly: true }
            // const vapidPublicKey = window.Laravel.vapidPublicKey
            const vapidPublicKey = vapid_public_key

            if (vapidPublicKey) {
            options.applicationServerKey = this.urlBase64ToUint8Array(vapidPublicKey)
            }


            registration.pushManager.subscribe(options)
            .then(subscription => {
                
                this.isPushEnabled = true
                this.pushButtonDisabled = false

                this.updateSubscription(subscription)
            })
            .catch(e => {
                if (Notification.permission === 'denied') {
                console.log('Permission for Notifications was denied')
                this.pushButtonDisabled = true
                } else {
                console.log('Unable to subscribe to push.', e)
                this.pushButtonDisabled = false
                }
            })
        })
    },

    /**
     * Unsubscribe from push notifications.
     */
    unsubscribe : function () {
        navigator.serviceWorker.ready.then(registration => {
            registration.pushManager.getSubscription().then(subscription => {
            if (!subscription) {
                this.isPushEnabled = false
                this.pushButtonDisabled = false
                return
            }

            subscription.unsubscribe().then(() => {
                this.deleteSubscription(subscription)

                this.isPushEnabled = false
                this.pushButtonDisabled = false
            }).catch(e => {
                console.log('Unsubscription error: ', e)
                this.pushButtonDisabled = false
            })
            }).catch(e => {
            console.log('Error thrown while unsubscribing.', e)
            })
        })
    },

    /**
     * Toggle push notifications subscription.
     */
    togglePush : function () {
        if (this.isPushEnabled) {
            this.unsubscribe()
        } else {
            this.subscribe()
        }
    },

    /**
     * Send a request to the server to update user's subscription.
     *
     * @param {PushSubscription} subscription
     */
    updateSubscription : function (subscription) {
        const key = subscription.getKey('p256dh')
        const token = subscription.getKey('auth')
        const contentEncoding = (PushManager.supportedContentEncodings || ['aesgcm'])[0]

        const data = {
            endpoint: subscription.endpoint,
            publicKey: key ? btoa(String.fromCharCode.apply(null, new Uint8Array(key))) : null,
            authToken: token ? btoa(String.fromCharCode.apply(null, new Uint8Array(token))) : null,
            contentEncoding
        }

        this.loading = true
        $.post('/web-push-subscriptions', data)
            .then(() => { this.loading = false })
    },

    /**
     * Send a requst to the server to delete user's subscription.
     *
     * @param {PushSubscription} subscription
     */
    deleteSubscription : function (subscription) {
        this.loading = true

        axios.post('/web-push-subscriptions/delete', { endpoint: subscription.endpoint })
            .then(() => { this.loading = false })
    },

    /**
     * Send a request to the server for a push notification.
     */
    sendNotification : function () {
        this.loading = true

        axios.post('/notifications')
            .catch(error => console.log(error))
            .then(() => { this.loading = false })
    },

    /**
     * https://github.com/Minishlink/physbook/blob/02a0d5d7ca0d5d2cc6d308a3a9b81244c63b3f14/app/Resources/public/js/app.js#L177
     *
     * @param  {String} base64String
     * @return {Uint8Array}
     */
    urlBase64ToUint8Array : function (base64String) {
        const padding = '='.repeat((4 - base64String.length % 4) % 4)
        const base64 = (base64String + padding)
            .replace(/\-/g, '+')
            .replace(/_/g, '/')

        const rawData = window.atob(base64)
        const outputArray = new Uint8Array(rawData.length)

        for (let i = 0; i < rawData.length; ++i) {
            outputArray[i] = rawData.charCodeAt(i)
        }

        return outputArray
    }
}


pushNotifications.registerServiceWorker();
pushNotifications.subscribe();