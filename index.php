<?php get_header(); ?>


<div class="content">
  <div class="content_inner">

    <?php include(get_template_directory() . '/cookie.php'); ?>

    <?php $current_page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; ?>

    <?php
      $i = 0;

      if (have_posts()) :
        while (have_posts() && $i < 1) :
          the_post();
          include(get_template_directory() . '/revision.php');
          $i++;
        endwhile;
    ?>

    <?php if ($current_page == 1) : ?>
      <div class="content--flex">
        <?php include(get_template_directory() . '/soundquality.php'); ?>
        <?php include(get_template_directory() . '/moneymoney.php'); ?>
      </div>
    <?php endif; ?>

    <?php
      while (have_posts()) :
        the_post();
        include(get_template_directory() . '/revision.php');
      endwhile;
    ?>

    <?php else: ?>


    <div class="postcontainer">
      <h2>Nichts gefunden</h2>
      <p>
        Es konnten keine der Anfrage entsprechenden Beiträge oder Seiten gefunden werden.
      </p>
    </div>

    <?php endif; ?>


    <?php if ($wp_query->max_num_pages > 1 ): ?>
      <p class="nav">
        <span class="nav-prev">
          <?php next_posts_link('Ältere Revisionen  &rarr;'); ?>
        </span>

        <span class="nav-next">
          <?php previous_posts_link('&larr; Neuere Revisionen'); ?>
        </span>
      </p>

    <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>
