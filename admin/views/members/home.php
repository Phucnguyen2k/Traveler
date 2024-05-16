<div class="container-fluid">
  <div class="row">
      <div class="col-12">
          <div class="card">
          <div class="card-header">
                  <h3><p class="text-center text-uppercase">Danh sách thành viên</p></h3>
                </div>
                <a class="btn btn-primary m-3 col-md-2" href="?controller=members&action=add"><i class="fa-solid fa-plus mr-3"></i>New Category</a>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead> 
                    <tr>
                      <th width="5%">ID</th>
                      <th width="120px">Avatar</th>
                      <th>Member</th>
                      <th width="5%">Edit</th>
                      <th width="5%">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $i=1;
                      foreach ($members as $member):       
                      ?>
                    <tr>
                      <td><?php echo $i++; ?></td>
                      <th>
                      <a href="index.php?controller=members&action=edit&id=<?php echo $member->id  ?>"">
                                <img src="../assets/img/avatar/<?php echo !empty($member->avatar) ? $member->avatar : 'non-avatar.jpg'; ?>"
                                     class="img-fluid mx-auto mb-3 rounded"
                                     style="width: 100px;"
                                     alt="<?php echo $member->name; ?>">
                            </a>
                      </th>
                      <td><?php echo $member->name ?>
                      </td>
                      <td><a href="index.php?controller=members&action=edit&id=<?php echo $member->id; ?>"><p class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></p></a></td>
                      <td><a href="index.php?controller=members&action=delete&id=<?php echo $member->id; ?>"><p class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></p></a></td>
                    </tr>
                    <?php
                    endforeach;
                    ?>
                    </tbody>
                    </table>                 
                
          </div>
      </div>
  </div>
</div>