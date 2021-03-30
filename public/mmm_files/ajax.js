


$body = $("body");

$(document).on({
    // ajaxStart: function() { $body.addClass("loading");    },
    // ajaxStop: function() { $body.removeClass("loading"); }    
});



//configue default settings for ajax
$.ajaxSetup({
    dataType : 'json',
    global: true,
    timeout: 600000, // sets timeout to 60 seconds
    // processData: false,
    // contentType: false,    
});

//refresh on click back or forward
$(window).on('popstate', function() {
    location.reload(true);
});

function replaceUrl(newUrl) {
    if (window.history.pushState) {
        /*
         ** Changing full URL (the domain and protocol must be the same as original!) Chrome, Firefox, IE10+
         */
        //window.history.pushState('data to be passed', 'Title of the page',/test');
        /*
         ** The above will add a new entry to the history so you can press Back button to go to the previous state. To change the URL in place without adding a new entry to history use
         */
        window.history.replaceState(newUrl, $('title').val(), newUrl);
    } else {
        window.location.href = newUrl;
    }
}

function pushUrl(newUrl) {
    if (window.history.pushState) {
        /*
         ** Changing full URL (the domain and protocol must be the same as original!) Chrome, Firefox, IE10+
         */
        //window.history.pushState('data to be passed', 'Title of the page',/test');
        /*
         ** The above will add a new entry to the history so you can press Back button to go to the previous state. To change the URL in place without adding a new entry to history use
         */
        window.history.pushState(newUrl, $('title').val(), newUrl);
    } else {
        window.location.href = newUrl;
    }
}

function ajax(obj)
{
    // var url = obj.url;
    // var method = obj.method || 'get';
    // var formData = obj.data || {};
    var success = obj.success; //first request
    var error = obj.error; //first request
    var complete = obj.complete; //first request
    var beforeLoad = obj.beforeLoad; //second request if exist
    var afterLoad = obj.afterLoad; //second request if exist

    ////////////////////////////////////////
    //// custom keys to handle extra jobs //
    ////////////////////////////////////////
    var fresh = obj.fresh == undefined ? true : obj.fresh; //set if there elements will be refreshed
    var elementsToBeRefreshed = obj.freshEelements || ''; //every element must start with # EX : '#contianer, #content'
    var refreshUrl = obj.freshUrl ; //link that will get html from it
    var freshEffect = obj.freshEffect == undefined ? true : obj.freshEffect; // fresh effect status
    var effectOn = obj.freshEffectOn;  // choose element to show effects on it EX : '.comment-parent:last'
    var defaultSuccess = obj.defaultSuccess || false;  // run successCallback(response) by default
    var defaultError = obj.defaultError || false;  // run errorCallback(errors) by default
    var ajaxLoader = obj.loader == undefined ? true : obj.loader; //fire ajax loader before sending ajax by default


    if( ajaxLoader == true )
    {
        $("#ajaxLoadSpin").show();
    }

    obj.success = function(response) {
        
        refreshUrl = refreshUrl|| response.refererUrl;
        console.log(refreshUrl);
        if( fresh == true && elementsToBeRefreshed.trim() != '' && refreshUrl != undefined)
        {
        console.log(refreshUrl);

            if(typeof beforeLoad == 'function')
            {
                beforeLoad(response);
            }   

            //load the element after update
            ajax_load(refreshUrl, elementsToBeRefreshed, function() {
                console.log(refreshUrl);

                if(typeof afterLoad == 'function')
                {
                    afterLoad(response);
                }           
                if(defaultSuccess == true)
                {
                    successCallback(response);
                }                        
                if( true === freshEffect )
                {
                    load_callback(effectOn);
                }                
            });
        }
        else
        {
            if(typeof success == 'function')
            {
                success(response);
            }           
            if(defaultSuccess == true)
            {
                successCallback(response);
            }  
        }
    }
    //error function
    obj.error = function(xhr, ajaxOptions, thrownError) {
        //perform errors if form has submit button (if the form exist not get request)
        console.log(xhr);
        var jsonRes = xhr.responseText != undefined ? JSON.parse(xhr.responseText) : undefined;
        var errors = jsonRes != undefined ? jsonRes.errors : [];
        var message = jsonRes != undefined ? jsonRes.message : 'Error Occured.';
        errors = typeof errors == "string" ? [ errors ] : errors;

        if( xhr.statusText == "timeout")
        {
            errors = ['Timeout, please try again.'];
        }

        if(defaultError)
        {
            errorCallback(errors, message);
        }
        if(typeof error == 'function' )
        {
            error(errors, message);
        }

        if(typeof afterLoad == 'function')
        {
            afterLoad(xhr);
        }           
    }
    //complete function
    obj.complete = function(xhr, textStatus) { if(typeof complete == 'function') complete(xhr); };    

    $.ajax(obj);
    
}

