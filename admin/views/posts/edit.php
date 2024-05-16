<div class="row">
    <div class="col-md-12">
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thông tin Blog</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="index.php?controller=posts&action=saveUpdate" enctype="multipart/form-data">
               
                   
                <div class="card-body">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" value ="<?php echo $post->title ; ?>">  
                  </div>
                <div class="row container">
                <div class="col">
                    <input type="hidden" name="id" value = "<?php echo $post->id; ?>"/>
                    
                  <div class="form-group">
                    <label>Thumbnail</label>
                    <input type="hidden" name="old_picture" value="<?php echo $post->picture; ?>">
                    <div>
                    <img style="height: 350px;" class="img-fluid rounded"
                            src="../assets/img/posts/<?php echo !empty($post->picture) ? $post->picture : 'blank.jpg' ?>" alt="">
                    </div>
                    <input type="file" class="form-control" name="picture">
                  </div>
                  
                  <div class="form-group">
                    <label>Member</label>
                    <select class="form-control" name="createdby">
                    <option value="<?php echo $post->member->id; ?>"><?php echo $post->member->name; ?></option>
                    <?php
                     foreach($members as $member){
                        ?>
                      <option value="<?php echo $member->id; ?>"><?php echo $member->name; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="categoryid">
                    <option value="<?php echo $post->category->id; ?>"><?php echo $post->category->title; ?></option>
                      <?php foreach($categories as $category){
                        ?>
                    <option value="<?php echo $category->id; ?>"><?php echo $category->title; ?></option>
                        <?php
                      }

                      ?>

                    </select>
                  </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" name="content" rows="17"><?php echo $post->content; ?></textarea>
                      </div>
                    </div>

                   
                </div>
                 
                  
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
</div>
</div>