<div class="container mt-5">
    <h2 class="text-center text-uppercase">Add Blog</h2>
    <a class="btn btn-primary rounded my-4" href="?controller=admin&action=home"><i class="fa-solid fa-backward"></i> Back</a>

    <form action="insert_post.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="picture" class="form-label">Picture</label>
            <input type="file" class="form-control" id="picture" name="picture" accept="image/*" >
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="6" ></textarea>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" id="category" name="category"  aria-label="Default select example">
                <option value="">Select category</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category->title; ?>"><?php echo $category->title; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
        <label for="member" class="form-label">Search Name:</label>
        <input class="form-control" list="members" name="member" id="member">
        <datalist id="members">
                <?php 
                foreach ($members as $member){
                ?>
                <option value="<?php echo $member->name; ?>"><?php echo $member->name; ?></option>
                <?php
                };
                ?>
        </datalist>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>