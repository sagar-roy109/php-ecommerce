<?php
include '../config/db.php';
$db = new Database();
$db->sql("SELECT * FROM categories");
$data = $db->getResult();
?>
<div class="container">
  <div class="card mt-5 mb-5">
    <h5 class="card-header">Table Basic</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Title</th>
            <th>Slug</th>
            <th>Description</th>
            <th>Image</th>
            <th>Meta Title</th>
            <th>Meta Desc</th>
            <th>Meta Keywords</th>
            <th>Status</th>
            <th>Popular</th>
            <th>Created at</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php
          if (count($data) > 0) {
            foreach ($data as $val) {
              print_r($val);
          ?>




              <tr>
                <td><?php echo $val['cat_title'] ?></td>
                <td><?php echo $val['slug'] ?></td>
                <td>
                  <?php echo $val['description'] ?>
                </td>
                <td>
                  <img style="width: 50px; height: 50px" src="../uploads/<?php echo $val['image'] ?>">
                </td>
                <td><?php echo $val['meta_title'] ?></td>
                <td><?php echo $val['meta_desc'] ?></td>
                <td><?php echo $val['meta_keywords'] ?></td>
                <?php

                if ($val['status'] == 1) {
                  echo '<td><span class="badge bg-label-primary me-1">Active</span></td>';
                } else {
                  echo '<td><span class="badge bg-label-danger me-1">Deactive</span></td>';
                }

                ?>
                <?php

                if ($val['popular'] == 1) {
                  echo '<td><span class="badge bg-label-primary me-1">Active</span></td>';
                } else {
                  echo '<td><span class="badge bg-label-danger me-1">Deactive</span></td>';
                }

                ?>
                <td><?php echo $val['created_at'] ?></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                      <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>

          <?php
            }
          }
          ?>

        </tbody>
      </table>
    </div>
  </div>

</div>