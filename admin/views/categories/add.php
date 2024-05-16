<div class="row">
    <div class="col-md-12">
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thông tin chuyên mục</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="index.php?controller=categories&action=saveNew" enctype="multipart/form-data">
                  <input type="hidden" name="id"/>
                <div class="card-body">                  
                  <div class="form-group">
                    <label>Name</label>
                    <textarea class="form-control" name="title"></textarea>
                  </div>                                                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
</div>
</div>