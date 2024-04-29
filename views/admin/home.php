<div class="container">
    <h2 class="text-center text-uppercase my-5">Admin</h2>
 
    <ul class="nav nav-pills p-2 mb-4 bg-light rounded">
    <li class="nav-item ">
        <a class="nav-link rounded active" href="?controller=admin&action=home">Blogs</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link rounded" href="?controller=admin&action=category">Category</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link rounded" href="?controller=admin&action=member">Member</a>
    </li>
    <li class="nav-item ml-3">
        <a class="btn rounded bg-primary text-white ml-auto " href="?controller=admin&action=addPost" data-bs-toggle="tooltip" title="Add Blog">
            <i class="fa-solid fa-plus"></i>
        </a>
    </li>
    </ul>

   <div class="">
   <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Thumbnail</th>
                <th>Title</th>
                <th>Date</th>
                <th>Create By</th>
                <th>Category</th>
                <th width="5%" ;>Edit</th>
                <th width="5%" ;>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($posts)):
                $count = 0;
                foreach ($posts as $post):
                    $count++;
                    ?>
                    <tr>
                        <th>
                            <?php echo $count ?>
                        </th>
                        <th>
                            <a href="?controller=admin&action=editPost&id=<?php echo $post->id ?>">
                                <img style="width: 150px; height: 100px;" class="img-fluid rounded"
                        src="assets/img/posts/<?php echo $post->picture; ?>" alt="">
                            </a>
                        </th>
                      
                        <th>
                            <?php echo $post->title; ?>
                        </th>
                        <th>
                            <?php echo date_format($post->datecreated, 'd/m/Y'); ?>
                        </th>
                        <th>
                            <?php echo $post->member->name ?>
                        </th>
                        <th>
                            <?php echo $post->category->title ?>
                        </th>
                     
                        <th>
                            <a href="?controller=admin&action=editPost&id=<?php echo $post->id ?>" class="btn btn-warning btn-sm rounded"><i
                                    class="fa-solid fa-pen-to-square"></i> </a>
                        </th>
                        <th>
                            <a href="?module=admin&action=delete&id=<?php echo $post->id ?>"
                                onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm rounded"><i
                                    class="fa-solid fa-trash"></i> </a>
                        </th>
                    </tr>

                    <?php
                endforeach;
            else:
                ?>
                <tr>
                    <td class="alert alert-danger text-center" colspan="7">No data</td>
                </tr>
                <?php
            endif;
            ?> 
        </tbody>
    </table>
   </div>
    </div>
</div>