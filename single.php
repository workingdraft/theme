<?php get_header(); ?>

<div class="content">
  <div class="content_inner">

    <?php include(get_template_directory() . '/cookie.php'); ?>

    <?php
      include(get_template_directory() . '/revision.php');
    ?>

    <?php comments_template(); ?>

    <?php include(get_template_directory() . '/moneymoney.php'); ?>
  </div>
</div>

<?php get_footer(); ?>
