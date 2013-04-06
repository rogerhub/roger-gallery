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
              echo '<a href="' . home_url() . '">' . bloginfo('name') . '</a>';
            }
          ?></a></h1>
        </li>
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
    <div class="large-12 columns">
      <?php if (wp_is_mobile()) { ?>
      <p><span class="genericon-inline"></span> tap to zoom<!-- Sorry Apple --></p>
      <?php } else { ?>
      <p><span class="genericon-inline"></span> click to zoom</p>
      <?php } ?>
    </div>
  </div>
  <div class="row">
    <div class="large-12-columns">
      <div class="pagination-centered">
        <ul class="pagination">
          <?php if ($prev_posts_link = get_prev_posts_link()) { ?>
          <li class="arrow"><a href="<?php echo $prev_posts_link; ?>">&laquo;</a></li>
          <?php } else { ?>
          <li class="arrow unavailable"><a href="">&laquo;</a></li>
          <?php } ?>
<?php
          $pages = paginate_links(array(
            'total' => $wp_query->max_num_pages,
            'current' => max(1, get_query_var('paged')),
            'prev_next' => false,
            'type' => 'array',
          ));
          foreach ($pages as $page) {
            echo str_repeat(' ', 10);
            if (strpos($page, "current'") !== false) {
              echo '<li class="current">';
            } else {
              echo '<li>';
            }
            echo $page . "</li>\n";
          }
?>
          <?php if ($next_posts_link = get_next_posts_link()) { ?>
          <li class="arrow"><a href="<?php echo $next_posts_link; ?>">&raquo;</a></li>
          <?php } else { ?>
          <li class="arrow unavailable"><a href="">&raquo;</a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>

<?php get_footer(); ?>
