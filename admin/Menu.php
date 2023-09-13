<?php require 'header.php'; ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="forms-sample form">
      <input type="hidden" name="addMenu">
      <div class="modal-body">        
       <div class="form-group">
                        <label for="exampleInputUsername1">Menu Name</label>
                        <input required name="name" type="text" class="form-control" id="exampleInputUsername1" placeholder="Menu Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputcategory">Menu Category</label>
                        <select name="category" required class="form-control form-control-sm" id="exampleFormControlSelect3">
                          <option value="">Select Category</option>
                        <?php
                            $sql = "SELECT * from category";
                            $param = array();
                            $datas = $action->selectRows($sql,$param);
                            foreach ($datas as $key => $data) {
                          ?>
                        <option value="<?= $data['cat_id'];?>"><?= $data['cat_name'];?></option>
                      <?php } ?>
                      </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPrice">Menu Price</label>
                        <input type="text" name="price" class="form-control" id="exampleInputPrice" placeholder="Menu Price">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPrice">Menu Image</label>
                        <input type="file" name="image" required class="form-control" id="exampleInputPrice" placeholder="Menu Price">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputDetails">Menu Details</label>
                        <textarea name="details" class="form-control" id="exampleTextarea1" rows="4" spellcheck="false"></textarea>
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
                <h5 class="modal-title" id="exampleModalLabel">Update menu</h5>
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
                      <h4 class="card-title mb-sm-0">Menu</h4>
            <?php if($_SESSION['type']=='Administrator'){ ?>
                      <button class="btn badge badge-success p-2 ml-auto" data-toggle="modal" data-target="#exampleModal"> Add Menu</button>
                      <?php } ?>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">ID</th>
                            <th class="font-weight-bold">Image</th>
                            <th class="font-weight-bold">Name</th>
                            <th class="font-weight-bold">Category</th>
                            <th class="font-weight-bold">Price</th>
                            <th class="font-weight-bold">details</th>
            <?php if($_SESSION['type']=='Administrator'){ ?>
                            <th class="font-weight-bold">Action</th>
                      <?php } ?>
                          </tr>
                          </thead>
                                <tbody>
                                  <?php
                                      $sql = "SELECT * from menu,category where cat_id=men_category";
                                      if($_SESSION['type']!='Administrator'){
                                        $sql.=" and cat_type='".$_SESSION['type']."'";
                                      }
                                      $param = array();
                                      $datas = $action->selectRows($sql,$param);
                                      foreach ($datas as $key => $data) {
                                    ?>
                                    <tr>
                                        <td><?= $key+=1;?></td>
                                        <td class="py-1">
                                          <img src="<?= $data['men_image'];?>" alt="image">
                                        </td>
                                        <td><?= $data['men_name'];?></td>
                                        <td><?= $data['cat_name'];?></td>
                                        <td><?= $data['men_price'];?></td>
                                        <td><?= $data['men_details'];?></td>
            <?php if($_SESSION['type']=='Administrator'){ ?>
                                        <td>
                                            <button class="btn badge badge-success p-2 ml-auto updateData"  data-id="<?= $data['men_id'];?>" data-table="menu" data-toggle="modal" data-target="#exampleModalUpdate"> Edit</button>
                                            <button class="btn badge badge-danger p-2 ml-auto deleteRow" data-id="<?= $data['men_id'];?>" data-table="menu" data-column="men_id"> Delete</button>
                                        </td>
                      <?php } ?>
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