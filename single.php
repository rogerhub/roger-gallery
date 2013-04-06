<?php
/**
 * The template for displaying a single post.
 */

get_header();

ob_start();
previous_post_link('%link');
$prevlink = ob_get_contents();
ob_end_clean();

ob_start();
next_post_link('%link');
$nextlink = ob_get_contents();
ob_end_clean();

?>
<body>
  <div class="contain-to-grid">
    <nav class="top-bar">
      <ul class="title-area">
        <li class="name">
          <h1><a href="<?php echo home_url(); ?>"><?php echo bloginfo('name'); ?></a></h1>
        </li>
      </ul>
      <section class="top-bar-section">
        <ul class="right">
          <?php if ($prevlink) { ?>
          <li><a href="<?php echo $prevlink; ?>">&larr; Prev</a></li>
          <?php if ($nextlink) { ?>
          <li class="divider"></li>
          <?php } } if ($nextlink) { ?>
          <li><a href="<?php echo $nextlink; ?>">Next &rarr;</a></li>
          <?php } ?>
        </ul>
      </section>
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

<?php get_footer(); ?>
