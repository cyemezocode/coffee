<?php require 'header.php'; ?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Food Menu</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Menu</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Menu Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
                    <h1 class="mb-5">Most Popular Items</h1>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                         
                    <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active switch" data-bs-toggle="pill" href="#tab-1" data-class="menu">
                                <i class="fa fa-list fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <!-- <small class="text-body">Popular</small> -->
                                    <h6 class="mt-n1 mb-0">All</h6>
                                </div>
                            </a>
                        </li>
                    <?php
                                      $sql = "SELECT * from category";
                                      $param = array();
                                      $datas = $action->selectRows($sql,$param);
                                      foreach ($datas as $key => $data) {
                                    ?>    
                    <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active switch" data-bs-toggle="pill" href="#tab-1" data-class="menu<?= $data['cat_id'];?>">
                                <i class="fa fa-<?= $data['cat_icon'];?> fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <!-- <small class="text-body">Popular</small> -->
                                    <h6 class="mt-n1 mb-0"><?= $data['cat_name'];?></h6>
                                </div>
                            </a>
                        </li>
                        <?php }?>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4 menus">
                                
                                <?php
                                      $sql = "SELECT * from menu,category where cat_id=men_category";
                                      $param = array();
                                      $datas = $action->selectRows($sql,$param);
                                      foreach ($datas as $key => $data) {
                                    ?>
                                <div class="col-lg-6 menu menu<?= $data['men_category'];?>">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="admin/<?= $data['men_image'];?>" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span><?= $data['men_name'];?></span>
                                                <span class="text-primary"><?= $data['men_price'];?> Rfw</span>
                                            </h5>
                                            <small class="fst-italic"><?= $data['men_details'];?></small>
                                        </div>
                                        <div style="display:flex;justify-content:center;align-items:center;font-size:20;color:#ffc000;padding:10px;background:#4b4b4b;border-radius:50%;width:50px;aspect-ratio:1/1;cursor:pointer;" class="addToCart" data-id="<?= $data['men_id'];?>">
                                            <i class="fas fa-cart-plus"></i>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->
        
        <?php require 'footer.php'; ?>