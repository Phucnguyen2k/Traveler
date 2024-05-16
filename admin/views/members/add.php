<div class="row">
    <div class="col-md-12">
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thông tin thành viên</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="index.php?controller=members&action=saveAdd" enctype="multipart/form-data">
                  <input type="hidden" name="id" />
                <div class="card-body">                  
                  <div class="form-group">
                      <div class="mb-3 col-3">
                      <label for="avatar" class="form-label d-block">Avatar</label>
                      <input type="file" class="form-control" id="avatar" name="avatar" accept=".jpg,.jpeg,.png"
                      value=""
                      style="width= 200px;"
                      >
                      </div>

                      <label for="name" class="form-label">Full Name</label>
                      <input type="text" class="form-control rounded" id="name" name="name" required>
                  </div>                                                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <button type="submit" class="btn btn-primary rounded">Update Member</button>
                </div>

                
              </form>
            </div>
</div>
</div>