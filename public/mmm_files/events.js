
$(function(){

    var datatables_lang_url = function ()
    {
        var lang = app_lang == 'ar' ? '/ar/' : '/';
        return lang + 'datatables';
    }();
    $.extend( true, $.fn.dataTable.defaults, {
        language: {
            "url": datatables_lang_url,            
        },
    } );    

    // Add & Edit Lead Modal
    // $("#lead-modal-normal-frm").on('submit', function(e){
    //     e.preventDefault();
    //     var data = $(this).serializeArray();
    //     var action = $(this).attr('action');
    //     var $form = $(this);
    //     ajax({
    //         url : action,
    //         data : data,
    //         type : 'post',
    //         defaultSuccess : true,
    //         defaultError : true,
    //         success : function(){
    //             try{ leads_table.ajax.reload() } catch(e){};
    //             $("#lead-modal-parent").find('form').trigger("reset");
    //             $("#lead-modal-parent").modal("hide");
    //             $('.selectpicker').selectpicker('refresh');
    //             $form.find('button').removeAttr("disabled");
    //         },
    //     });
    // });

    $("#lead-modal-normal-frm").on('submit', function(e){
        $("#ajaxLoadSpin").show();
        $(this).find('button').attr('disabled', 'disabled');

    });  
    

    // var button_s =  $("#lead-modal-normal-frm").find('button[type="submit"]');
    $('body').on('click', '#if_on_click', function(){
        var value_text = $("#select-group").find(".filter-option-inner-inner").text();
        var input_name = $('#lead-modal-normal-frm').find('.name').val().length;
        var input_phone = $('#lead-modal-normal-frm').find('.phone').val().length;
        
        if( ( value_text == "إسم الحملة الإعلانية" || value_text == "Campaign Name" ) && input_name > 0  && input_phone > 0 ){
            $('#select-group').find('.filter-option').css({ 'border' : 'solid 1px red', 'color' : 'red' })

        }
    });

    $('#lead-modal-parent').on('hidden.bs.modal', function () {
        $(this).find('[name="lead_id"]').val('');
        $(this).find('form').trigger('reset');
    });

    $('body').on('click', '.edit-lead', function(){
        var lead_id = $(this).attr('lead_id');
        $("#lead-modal-parent").find('[name="lead_id"]').val(lead_id);
    });
    // Hide/ Show Other Input in Add Lead Modal
    var lead_method = $('#lead_method');
    var lead_method_other_wrapper = $('#lead_method_other_wrapper');

    lead_method.on('change', function(){
        if ($(this).val() == 9)
        {
            lead_method_other_wrapper.show();
        }
        else 
        {
            lead_method_other_wrapper.hide();
            lead_method_other_wrapper.find('#lead_method_other_inp').val("");
        }
    });

    // Add Campaign Modal
    $("#campaign-modal").on('submit', function(e){
        e.preventDefault();
        var action = $("#campaign-modal").attr("action");
        var data = $("#campaign-modal").serializeArray();
        // var fresh = location.href.search("forms") > -1;

        ajax({
            url : action,
            data: data,
            type: 'post',
            fresh: true,
            freshEelements : "#leads-forms-table,#select-group, #camp-selectpicker",
            defaultSuccess: true,
            defaultError : true,
            complete: function(){
                $("#campaign-modal").trigger("reset").modal("hide");

            },
            afterLoad : function(){ 
                var last_opt_val = $('#camp-selectpicker, .camp-selectpicker').find('option:last').val();
                $('#camp-selectpicker, .camp-selectpicker').selectpicker('refresh').selectpicker('val', last_opt_val); 
                $('.selectpicker').selectpicker();
            }
        })
    });
    $("body").on("hidden.bs.modal", "#campaign-modal", function(){
        $(this).trigger("reset");
        $('.selectpicker').selectpicker();
    });

    // Cmpaign Cover
    $("body").on("change", "#cbanner", function(){
        $(".control-gp").show();
    });
    $("body").on("click", "#cancel-cov-btn", function(){
        var oldBg = $('#banner').attr("old-bg")
        $(".control-gp").hide();
        $("#banner").css("background", "url('" + oldBg + "')");
    });
    $("body").on("submit", "#campaign-cover-frm", function(e){
        e.preventDefault();
        var url = location.href;
        var frm = this;
        var data = new FormData(frm);
        ajax({
            url: url,
            data: data,
            type: 'post',
            fresh: true,
            freshEelements: "#banner",
            defaultSuccess: true,
            defaultError: true,
            success: function(){$(".control-gp").hide();}
        });
    });

    $("body").on("submit", '[ajax="yes"]', function(e){
        e.preventDefault();
        var frm = this;
        var $frm = $(frm);
        var action = $frm.attr("action");
        var method = $frm.find('[name="_method"]').val() || $frm.attr("method");
        var data = new FormData(frm);
        ajax({
            url: action,
            data: data,
            type: method,
            fresh: true,
            defaultSuccess: true,
            defaultError: true,
            processData: false,
            contentType: false, 
            success : function(res)
            {
                if( $frm.attr('success_callback') )
                {
                    eval($frm.attr('success_callback'));
                }
            },
            error : function(res)
            {
                if( $frm.attr('error_callback') )
                {
                    eval($frm.attr('error_callback'));
                }
            },
            complete : function(res)
            {
                $frm.trigger("reset");
                try{ $frm.parents('.modal').modal("hide"); } catch(e){};
                if( $frm.attr('complete_callback') )
                {
                    eval($frm.attr('complete_callback'));
                }
            }
        });
    });



    $('body').on('click', '.edit-lead', function(){
        
    });
    
    $("#btn-active").removeAttr("disabled").removeClass("disabled");

    $('body').on('hide.bs.dropdown', '.form-agents', function(){
            var $select = $(this).find("select");
            var url = $select.data('url');
            var new_values = $select.val().sort(function(a, b){return a - b});

            var data_old_values = $select.attr('data-old-values').split(",").sort(function(a, b){return a - b});
            $select.attr('data-old-values', new_values.join(","));

            if( new_values.join(",").trim() != data_old_values.join(",").trim() )
            {
                ajax({
                    url : url,
                    method : 'post',
                    data : { agents_ids : new_values },
                    defaultSuccess : true,
                    defaultError : true,
                    success : function(){ $select.attr('data-old-values', new_values); }
                });
            }
    });

    $('body').on('hide.bs.dropdown', '.project-agents', function(){
            var $select = $(this).find("select");
            var url = $select.data('url');
            var new_values = $select.val().sort(function(a, b){return a - b});

            var data_old_values = $select.attr('data-old-values').split(",").sort(function(a, b){return a - b});
            $select.attr('data-old-values', new_values.join(","));

            if( new_values.join(",").trim() != data_old_values.join(",").trim() )
            {
                ajax({
                    url : url,
                    method : 'post',
                    data : { agents_ids : new_values },
                    defaultSuccess : true,
                    defaultError : true,
                    success : function(){ $select.attr('data-old-values', new_values); }
                });
            }
    });

    //show table when typing anything in leads search
    $('body').on("keydown", '#leads [type="search"]', function(){
        $('.dt-buttons,#leads_table,.dataTables_info,.dataTables_paginate').show();

    });

    $('body').on('click', '[downloadable]', function(e){
        e.preventDefault();
        var url = $(this).attr("href");
        downloadURL(url);
    });
    

    app.init();

    // show the alert
    setTimeout(function() {
            $(".alert").alert('close');
        }, 7000);
});

