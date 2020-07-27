//AUTOMATIC TYPING ON DASHBOARD CODE START HERE
/*var typedTextSpan = document.querySelector(".typed-text");
 var cursorSpan = document.querySelector(".cursor");
 
 var textArray = ["Obedient Group", "Where dreams come true"];
 var typingDelay = 200;
 var erasingDelay = 100;
 var newTextDelay = 2000; // Delay between current and next text
 var textArrayIndex = 0;
 var charIndex = 0;
 
 function type() {
 if (charIndex < textArray[textArrayIndex].length) {
 if (!cursorSpan.classList.contains("typing"))
 cursorSpan.classList.add("typing");
 typedTextSpan.textContent += textArray[textArrayIndex].charAt(charIndex);
 charIndex++;
 setTimeout(type, typingDelay);
 }
 else {
 cursorSpan.classList.remove("typing");
 setTimeout(erase, newTextDelay);
 }
 }
 
 function erase() {
 if (charIndex > 0) {
 if (!cursorSpan.classList.contains("typing"))
 cursorSpan.classList.add("typing");
 typedTextSpan.textContent = textArray[textArrayIndex].substring(0, charIndex - 1);
 charIndex--;
 setTimeout(erase, erasingDelay);
 }
 else {
 cursorSpan.classList.remove("typing");
 textArrayIndex++;
 if (textArrayIndex >= textArray.length)
 textArrayIndex = 0;
 setTimeout(type, typingDelay + 1100);
 }
 }
 
 document.addEventListener("DOMContentLoaded", function () { // On DOM Load initiate the effect
 if (textArray.length)
 setTimeout(type, newTextDelay + 250);
 });*/
//AUTOMATIC TYPING ON DASHBOARD CODE END HERE
if (user_type == 'ADMIN') {
    getDashboardInfoAdmin(user_id)
} else if (user_type == 'AGENT') {
    getDashboardInfo(user_id);
}
getNewsList();

function getDashboardInfoAdmin(user_id) {
    showLoader();
    $.ajax({
        url: base_url + 'dashboard/info/admin',
        type: 'post',
        async: false,
        data: {user_id: user_id},
        success: function (response) {
            if (response.status == 'success') {
                var data = response.data;
                $('#real_estate_pending_request').html(data.real_estate_pending_request);
                $('#fmcg_pending_request').html(data.fmcg_pending_request);
                $('#reward_pending_request').html(data.reward_pending_request);
                $('#offer_pending_request').html(data.offer_pending_request);
                $('#kyc_pending_request').html(data.kyc_pending_request);
                var due_payment_list = data.due_payment_list;
                generateDuePaymentList(due_payment_list);
                var last_payout = data.last_payout;
                var current_payout = data.upcoming_payout;
                $('#last_week_no').html('Week ' + last_payout.week_no);
                $('#last_cycle').html(last_payout.from_date + ' - ' + last_payout.to_date);
                $('#total_payout').html(last_payout.total_payout);
                $('#total_turnover').html(last_payout.total_turnover);
                $('#last_payout_date').html(last_payout.to_date);

                $('#current_week_no').html('Week ' + current_payout.week_no);
                $('#current_cycle').html(current_payout.from_date + ' - ' + current_payout.to_date);
                $('#estimated_payout').html(current_payout.estimated_payout);
                $('#estimated_turnover').html(current_payout.estimated_turnover);
                $('#upcoming_payout_date').html(current_payout.to_date);
                
                setCurrentWeekMonth(data.current_week_month);
            }
            hideLoader();
        }
    });
}

