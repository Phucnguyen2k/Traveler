<div class="row">
    <div class="col-md-12">
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thông tin Blog</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="index.php?controller=posts&action=saveAdd" enctype="multipart/form-data">
                  <input type="hidden" name="id" />
                <div class="card-body">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title">
                  </div>
                  <div class="form-group">
                    <label>Thumbnail</label>
                    <input type="file" class="form-control" name="picture">
                  </div>
                  <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control" name="content"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Members</label>
                    <select class="form-control" name="createdby">
                    <?php
                     foreach($members as $member){
                        ?>
                        <option value='<?php echo $member->id;?>'><?php echo $member->name;?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Categories</label>
                    <select class="form-control" name="categoryid">
                    <?php

                     foreach($categories as $category){
                        ?>
                        <option value='<?php echo $category->id;?>'><?php echo $category->title;?></option>
                        <?php
                      }
                      ?>
                    </select>
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