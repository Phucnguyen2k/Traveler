<div class="row">
    <div class="col-md-12">
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thông tin Thể Loại</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="index.php?controller=categories&action=save" enctype="multipart/form-data">
              <input type="hidden" name="id" value = "<?php echo $categories->id; ?>"/>
                <div class="card-body">                  
                  <div class="form-group">
                    <label>Nội dung</label>
                    <input type="text" class="form-control" name="title" value ="<?php echo $categories->title ; ?>">  
                  </div>                                                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
              </form>
            </div>
</div>
</div>