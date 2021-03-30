/****************** General *******************/ 

$(document).ready(function() {

      // Check All 
    // $('#leads_table, #leads_table').on('change','.leads-checkbox[type="checkbox"]',function(){
    //   if (this.checked) {
    //       $('#bulk_action').css('visibility', 'visible');
    //       $(this).parents('tr').addClass('selected');
    //   } else {
    //       $(this).parents('tr').removeClass('selected');
    //   }
    //   if ($('.leads-checkbox:checked').length == 0) {
    //       $('#bulk_action').css('visibility', 'hidden');
    //       $('.leads-checkbox[type="checkbox"]').parents('tr').removeClass('selected');
    //   }
    // });

//   $('#size').on('change', function(){
//     var size__val = $(this).val();
//     console.log(size__val);
//     $("#_form_info_show").html(size__val)
// });

  /* Uploads Preview with Remove */

  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove image</span>" +
            "</span>").insertAfter("#files");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }

  /* //Uploads Preview with Remove */


}); //End Of Document Ready



// Downloadable Files
function downloadURL(url){
  var a = document.createElement("a");
  a.href = url;
  fileName = url.split("/").pop();
  a.download = fileName;
  document.body.appendChild(a);
  a.click();
  window.URL.revokeObjectURL(url);
  a.remove();
}



// Function for Profile Image Upload Preview
function setImg(inputFile, img)
{
  $(inputFile).on("change", function(){
    // Get Upload File Temp Path
    var tmpath = URL.createObjectURL(this.files[0]);
    // Set The Src of Img
    $(img).attr("src", tmpath)
  }); 
}

// Usage
/*
var inputFile = $("#inputGroupFile01");
var imgF = $(".rounded-circle");
setImg(inputFile, imgF)
*/



//*************************** Units ************************************

// Units Index
//Alert
var units_alert_btn = $('#units #alert_show_btn'); //Alert Btn
var units_alert_modal = $('#units #units_alert_modal'); // Alert modal
var units_alert_modal_frm = $('#units_alert_modal_frm'); // Alert modal --> Form
var units_alert_modal_date = $('#units_alert_modal_frm .datetimepicker'); // Alert Modal --> Date
var units_alert_modal_notes = $('#units_alert_modal_frm #alert_notes_data'); // Alert Modal --> Notes

units_alert_btn.on('click', function(){
	var alert_url = $(this).attr('data-url');
	var alert_date = $(this).attr('data-date');
	var alert_notes = $(this).attr('data-notes');
	units_alert_modal_frm.attr('action', alert_url);
	$('#units_alert_modal_frm .datetimepicker').data("DateTimePicker").date(alert_date);
	units_alert_modal_notes.val(alert_notes);
	
})
// Units Index
// Update
var units_update_btn = $('#units #units_update_btn');
var units_update_modal_form = $('#units_update_modal #unit_update_frm');

units_update_btn.on('click', function(){
	var update_url =  $(this).attr('data-url');
	if($(this).attr('data-is-available') == 1)
   {
     $('#unit_update_frm [value="1"]').prop("checked", true)
   }
    else
   {
    $('#unit_update_frm [value="0"]').prop("checked", true)
   }
	units_update_modal_form.attr('action', update_url)
})






// Tooltip
$('.cus-tooltip').tooltip();
$('[data-toggle="tooltip"]').tooltip(); 


// Customer Service Script
var cc_script_btn = $('.cc-script-btn');
var cc_script_modal = $('#cc_script_modal');

$("body").on("click", '.cc-script-btn', function(e){
  var c_text = $(this).attr('cc_script');
  var c_action = $(this).attr('cc_script_update_url');
  if($(this).attr('is_editable') == 1)
  {
    $('.cc-script-textarea').show();
    $('.cc-script-textarea').text(c_text);
    $('.cc-script-text').hide();
    $('#cc_script_frm').attr('action', c_action);
  }
  else
  {
    $('.cc-script-text').html(c_text);
    $('.cc-script-text').show();
    $('#cc_script_frm .btn-success').hide();
    $('.cc-script-textarea').hide();
  }
})


// Show AjaxSpin on Form Submit
$('body').on('submit', function(){
	$('.ajaxLoadSpin').css('display', 'block')
})
/***************** //General ******************/ 



// Add Unit - Show/ Hide Monthly Rent Field
var status_selector = $('#add-unit #status_selector');
var for_sell_selector = $('#add-unit #for_sell_selector');
var monthly_rent_cost = $('#add-unit #monthly_rent_cost');
var is_furnished = $('#add-unit #is_furnished');
var meter_price = $('#add-unit #meter_price');
var selling_price = $('#add-unit #selling_price');
monthly_rent_cost.hide();

