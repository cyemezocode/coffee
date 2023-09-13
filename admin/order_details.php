<?php require 'header.php'; ?>
<?php
$sql = "SELECT *,sum(ord_quantity) as totQuantity,sum(men_price*ord_quantity) as price from orders,client,tables,menu where ord_code=? and cli_id=ord_client and tab_id=ord_table and men_id=ord_menu group by ord_code";
$param = array($_GET['id']);
$order = $action->selectRow($sql,$param);
?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assign Waiter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form class="forms-sample form">
            <div class="modal-body updateHolder">
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Order Information</h4>
            <?php if($_SESSION['type']=='Administrator'){ ?>
                      <button class="btn badge badge-success p-2 ml-auto updateData"  data-id="<?= $order['ord_code'];?>" data-table="orders" data-toggle="modal" data-target="#exampleModal"> Assign Waiter</button>
                      <?php }else{ ?>
                      <button class="btn badge badge-success p-2 ml-auto updateData"  data-id="<?= $order['ord_code'];?>" data-table="mark" data-toggle="modal" data-target="#exampleModal"> Mark as Done</button>
                      <?php }?>
                    </div>
                    <div class="border-top pt-4">
                      Client: <b><?= $order['cli_phone'];?></b><br>
                      Code: <b><?= $order['ord_code'];?></b><br>
                      Table: <b><?= $order['tab_name'];?></b><br>
                      Instant Pick: <b class="badge badge-<?= $order['ord_isPick']==0?'primary':'warning';?> p-1"><?= $order['ord_isPick']==0?'Yes':'No';?></b><br>
                      <?php if($order['ord_isPick']==1){?>Pick Time: <b><?= $order['ord_picktime'];?></b><br><?php } ?>
                      Quantity: <b><?= $order['totQuantity'];?></b><br>
                      Price: <b><?= number_format($order['price'],2);?> Rwf</b><br>
                      <?php if($order['ord_barista']!=0){
                        
                        $sql = "SELECT * from admin where ad_id=?";
                        $param = array($order['ord_barista']);
                        $barista = $action->selectRow($sql,$param);

                        ?>Waiter: <b><?= $barista['ad_name'];?> (<?= $barista['ad_phone'];?>)</b><br><?php } ?>
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
          