$(document).ready(function () {
  $("#profile_update").submit(function (e) {
    e.preventDefault();
    var profile_frm = $("#profile_update");
    profile_frm.validate({
      rules: {
        confirm_passowrd: {
          equalTo: "#password"
        },
        password: {
          minlength: 8
        },
        mobile_no: {
          minlength: 10,
          maxlength: 10,
        },
        land_line_phone: {
          number: true,
        },
        pin_code: {
          number: true,
        },
        adhar: {
          number: true,
        },
      },
      messages: {
        payee_name: "Payee name same as name",
        confirm_passowrd: "Confirm password same as Password",
      },
      errorPlacement: function errorPlacement(error, element) {
        element.before(error);
      }
    });

    if ($("#profile_update").valid()) {
      showLoader();
      var params = new FormData();
      var id = user_profile_id;
      var introducer_code = $('#sponsor').val();
      //var signature = $('#signature')[0].files[0];
      //var photo = $('#photo')[0].files[0];
      var associate_name = $('#associate_name').val();
      var house_no = $('#house_no').val();
      var block = $('#block').val();
      var sector = $('#sector').val();
      var street_no = $('#street_no').val();
      var village_colony = $('#village_colony').val();
      var post_office_or_sub_city = $('#post_office_or_sub_city').val();
      var father_or_husband_name = $('#father_or_husband_name').val();
      var mothers_name = $('#mothers_name').val();
      var gender = $('#gender').val();
      var dob = $('#dob').val();
      var mobile_no = $('#mobile_no').val();
      var land_line_phone = $('#land_line_phone').val();
      var marital_status = $('#marital_status').val();
      var occupation = $('#occupation').val();
      var state = $('#state').val();
      var city = $('#city').val();
      var pin_code = $('#pin_code').val();
      var adhar = $('#adhar').val();
      var email = $('#email').val();
      var transaction_password = $('#transaction_password').val();
      params.append("id", id);
      params.append("introducer_code", introducer_code);
      //params.append("signature", signature);
      //params.append("photo", photo);
      params.append("associate_name", associate_name);
      params.append("house_no", house_no);
      params.append("block", block);
      params.append("sector", sector);
      params.append("street_no", street_no);
      params.append("village_colony", village_colony);
      params.append("post_office_or_sub_city", post_office_or_sub_city);
      params.append("father_or_husband_name", father_or_husband_name);
      params.append("mothers_name", mothers_name);
      params.append("gender", gender);
      params.append("dob", dob);
      params.append("mobile_no", mobile_no);
      params.append("land_line_phone", land_line_phone);
      params.append("marital_status", marital_status);
      params.append("occupation", occupation);
      params.append("state", state);
      params.append("city", city);
      params.append("pin_code", pin_code);
      params.append("adhar", adhar);
      params.append("email", email);
      params.append("transaction_password", transaction_password);

      $.ajax({
        method: "POST",
        url: base_url + 'profile/update',
        data: params,
        processData: false,
        contentType: false,
        success: function (response) {
          error_html = '';
          if (response.status == 'success') {
            if (response.data.transaction_password && response.data.transaction_password != '') {
              disableTransactionPassword();
            }
            $.post('localapi.php', {
              udpate_name: true,
              name: associate_name
            }, function (resp) {
              $('#user_login').html(associate_name);
              showSwal('success', 'Profile Saved', 'Profile saved successfully');
            });
          } else {
            showSwal('error', 'Profile Not Saved', 'Profile could not be saved');
          }
          // $('#errors_div').html(error_html);
          hideLoader();
        },
        error: function (response) {
          error_html = '';
          var error_object = JSON.parse(response.responseText);
          var message = error_object.message;
          var errors = error_object.errors;
          $.each(errors, function (key, value) {
            error_html += '<div class="alert alert-danger" role="alert">' + value[0] + '</div>';
          });
          $('#errors_div').html(error_html);
          hideLoader();
        }
      });
    }
  });

  //email validation on blur
  $('#email').blur(function () {
    var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    if (testEmail.test(this.value) == false) {
      $('#emailid-error').css('display', 'block');
      $('#emailid-error').css({
        "color": "#fe7c96",
        "display": "inline-block",
        "margin-left": "1.5em",
        "font-size": "0.875rem"
      });
    } else {
      $('#emailid-error').css('display', 'none');
    }
  });
});