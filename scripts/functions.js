$(document).ready(function () {
    var bodyEle = $("body");

    //contact form validation
    contactformVal();

    //copyright year script
    $('#copyright-year').text(new Date().getFullYear())

    //validation for solution section
    bodyEle.on('click', "#ecommerce-btn", function (e) {
        var getId = $(this).attr('data-bs-target')
        solutionValidationform(getId)
    })

    bodyEle.on('click', "#data-integration-btn", function (e) {
        var getId = $(this).attr('data-bs-target')
        solutionValidationform(getId)
    })

    bodyEle.on('click', "#test-automation-btn", function (e) {
        var getBtnClass = $(this).attr('data-bs-target')
        var getId = $(getBtnClass)
        solutionValidationform(getId)
    })

    //clear form in solution section
    bodyEle.on('click', ".btn-close", function (e) {
        var getId = $(this).attr('id')
        clearForm(getId)
    })

    const $menu = $('.services-toggle');
    $(document).mouseup(e => {
       if (!$menu.is(e.target) // if the target of the click isn't the container...
       && $menu.has(e.target).length === 0) // ... nor a descendant of the container
       {
         $menu.removeClass('is-active');
      }
     });


    $('.toggle').on('click', () => {
      $menu.toggleClass('is-active');
    });
    
    const $menu1 = $('.products-toggle');

    $(document).mouseup(e => {
       if (!$menu1.is(e.target) // if the target of the click isn't the container...
       && $menu1.has(e.target).length === 0) // ... nor a descendant of the container
       {
         $menu1.removeClass('is-active');
      }
     });
    
    $('.toggle1').on('click', () => {
      $menu1.toggleClass('is-active');
    });
    

    $(".event-type-select").change(function () {
        var selectedEventType = this.options[this.selectedIndex].value;
        if (selectedEventType == "all") {
            $('.role-details').removeClass('hidden');
        } else {
            $('.role-details').addClass('hidden');
            $('.role-details[data-eventtype="' + selectedEventType + '"]').removeClass('hidden');
        }
    });
   
    $(".office-locations button").on('click', function (e) {
        let local = $(this).attr('data-local');
        console.log(local);
        if ($(this).closest(".content-wrapper").hasClass(local)) {

        } else {
            $('#location-select').removeClass("all india usa").addClass(local);
        }

    })

    function clearActiveTile() {
        $(".jobs-slider .item").removeClass('active');
    }

    function hideJobs() {
        $(".job-display-container .role-details").removeClass('active');
    }

    $(".jobs-slider .item").on('click', function (e) {
        let activeItem = $(this).data('jo');
        clearActiveTile()
        $(this).addClass('active');
        hideJobs();
        $("#" + activeItem).addClass('active');
    })

});

 
function check4() {
    if (grecaptcha.getResponse(widget4) == "") {
        alert("Please verify captcha details4.");
            return false;
    }
    return true;
}

function checka() {
    if (grecaptcha.getResponse(widgeta) == "") {
        alert("Please verify captcha details.");
            return false;
    }
    return true;
}

function check6() {
    if (grecaptcha.getResponse(widget6) == "") {
        alert("Please verify captcha details.");
            return false;
    }
    return true;
}

$('#modal-form4').on('submit', function(e){
  $('#modal4').modal('hide');
  $('#modal6').modal('show');
  e.preventDefault();
});
$('#modal-form5').on('submit', function(e){
  $('#modal5').modal('hide');
  $('#modal7').modal('show');
  e.preventDefault();
});

$('.modal-auto-clear1').on('shown.bs.modal', function () {
  $(this).delay(3000).fadeOut(200, function () {
      $(this).modal('hide');
  });
})

$('.modal-auto-clear2').on('shown.bs.modal', function () {
  $(this).delay(3000).fadeOut(200, function () {
      $(this).modal('hide');
  });
})

