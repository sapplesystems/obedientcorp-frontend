get_agent_list();
getWalletAmount(user_id);

$(document).ready(function () {
    $("#agents").change(function () {
        var user_id = $(this).val();
        getWalletAmount(user_id);
    });

    $("#add-money-to-wallet-form").submit(function (e) {
        e.preventDefault();
        var add_money_to_wallet_form = $("#add-money-to-wallet-form");
        add_money_to_wallet_form.validate({
            rules: {
                agents: "required",
                amount: {
                    required: true,
                    number: true
                },
            },
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            }
        });
        if ($("#add-money-to-wallet-form").valid()) {
            showLoader();
            var params = {
                user_id: $('#agents').val(),
                amount: $('#amount').val()
            };
            $.ajax({
                url: base_url + 'add-money-to-wallet',
                type: 'post',
                data: params,
                success: function (response) {
                    console.log(response);
                    if (response.status == 'success') {
                        var updated_amount = response.data.amount;
                        updated_amount = Number(updated_amount);
                        $('#e-wallet').html(updated_amount.toFixed(2));
                        $('#amount').val('');
                        hideLoader();
                    } else {
                        hideLoader();
                    }
                }
            });//ajax
        }//end if


    });//form submit
});//document ready

function get_agent_list() {
    showLoader();
    var url = base_url + 'down-the-line-members';

    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: {
            user_id: user_id
        },
        success: function (response) {
            console.log(response);
            if (response.status == 'success') {
                var table_data = '';
                $.each(response.data, function (key, value) {
                    table_data += '<option value="' + value.id + '">' + value.associate_name + '</option>';
                });
                //console.log(table_data);
                $("#agents").html(table_data);

                hideLoader();
            }else{
                hideLoader();
            }

        }
    });
}

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
            if (response.status) {
                $('#e-wallet').html(amount);
                hideLoader();
            }

        }
    });
}