function getDashboardInfo(user_id) {
    showLoader();
    $.ajax({
        url: base_url + 'dashboard/info',
        type: 'post',
        async: false,
        data: {user_id: user_id},
        success: function (response) {
            if (response.status == 'success') {
                var data = response.data;
                $('#pin_bonus').html(data.pin_bonus);
                $('#total_left_business').html(data.total_left_business);
                $('#total_right_business').html(data.total_right_business);
                $('#matching_income').html(data.matching_income);
                $('#total_earning').html(data.total_earning);

                setCurrentWeekMonth(data.current_week_month);

                //chart
                var month_wise_data = data.month_wise_data;
                var total_left_business = [];
                var total_right_business = [];
                var total_self_business = [];
                $.each(month_wise_data, function (key, value) {
                    var tlb = (value.total_left_business / 100000);
                    var trb = (value.total_right_business / 100000);
                    var tsb = (value.total_self_business / 100000);
                    total_left_business.push(Number(tlb.toFixed(2)));
                    total_right_business.push(Number(trb.toFixed(2)));
                    total_self_business.push(Number(tsb.toFixed(2)));
                });
                /*var sum_total_left_business = total_left_business.reduce(function (a, b) {
                 return a + b;
                 });
                 var sum_total_right_business = total_right_business.reduce(function (a, b) {
                 return a + b;
                 });*/
                //localStorage.setItem("agent_total_business", (sum_total_left_business + sum_total_right_business));
                //localStorage.setItem("agent_total_business", (Number(data.total_left_business) + Number(data.total_right_business)));
                //localStorage.setItem("agent_total_business", Number(data.total_self_business));
                localStorage.setItem("bv_status", Number(data.bv_status));
                checkUserActiveInactive();
                //generateChart(total_left_business, total_right_business, total_self_business);

                //due_payment_list
                var due_payment_list = data.due_payment_list;
                generateDuePaymentList(due_payment_list);

                var reward = data.current_next_reward;
                var last_reward = 0;
                var current_reward = 0;
                if (reward.length == 1) {
                    current_reward = reward[0].amount;
                } else if (reward.length == 2) {
                    last_reward = reward[0].amount;
                    current_reward = reward[1].amount;
                }
                $('#last_reward').html(last_reward.toFixed(2));
                $('#current_reward').html(current_reward.toFixed(2));
            }
            hideLoader();
        }
    });
}

function setCurrentWeekMonth(data) {
    $('#running_week_no').html('Week ' + data.current_week_no);
    $('#current_week_cycle').html(data.current_week_cycle);
    $('#current_month_no').html('Month ' + data.current_month_no);
    $('#current_month_cycle').html(data.current_month_cycle);
}

function generateChart(total_left_business, total_right_business, total_self_business) {
    if ($("#user_business_chart").length) {
        Chart.defaults.global.legend.labels.usePointStyle = true;
        var ctx = document.getElementById('user_business_chart').getContext("2d");

        var gradientStrokeViolet = ctx.createLinearGradient(0, 0, 0, 181);
        gradientStrokeViolet.addColorStop(0, 'rgba(218, 140, 255, 1)');
        gradientStrokeViolet.addColorStop(1, 'rgba(154, 85, 255, 1)');
        var gradientLegendViolet = 'linear-gradient(to right, rgba(218, 140, 255, 1), rgba(154, 85, 255, 1))';

        var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 360);
        gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
        gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
        var gradientLegendBlue = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))';

        var gradientStrokeRed = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
        gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
        var gradientLegendRed = 'linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))';
        console.log(total_left_business);
        console.log(total_right_business);
        console.log(total_self_business);
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
                datasets: [
                    {
                        label: "Left BV",
                        borderColor: gradientStrokeViolet,
                        backgroundColor: gradientStrokeViolet,
                        hoverBackgroundColor: gradientStrokeViolet,
                        legendColor: gradientLegendViolet,
                        pointRadius: 0,
                        fill: false,
                        borderWidth: 1,
                        fill: 'origin',
                                data: total_left_business
                    },
                    {
                        label: "Right BV",
                        borderColor: gradientStrokeRed,
                        backgroundColor: gradientStrokeRed,
                        hoverBackgroundColor: gradientStrokeRed,
                        legendColor: gradientLegendRed,
                        pointRadius: 0,
                        fill: false,
                        borderWidth: 1,
                        fill: 'origin',
                                data: total_right_business
                    },
                    {
                        label: "Self Business",
                        borderColor: gradientStrokeBlue,
                        backgroundColor: gradientStrokeBlue,
                        hoverBackgroundColor: gradientStrokeBlue,
                        legendColor: gradientLegendBlue,
                        pointRadius: 0,
                        fill: false,
                        borderWidth: 1,
                        fill: 'origin',
                                data: total_self_business
                    }
                ]
            },
            options: {
                responsive: true,
                legend: false,
                legendCallback: function (chart) {
                    var text = [];
                    text.push('<ul>');
                    for (var i = 0; i < chart.data.datasets.length; i++) {
                        text.push('<li><span class="legend-dots" style="background:' +
                                chart.data.datasets[i].legendColor +
                                '"></span>');
                        if (chart.data.datasets[i].label) {
                            text.push(chart.data.datasets[i].label);
                        }
                        text.push('</li>');
                    }
                    text.push('</ul>');
                    return text.join('');
                },
                scales: {
                    yAxes: [{
                            ticks: {
                                display: false,
                                min: 0,
                                stepSize: 20,
                                max: 5000
                            },
                            gridLines: {
                                drawBorder: false,
                                color: '#322f2f',
                                zeroLineColor: '#322f2f'
                            }
                        }],
                    xAxes: [{
                            gridLines: {
                                display: false,
                                drawBorder: false,
                                color: 'rgba(0,0,0,1)',
                                zeroLineColor: 'rgba(235,237,242,1)'
                            },
                            ticks: {
                                padding: 20,
                                fontColor: "#9c9fa6",
                                autoSkip: true,
                            },
                            categoryPercentage: 0.5,
                            barPercentage: 0.5
                        }]
                }
            },
            elements: {
                point: {
                    radius: 0
                }
            }
        });
    }
}

