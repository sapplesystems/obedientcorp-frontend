$("#transfer-to,#transfer-from").html(down_the_line_members);
getWalletAmount(user_id);

$(document).ready(function () {
    $("#transfer-to option[value='" + user_id + "']").remove();
    $("#transfer-from option[value='" + user_id + "']").remove();

    $("#wallet_transfer_form").submit(function (e) {
        e.preventDefault();
        var wallet_transfer_form = $("#wallet_transfer_form");
        wallet_transfer_form.validate({
            rules: {
                amount: {
                    number: true
                },
            },
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            }
        });

        if ($("#wallet_transfer_form").valid()) {
            showLoader();
            var params = new FormData();
            var transfer_by = user_id;
            var transfer_from = user_id;
            if ($('#transfer-from').val())
            {
                transfer_from = $('#transfer-from').val();
            }
            var transfer_to = $('#transfer-to').val();
            var amount = $('#amount').val();
            var transaction_password = $('#transaction_password').val();

            url = base_url + 'transfer/wallet-to-wallet';

            /*if (project_id) {
             params.append('id', project_id);
             url = base_url + 'project/update';
             }*/

            params.append('transfer_by', transfer_by);
            params.append('transfer_from', transfer_from);
            params.append('transfer_to', transfer_to);
            params.append('amount', amount);
            params.append('transaction_password', transaction_password);

            $.ajax({
                url: url,
                type: 'post',
                data: params,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    if (response.status == 'success') {
                        showSwal('success', 'Success', response.data);
                        document.getElementById('wallet_transfer_form').reset();
                        getWalletAmount(user_id);
                        hideLoader();
                    } else {
                        showSwal('error', 'Error', response.data);
                        hideLoader();
                    }
                    $('#transfer-to').val('').trigger('change');
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

            });//ajax
        }//end if

    })//form end



});//end document ready

function getWalletAmount(user_id) {
    showLoader();
    var amount = '';
    $.ajax({
        url: base_url + 'check-ewallet-amount',
        type: 'post',
        dataType: 'json',
        data: {
            user_id: user_id
        },
        success: function (response) {
            amount = response.data.amount;
            if (response.status == 'success') {
                $('#e_wallet_label').css('display', 'block');
                $('#rupee_sign').html('&#8377;');
                $('#e-wallet').html(amount);
                hideLoader();
            }
            hideLoader();
        }
    });
}