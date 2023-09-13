<?php require 'header.php'; ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Table</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="forms-sample form">
        <input type="hidden" name="addTable">
      <div class="modal-body">
      <div class="form-group">
                        <label for="exampleInputTablename1">Table Name</label>
                        <input type="text" required name="name" class="form-control" id="exampleInputTablename1" placeholder="Table Name">
                      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Table</h5>
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
                      <h4 class="card-title mb-sm-0">Tables</h4>
                      <button class="btn badge badge-success p-2 ml-auto" data-toggle="modal" data-target="#exampleModal"> Add Table</button>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">No</th>
                            <th class="font-weight-bold">Name</th>
                            <th class="font-weight-bold">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                                  <?php
                                      $sql = "SELECT * from tables";
                                      $param = array();
                                      $datas = $action->selectRows($sql,$param);
                                      foreach ($datas as $key => $data) {
                                    ?>
                                    <tr>
                                        <td><?= $key+=1;?></td>
                                        <td><?= $data['tab_name'];?></td>
                                        <td>
                                            <button class="btn badge badge-success p-2 ml-auto updateData"  data-id="<?= $data['tab_id'];?>" data-table="tables" data-toggle="modal" data-target="#exampleModalUpdate"> Edit</button>
                                            <button class="btn badge badge-danger p-2 ml-auto deleteRow" data-id="<?= $data['tab_id'];?>" data-table="tables" data-column="tab_id"> Delete</button>
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
          