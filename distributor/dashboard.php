<?php

include_once 'header-copy.php';
if (empty($_SESSION['distributor_login_resp']['id']) || $_SESSION['distributor_login_resp']['id'] == '') {
  echo '<script type="text/javascript">window.location.href = "login";</script>';
  exit;
}
?>
<div class="main-content">
  <section class="section">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Dashboard</h4>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-12 d-flex">
        <div class="card flex-fill">
          <div class="card-header">
            <h4>Sales Report</h4>
          </div>
          <div class="card-body">
            <canvas id="myChart2"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-12 d-flex">
        <div class="card flex-fill">
          <div class="card-header">
            <h4>Mismatch Dispatches</h4>
          </div>
          <div class="card-body">
		  <div class="summary">
              <div class="summary-item">
                <ul class="list-unstyled list-unstyled-border mt-2">
                  <li class="media">
                    <div class="media-body">
                      <div class="media-right mt-2" id="dispatch_by_me"></div>
                      <div class="media-title mt-2">Dispatch By Me</a></div>
                    </div>
                  </li>
                  <li class="media">
                    <div class="media-body">
                      <div class="media-right mt-2" id="dispatch_to_me"></div>
                      <div class="media-title mt-2">Dispatch To Me</a></div>
                    </div>
                  </li>
                </ul>
                <!--h6 class="text-right mt-3"><a href="javascript:void(0);" class="text-primary">View All</a></h6-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-12 d-flex">
        <div class="card flex-fill">
          <div class="card-header">
            <h4>Top 10 Selling Items</h4>
          </div>
          <div class="card-body" id="top-sell-items"></div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-12 d-flex">
        <div class="card flex-fill">
          <div class="card-header">
            <h4>Negative Stock</h4>
          </div>
          <div class="card-body">
             <div class="row" id="negative-stock">
            </div>
			<h6 class="text-right mt-3"><a href="current-stock" class="text-primary">View All</a></h6>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4>Receive</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered mb-0">
                <thead>
                  <tr>
                    <th>Dispatch By</th>
                    <th>Dispatch Type</th>
                    <th>Dispatch Date</th>
                    <th>Dispatch Number</th>
                  </tr>
                </thead>
                <tbody id="receive-list">
                </tbody>
              </table>
            </div>
            <h6 class="text-right mt-3"><a href="item-received-list" class="text-primary">View All</a></h6>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php
include_once 'footer-copy.php';
?>

<script>
  getDashboardDetail();

  function getDashboardDetail() {
    showLoader();
    var url = base_url + 'distributor/dashboard';
    $.ajax({
      url: url,
      type: 'post',
      data: {
        distributor_id: distributor_id
      },
      success: function(response) {
        var html = '';
        var top_sell = '';
        var negtive_stock = '';
        if (response.status == 'success') {
          hideLoader();
          if (response.data.mismatch_dispatches) {
            var mismatch_dispatches = response.data.mismatch_dispatches;
            $('#dispatch_by_me').html(mismatch_dispatches.mismatch_by_me);
            $('#dispatch_to_me').html(mismatch_dispatches.mismatch_to_me);
          }
          if (response.data.receive_list.length > 0) {
            $.each(response.data.receive_list, function(key, value) {
              html += '<tr>\n\
                                  <td>' + value.distributor_from + '</td>\n\
                                  <td>' + value.dispatch_type + '</td>\n\
                                  <td>' + value.dispatch_date + '</td>\n\
                                  <td>' + value.dispatch_no + '</td>\n\
                                </tr>';
            });
            $('#receive-list').html(html);
          }

          if (response.data.top_10_selling_items.length > 0) {
            $.each(response.data.top_10_selling_items, function(key, value) {
              var percent = (Number(value.quantity / 100) * 100).toFixed();
              top_sell += ' <div class="mb-4"><div class="text-mediem float-right font-weight-bold text-muted">' + value.quantity + '</div>\n\
                                  <div class="font-weight-bold mb-1">' + value.product_name + '</div>\n\
                                  <div class="progress" data-height="3" style="height: 3px;">\n\
                                    <div class="progress-bar" role="progressbar" data-width="' + percent + '%" aria-valuenow="' + percent + '" aria-valuemin="0" aria-valuemax="100" style="width: ' + percent + '%;"></div>\n\
                                  </div></div>';
            });
            $('#top-sell-items').html(top_sell);

          }

          if (response.data.negative_inventory.length > 0) {
            $.each(response.data.negative_inventory.slice(0, 4), function(key, value) {

              var media_path = media_url + 'product_images/' + value.product_image;
              negtive_stock += '<div class="col-md-12">\n\
                                <div class="row">\n\
                                <div class="col-md-2">\n\
                                 <img src="' + media_path + '" alt="product">\n\
                                  </div>\n\
                                 <div class="col-md-8">\n\
                              <div class="font-weight-bold">' + value.product_display_name + '</div>\n\
                               </div>\n\
                              <div class="col-md-2">\n\
                              <div class="text-muted text-medium font-weight-bold"><span class="text-primary"></span>' + value.negative_qty + '</div>\n\
                              </div>\n\
                              </div>\n\
                              </div>';

            });
            $('#negative-stock').html(negtive_stock);
          }
          if (response.data.sales_report.length > 0) {
            var label = [];
            var data = [];
            $.each(response.data.sales_report, function(key, value) {

              var days = value.days;
              var total = value.total;
              label.push(days);
              data.push(total);

            });
            var ctx = document.getElementById("myChart2").getContext('2d');
            var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: label,
                datasets: [{
                  label: 'Total-Sale',
                  data: data,
                  borderWidth: 2,
                  backgroundColor: '#b66dff',
                  borderColor: '#b66dff',
                  borderWidth: 2.5,
                  pointBackgroundColor: '#ffffff',
                  pointRadius: 4
                }]
              },
              options: {
                legend: {
                  display: false
                },
                scales: {
                  yAxes: [{
                    gridLines: {
                      drawBorder: false,
                      color: '#f2f2f2',
                    },
                    ticks: {
                      beginAtZero: true,
                      stepSize: 150
                    }
                  }],
                  xAxes: [{
                    ticks: {
                      display: false
                    },
                    gridLines: {
                      display: false
                    }
                  }]
                },
              }
            });

          }

          console.log(myChart.data.datasets);
          hideLoader();

        }
      }
    }); //end ajax
  }
</script>