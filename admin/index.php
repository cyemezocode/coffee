<?php require 'header.php'; ?>

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">New Orders</h4>
                      <a href="#" class="text-dark ml-auto mb-3 mb-sm-0"> View all Products</a>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">Client Phone</th>
                            <th class="font-weight-bold">Code</th>
                            <th class="font-weight-bold">Table</th>
                            <th class="font-weight-bold">Quantity</th>
                            <th class="font-weight-bold">Time</th>
                            <th class="font-weight-bold">Instant</th>
                            <th class="font-weight-bold">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                        <?php
                                      $sql = "SELECT *,sum(ord_quantity) as totQuantity from orders,client,tables where ord_status=? and cli_id=ord_client and tab_id=ord_table group by ord_code order by ord_id asc";
                                      $param = array(0);
                                      $datas = $action->selectRows($sql,$param);
                                      $total = 0;
                                      foreach ($datas as $key => $data) {
                                    ?>
                          <tr>
                            <td><?= $data['cli_phone'];?></td>
                            <td><?= $data['ord_code'];?></td>
                            <td><?= $data['tab_name'];?></td>
                            <td><?= $data['totQuantity'];?></td>
                            <td><?= $data['ord_time'];?></td>
                            <td><span class="badge badge-<?= $data['ord_isPick']==0?'primary':'warning';?> p-2"><?= $data['ord_isPick']==0?'Yes':'No';?></span></td>
                            <td>
                              <a href="order_details.php?id=<?= $data['ord_code'];?>" class="badge badge-success p-2">View Details</a>
                            </td>
                          </tr>
                          <?php } ?>
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
          