status_selector.on('change', function(){
  if(status_selector.val() == "sell")
  {
    selling_price.show();
    meter_price.show();
    monthly_rent_cost.hide();
    monthly_rent_cost.find('input[type="number"]').val("");
    is_furnished.hide();
    is_furnished.find('input[type="checkbox"]').prop('checked', false);
    console.log('sell');
  } 
  else if (status_selector.val() == "sell_rent")
  {
    selling_price.show();
    meter_price.show();
    monthly_rent_cost.show();
    console.log('sell or rent');
  }
  else
  {
    monthly_rent_cost.show();
    is_furnished.show();
    selling_price.hide();
    selling_price.find('input[type="number"]').val("");
    meter_price.hide();
    meter_price.find('input[type="number"]').val("");
    console.log('rent');
  }
})
/***************** Properties ***************/ 



/****************** Users *******************/ 
// Role Page
var role_del_btn = $('#users_roles #role_del_btn');
var role_remove_mdl = $('#role_remove_mdl');

role_del_btn.on('click', function(){
    var role_action = $(this).attr('delete_url');
    role_remove_mdl.attr('action',role_action);
});
/*************** //Users *******************/ 


/*************** Ledas *********************/
 
/*************** //Ledas *********************/





function getQueryParams(qs) {
  qs = qs || window.location.search;
  qs = qs.split('+').join(' ');
  var params = {},
      tokens,
      re = /[?&]?([^=]+)=([^&]*)/g;

  while (tokens = re.exec(qs)) {
      params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
  }

  return params;
}


// Add Unit - Show/ Hide Template, Building Size Field
var unit_cat = $('#add-unit #unit_cat');
var building_area_size = $('#add-unit #building_area_size');
var template = $('#add-unit #template');
var template_inp = $('#template_inp');

unit_cat.on('change', function(){
  var selectedVal = $(this).val();
  if(selectedVal == 1 || selectedVal == 34 ) // Shop, Flat
  {
    $('#garden_size').show();
  }
  else
  {
    $('#garden_size').hide();
    $('#garden_size').find('input[type="number"]').val("");
  }
  if(selectedVal == 8) // Villa
  {
    building_area_size.show();
    template.show();
  }
  else if(selectedVal == 34)
  {
    template.show();
    building_area_size.hide();
    building_inp_size.val('');
  }
  else
  {
    building_area_size.hide();
    building_inp_size.val('');
    template.hide();
    template_inp.val('');
  }
});

// Add Unit Pricing
var unit_inp_size = $('#add-unit #unit_inp_size');
var building_inp_size = $('#building_inp_size');
var meter_inp_price = $('#meter_inp_price');
var selling_inp_price = $('#add-unit #selling_inp_price');
var builErr = "<small class='text-danger buil-err-msg'>" + trans('bui_err_msg') + "</small>"

// $("body").on('keyup','#meter_inp_price', function(){
//   console.log('test')
// });

// selling_inp_price.on('change', function(){
//     var sellingPriceVal = $(this).val();
//     if(unit_inp_size.val() > 0)
//     {
//       var meterSizeVal = parseFloat(sellingPriceVal / unit_inp_size.val()) || 0;
//       meterSizeVal = meterSizeVal.toFixed(2);
//       meter_inp_price.val(meterSizeVal);
//     }
    
// });




unit_inp_size.on('keyup', function(){
  var unitSizeVal = parseFloat($(this).val());
  var sellingPriceVal = unitSizeVal * meter_inp_price.val();
  sellingPriceVal = sellingPriceVal ? Math.ceil(sellingPriceVal/10)*10 : 0;
  selling_inp_price.val(sellingPriceVal);
  if(unitSizeVal < parseFloat(building_inp_size.val()))
  {
    $('.buil-err-msg').hide();
    building_inp_size.after(builErr);
    parseFloat(building_inp_size.val(0));
  }
  else
  {
    $('.buil-err-msg').hide();
  }

});

meter_inp_price.on('keyup', function(){
  var meterSizeVal = $(this).val();
  var sellingPriceVal = meterSizeVal * unit_inp_size.val();
  selling_inp_price.val(sellingPriceVal);
});

selling_inp_price.on('keyup', function(){
  var sellingPriceVal = parseFloat($(this).val());
  if(unit_inp_size.val() > '')
  {
    var meterSizeVal = parseFloat(sellingPriceVal / unit_inp_size.val()) || 0;
    meterSizeVal = meterSizeVal.toFixed(2);
    meter_inp_price.val(meterSizeVal);
  }
  
});

