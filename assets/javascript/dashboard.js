getDashboardInfo(user_id);

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
                $('#matching_income').html(data.matching_income);
                $('#total_earning').html(data.total_earning);

                //chart
                var month_wise_data = data.month_wise_data;
                var total_left_business = [];
                var total_right_business = [];
                var total_self_business = [];
                $.each(month_wise_data, function (key, value) {
                    total_left_business.push(Number(value.total_left_business));
                    total_right_business.push(Number(value.total_right_business));
                    total_self_business.push(Number(value.total_self_business));
                });

                generateChart(total_left_business, total_right_business, total_self_business);

                //due_payment_list
                var due_payment_list = data.due_payment_list;
                generateDuePaymentList(due_payment_list);
            }
            hideLoader();
        }
    });
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

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
                datasets: [
                    {
                        label: "Left Business",
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
                        label: "Right Business",
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
                                max: 80
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
                            <th> EMI Due Date </th>\n\
                            <th>Project</th>\n\\n\
                            <th>Sub Project</th>\n\
                            <th>Plot ID</th>\n\
                        </tr>\n\
                    </thead>';
    table_data += '<tbody>';

    $.each(list, function (key, value) {
        var dd = new Date(value.due_date);
        var duedate = dd.getDate() + '-' + month[dd.getMonth()] + '-' + dd.getFullYear();

        table_data += '<tr>\n\
                            <td>' + value.name + '</td>\n\
                            <td>' + value.amount + '</td>\n\
                            <td>' + duedate + '</td>\n\
                            <td>' + value.project_master_name + '</td>\n\
                            <td>' + value.sub_project_master_name + '</td>\n\
                            <td>' + value.plot_master_name + '</td>\n\
                        </tr>';
    });
    table_data += '</tbody>';
    $("#due_payment_list").html(table_data);
    $("#due_payment_list").DataTable();
}