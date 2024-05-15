<!-- Destination Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">THỂ LOẠI</h6>
            <h1>Khám phá những thể loại Anime hàng đầu</h1>
        </div>
        <!-- TODO: ADD img Genres -->
        <div class="row">
            <?php
            foreach ($movies as $movie) {
            ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="destination-item position-relative overflow-hidden mb-2">
                    <img class="img-fluid rounded" src="assets/img/<?php echo $movie->thumbnail ?>" alt="">
                    <a class="destination-overlay text-white text-decoration-none" href="">
                        <h5 class="text-white"><?php echo $movie->name ?></h5>
                        <span><?php echo $movie->amount; ?></span>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Destination Start -->