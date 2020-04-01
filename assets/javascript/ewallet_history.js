getEwalletHistory({user_id: user_id});
initDatepicker();
getAgentList();

$(document).ready(function () {

    $(document).on('change', '#start-date', function () {//$("#end-date").change(function () {
        checkStartEndDate();
    });

    $(document).on('change', '#end-date', function () {//$("#end-date").change(function () {
        checkStartEndDate();
    });

    $(document).on('change', '#agent_list', function () {
        resetFilters();
        getEwalletHistory({user_id: $(this).val()});
    });

    $(document).on('click', '#search_by_type', function (e) {
        e.preventDefault();
        var start_date = '';
        var end_date = '';
        var type = '';
        var trans_type2 = '';

        if ($('#start-date').val()) {
            start_date = $('#start-date').val();
        }
        if ($('#end-date').val()) {
            end_date = $('#end-date').val();
        }
        if ($('#type').val()) {
            type = $('#type').val();
        }
        if ($('#trans_type2').val()) {
            trans_type2 = $('#trans_type2').val();
        }

        var params = {
            user_id: $('#agent_list').val(),
            start_date: start_date,
            end_date: end_date,
            type: type,
            trans_type2: trans_type2

        };
        getEwalletHistory(params);
    });

});

function getEwalletHistory(params) {
    showLoader();
    var table_html = '';
    $("#ewallet_list").html('');
    $.ajax({
        url: base_url + 'wallet-history',
        type: 'post',
        data: params,
        success: function (response) {
            if (response.status == "success") {
                table_html = "<thead>\n\
                                <tr>\n\
                                    <th>Sr No.</th>\n\
                                    <th>Amount</th>\n\
                                    <th>Type</th>\n\
                                    <th>Date</th>\n\
                                    <th>Comments</th>\n\
                                </tr>\n\
                            </thead>";
                table_html += '<tbody>';
                var counter = 0
                $('#available_wallet_balance').html(response.data.wallet_balance);
                $.each(response.data.wallet_transactions, function (key, value) {
                    counter = counter + 1;
                    table_html += '<tr id="tr_' + value.id + '">\n\
                                    <td>' + counter + '</td>\n\
                                    <td>' + value.amount + '</td>\n\
                                    <td>' + value.type + '</td>\n\
                                    <td>' + value.created_at + '</td>\n\
                                    <td>' + value.description + '</td>\n\
                                </tr>';
                });
                table_html += '</tbody>';
                $("#ewallet_list").html(table_html);
                generateDataTable('ewallet_list');
                hideLoader();
            }
            else {
                hideLoader();
            }

        }
    });
}

function initDatepicker() {
    $(":input").inputmask();
    if ($(".datepicker").length) {
        $('.datepicker').datepicker({
            enableOnReadonly: true,
            todayHighlight: true,
            format: 'dd-mm-yyyy',
            autoclose: true,
            //endDate: todays_date
        });
    }
}


function getAgentList() {
    //login user id
    var url = base_url + 'down-the-line-members';
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: {
            user_id: user_id
        },
        success: function (response) {
            if (response.status) {
                var agent_list;
                var i = 0;
                $.each(response.data, function (key, value) {
                    agent_list += '<option value="' + value.id + '">' + value.display_name + '</option>';
                });
                $("#agent_list").html(agent_list);
            }
        }
    });
}

function checkStartEndDate() {
    var startDate = document.getElementById("start-date").value;
    var endDate = document.getElementById("end-date").value;
    if ((Date.parse(startDate.split(/\-/).reverse().join('-')) > Date.parse(endDate.split(/\-/).reverse().join('-')))) {
        showSwal('error', 'Invalid End Date', 'End date should be greater than or equal to start date');
        document.getElementById("end-date").value = "";
        return false;
    }
}

function resetFilters() {
    document.getElementById("start-date").value = "";
    document.getElementById("end-date").value = "";
    document.getElementById("trans_type2").value = "";
    document.getElementById("type").value = "";
}