<?php
/**
 * The template for displaying a single image post
 */

?>
  <div class="main row">
<?php
  // If there is a post thumbnail
  if (has_post_thumbnail()) {
?>
    <div class="large-8 columns">
      <p class="image-container">
      <?php the_post_thumbnail('rg-main', array('class' => 'zoomable rg-main'); ?>
      </p>
    </div>
    <div class="large-4 columns">
<?php
  } else {
?>
    <div class="large-12-columns">
<?php } ?>
      <div class="panel">
        <p><?php the_content(); ?></p>
      </div>
<?php
      if (!is_category()) {
        $categories = get_the_category();
        if ($categories) {
          echo '<p class="tags"><span class="genericon-inline"></span> ';
          foreach ($categories as $category) {
            echo '<a href="' . get_category_link($category->term_id) . '" title="' . esc_attr(sprintf(__("See album: %s"), $category->name)) . '">' . $category->cat_name . '</a> ';
          }
          echo '</p>';
        }
      }
?>
    </div>
   </div>
