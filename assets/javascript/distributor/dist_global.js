$(document).ready(function () {
    /*if ($(".datepicker").length) {
        $('.datepicker').datepicker({
            enableOnReadonly: true,
            todayHighlight: true,
            format: 'dd-M-yyyy',
            autoclose: true,
            //defaultViewDate: new Date()
        });
    }*/
});

var MonthArr = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];

//checkCookie();

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function logout(e) {
    e.preventDefault();
    $.post('../localapi.php', {
        destroy_session: 1
    }, function (resp) {
        document.cookie = 'UserCookie=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        window.location.href = 'login';
    });
}

function showLoader() {
    $('#loader_bg').css('display', 'block');
}

function hideLoader() {
    $('#loader_bg').css('display', 'none');
}

function destroyDataTable() {
    var table = $('.table').DataTable();
    table.destroy();
}

function initDataTable() {
    $('.table').DataTable();
    /*$('#order-listing').DataTable({
     "aLengthMenu": [
     [5, 10, 15, -1],
     [5, 10, 15, "All"]
     ],
     "iDisplayLength": 10,
     "language": {
     search: ""
     }
     });
     $('#order-listing_filter [type=search]').attr('placeholder','Search');*/
}

function generateDataTable(id) {
    var table = $('#' + id).DataTable();
    table.destroy();
    $('#' + id).DataTable();
}

function generateDataTable2(id) {
    var table = $('#' + id).DataTable();
    table.destroy();
    $('#' + id).DataTable({aaSorting: []});
}

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

function isAlphabetKey(e) {
    isIE = document.all ? 1 : 0
    keyEntry = !isIE ? e.which : event.keyCode;
    if (((keyEntry >= '65') && (keyEntry <= '90')) || ((keyEntry >= '97') && (keyEntry <= '122')) || (keyEntry == '46') || (keyEntry == '32') || keyEntry == '45')
        return true;
    else
        return false;
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

hideLoader();