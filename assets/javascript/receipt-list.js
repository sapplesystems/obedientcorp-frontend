var receiptDetail = '';
getReceiptList();

$(function () {
    $("#agent-list").html(down_the_line_members);
    get_customer_list($("#agent-list").val());
    var datetime = new Date();
    var day = datetime.getDate();
    day = (day < 10) ? '0' + day : day;
    var month = MonthArr[datetime.getMonth()];
    var year = datetime.getFullYear();
    var todays_date = day + "-" + month + "-" + year;
    //var time = datetime.getHours() + ":" + datetime.getMinutes() + ":" + datetime.getSeconds();
    var current_date_time = todays_date;
    $('#today_date').html(current_date_time);
});
function getReceiptList() {
    var associate = '';
    var customer_id = '';
    var project_id = '';
    var sub_project_id = '';
    var plot_id = '';
    var receipt_date = '';
    if ($('#agent-list').val()) {
        associate = $('#agent-list').val();
    }
    if ($('#customer-list').val()) {
        customer_id = $('#customer-list').val();
    }
    if($('#start-date').val())
    {
        receipt_date = $('#start-date').val();
    }
    showLoader();
    var params = {
        user_id: associate,
        customer_id: customer_id,
        project_id: project_id,
        sub_project_id: sub_project_id,
        plot_id: plot_id,
        date:receipt_date
    };
    var url = base_url + 'real-estate-receipt';
    $.ajax({
        url: url,
        type: 'post',
        data: params,
        success: function (response) {
            var html = '<thead>\n\
                      <tr>\n\
                      <th>Sr.No</th>\n\
                      <th>Customer Name</th>\n\
                      <th>Receipt Number</th>\n\
                      <th>Receipt Date</th>\n\
                      <th>Project</th>\n\
                      <th>Sub Project</th>\n\
                      <th>Plot</th>\n\
                      <th>Payment Mode</th>\n\
                      <th>Action</th>\n\
                      </tr>\n\
                      </thead><tbody>';
            if (response.status == "success") {
                if (response.data.length != 0) {
                    var i = 1;
                    receiptDetail = response.data;
                    $.each(response.data, function (key, value) {
                        var plot = '';
                        if (value.plot_name != null) {
                            plot = value.plot_name;
                        }
                        html += '<tr  role="row" >\n\
                                    <td>' + i + '</td>\n\
                                    <td>' + value.customer_name + '</td>\n\
                                    <td>' + value.receipt_no + '</td>\n\
                                    <td>' + value.receipt_date + '</td>\n\
                                    <td>' + value.project_name + '</td>\n\
                                    <td>' + value.sub_project_name + '</td>\n\
                                    <td>' + plot + '</td>\n\
                                    <td>' + value.payment_mode + '</td>\n\
                                    <td><a class="btn btn-gradient-primary btn-sm" href="javascript:void(0)" onclick="getReceiptDetail('+ i + ');"id="detail_' + i + '">Receipt</a>\n\
                                    <input type="hidden" value="'+ value.receipt_no + '" id="receipt_' + i + '"/>\n\
                                    </td>\n\
                                </tr>';
                        i = i + 1;
                    });

                    $('#receipt-list').html(html);
                    generateDataTable('receipt-list');
                    hideLoader();
                }
            } else {
                $('#receipt-list').html(html);
                generateDataTable('receipt-list');
                hideLoader();
            }

        }
    });
} //end function

function getReceiptDetail(no) {
    var receipt_no = $('#receipt_' + no).val();
    $.each(receiptDetail, function (key, value) {
        if (value.receipt_no == receipt_no) {
            var emi = '';
            var bank_name = '-';
            var holder_name = '-';
            var cheque_date = '-';
            $('#receipt-no').html(value.receipt_no);
            $('#receipt-date').html(value.receipt_date);
            $('#customer-id').html(value.customer_id);
            $('#date-of-booking').html(value.date_of_booking);
            $('#name').html(value.customer_name);
            $('#due-date').html(value.next_due_date);
            $('#father-name').html(value.customer_father_name);
            $('#address').html(value.customer_address);
            $('#mobile').html(value.customer_mobile);
            $('#project-name').html(value.project_name);
            $('#plot').html(value.plot_name);
            $('#size').html(value.plot_size);
            $('#rate').html(value.unit_rate);
            $('#amount').html(value.amount);
            $('#balance').html(value.balance);
            $('#emi-amount').html(value.received_emi_amount);
            $('#payment-mode').html(value.payment_mode);
            if(value.cheque_date)
            {
                cheque_date=value.cheque_date;
            }
            $('#cheque-date').html(cheque_date);
            if(value.account_holder_name)
            {
                holder_name = value.account_holder_name;
            }
            $('#holder-name').html(holder_name);
            if(value.bank_name!='undefined')
            {
                bank_name = value.bank_name;
            }
            $('#bank-name').html(bank_name);
            $('#received-amount').html(value.received_emi_amount);
            if (value.installment == 12) {
                emi = 'EMI-1 YEAR';
            }
            else if (value.installment == 24) {
                emi = 'EMI-2 YEAR';
            }
            else if (value.installment == 36) {
                emi = 'EMI-3 YEAR';
            }
            else if (value.installment == 60) {
                emi = 'EMI-5 YEAR';
            }
            else if (value.installment == 84) {
                emi = 'EMI-7 YEAR';
            }
            else if (value.installment == 120) {
                emi = 'EMI-10 YEAR';
            }
            else {
                emi = 'SINGLE PAYMENT';
            }

            $('#emi').html(emi);
            document.getElementById('number-into-words').innerHTML = number2text(value.received_emi_amount);
        }

    });
    $('#receipt-detail').modal('show');
}

