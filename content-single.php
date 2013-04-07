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
      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('rg-main', array('class' => 'zoomable rg-main')); ?></a>
      </p>
      <p><span class="genericon-inline"></span> hover to zoom</p>
    </div>
    <div class="large-4 columns">
<?php
  } else {
?>
    <div class="large-12-columns">
<?php } ?>
<?php
    if (strlen(get_the_content('', true)) > 0) { ?>
      <div class="panel">
        <?php the_content(); ?>
      </div>
<?php
    }
      if (!is_category()) {
        $categories = get_the_category();
        if ($categories) {
          echo '<p class="tags"><span class="genericon-inline"></span> ';
          foreach ($categories as $category) {
            echo '<a href="' . get_category_link($category->term_id) . '" title="' . esc_attr(sprintf(__("See album: %s"), $category->name)) . '" class="tag">' . $category->cat_name . '</a> ';
          }
          echo '</p>';
        }
      }
?>
    <?php comments_template('', true); ?>
    </div>
   </div>