var app = {};
app.init = function(){
    $('[data-toggle="popover"]').popover();
    //set active sidebar links 
    var full_current_url = location.href;
    var current_url = full_current_url.replace(/\/$/g, "").split("?")[0];
    try
    {

        $('.sidebar-wrapper').find('a[href="'+ current_url +'"]')
        .parent()
        .addClass('active')
        .parents(".nav-item")
        .find(".collapsed")[0]
        .click();
    }catch(e){}

    try
    {
        $('.sidebar-wrapper').find('a[href="'+ full_current_url +'"]')
        .parent()
        .addClass('active')
        .parents(".nav-item")
        .find(".collapsed")[0]
        .click();
    }catch(e){}

    $(".datetimepicker").datetimepicker({
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: "fa fa-chevron-left",
            next: "fa fa-chevron-right",
            today: "fa fa-screenshot",
            clear: "fa fa-trash",
            close: "fa fa-remove",
        },
    });

    $(".datepicker").datetimepicker({
        format: "DD/MM/YYYY",
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: "fa fa-chevron-left",
            next: "fa fa-chevron-right",
            today: "fa fa-screenshot",
            clear: "fa fa-trash",
            close: "fa fa-remove"
        }
    });

    $(".timepicker").datetimepicker({
        format: "h:mm A",
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: "fa fa-chevron-left",
            next: "fa fa-chevron-right",
            today: "fa fa-screenshot",
            clear: "fa fa-trash",
            close: "fa fa-remove"
        }
    });

  
}

