<div class="container">
    <h2 class="text-center text-uppercase my-5">Admin</h2>

    <ul class="nav nav-pills p-2 mb-4 bg-light rounded">
    <li class="nav-item ">
        <a class="nav-link  rounded " href="?controller=admin&action=home">Blogs</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link rounded active" href="?controller=admin&action=category">Category</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link rounded" href="?controller=admin&action=member">Member</a>
    </li>
    </ul>
    <!-- TODO: Rename Category -->
    <form action="?controller=admin&action=addCategory" method="POST" enctype="multipart/form-data">
        <div class="d-flex flex-row-reverse">
           <p>Add New Category</p>
        </div>
        <div class="mb-3 d-flex flex-row-reverse">
            <button type="submit" class="btn btn-primary text-white ml-3 rounded" data-bs-toggle="tooltip" title="Add Category"><i class="fa-solid fa-plus"></i></button>
            <input type="text" class="form-control rounded w-25" id="title" name="title" required>
        </div>
    </form> 
      
   
   <div class="">
   <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th width="1%">Blogs</th>
      
                <th width="5%" ;>Rename</th>
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
                        <th class="text-right">
                            <?php echo $category->amount; ?>
                        </th>
                        <th>
                            <a href="index.php?controller=admin&action=edit&id=<?php echo $category->id  ?>" class="btn btn-warning btn-sm rounded"><i
                                    class="fa-solid fa-pen-to-square"></i> </a>
                        </th>
                        <th>
                            <a href="?module=admin&action=delete&id=<?php echo $category->id  ?>"
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