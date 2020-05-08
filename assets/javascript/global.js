$(document).ready(function () {
    if ($(".datepicker").length) {
        $('.datepicker').datepicker({
            enableOnReadonly: true,
            todayHighlight: true,
            format: 'dd-M-yyyy',
            autoclose: true,
            //defaultViewDate: new Date()
        });
    }
});

var MonthArr = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];

//checkCookie();

function checkUserActiveInactive() {
    var agent_total_business = localStorage.getItem('agent_total_business');
    $('.availability-status').addClass('offline');
    $('.avatar-status').addClass('Inactive_profile');
    if (Number(agent_total_business) >= 0) {
        $('.availability-status').removeClass('offline');
        $('.avatar-status').removeClass('Inactive_profile');
        $('.availability-status').addClass('busy');
        $('.avatar-status').addClass('start_profile');
    }
    if (Number(agent_total_business) >= Number(user_active_range)) {
        $('.availability-status').removeClass('offline');
        $('.avatar-status').removeClass('Inactive_profile');
        $('.availability-status').removeClass('busy');
        $('.avatar-status').removeClass('start_profile');
        $('.availability-status').addClass('online');
        $('.avatar-status').addClass('active_profile');
    }
}

function checkCookie() {
    var UserCookie = getCookie("UserCookie");
    if (UserCookie == "") {
        logout();
        //console.log("cookie not set please login first");
        //window.location.href = "login"
    } else {
        UserCookieData = JSON.parse(UserCookie);
        if (UserCookieData) {
            //$("#user_login").html(UserCookieData.name);
        }
    }
    //console.log(UserCookieData);
    if (UserCookieData.id != "" && UserCookieData.email != "") {
        user_id = UserCookieData.id;
        user_left_node_id = UserCookieData.left_node_id;
        user_right_node_id = UserCookieData.right_node_id;
        user_email = UserCookieData.email;
        user_type = UserCookieData.user_type;
        if (UserCookieData.photo) {
            photo_src = media_url + 'profile_photo/' + UserCookieData.photo;
        }
        //$('#user_photo').attr('src', photo_src);

    }
}

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

function logout() {
    localStorage.removeItem('down_the_line_members');
    $.post('localapi.php', {
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

function getDownTheLineMemberList() {
    //login user id
    var url = base_url + 'down-the-line-members';
    $.ajax({
        url: url,
        type: 'post',
        async: false,
        data: {
            user_id: user_id
        },
        success: function (response) {
            if (response.status) {
                var list = '';
                var i = 0;
                if (user_id == 1) {
                    list += '<option value="">Select</option>';
                }
                $.each(response.data, function (key, value) {
                    list += '<option value="' + value.id + '">' + value.display_name + '</option>';
                });
                localStorage.setItem('down_the_line_members', list);
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

var down_the_line_members = localStorage.getItem('down_the_line_members');
if (down_the_line_members == '' || down_the_line_members == null) {
    getDownTheLineMemberList();
}

checkUserActiveInactive();
hideLoader();