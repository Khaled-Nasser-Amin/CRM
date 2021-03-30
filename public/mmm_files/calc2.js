$(function()
{
    $("body").on("submit", "#send-offer-modal", function(){
        $('#calc-form [name]').not(':submit').clone().hide().appendTo('#send-offer-modal');
    });

    //عدد الدفعات السنوية
    var payments_trigger = "yearly";

    var size = document.getElementById("size"),
    meter_price = document.getElementById("meter_price"),
    unit_price = document.getElementById("unit_price");

    size.onkeyup = function()
    {
        unit_price.value = size.value * meter_price.value;
        $(".amount_type").trigger("change");
        calcMonthlyAmount();
    };
    
    meter_price.onkeyup = function () 
    {
        unit_price.value = size.value * meter_price.value;
        $(".amount_type").trigger("change");
        calcMonthlyAmount();


    };

    var inputForYear = document.getElementById("inputForYear"),
    inputForMonth = document.getElementById("inputForMonth"),
    total_months = document.getElementById("total_months");

    function calcDuration()
    {
        total_months.value =  ( inputForYear.value * 12 ) + ( inputForMonth.value * 1 );
        return total_months.value;
    }
    inputForYear.onchange = function()
    {
        calcDuration();
        calcMonthlyAmount();

    };

    $(inputForMonth).on("change", function(){
        calcDuration();
        calcMonthlyAmount();

    });
    function handleAmount(changed_node)
    {
        
        var amount_container = changed_node.parents(".amount_container");
        var unit_price = parseFloat( $("#unit_price").val() );
        var amount_type = amount_container.find(".amount_type:checked").attr("amount_type");
        var amount_input = amount_container.find(".amount");
        var amount = parseFloat( amount_input.val() ) ;
        amount = isNaN(amount) ? 0 : amount;

        var value = 0;

        switch(amount_type)
        {
            case "fixed":
            value = amount;
            break;

            case "percentage":
            value = amount * unit_price / 100;
            value = isNaN(value) ? 0 : value;
            break;

            
            case "none":
            value = 0;
            amount_input.val("");
            break;

            default:
            value = 0;
            break;
        }
        var amount_preview =  amount_container.find(".amount_preview");
        amount_preview.val(value);
    }


    $('.amount_type').on("change", function(){
        handleAmount($(this));
        calcMonthlyAmount();

    });

    $('.amount').on("change, keyup", function(){
        handleAmount($(this));
        calcMonthlyAmount();

    });    

    $('[name="installment_interval"]').on("change", function(){
        calcMonthlyAmount();

    });    

    $("#payments_trigger").on("change", function(){
        var val = $(this).val();
        payments_trigger = val;
        var to_be_hide = $(".to_be_hide");
        if(val == 'none')
        {
            to_be_hide.find('input').not('[type="checkbox"]').val("");
            to_be_hide.hide();
        }
        else
        {
            to_be_hide.show();
        }
        calcMonthlyAmount();

    });

    function calcMonthlyAmount()
    {
        var total_months = parseInt( calcDuration() ) || 0;
        var payments_count = 0;

        var other_payments_amount = parseFloat( $("#other_payments_amount").val() )
        switch(payments_trigger)
        {
            case 'yearly':
            payments_count = parseInt( ( total_months / 12 ) );
            break;

            case 'half':
            payments_count = parseInt( ( total_months / 6 ) );
            break;

            case 'quarter':
            payments_count = parseInt( ( total_months / 4 ) );

            break;

            default:
            payments_count = 0;

            break;
        }
        var total_payments = parseFloat( payments_count * other_payments_amount ) || 0;

        var deposit_amount = parseFloat( $("#deposit_amount").val() ) || 0;
        var contract_amount = parseFloat( $("#contract_amount").val() ) || 0;
        var receive_amount = parseFloat( $("#receive_amount").val() ) || 0;
        var total = total_payments + deposit_amount + contract_amount + receive_amount;
        var total_paid_without_installment = parseFloat( $(unit_price).val() )- total;
        var monthly_amount = total_paid_without_installment / total_months;

        var installment_interval = $('[name="installment_interval"]:checked').val();  

        switch(installment_interval)
        {
            case 'quarterly':
            var installment_interval_months = 3;
            break;

            case 'half_yearly':
            var installment_interval_months = 6;
            break;

            default:
            var installment_interval_months = 1;

            break;
        }

        monthly_amount = isNaN(monthly_amount) ? 0 : monthly_amount;
        monthly_amount = isFinite(monthly_amount) ? monthly_amount : 0;
        monthly_amount = monthly_amount.toFixed(2);

        var installment_amount = installment_interval_months * monthly_amount;
        installment_amount = installment_amount.toFixed(2);
        $("#monthly_amount").val(installment_amount);
    }
});



// Main Form Validation
// Calculator 
 try {
    var size = $('#size');
    var meter_price = $('#meter_price');
    $('.price-show-btn').on('click', function(e){
        
        if(size.val() == '' || meter_price.val() == '' ){
            e.stopPropagation();   
            alert('Please type Unit Size and Meter Price'); 
            size.focus();
            if(size.val().length > 0){meter_price .focus();}
        } else {
            $('#send-offer-modal').modal('show');
        }
    });
} catch(e) {

}



// Modal Validation
var frm = $('#send-offer-modal');

frm.on('submit', function(e){
    
    var send_method_checked_values = $('[name="send_method[]"]:checked').map(function(i, ele){ return $(ele).val() }).toArray();
    var select_lead = $('#leads')
    var emails = $('#emails');
    var phones = $('#phones');

    if (send_method_checked_values.length == 0) 
    {
        e.preventDefault();
        alert('Please choose sending method');
    }
    
    if( send_method_checked_values.indexOf('sms') > -1 && phones.val() == "" &&  select_lead.val().length == 0 )
    {
        e.preventDefault();
        alert('Please type a phone number');
        phones.focus();

        phones.on('keyupy', function(){
            if (phones.val().length < 11)
            {
                e.preventDefault();
                alert('Please type a valid phone number');
            }
        })
    }
    
    
    
    if( send_method_checked_values.indexOf('email') > -1 && emails.val() == "" &&  select_lead.val().length == 0 )
    {
        e.preventDefault();
        alert('Please type an email');
        emails.focus();
    }

    
});






