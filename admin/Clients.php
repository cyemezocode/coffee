<?php require 'header.php'; ?>

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Our Clients</h4>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">Client Phone</th>
                            <th class="font-weight-bold">Code</th>
                            <th class="font-weight-bold">Time</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                        <?php
                                      $sql = "SELECT * from orders,client where ord_status=? and cli_id=ord_client  group by ord_code order by ord_id asc";
                                      $param = array(0);
                                      $datas = $action->selectRows($sql,$param);
                                      $total = 0;
                                      foreach ($datas as $key => $data) {
                                    ?>
                          <tr>
                            <td><?= $data['cli_phone'];?></td>
                            <td><?= $data['ord_code'];?></td>
                            <td><?= $data['ord_time'];?></td>
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
          