function generateDuePaymentList(list) {
    var table_data = '<thead>\n\
                        <tr>\n\
                        <th> Customer </th>\n\
                        <th> Amount </th>\n\
                        <th>Due Date </th>\n\
                        <th>Project</th>\n\\n\
                        <th>Sub Project</th>\n\
                        <th>Plot ID</th>\n\
                        <th>Over Due</th>\n\
                        <th>Total Paid</th>\n\
                        </tr>\n\
                    </thead>';
    table_data += '<tbody>';
    $.each(list, function (key, value) {
        var dd = new Date(value.due_date);
        var duedate = dd.getDate() + '-' + MonthArr[dd.getMonth()] + '-' + dd.getFullYear();

        table_data += '<tr>\n\
                            <td>' + value.customer_display_name + '</td>\n\
                            <td>' + value.emi_amount + '</td>\n\
                            <td>' + value.due_date + '</td>\n\
                            <td>' + value.project_master_name + '</td>\n\
                            <td>' + value.sub_project_master_name + '</td>\n\
                            <td>' + value.plot_master_name + '</td>\n\
                            <td>' + value.overdue + '</td>\n\
                            <td>' + value.total_paid + '</td>\n\
                        </tr>';
    });
    table_data += '</tbody>';
    $("#due_payment_list").html(table_data);
    $("#due_payment_list").DataTable({aaSorting: []});
}

//get all news list
function getNewsList() {
    showLoader();
    $.ajax({
        url: base_url + 'news-list',
        type: 'post',
        data: {},
        success: function (response) {
            var html = '';
            if (response.status == "success") {
                var i = 1;
                $.each(response.data, function (key, value) {
                    var path = '';
                    if (value.photo) {
                        path = media_url + 'news_photo/' + value.photo;
                    }

                    html += '<div class="list-item">\n\
                    <div class="preview-image">\n\
                        <img class="img-sm rounded-circle" src="' + path + '" alt="profile image">\n\
                    </div>\n\
                    <div class="content">\n\
                        <div class="d-flex align-items-center">\n\
                            <h6 class="product-name">' + value.title + '</h6>\n\
                            <small class="time ml-3">' + value.created_date + '</small>\n\
                        </div>\n\
                        <div class="d-flex align-items-center">\n\
                            <p class="review-text d-block textFull">' + value.description + '</p>\n\
                        </div>\n\
                    </div>\n\
                </div>';

                });

                $('#news-list').append(html);

                hideLoader();
            }
            else {

                hideLoader();
            }
        }
    });
}//function end all news list