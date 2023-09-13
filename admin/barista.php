<?php require 'header.php'; ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="forms-sample form">
                <div class="modal-body">
                    <input type="hidden" name="addBarista">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Names</label>
                        <input type="text" required name="names" class="form-control" id="exampleInputUsername1"
                            placeholder="Names">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" required name="email" class="form-control" id="exampleInputEmail1"
                            placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Phone</label>
                        <input type="text" required name="phone" class="form-control" id="exampleInputPassword1"
                            placeholder="+25072.../+25078...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Type</label>

                        <select name="type" required class="form-control form-control-sm"
                            id="exampleFormControlSelect3">

                            <option value="">Select Type</option>
                            <option value="Administrator">Administrator</option>
                            <option value="Barista">Barista</option>
                            <option value="Chef">Chef</option>
                        </select>
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
                <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
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
                            <h4 class="card-title mb-sm-0">Users</h4>
                            <button class="btn badge badge-success p-2 ml-auto" data-toggle="modal"
                                data-target="#exampleModal"> Add User</button>
                        </div>
                        <div class="table-responsive border rounded p-1">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bold">No</th>
                                        <th class="font-weight-bold">Names</th>
                                        <th class="font-weight-bold">Phone</th>
                                        <th class="font-weight-bold">Email</th>
                                        <th class="font-weight-bold">Type</th>
                                        <th class="font-weight-bold">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                      $sql = "SELECT * from admin where ad_type!=?";
                                      $param = array('Administrator');
                                      $datas = $action->selectRows($sql,$param);
                                      foreach ($datas as $key => $data) {
                                    ?>
                                    <tr>
                                        <td><?= $key+=1;?></td>
                                        <td><?= $data['ad_name'];?></td>
                                        <td><?= $data['ad_phone'];?></td>
                                        <td><?= $data['ad_email'];?></td>
                                        <td><?= $data['ad_type'];?></td>
                                        <td>
                                            <button class="btn badge badge-success p-2 ml-auto updateData"
                                                data-id="<?= $data['ad_id'];?>" data-table="admin" data-toggle="modal"
                                                data-target="#exampleModalUpdate"> Edit</button>
                                            <button class="btn badge badge-danger p-2 ml-auto deleteRow"
                                                data-id="<?= $data['ad_id'];?>" data-table="admin" data-column="ad_id">
                                                Delete</button>
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