<?php 
include_once 'header.php';
$plotid = '';
if(isset($_REQUEST['plotid'])){
    $plotid = $_REQUEST['plotid'];
}
?>
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
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Plot Unit</label>
                    <select class="form-control required" id="plot_unit" name="plot_unit">
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                  <input type="hidden" id="plot_id" value="<?php echo $plotid ?>" />
                  <a href="plot-list" class="btn btn-gradient-danger mr-2">Back</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
  </div>
  <!-- content-wrapper ends -->
  <?php include_once 'footer.php'; ?>
  <script src="assets/javascript/plot.js"></script>