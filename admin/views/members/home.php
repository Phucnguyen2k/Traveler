<div class="container">
    <h2 class="text-center text-uppercase my-5">Admin</h2>

    <ul class="nav nav-pills p-2 mb-4 bg-light rounded">
    <li class="nav-item ">
        <a class="nav-link  rounded " href="?controller=posts&action=home">Blogs</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link rounded" href="?controller=categories&action=home">Category</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link rounded active" href="?controller=members&action=home">Member</a>
    </li>
    </ul>
    
<!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary my-2 rounded" data-bs-toggle="modal" data-bs-target="#myModal">
  Add Member
</button>
   <div class="">
   <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th width="112px">Avatar</th>
                <th>Name</th>
      
                <th width="5%" ;>Edit</th>
                <th width="5%" ;>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($members)):
                $count = 0;
                foreach ($members as $member):
                    $count++;
                    ?>
                    <tr>
                        <th width="3%">
                            <?php echo $count ?>
                        </th>
                        <th>
                            <a href="index.php?controller=members&action=edit&id=<?php echo $member->id  ?>"">
                                <img src="../assets/img/avatar/<?php echo !empty($member->avatar) ? $member->avatar : 'non-avatar.jpg'; ?>"
                                     class="img-fluid mx-auto mb-3 rounded"
                                     style="width: 100px;"
                                     alt="<?php echo $member->name; ?>">
                            </a>
                        </th>
                        <th>
                            <?php echo $member->name; ?>
                        </th>
                     
                        <th>
                            <a href="index.php?controller=members&action=edit&id=<?php echo $member->id  ?>" class="btn btn-warning btn-sm rounded">
                            <i class="fa-solid fa-pen-to-square"></i> 
                        </th>
                        <th>
                            <a href="?controller=members&action=delete&id=<?php echo $member->id  ?>"
                                onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm rounded"><i
                                    class="fa-solid fa-trash"></i> </a>
                        </th>
                    </tr>

                    <?php
                endforeach;
            else:
                ?>
                <tr>
                    <td class="alert alert-danger text-center" colspan="4">No data</td>
                </tr>
                <?php
            endif;
            ?> 
        </tbody>
    </table>
   </div>
    </div>
</div>


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Member</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <form action="index.php?controller=members&action=saveAdd" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="id" name="id" value="">

                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control rounded" id="name" name="name" required value="">
                </div>
                <div class="mb-3">
                    <label for="avatar" class="form-label">Avatar</label>
                    <input type="file" class="form-control" id="avatar" name="avatar" accept=".jpg,.jpeg,.png" value="">
                </div>
            
                <button type="submit" class="btn btn-primary rounded">Add Member</button>
            </form>
      </div>

      <!-- Modal footer -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger rounded" data-bs-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div>