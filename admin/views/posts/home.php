<div class="row">
    <div class="col-md-12">
    <div class="card">
              <div class="card-header">
                <h3><p class="text-center text-uppercase">Danh sách Blogs</p></h3>
              </div>
              <a class="btn btn-primary m-3 col-md-2" href="index.php?controller=posts&action=add"><i class="fa-solid fa-plus mr-3"></i>New Blog</a>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th width="25%">Thumbnail</th>
                      <th>Title</th>                    
                      <th width="5%">Edit</th>
                      <th width="5%">Delete</th>
                    </tr>
                  </thead>
                  <tbody>                    
                    <?php
                    $i=1;
                    foreach ($posts as $post){
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><a href="index.php?controller=posts&action=edit&id=<?php echo $post->id; ?>"><img style = "width:200px" src="../assets/img/posts/<?php echo $post->picture; ?>"/></td> 
                        <td></a><?php echo $post->title; ?></td>
                        <td><a href="index.php?controller=posts&action=edit&id=<?php echo $post->id; ?>"><p class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></p></a></td>
                        <td><a href="index.php?controller=posts&action=delete&id=<?php echo $post->id; ?>"><p class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></p></a></td>
                    </tr>

                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
    </div>

</div>