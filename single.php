<?php
/**
 * The template for displaying a single post.
 */

get_header();

ob_start();
previous_post_link('%link', 'Older &rarr;');
$prevlink = ob_get_contents();
ob_end_clean();

ob_start();
next_post_link('%link', '&larr; Newer');
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
          <?php if ($nextlink) { ?>
          <li id="nextlink"><?php echo $nextlink; ?></li>
          <?php if ($prevlink) { ?>
          <li class="divider"></li>
          <?php } } if ($prevlink) { ?>
          <li id="prevlink"><?php echo $prevlink; ?></li>
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

<?php get_footer(); ?>
