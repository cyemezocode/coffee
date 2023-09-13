<?php require 'header.php'; ?>
<?php
$sql = "SELECT *,sum(ord_quantity) as totQuantity,sum(men_price*ord_quantity) as price from orders,client,tables,menu where ord_code=? and cli_id=ord_client and tab_id=ord_table and men_id=ord_menu group by ord_code";
$param = array($_GET['id']);
$order = $action->selectRow($sql,$param);
?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Order Information</h4>
                    </div>
                    <div class="border-top pt-4">
                      Client: <b><?= $order['cli_phone'];?></b><br>
                      Code: <b><?= $order['ord_code'];?></b><br>
                      Table: <b><?= $order['tab_name'];?></b><br>
                      Instant Pick: <b><?= $order['ord_isPick']==0?'Yes':'No';?></b><br>
                      Quantity: <b><?= $order['totQuantity'];?></b><br>
                      Price: <b><?= number_format($order['price'],2);?> Rwf</b><br>
                      Message: <b><?= $order['ord_comment'];?></b><br>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Order Items</h4>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">Menu</th>
                            <th class="font-weight-bold">Category</th>
                            <th class="font-weight-bold">Quantity</th>
                            <th class="font-weight-bold">Price</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                        <?php
                                      $sql = "SELECT * from orders,menu,category where ord_code=? and men_id=ord_menu and cat_id=men_category";
                                      $param = array($_GET['id']);
                                      $datas = $action->selectRows($sql,$param);
                                        $total = 0;
                                        foreach ($datas as $key => $data) {
                                            $total+=$data['men_price']*$data['ord_quantity'];
                                    ?>
                          <tr>
                            <td><img src="<?= $data['men_image'];?>" alt="alipay" class="gateway-icon mr-2"> <?= $data['men_name'];?></td>
                            <td><?= $data['cat_name'];?> (<?= $data['cat_type'];?>)</td>
                            <td><?= $data['ord_quantity'];?>X<?= $data['men_price'];?></td>
                            <td><?= number_format(($data['men_price']*$data['ord_quantity']),2);?> Rwf</td>
                          </tr>
                          <?php } ?>
                          <tr>
                            <th colspan="3" style="text-align:left">Total</th>
                            <th><?= number_format($total,2);?> Rwf</th>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
      <?php require 'footer.php'; ?>
          