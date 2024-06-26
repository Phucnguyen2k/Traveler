<div class="row">
    <div class="col-md-12">
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thông tin thành viên</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="index.php?controller=members&action=saveUpdate" enctype="multipart/form-data">
                  <input type="hidden" name="id" />
                <div class="card-body">                  
                  <div class="form-group">
                      <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $member->id; ?>">
                      <input type="hidden" class="form-control" id="old_avatar" name="old_avatar" value="<?php echo $member->avatar; ?>">
                      <div class="mb-3 col-3">
                      <p class="fw-bold">ID: <?php echo $member->id; ?></p>         
                      <label for="avatar" class="form-label d-block">Avatar</label>
                      <img src="../assets/img/avatar/<?php echo !empty($member->avatar) ? $member->avatar : 'non-avatar.jpg'; ?>"
                                            class="img-fluid mx-auto mb-3 rounded"
                                            style="width: 200px;"
                                            alt="<?php echo $member->name; ?>">
                      <input type="file" class="form-control" id="avatar" name="avatar" accept=".jpg,.jpeg,.png"
                      value="<?php echo $member->avatar; ?>"
                      style="width= 200px;"
                      >
                      </div>

                      <div class="mb-3 col-3">
                      <label for="name" class="form-label">Full Name</label>
                      <input type="text" class="form-control rounded" id="name" name="name" required value="<?php echo $member->name; ?>">
                      </div>
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