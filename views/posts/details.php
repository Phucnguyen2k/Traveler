<!-- Blog Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Blog Detail Start -->
                <div class="shadow-sm">
                    <div class="blog-item">
                    <div class="position-relative">
                    <img class="img-fluid w-100 rounded-top" src="assets/img/posts/<?php echo $post->picture; ?>" alt="">
                    <div class="overlay"></div>
                    </div>

                    </div>
                    <div class="bg-white mb-3" style="padding: 30px;">
                        
                        <h2 class="">
                            <?php echo $post->title; ?>
                        </h2>
                        <small class="mb-3 d-block"><?php echo date_format($post->datecreated, 'd F Y'); ?></small>

                        <p style="min-height: 288px;">
                            <?php echo $post->content; ?>
                        </p>
                        <div class="d-flex">
                            <!-- <a class="text-primary text-uppercase text-decoration-none" href="">
                                <?php echo $post->member->name; ?>
                            </a>
                            <span class="text-primary px-2">|</span> -->
                            <a href="?controller=posts&action=postByCategory&id=<?php echo $post->categoryid ?>" class="btn btn-light m-1 shadow-sm"><?php echo $post->category->title; ?></a>
                        </div>
                    </div>
                </div>
                <!-- Blog Detail End -->

             
            </div>

            <div class="col-lg-4 mt-5 mt-lg-0 ">
                <!-- Author Bio -->
                <div class="d-flex flex-column text-center bg-white mb-5 py-5 px-4 rounded">
                    <img src="assets/img/avatar/<?php echo $member->avatar; ?>" class="img-fluid mx-auto mb-3 rounded" style="width: 200px;">
                    <h3 class="text-primary mb-3"><?php echo $member->name; ?></h3>
                    <p>Conset elitr erat vero dolor ipsum et diam, eos dolor lorem, ipsum sit no ut est ipsum erat kasd
                        amet elitr</p>
                    <div class="d-flex justify-content-center">
                        <a class="text-primary px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-primary px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-primary px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-primary px-2" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-primary px-2" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <!-- Search Form -->
                <!-- <div class="mb-5">
                    <div class="bg-white" style="padding: 30px;">
                        <div class="input-group">
                            <input type="text" class="form-control p-4" placeholder="Keyword">
                            <div class="input-group-append">
                                <span class="input-group-text bg-primary border-primary text-white"><i
                                        class="fa fa-search"></i></span>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- Category List -->
                <div class="mb-5 ">
                    <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Categories</h4>
                    <div class="bg-white rounded" style="padding: 30px;">
                        <ul class="list-inline m-0">

                        <?php foreach ($tags as $tag):
                          
                          ?>
                          <li class="mb-3 d-flex justify-content-between align-items-center">
                              <a class="text-dark" href="?controller=posts&action=postByCategory&id=<?php echo $tag->id ?>"><i class="fa fa-angle-right text-primary mr-2"></i>
                                  <?php echo $tag->title; ?></a>
                              <span class="badge badge-primary badge-pill"><?php echo $tag->amount; ?></span>
                          </li>
                      <?php endforeach; ?>



                        </ul>
                    </div>
                </div>
                <!-- Recent Post -->

               


            </div>
        </div>
     <!-- Recent Post -->
     <div class="mb-5">
    <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Recent Post</h4>
    <div class="row">
        <?php foreach ($posts as $post) { ?>
            <div class="col-lg-4 col-md-6 mb-3">
                <a class="d-flex align-items-center text-decoration-none bg-white rounded"
                    href="index.php?controller=posts&action=details&id=<?php echo $post->id ?>">
                    <img style="width: 150px; height: 150px;" class="img-fluid"
                        src="assets/img/posts/<?php echo $post->picture; ?>" alt="">
                    <div class="pl-3">
                        <h6 class=""><?php echo $post->title; ?></h6>
                        <small><?php echo date_format($post->datecreated, 'd F Y'); ?></small>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</div>
     <!-- Recent Post End -->

</div>

</div>

</div>

    
</div>