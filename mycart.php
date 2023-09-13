<?php require 'header.php'; ?>

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">My Cart</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">My Cart</a></li>
            </ol>
        </nav>
    </div>
</div>
</div>
<!-- Navbar & Hero End -->


<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">My Cart</h5>
            <h1 class="mb-5">Contact For Any Query</h1>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <h4 class="mb-5">My Order</h4>
                    <?php
                        if(isset($_SESSION['cart'])){
                            $totalAmount = 0;
                                      foreach ($_SESSION['cart'] as $key => $cart) {
                                      $sql = "SELECT * from menu,category where cat_id=men_category and men_id=?";
                                      $param = array($cart['id']);
                                      $datas = $action->selectRows($sql,$param);
                                      foreach ($datas as $key => $data) {
                                        $totalAmount+=$cart['quantity']*$data['men_price'];
                                    ?>
                    <div class="col-lg-12 menu menu<?= $data['men_category'];?>">
                        <div class="d-flex align-items-center">
                            <img class="flex-shrink-0 img-fluid rounded" src="admin/<?= $data['men_image'];?>" alt=""
                                style="width: 80px;">
                            <div class="w-100 d-flex flex-column text-start ps-4">
                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                    <span><?= $data['men_name'];?></span>
                                    <span class="text-primary">(<?= $cart['quantity'];?>)
                                        <?= $cart['quantity']*$data['men_price'];?> Rfw</span>
                                </h5>
                                <small class="fst-italic"><?= $data['men_details'];?></small>
                            </div>
                        </div>
                    </div>
                    <?php } 
                                
                            ?>
                    <hr>
                    <div class="col-lg-12 menu menu<?= $data['men_category'];?>">
                        <div class="d-flex align-items-center">
                            <div class="w-100 d-flex flex-column text-start ps-4">
                                <h5 class="d-flex justify-content-between pb-2">
                                    <span>Total Amount</span>
                                    <span class="text-primary"><?= $totalAmount;?> Rfw</span>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <?php } 
                                      }
                                      ?>

                </div>
            </div>
            <div class="col-md-6">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <form class="form">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="hidden" name="addOrder">
                                <div class="form-floating">
                                    <input type="text" required name="phone" class="form-control" id="name"
                                        placeholder="Your Name">
                                    <label for="name">Your Telephone</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select name="table" required class="form-control" id="">
                                        <option value="">Your Table</option>
                                        <?php
                                      $sql = "SELECT * from tables";
                                      $param = array();
                                      $datas = $action->selectRows($sql,$param);
                                      foreach ($datas as $key => $data) {
                                    ?>
                                        <option value="<?= $data['tab_id'];?>"><?= $data['tab_name'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4">
                                    <input type="hidden" required name="pick" class="pickVal" value="0">
                                    <label><input type="checkbox" class="togglePick" checked> Instant Order</label>
                                </div>
                                <div class="col-4 isPick" style="display:none">
                                    <div class="form-floating">
                                        <input type="date" name="date" class="form-control" id="name"
                                            placeholder="Pick Date">
                                        <label for="name">Pick Date</label>
                                    </div>
                                </div>
                                <div class="col-4 isPick" style="display:none">
                                    <div class="form-floating">
                                        <input type="time" name="time" class="form-control" id="name"
                                            placeholder="Pick Time">
                                        <label for="name">Pick Time</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea required name="message" class="form-control" placeholder="Leave a message here"
                                        id="message" style="height: 150px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Order</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<?php require 'footer.php'; ?>