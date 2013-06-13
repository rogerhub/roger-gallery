<?php
/**
 * The template for displaying a single image post
 */

?>
  <div class="main row">
<?php
  // If there is a post thumbnail
  if (has_post_thumbnail()) {
    $t = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
    $i = wp_get_attachment_image_src(get_post_thumbnail_id(), 'rg-large');
?>
    <div class="large-12 columns">
      <div class="image-container<?php if ($t[2] > $t[1]) { ?> horizontal<?php } ?>">
      <a href="<?php the_permalink(); ?>"><img src="<?php echo $i[0]; ?>" class="zoomable rg-large js-full-size-replace" data-full-size="<?php echo $t[0]; ?>" /></a>
      </div>
      <p><span class="genericon-inline"></span> hover to zoom<span style="float: right;"><a href="<?php echo $t[0]; ?>"><span class="genericon-inline"></span> full size (<?php echo "{$t[1]}x{$t[2]}"; ?>)</a></span></p>
    </div>
  </div>
  <div class="main row">
<?php } ?>
    <div class="large-8 large-offset-2 columns">
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
