<?php

$db->sql("SELECT * FROM categories WHERE status = 1");
$cats = $db->getResult();
if ($cats) {

?>

  <aside class="ps-sidebar">
    <aside class="widget widget_sidebar widget_category">
      <h3 class="widget-title">Category</h3>

      <ul class="ps-list--checked">
        <?php
        foreach ($cats as $cat) {
        ?>

          <li>
            <a href="products.php?category=<?php echo $cat['cat_id'] ?>"><?= $cat['cat_title'] ?></a>
        <?php
        }
      }
        ?>


      </ul>




    </aside>

  </aside>