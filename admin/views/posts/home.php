<div class="container">
    <h2 class="text-center text-uppercase my-5">Admin</h2>
 
    <ul class="nav nav-pills p-2 mb-4 bg-white rounded">
    <li class="nav-item ">
        <a class="nav-link rounded active" href="?controller=posts&action=home">Blogs</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link rounded text-white" href="?controller=categories&action=home">Category</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link rounded text-white" href="?controller=members&action=home">Member</a>
    </li>
       
    </ul>
    <a class="btn rounded bg-primary text-white ml-auto mb-2" href="?controller=posts&action=add" data-bs-toggle="tooltip" title="Add Blog">
            Add Blog  <i class="fa-solid fa-plus"></i>
        </a>
   <div class="">
   <table class="table table-bordered table-striped table-white">
        <thead>
            <tr>
                <th>No.</th>
                <th>Thumbnail</th>
                <th>Title</th>
                <th width="12%">Date</th>
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
                            <a href="index.php?controller=posts&action=edit&id=<?php echo $post->id ?>">
                                <img style="width: 150px; height: 100px;" class="img-fluid rounded"
                        src="../assets/img/posts/<?php echo !empty($post->picture) ? $post->picture : 'blank.jpg' ?>" alt="">
                            </a>
                        </th>
                      
                        <th>
                            <?php echo $post->title; ?>
                        </th>
                        <th>
                            <?php echo date_format($post->datecreated, 'd-m-Y'); ?>
                        </th>
                        <th>
                            <?php echo $post->member->name?>
                        </th>
                        <th>
                            <?php echo $post->category->title ?>
                        </th>
                     
                        <th>
                            <a href="index.php?controller=posts&action=edit&id=<?php echo $post->id; ?> " class="btn btn-warning btn-sm rounded"><i
                                    class="fa-solid fa-pen-to-square"></i> </a>
                        </th>
                        <th>
                            <a href="index.php?controller=posts&action=delete&id=<?php echo $post->id; ?>"
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