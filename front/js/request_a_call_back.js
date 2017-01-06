/**
 *This js is used at request_a_call_back.php page.
 *@since : 04-01-2016
 *@author : Poorvi Gandhi
 */

$(document).ready(function () {

    $('#country').change(function(){
        var country = $(this).val();
        $.ajax({
            url:"Home/ajax_get_country_code",
            type: 'POST',
            data: {cid:country},
            success: function (data, textStatus, jqXHR) {
                $('#country_code').val(data);
            }
        });
    });

    $('#phone').keydown(function (event) {
        if (this.value.length >= 10 ) {
            if (event.keyCode == 8)
                return true;
            else if (event.keyCode == 9){
                consol.log('0');
                $('#email').focus();
            }
            else
                event.preventDefault();
        }
    });

    $('.wellness-enquery').focus(function () {
        $('.validation').remove('.validation');
    });
    $('#submit').click(function (e) {
        var regex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);

        $('.validation').remove('.validation');
        var form_submit = true;$("#captcha-error").hide();
        if ($('#name').val() == "") {
            $("#name").parent().append("<div class='validation'>Please enter name</div>");
            form_submit = false;
        }
        if ($('#country').val() == "") {
            $("#country").parent().append("<div class='validation'>Please select country</div>");
            form_submit = false;
        }
        if ($('#preffered_call_date').val() == "") {
            $("#preffered_call_date").parent().append("<div class='validation'>Please preffered date for call</div>");
            form_submit = false;
        }
        if ($('#preffered_call_time').val() == "") {
            $("#preffered_call_time").parent().append("<div class='validation'>Please enter preffered time for call</div>");
            form_submit = false;
        }
        if ($('#country_code').val() == "") {
            $("#country_erdiv").append("<div class='validation'>Please enter country code </div>");
            form_submit = false;
        }

        if ($('#phone').val() == "") {
            $("#phone").parent().append("<div class='validation'>Please enter phone</div>");
            form_submit = false;
        }else if(!$('#phone').val().match(/^\d{10}$/))  {
            $("#phone").parent().append("<div class='validation'>Please enter 10 digit no.</div>");
            form_submit = false;
        }

        if ($('#age').val() == "") {
            $("#age").parent().append("<div class='validation'>Please enter age</div>");
            form_submit = false;
        }
        if ($('#email').val() == "") {
            $("#email").parent().append("<div class='validation'>Please enter email </div>");
            form_submit = false;
        }
        if ($('#email').val() != "" && !regex.test($('#email').val())) {
            $("#email").parent().append("<div class='validation'>email is not valid.</div>");
            form_submit = false;
        }

        if ($('#cemail').val() == "") {
            $("#cemail").parent().append("<div class='validation'>Please enter confirm email </div>");
            form_submit = false;
        }
        if ($('#cemail').val() != "" && !regex.test($('#email').val())) {
          $("#cemail").parent().append("<div class='validation'>confirm email is not valid.</div>");
          form_submit = false;
        }

        if($('#email').val() != '' && $('#cemail').val() != '' && ($('#email').val() != $('#cemail').val())){
            $("#cemail").parent().append("<div class='validation'>email and confirm email should be an identical.</div>");
            form_submit = false;
        }
        if ($('#recaptcha_response_field').val() == "") {
            $(".captcha-container").append("<div class='validation'>Please enter shown captcha code.</div>");
            form_submit = false;
        }

        if(form_submit == false){
            $(".validation").css("color", "red");
            $("html, div.welcome-section").animate({ scrollTop: 500 }, "slow");
            return false;
        }else{
            return true;
        }

    });
});

var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

var call_date = $('#preffered_call_date').datepicker({
    format: 'dd-mm-yyyy',
        onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
}).on('changeDate', function(ev) {
    call_date.hide();
    $('#preffered_call_time').focus();
}).data('datepicker');