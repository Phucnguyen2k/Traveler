<!-- Packages Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Light Novels</h6>
            <h1>Light Novels Phổ biến</h1>
        </div>
        <div class="row">
             <?php
            foreach ($lightnovels as $lightnovel) {
                ?>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="package-item bg-white mb-2 ">
                    <div class="position-relative">
                        <h5 class="position-absolute top end mr-2 mt-2"><span class="badge text-dark bg-danger rounded">HOT</span></h5>
                        <img class="img-fluid rounded-top rounded" src="assets/img/ligthnovel/<?php echo $lightnovel->cover ?>" salt="" tyle="width: 250px; height: 360px;" >
                    </div>
                    <div class="p-3">
                        <div class="d-flex justify-content-between mb-1">
                            <small class="m-0"><i class="fa fa-user text-primary mr-2"></i><?php echo $lightnovel->author ?> </small>
                        </div>
                        <h5><?php echo $lightnovel->title ?></h5>
                        <div class=" mt-2 pt-2">
                            <div class="d-block justify-content-between">
                                <h6 class="m-0">
                                    <?php 
                                    for ($i=1; $i <= $lightnovel->star ; $i++) { 
                                    ?>
                                    <i class="fa fa-star text-primary mr-2"></i>
                                    <?php } ?> 
                                    <small>đã bán <?php echo $lightnovel->store ?></small>
                                </h6>
                                <h5 class="m-0 mt-2"><?php echo $lightnovel->price ?> vnd <small><?php echo $lightnovel->discount ?></small></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Packages End -->