function ajax_load(loadUrl, elementsToBeRefreshed, callback) {

    try {
        elements = elementsToBeRefreshed.split(','); //get all refresh elements as array
    } catch (e) {
        elements = [];
    }
    var temp = $('<div/>');
    temp.load(loadUrl, function(response, status, xhr) {
        //update elements content from loaded temp div
        //loop in elements
        $.each(elements, function(index, val) {
            $(val).html($(val, temp).html()); //change old html with new
        });
        //check if there is callback function
        if (typeof callback === "function") {
            callback();
        }
    });
}
//to do after loading the element 
function load_callback(effectsOn) {
    var ele = effectsOn;
    //determine elemnet that will have the effects and scroll to
    if (typeof effectsOn != "undefined") {
        try{
            ele = $(ele);
            //fade in elementToFresh
            ele.css('background', '#e1e1e1').hide();
            /*setTimeout(function() { $('#'+updatedElment).fadeIn('slow',
                function(){$(this).stop().animate({background:'grey'});}
            ); },1000);*/
            ele.fadeTo('slow', 0.3, function() {
                $(this).css('background', 'white');
            }).fadeTo('slow', 1).focus();

            //get the element totatl height
            var totalHeight = 0;
            
            ele.children().each(function() {
                totalHeight = totalHeight + $(this).outerHeight(true);
            });
            $("html,body").animate({
                scrollTop: ele.offset().top - totalHeight
            });
        }
        catch(e)
        {
            
        }
    }
}


function successCallback(response)
{
    $("#ajaxLoadSpin").hide();
    try{
        var messages = response.message != undefined ? [ response.message ] : response.messages;
        for(var i in messages)
        {
            var message = messages[i];
            // $.amaran({
            //     content:{
            //         bgcolor:'#27ae60',
            //         color:'#fff',
            //         message: message,              
            //        },
            //     theme:'colorful',
            //     closeButton : true,
            //     closeOnClick : true                                   
            // }); 
            
            $.notify({
                icon: "add_alert",
                message: message
            }, {
                type: "success",
                timer: 1e1,
                placement: {
                    from: "bottom",
                    align: "right"
                }
            })            
            //swal("Success", message, "success");     
        }   
    }
    catch(e)
    {
        console.log(e);
    }

}

function errorCallback(errors, message)
{
    
    $("#ajaxLoadSpin").hide();
    var errors_joined = [];
    try
    {
        for(var field_name in errors)
        {
            if(errors.hasOwnProperty(field_name))
            {
                var error = errors[field_name];
                try{
                    var $ele = $('[name="' + field_name + '"]');
                    $ele.addClass("is-invalid");

                    //check if the error contain many messages
                    if( error.constructor == Array )
                    {
                        error = error.join('\n'); //get single error messages as single message
                    }

                    //clear old feedback if exist
                    $ele.parent().find(".invalid-feedback").remove();
                    //show single error message in feedback container
                    var error_feedback = $('<div class="invalid-feedback"></div>');
                    error_feedback.append(error);
                    $ele.after(error_feedback);

                    //focus on first element
                    if( Object.keys(errors).indexOf(field_name) == 0 )
                    $ele.focus();

                }
                catch(e)
                {
                }
                errors_joined.push(error);
            }
        }
        // $.amaran({
        //     content:{
        //         bgcolor:'#c0392b',
        //         color:'#fff',
        //         message: message || errors_joined,                   
        //        },
        //     theme:'colorful',
        //     closeButton : true,
        //     closeOnClick : true                             

        // });      
        $.notify({
            icon: "add_alert",
            message: errors_joined
        }, {
            type: "danger",
            timer: 2e2,
            placement: {
                from: "bottom",
                align: "right"
            }
        })         
    }
    catch(e)
    {
        console.log(e);
    }    
}