<?php include_once 'header.php'; ?>
<!-- partial -->
<div class="main-panel ">
  <div class="content-wrapper ">
    <div class="row grid-margin">
      <div class="col-12">
        <div class="card">
          <div class="card-body p-3">
            <h4 class="card-title mb-4">Add Sub-project</h4>
            <div id="errors_div"></div>
            <form class="forms-sample" id="sub-project-form" name="sub-project-form" method="post" enctype="multipart/form-data">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Projects</label>
                <div class="col-sm-4">
                  <select class="form-control required" id="projects" name="projects">
                  </select>
                </div>
                <label class="col-sm-2 col-form-label">Sub-project Name</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control required" id="sub_project_name" name="sub_project_name" placeholder="Sub-project Name">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Sub-project Image</label>
                <div class="input-group col-sm-4">
                <input type="file" name="photo" id="photo" class="file-upload-default">
                  <input type="text" class="form-control file-upload-info" disabled placeholder="Choose File">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                  </span>
                  <img src="" style="display:none;width:100px;" id="photo_id" />
                </div>
                <label class="col-sm-2 col-form-label">Unit Price</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control required" id="unit_price"name="unit_price" placeholder="Unit Price">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Sub-project Map</label>
                <div class="input-group col-sm-4">
                  <input type="file" name="mapphoto" id="mapphoto" class="file-upload-default">
                  <input type="text" class="form-control file-upload-info" disabled placeholder="Choose File">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                  </span>
                  <img src="" style="display:none;width:100px;" id="mapphoto_id" />
                </div>
                <label class="col-sm-2 col-form-label">Area</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control required" placeholder="Area" id="area" name="area">
                </div>
              
                
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control required" rows="7" name="description" id="description"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-gradient-primary mr-2" id="sub_project_form">Submit</button>
                  <input type="hidden" id="sub_project_id" />
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
            <h4 class="card-title mb-4">Edit/View Sub-project</h4>
            <div class="overflowAuto">
              <table class="table table-bordered custom_action sub_project_list" id="order-listing">
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include_once 'footer.php'; ?>
  <script src="assets/javascript/sub_project.js"></script>