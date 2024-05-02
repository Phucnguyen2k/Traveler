<div class="container mt-5">

    <h2 class="text-center text-uppercase">Edit Category</h2>
    <a class="btn btn-primary rounded my-4" href="?controller=categories&action=home"><i class="fa-solid fa-backward"></i> Back</a>

    <form action="index.php?controller=categories&action=save" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Name Category</label>
            <input type="text" class="form-control rounded" id="title" name="title" required value="<?php echo $category->title; ?>">
        </div>
        <input type="hidden" class="form-control " id="id" name="id" required value="<?php echo $category->id; ?>">
        <button type="submit" class="btn btn-primary rounded">Update</button>
    </form>
</div>