building_inp_size.on('keyup', function(){
    buildingSizeVal = parseFloat($(this).val());
    if(unit_inp_size.val() > '')
    {
        if(buildingSizeVal > parseFloat(unit_inp_size.val()))
        {
            $('.buil-err-msg').remove();
            building_inp_size.after(builErr);
            parseFloat(building_inp_size.val(unit_inp_size.val()));
        }
        else
        {
            $('.buil-err-msg').hide();
        }
    }

});

// Show Unit
var alert_show_btn = $('#unit-show #alert_show_btn');
var alert_edit_btn = $('#unit-show #alert_edit_btn');
var alert_del_btn = $('#unit-show #alert_del_btn');


var unit_alert_date_modal_show = $('#unit-show #unit_alert_date_modal_show'); // show alert modal
var alert_show_notes_data = $('#unit_alert_date_modal_show #alert_notes_data');
var unit_alert_date_modal = $('#unit-show #unit_alert_date_modal'); // Edit and add alert modal
var alert_show_date_data_edit = $('#unit_alert_date_modal #alert_date_add_edit'); 
var alert_show_notes_data_edit = $('#unit_alert_date_modal textarea'); 
var unit_delete_modal = $('#unit-delete-modal #unit_modal_frm'); // delete alert modal

alert_show_btn.on('click', function(){
  var alert_notes = $(this).attr('data-alert-notes');
  alert_show_notes_data.html(alert_notes);
})
alert_edit_btn.on('click', function(){
  var data_date = $(this).attr('data-date');
  var alert_notes = $(this).attr('data-alert-notes');
  var data_url = $(this).attr('data-url');
  unit_alert_date_modal.attr('action', data_url)
  alert_show_notes_data_edit.val(alert_notes);
  alert_show_date_data_edit.data("DateTimePicker").date(data_date);
  
})
alert_del_btn.on('click', function(){
  var data_url = $(this).attr('data-url');
  unit_delete_modal.attr('action', data_url)
})

var update_btn = $('#unit-show #update_btn');
var unit_update_modal = $('#unit_update_modal #unit_update_frm');

update_btn.on('click', function(){
  if($(this).attr('data-is-available') == 1)
  {
    $('[value="available"]').prop("checked", true)
  }
  else
  {
    $('[value="unavailable"]').prop("checked", true)
  }
})





$(function(){
// Alert Date Notification
var units_notify;


    $.ajax({
    url : units_alerts_check_url,
    type: 'get',
    success: function(res){
        if (res.data.units_count != 0 )
        {

        try {units_notify.close()}catch(e){}
            setTimeout(function(){ 
            var message = trans('units_alerts_notification_sentence');
            var count = res.data.units_count;
            units_notify = $.notify({
            message: count + ' ' + message,
            url: units_alerts_url,
            },{
                type: 'danger',
                delay: 0,
                placement: {
                from: "bottom",
                align: "right"
                },
                allow_dismiss: true,
            }); 
            var snd = new Audio('/sounds/ping-bing_E_major.mp3');
            snd.play();
            }, 10000);
            
            // console.log(res.data.units_count);
        }
    }
    })
    
    setInterval(function(){
        $.ajax({
        url : units_alerts_check_url,
        type: 'get',
        success: function(res){
            if (res.data.units_count != 0 )
            {

            try {units_notify.close()}catch(e){}
                setTimeout(function(){ 
                var message = trans('units_alerts_notification_sentence');
                var count = res.data.units_count;
                units_notify = $.notify({
                message: count + ' ' + message,
                url: units_alerts_url,
                },{
                    type: 'danger',
                    delay: 0,
                    placement: {
                    from: "bottom",
                    align: "right"
                    },
                    allow_dismiss: true,
                }); 
                var snd = new Audio('/sounds/ping-bing_E_major.mp3');
                snd.play();
                }, 10000);
                
                // console.log(res.data.units_count);
            }
        }
        })
    }, 60000);
});
// Tooltip
$('.cus-tooltip').tooltip();
$('[data-toggle="tooltip"]').tooltip(); 

function uniqueByColumn(arr,column)
{
  var newArr = [];
  for(var i in arr)
  {
    var value = arr[i][column];
    if( !newArr.filter(function(val){ return val[this[0]] == this[1]},[column,value]).length && value != '')
    {
      newArr.push(arr[i]);
    }
  }
  return newArr;
}

function roundUp(num, precision) {
    precision = Math.pow(10, precision)
    return Math.ceil(num * precision) / precision
  }
  