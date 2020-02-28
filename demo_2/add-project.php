<?php include_once 'header.php'; ?>
<!-- partial -->
<div class="main-panel ">
  <div class="content-wrapper ">
    <div class="row grid-margin">
      <div class="col-12">
        <div class="card">
          <div class="card-body p-3">
            <h4 class="card-title mb-4">Add Project</h4>
            <div id="errors_div"></div>
            <form class="forms-sample" id="project-form" name="project-form" method="post" enctype="multipart/form-data">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Project Name</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control required" id="project_name" name="project_name" placeholder="Project Name">
                </div>
                <label class="col-sm-2 col-form-label">Project Image</label>
                <div class="input-group col-sm-4">
                  <input type="file" name="photo" class="file-upload-default" id="photo">
                  <input type="text" class="form-control file-upload-info " disabled placeholder="Choose File" >
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                  </span>
                  <img src="" style="display:none;width:100px;" id="photo_id" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Project Map</label>
                <div class="input-group col-sm-4">
                  <input type="file" name="mapphoto" class="file-upload-default" id="mapphoto">
                  <input type="text" class="form-control file-upload-info " disabled placeholder="Choose File" >
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                  </span>
                  <img src="" style="display:none;width:100px;" id="mapphoto_id" />
                </div>
                <label class="col-sm-2 col-form-label">Unit Price</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control required" placeholder="Unit Price" id="unit_price" name="unit_price">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Area</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control required" placeholder="Area" id="area" name="area">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control required" rows="7" id="description" name="description"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-gradient-primary mr-2" id="project_form">Submit</button>
                  <input type="hidden" id="project_id" />
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
            <h4 class="card-title mb-4">Edit/View Project</h4>
            <div class="overflowAuto">
              <table class="table table-bordered custom_action project_list" id="order-listing">
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
  <?php include_once 'footer.php'; ?>
  <script src="../assets/javascript/project_validation.js"></script>