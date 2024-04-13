<!--  Blog Start  -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Our Blog</h6>
            <h1>Latest From Our Blog</h1>
        </div>
        <div class="row pb-3">
            <?php
            foreach ($posts as $post) {

                ?>
                <div class="col-lg-4 col-md-6 mb-4 pb-2">
                    <div class="blog-item">
                        <div class="position-relative">
                            <img class="img-fluid w-100" style="height: 200px !important; width: 350px !important;" src="assets/img/posts/<?php echo $post->picture; ?>" alt="">
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
                                    <?php echo $post->member->title; ?>

                                </a>
                                <span class="text-primary px-2">|</span>
                                <a class="text-primary text-uppercase text-decoration-none" href="">
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
        </div>
    </div>
</div>
<!-- Blog End  -->