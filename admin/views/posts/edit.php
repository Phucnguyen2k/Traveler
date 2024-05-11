<div class="container mt-5">

    <h2 class="text-center text-uppercase">Edit Blog</h2>
    <a class="btn btn-primary rounded my-4" href="?controller=posts&action=home"><i class="fa-solid fa-backward"></i> Back</a>

    <form action="index.php?controller=posts&action=saveUpdate" method="POST" enctype="multipart/form-data">
    <input type="hidden" class="form-control" id="id" name="id" required value="<?php echo $post->id; ?>">

    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control rounded" id="title" name="title" required value="<?php echo $post->title; ?>">
            </div>
            <div class="mb-3" >
            <input type="hidden" name="old_picture" value="<?php echo $post->picture; ?>">
            <img style="width: 100%;" class="img-fluid rounded"
                            src="../assets/img/posts/<?php echo !empty($post->picture) ? $post->picture : 'blank.jpg' ?>" alt="">
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" id="picture" name="picture" accept="image/*" value="<?php echo $post->picture; ?>">
            </div>
        </div>
        <div class="col">
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control rounded" id="content" name="content" rows="11"><?php echo $post->content; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="categoryid" class="form-label">Category</label>
            <select class="form-select" id="categoryid" name="categoryid">
                <option value="<?php echo $post->category->id; ?>"><?php echo $post->category->title; ?></option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category->id; ?>"><?php echo $category->title; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
        <label for="member" class="form-label">Member: </label>
        <input class="form-control" list="members" name="member" id="member" value="<?php echo $post->member->id; ?>">
        <datalist id="members">
                <?php 
                foreach ($members as $member){
                ?>
                <option value="<?php echo $member->id; ?>"><?php echo $member->name; ?></option>
                <?php
                };
                ?>
        </datalist>
        </div>
        </div>
    </div>
        
       
        <button type="submit" class="btn btn-primary rounded">Update</button>
    </form>
</div>