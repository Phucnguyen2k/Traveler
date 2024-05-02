<div class="container-md my-5">

    <h2 class="text-center text-uppercase">Edit Member</h2>
    <a class="btn btn-primary rounded my-4" href="?controller=members&action=home"><i class="fa-solid fa-backward"></i> Back</a>

    <form action="index.php?controller=members&action=saveUpdate" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $member->id; ?>">
                <input type="hidden" class="form-control" id="old_avatar" name="old_avatar" value="<?php echo $member->avatar; ?>">
            <div class="row">
                <div class="mb-3 col-3">
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
                
            
                <button type="submit" class="btn btn-primary rounded">Update Member</button>
            </form>
</div>