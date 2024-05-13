<!-- Header Start -->
<div class="container-fluid page-header">
    <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center mb-5" style="min-height: 600px">
                <h3 class="display-4 text-white text-uppercase"> <?php echo !empty($category->title) ? $category->title : 'BLOG'; ?></h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="?controller=posts&action=home"><?php echo!empty($category->title) ? "BLOG" : 'HOME'; ?></a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase"> <?php echo !empty($category->title) ? $category->title : 'BLOG'; ?></p>
            </div>
        </div>
    </div>
</div>

<!-- Header End -->


<!-- Blog Start -->
<div class="container-fluid">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="row pb-3">
                    <?php
                    foreach ($posts as $post) {

                        ?>
                        <div class="col-md-6 mb-4 pb-2">
                            <div class="blog-item">
                                <div class="position-relative">
                                    <img class="img-fluid w-100 rounded-top" style="height: 200px !important; width: 350px !important;" src="assets/img/posts/<?php echo $post->picture; ?>"
                                        alt="">
                                    <div class="blog-date">
                                        <h6 class="font-weight-bold mb-n1">
                                            <?php echo date_format($post->datecreated, 'd'); ?>
                                        </h6>
                                        <small class="text-white text-uppercase">
                                            <?php echo date_format($post->datecreated, 'M'); ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="bg-white p-4">
                                    <div class="d-flex mb-2">
                                        <a class="text-primary text-uppercase text-decoration-none" href="">
                                            <?php echo $post->member->name; ?>
                                        </a>
                                        <span class="text-primary px-2">|</span>
                                        <a class="text-primary text-uppercase text-decoration-none" href="?controller=posts&action=postByCategory&id=<?php echo $post->categoryid ?>">
                                            <?php echo $post->category->title; ?>
                                        </a>
                                    </div>
                                    <a class="h5 m-0 text-decoration-none"
                                        href="index.php?controller=posts&action=details&id=<?php echo $post->id ?>">
                                        <?php echo $post->title; ?>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                    ?>
                    <div class="col-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-lg justify-content-center bg-white mb-0"
                                style="padding: 30px;">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-5 mt-lg-0">
                <!-- Author Bio -->
                <div class="d-flex flex-column text-center bg-white mb-5 py-5 px-4">
                    <img src="assets/img/avatar/117289013_p0_square1200.jpg" class="img-fluid mx-auto mb-3" style="width: 100px;">
                    <h3 class="text-primary mb-3">John Doe</h3>
                    <p>Conset elitr erat vero dolor ipsum et diam, eos dolor lorem, ipsum sit no ut est ipsum erat kasd
                        amet elitr</p>
                    <div class="d-flex justify-content-center">
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-reddit"></i>
                        </a>
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <!-- Search Form -->
                <div class="mb-5">
                    <div class="bg-white" style="padding: 30px;">
                        <div class="input-group">
                            <input type="text" class="form-control p-4 bg-white" placeholder="tìm kiếm">
                            <div class="input-group-append">
                                <span class="input-group-text bg-primary border-primary text-white"><i
                                        class="fa fa-search"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tag Cloud -->
                <div class="mb-5">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Thể loại</h4>
                        <div class="d-flex flex-wrap m-n1">
                        <?php foreach ($tags as $tag):
                          ?>
                            <a href="?controller=posts&action=postByCategory&id=<?php echo $tag->id ?>" class="btn m-1 bg-white text-white rounded "><?php echo $tag->title; ?></a>
                      <?php endforeach; ?>
                        </div>
                    </div>
                <!-- Recent Post -->
                <div class="mb-5">
                    <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Bài đăng gần đây</h4>
                    <?php
                    foreach ($postRecent as $post) {

                        ?>
                        <a class="d-flex align-items-center text-decoration-none bg-white mb-3"
                            href="index.php?controller=posts&action=details&id=<?php echo $post->id ?>">
                            <img style="width: 100px; height: 100px;" class="img-fluid"
                                src="assets/img/posts/<?php echo $post->picture; ?>" alt="">
                            <div class="pl-3">
                                <h6 class="m-1"><?php echo $post->title; ?></h6>
                                <small><?php echo date_format($post->datecreated, 'd F Y'); ?></small>
                            </div>
                        </a>
                        <?php
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Blog End -->