<div class="container mt-5">

    <h2 class="text-center text-uppercase">Add blog</h2>
    <a class="btn btn-primary rounded my-4" href="?controller=posts&action=home"><i class="fa-solid fa-backward"></i> Back</a>

    <form action="index.php?controller=posts&action=saveAdd" method="POST" enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="id" name="id" value="">

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control rounded" id="title" name="title" required value="">
        </div>
        <div class="mb-3">
            <label for="picture" class="form-label">Picture</label>
            <input type="file" class="form-control" id="picture" name="picture" accept=".jpg,.jpeg,.png" value="">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control rounded" id="content" name="content" rows="6"></textarea>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label" >Category</label>
            <select class="form-select" id="category" name="categoryid" required >
                <option value=""></option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category->id; ?>"><?php echo $category->title; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
        <label for="member" class="form-label">Member: </label>
        <input class="form-w" list="members" name="createdby" id="member" value="" required>
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
        <button type="submit" class="btn btn-primary rounded">Update</button>
    </form>
</div>