<div class="container">
    <h2 class="text-center text-uppercase mb-5">Admin</h2>
 
<ul class="nav nav-pills my-3">
  <li class="nav-item ">
    <a class="nav-link  rounded active" href="#">Blogs</a>
  </li>
  <li class="nav-item ">
    <a class="nav-link rounded" href="#">Category</a>
  </li>
  <li class="nav-item ">
    <a class="nav-link rounded" href="#">Member</a>
  </li>
 
</ul>

   <div class="">
   <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
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
                            <?php echo $post->title; ?>
                        </th>
                        <th>
                            <?php echo date_format($post->datecreated, 'd F Y'); ?>
                        </th>
                        <th>
                            <?php echo $post->member->name ?>
                        </th>
                        <th>
                            <?php echo $post->category->title ?>
                        </th>
                     
                        <th>
                            <a href="index.php?controller=admin&action=edit&id=<?php echo $post->id ?>" class="btn btn-warning btn-sm"><i
                                    class="fa-solid fa-pen-to-square"></i> </a>
                        </th>
                        <th>
                            <a href="?module=admin&action=delete&id=<?php echo $post->id ?>"
                                onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm"><i
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