//Validation for contact form
function contactformVal() {
    var bodyEle = $("body");
    bodyEle.on('keyup change', "#name", function (e) {
        var nameinputVal = $(this).val();
        if (nameinputVal == '') {
            $('.name-missing').show();
        }
        else {
            $('.name-missing').hide();
        }
    });

    bodyEle.on('keyup change', "#email", function (e) {
        var nameinputVal = $(this).val();
        var emailRegx = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
        if (nameinputVal == '') {
            $('.email-missing').show();
            $('.email-invalid').hide();
        }
        else if (!emailRegx.test(nameinputVal)) {
            $('.email-invalid').show();
            $('.email-missing').hide();
        }
        else {
            $('.email-missing').hide();
            $('.email-invalid').hide();
        }
    });

    bodyEle.on('keyup change', "#mobile", function (e) {
        var nameinputVal = $(this).val();
        var mobileRegx = /^(\+\d{1,3}[- ]?)?\d{10}$/
        if (nameinputVal == '') {
            $('.subject-missing').show();
            $('.mobile-invalid').hide()
        }
        else if (!mobileRegx.test(nameinputVal)) {
            $('.mobile-invalid').show()
            $('.subject-missing').hide();
        }
        else {
            $('.subject-missing').hide();
            $('.mobile-invalid').hide()
        }
    });

    bodyEle.on('keyup change', "#message", function (e) {
        var nameinputVal = $(this).val();
        if (nameinputVal == '') {
            $('.message-missing').show();
        }
        else {
            $('.message-missing').hide();
        }
    });

    bodyEle.on('keyup change', "#name, #email, #mobile, #message", function (e) {
        var nameValue = $('#name').val();
        var emailVal = $('#email').val();
        var mobileVal = $('#mobile').val();
        var messageVal = $('#message').val();
        var mobileRegx = /^(\+\d{1,3}[- ]?)?\d{10}$/
        var emailRegx = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
        if (nameValue == '' || emailVal == '' || mobileVal == '' || messageVal == '' || !mobileRegx.test(mobileVal) || !emailRegx.test(emailVal)) {
            $('#submit').attr('disabled', 'disabled')
            $('#submit').css({ "opacity": "0.5", "cursor": "not-allowed" })
        }
        else {
            $('#submit').removeAttr('disabled')
            $('#submit').removeAttr('style')
        }
    })
}

function solutionValidationform(eleId) {
    var bodyEle = $("body");
    var firstnameVal = $(eleId).find('input.firstname').attr('id')
    var lastnameVal = $(eleId).find('input.lastname').attr('id')
    var emailVal = $(eleId).find('input.emailInput').attr('id')
    var mobileVal = $(eleId).find('input.mobileval').attr('id')
    var companyName = $(eleId).find('input.companynameVal').attr('id')
    var emailRegx = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
    var mobileRegx = /^(\+\d{1,3}[- ]?)?\d{10}$/
    bodyEle.on('keyup change', '#' + firstnameVal, function (e) {
        var nameinputVal = $(this).val();
        if (nameinputVal == '') {
            $(this).next('.firstName-missing').show();
        }
        else {
            $(this).next('.firstName-missing').hide();
        }
    });

    bodyEle.on('keyup change', '#' + lastnameVal, function (e) {
        var nameinputVal = $(this).val();
        if (nameinputVal == '') {
            $(this).next('.lastName-missing').show();
        }
        else {
            $(this).next('.lastName-missing').hide();
        }
    });

    bodyEle.on('keyup change', '#' + emailVal, function (e) {
        var nameinputVal = $(this).val();
        if (nameinputVal == '') {
            $(this).nextAll('.emailId-missing').show();
            $(this).nextAll('.emailId-invalid').hide();
        }
        else if (!emailRegx.test(nameinputVal)) {
            $(this).nextAll('.emailId-invalid').show();
            $(this).nextAll('.emailId-missing').hide();
        }
        else {
            $(this).nextAll('.emailId-missing').hide();
            $(this).nextAll('.emailId-invalid').hide();
        }
    });

    bodyEle.on('keyup change', '#' + mobileVal, function (e) {
        var nameinputVal = $(this).val();
        if (nameinputVal == '') {
            $(this).nextAll('.mobileNo-missing').show();
            $(this).nextAll('.mobileNo-invalid').hide();
        }
        else if (!mobileRegx.test(nameinputVal)) {
            $(this).nextAll('.mobileNo-invalid').show();
            $(this).nextAll('.mobileNo-missing').hide();
        }
        else {
            $(this).nextAll('.mobileNo-missing').hide();
            $(this).nextAll('.mobileNo-invalid').hide();
        }
    });

    bodyEle.on('keyup change', '#' + companyName, function (e) {
        var nameinputVal = $(this).val();
        if (nameinputVal == '') {
            $(this).next('.companyname-missing').show();
        }
        else {
            $(this).next('.companyname-missing').hide();
        }
    });

    bodyEle.on('keyup change', "#" + firstnameVal + ", #" + lastnameVal + ", #" + emailVal + ", #" + mobileVal + ", #" + companyName + "", function (e) {
        if ($('#' + firstnameVal).val() == '' || $('#' + lastnameVal).val() == '' || $('#' + emailVal).val() == '' || $('#' + mobileVal).val() == '' || $('#' + companyName).val() == '' || !mobileRegx.test($('#' + mobileVal).val()) || !emailRegx.test($('#' + emailVal).val())) {
            $(eleId).find('button.modal-download').attr('disabled', 'disabled')
            $(eleId).find('button.modal-download').css({ "opacity": "0.5", "cursor": "not-allowed" })
        }
        else {
            $(eleId).find('button.modal-download').removeAttr('disabled')
            $(eleId).find('button.modal-download').removeAttr('style')
        }
    })
}

function clearForm(eleId) {
    $('#'+eleId).parents('.modal-forms').find('form input').val('')
    $('#'+eleId).parents('.modal-forms').find('span.error-msg').css('display','none')
}