<?php
include '../config/db.php';
$db = new Database();
$db->sql("SELECT * FROM products");
$data = $db->getResult();
?>
<div class="container">
  <div class="card mt-5 mb-5">
    <h5 class="card-header">Table Basic</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <!-- <th>Slug</th> -->
            <!-- <th> Small Description</th> -->
            <!-- <th> Description</th> -->
            <th> Original Price</th>
            <th> Sale Price</th>
            <th>Image</th>
            <th> QTY</th>
            <th>Status</th>
            <!-- <th>Trending</th>
            <th>Meta Title</th>
            <th>Meta Desc</th>
            <th>Meta Keywords</th> -->
            <th>Created at</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php
          if (count($data) > 0) {
            foreach ($data as $val) {
            
          ?>




              <tr>
                <td><?php echo $val['name'] ?></td>
                <!-- <td><?//php echo $val['slug'] ?></td> -->
                <!-- <td> -->
                  <?//php echo $val['small_desc'] ?>
                <!-- </td> -->
                <!-- <td> -->
                  <?//php echo $val['description'] ?>
                <!-- </td> -->
                <td>
                  <?php echo $val['original_price'] ?>
                </td>
                <td>
                  <?php echo $val['sale_price'] ?>
                </td>
                <td>
                  <img style="width: 50px; height: 50px" src="../uploads/<?php echo $val['image'] ?>">
                </td>
                <td>
                  <?php echo $val['qty'] ?>
                </td>
                <?php

                if ($val['status'] == 1) {
                  echo '<td><span class="badge bg-label-primary me-1">Active</span></td>';
                } else {
                  echo '<td><span class="badge bg-label-danger me-1">Deactive</span></td>';
                }

                ?>
                <?php

                if ($val['trending'] == 1) {
                  echo '<td><span class="badge bg-label-primary me-1">Active</span></td>';
                } else {
                  echo '<td><span class="badge bg-label-danger me-1">Deactive</span></td>';
                }

                ?>
                <!-- <td><?//php echo $val['meta_title'] ?></td> -->
                <!-- <td><?//php echo $val['meta_desc'] ?></td> -->
                <!-- <td><?//php echo $val['meta_keywords'] ?></td> -->
                
                <td><?php echo $val['created_at'] ?></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="product_edit.php?id=<?php echo $val['id']?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                      <a class="dropdown-item" href="product_delete.php?id=<?php echo $val['id']?>"><i class="bx bx-trash me-1"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>

          <?php
            }
          } else{
            echo "<p> No category is in DB. Please add category </p>";
          }
          ?>

        </tbody>
      </table>
    </div>
  </div>

</div>