<?php
/**
 * The template for displaying archives.
 */

get_header();
global $wp_query;

?>
<body>
  <div class="contain-to-grid">
    <nav class="top-bar">
      <ul class="title-area">
        <li class="name">
          <h1><?php 
            if (is_category()) {
              echo '<a href="' . get_category_link() . '">';
              printf(__('Album: %s'), single_cat_title('', false));
              echo '</a>';
            } else {
              ?><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a><?php
            }
          ?></a></h1>
        </li>
      </ul>
      <section class="top-bar-section">
        <ul class="right">
          <li><a href="<?php echo home_url(); ?>">Back home &rarr;</a></li>
        </ul>
    </nav>
  </div>
<?php

while (have_posts()) {
  the_post();
  get_template_part('content', 'single');
}
?>
  <div class="row">
    <div class="large-12-columns">
      <div class="pagination-centered">
        <ul class="pagination">
          <?php if ($prev_posts_link = get_previous_posts_link("&laquo; Newer")) { ?>
          <li class="arrow"><?php echo $prev_posts_link; ?></li>
          <?php } ?>
          <?php if ($next_posts_link = get_next_posts_link("Older &raquo;")) { ?>
          <li class="arrow"><?php echo $next_posts_link; ?></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>

<?php get_footer(); 