// Password Confirmation Validation
try{

    var password = document.getElementById("password");
    var confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
      if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
      } else {
        confirm_password.setCustomValidity('');
      }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;

}
catch(e) {
    
}


// Image Upload Preview
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
    var image_container = $(input).parents(".image-upload-parent").find(".image-container");
    var image = image_container.find("img");
    image.attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("body").on("change", ".image-file",function() {
  readURL(this);
});


var logoc = $('.comp-logo');
var uploadc = $('.custom-file-input');

logoc.on('click', function(){
  uploadc.trigger('click');
});


// Required Fields Asterisk
try {
    var required = $('[required]');
    var asterisk ='<span class="astersik" >*</span>';
    required.after(asterisk);
    $("#lead-modal-parent").on('show.bs.modal', function(){
        $('.bootstrap-select + .astersik').css("display", "none");
      });
}
catch(e){
    
}




// Edit Users Button
try {
    var group = $(".edit_user_btn").attr("group");
    var selectedVal = $(' .filter-option-inner-inner');
    if (group == 2 ) {
        selectedVal.text('Users');
    } else {
        selectedVal.text('Admins');
    }
} catch(e) {
    
}

// Add Lead Symbol Button
try {
    var addBtn = $('.lead-add-symbol');
    addBtn.on('click', function(){
        $('.lead-a-wrapper').slideToggle();
    });
    $('.lead-a-wrapper .btn').on('click',function(){
        $('.lead-a-wrapper').hide();
    });
    // Hide Button On Click Anywhere Outside
    $(document).mouseup(function (ev){  
      var container = $(".lead-add-symbol"); 
      if (!container.is(ev.target))
      {
        $(".lead-a-wrapper").hide();
      }
    });

} catch(e) {
    
}

// Typing Direction
try {
    var rtlChar = /[\u0590-\u083F]|[\u08A0-\u08FF]|[\uFB1D-\uFDFF]|[\uFE70-\uFEFF]/mg;
    $(document).ready(function(){
        $('.form-control').keyup(function(){
            var isRTL = this.value.match(rtlChar);
            if(isRTL !== null) {
                this.style.direction = 'rtl';
             }
             else {
                this.style.direction = 'ltr';
             }
        });
    });
} catch(e){
    
}

// Destroy Perefect Scrollbar
$('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

/* Template
<div class="form-group image-upload-parent col-md-6 offset-md-3 ">           
  <div class="image-container ">
    <img class="comp-logo d-block mx-auto rounded-circle" src="{{ freshAsset('app/img/company.png') }}">
    <label class="text d-block mx-auto">Upload Logo</label>
  </div>
    
  <div class="custom-file ">
    <input type="file" class="custom-file-input image-file" name="logo" id="clogo">
    <label class="custom-file-label" for="customFile">Choose logo</label>     
    <div class="invalid-feedback"></div>  
  </div> 
</div>
*/



// Image Upload Preview End

$("body").on("click", ".important_btn", function(e){
    var important_btn = $('.important_btn');
    var url = important_btn.attr('important_update_url');
  
    var btn_new_val = important_btn.attr('is_important') == 1 ? 0 : 1;
    var data = {is_important: btn_new_val};
    ajax({
        url: url,
        data: data, 
        method: 'post',
        fresh: true,
        freshEelements: "#lead_top",
        freshUrl : location.href,
        defaultSuccess: true,
        defaultError: true,
        afterLoad: function(e){$('.selectpicker').selectpicker();}
    });
});


// Call Center Script
// $("body").on("submit", '#cc_script_frm', function(e){
//     e.preventDefault();
//     var url = $(this).attr('action');
//     var data = $(this).serializeArray();
//     ajax({
//       url: url,
//       data: data, 
//       method: 'post',
//       fresh: true,
//       freshEelements: "#important_wrapper",
//       freshUrl : url,
//       defaultSuccess: true,
//       defaultError: true,   
//     });
//   })