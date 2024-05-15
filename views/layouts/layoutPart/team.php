<!-- Team Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h3 class="text-primary text-uppercase" style="letter-spacing: 5px;">TÁC GIẢ</h3>
            <h1>Được yêu thích nhất</h1>    
        </div>
        <div class="row">
            <?php
            foreach ($authors as $author) {
                ?>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-2">
                <div class="team-item bg-white mb-4">
                    <div class="team-img position-relative overflow-hidden">
                        <img class="img-fluid w-100 rounded" src="assets/img/<?php echo $author->avatar ?>" alt="">
                        <div class="team-social">
                            <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-reddit"></i></a>
                            <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <h5 class="text-truncate"><?php echo $author->name ?></h5>
                        <p class="m-0"><?php echo $author->desc ?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Team End -->