//function for get customer list
function get_customer_list(user_id) {
    //login user id
    var url = base_url + 'customers';
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
                var customer_list = '<option value="">--select--</option>';
                if (response.data.length > 0) {
                    $.each(response.data, function (key, value) {
                        customer_list += '<option value="' + value.id + '">' + value.display_name + '</option>';
                    });
                    $("#customer-list").html(customer_list);
                }
                else {
                    $("#customer-list").html(customer_list);
                }


            }

        }
    });
} //end function customer list

function print() {
    var tab = document.getElementById('receipt-table');
    var win = window.open('', '', 'height=700,width=700');
    win.document.write(tab.outerHTML);
    win.document.close();
    win.print();

}

function number2text(value) {
    var fraction = Math.round(frac(value)*100);
    var f_text  = "";

    if(fraction > 0) {
        f_text = "AND "+convert_number(fraction)+" PAISE";
    }

    return convert_number(value)+" RUPEE "+f_text+" ONLY";
}

function frac(f) {
    return f % 1;
}

function convert_number(number)
{
    if ((number < 0) || (number > 999999999)) 
    { 
        return "NUMBER OUT OF RANGE!";
    }
    var Gn = Math.floor(number / 10000000);  /* Crore */ 
    number -= Gn * 10000000; 
    var kn = Math.floor(number / 100000);     /* lakhs */ 
    number -= kn * 100000; 
    var Hn = Math.floor(number / 1000);      /* thousand */ 
    number -= Hn * 1000; 
    var Dn = Math.floor(number / 100);       /* Tens (deca) */ 
    number = number % 100;               /* Ones */ 
    var tn= Math.floor(number / 10); 
    var one=Math.floor(number % 10); 
    var res = ""; 

    if (Gn>0) 
    { 
        res += (convert_number(Gn) + " CRORE"); 
    } 
    if (kn>0) 
    { 
            res += (((res=="") ? "" : " ") + 
            convert_number(kn) + " LAKH"); 
    } 
    if (Hn>0) 
    { 
        res += (((res=="") ? "" : " ") +
            convert_number(Hn) + " THOUSAND"); 
    } 

    if (Dn) 
    { 
        res += (((res=="") ? "" : " ") + 
            convert_number(Dn) + " HUNDRED"); 
    } 


    var ones = Array("", "ONE", "TWO", "THREE", "FOUR", "FIVE", "SIX","SEVEN", "EIGHT", "NINE", "TEN", "ELEVEN", "TWELVE", "THIRTEEN","FOURTEEN", "FIFTEEN", "SIXTEEN", "SEVENTEEN", "EIGHTEEN","NINETEEN"); 
var tens = Array("", "", "TWENTY", "THIRTY", "FOURTY", "FIFTY", "SIXTY","SEVENTY", "EIGHTY", "NINETY"); 

    if (tn>0 || one>0) 
    { 
        if (!(res=="")) 
        { 
            res += " AND "; 
        } 
        if (tn < 2) 
        { 
            res += ones[tn * 10 + one]; 
        } 
        else 
        { 

            res += tens[tn];
            if (one>0) 
            { 
                res += ("-" + ones[one]); 
            } 
        } 
    }

    if (res=="")
    { 
        res = "zero"; 
    } 
    return res;
}

function CancelReceipt()
{
    $('#agent-list').val('');
    $('#customer-list').val('');
    $('#start-date').val('');
    getReceiptList();
}