<?php include_once 'header.php'; ?>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper ">
    <div class="row grid-margin">
      <div class="col-12">
        <div class="card">
          <div class="card-body p-3">
            <h4 class="card-title mb-4">Add Plot</h4>
            <div id="errors_div"></div>
            <form class="forms-sample" method="post" action="" id="plot-form">
              <div class="row">
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Project Name</label>
                    <select class="form-control required" id="projects" name="projects">
                      <option value="">--Select--</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-3" style="display:none;" id="sub_pro_div">
                  <div class="form-group">
                    <label>Sub Project Name</label>
                    <select class="form-control required" id="sub_projects" name="sub_projects">

                    </select>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Plot No.</label>
                    <input type="text" class="form-control required" placeholder="Plot No" id="plot_no" name="plot_no">
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Plot Area</label>
                    <input type="text" class="form-control required" placeholder="Plot Area" id="plot_area" name="plot_area">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                  <input type="hidden" id="plot_id" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body p-3">
            <h4 class="card-title mb-4">Edit/View Plot</h4>
            <div class="overflowAuto">
              <table class="table table-bordered custom_action plot_list" id="order-listing">
                <thead>
                  <tr>
                    <th> Sr No. </th>
                    <th> Project Name </th>
                    <th> Sub Project Name </th>
                    <th> Plot No. </th>
                    <th> Plot Area </th>
                    <th> Availability </th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody id="plot_list"></tbody>

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
  <?php include_once 'footer.php'; ?>
  <script src="assets/javascript/plot.js"></script>