<div class="container">
    <h2 class="text-center text-uppercase my-5">Admin</h2>

    <ul class="nav nav-pills p-2 mb-4 bg-light">
    <li class="nav-item ">
        <a class="nav-link  rounded " href="?controller=admin&action=home">Blogs</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link rounded active" href="?controller=admin&action=category">Category</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link rounded" href="?controller=admin&action=member">Member</a>
    </li>
    <li class="nav-item ml-3">
        <a class="btn rounded bg-primary text-white ml-auto " href=""><i class="fa-solid fa-plus"></i></a>
    </li>
    </ul>
   <div class="">
   <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
      
                <th width="5%" ;>Edit</th>
                <th width="5%" ;>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($categories)):
                $count = 0;
                foreach ($categories as $category):
                    $count++;
                    ?>
                    <tr>
                        <th width="3%">
                            <?php echo $count ?>
                        </th>
                        <th>
                            <?php echo $category->title; ?>
                        </th>
                     
                        <th>
                            <a href="index.php?controller=admin&action=edit&id=<?php echo $category->id  ?>" class="btn btn-warning btn-sm"><i
                                    class="fa-solid fa-pen-to-square"></i> </a>
                        </th>
                        <th>
                            <a href="?module=admin&action=delete&id=<?php echo $category->id  ?>"
                                onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm"><i
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