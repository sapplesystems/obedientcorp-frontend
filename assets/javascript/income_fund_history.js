getIncomeFundHistory({user_id: user_id});
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
        getIncomeFundHistory({user_id: $(this).val()});
    });
    
    $(document).on('click', '#search_by_type', function (e) {
        e.preventDefault();
        var start_date = '';
        var end_date = '';
        var type = '';

        if ($('#start-date').val()) {
            start_date = $('#start-date').val();
        }
        if ($('#end-date').val()) {
            end_date = $('#end-date').val();
        }
        if ($('#type').val()) {
            type = $('#type').val();
        }

        var params = {
            user_id: $('#agent_list').val(),
            start_date: start_date,
            end_date: end_date,
            type: type,

        };
        getIncomeFundHistory(params);
    });
    
});


function getIncomeFundHistory(params) {
    showLoader();
    $.ajax({
        url: base_url + 'income-fund-history',
        type: 'post',
        data: params,
        success: function (response) {
            if (response.status == "success") {
                var table_data = '<thead>\n\
                                    <tr>\n\
                                        <th>Sr No.</th>\n\
                                        <th>Amount</th>\n\
                                        <th>Type</th>\n\
                                        <th>Comments</th>\n\
                                        <th>Date</th>\n\
                                    </tr>\n\
                                </thead>';
                table_data += '<tbody>';
                var counter = 0;
                $('#available_income_fund').html(response.data.income_fund);
                $.each(response.data.income_fund_transaction, function (key, value) {
                    counter = counter + 1;
                    table_data += '<tr">\n\
                                    <td>' + counter + '</td>\n\
                                    <td>' + value.amount + '</td>\n\
                                    <td>' + value.type + '</td>\n\
                                    <td>' + value.description + '</td>\n\
                                    <td>' + value.date + '</td>\n\
                                </tr>';
                });
                table_data += '</tbody>';
                $("#income_fund_history_list").html(table_data);
                generateDataTable('income_fund_history_list');
            }
            hideLoader();
        }
    });
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
    document.getElementById("type").value = "";
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