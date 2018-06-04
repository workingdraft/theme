<?php get_header(); ?>

<?php
  $i = 0;

  if (have_posts()) :
    while (have_posts() && $i < 1) :
      the_post();
      include(get_template_directory() . '/revision.php');
      $i++;
    endwhile;
?>

<div class="card card--highlight">
  <h2 class="text text_type-2 card_title">
    Sponsoren gesucht!
  </h2>

  <p class="text text_type-3">
    Als Podcast versuchen wir die Qualität der Aufnahmen hoch zu halten. Dafür verwenden wir Tools, die nicht kostenlos sind.
    Auch unser Aufnahme-Equipment kostet Geld. Mit rund 15.000 Downloads pro Folge im Schnitt haben wir Herausforderungen
    im Hosting zu bewältigen, vor allem der Traffic ist recht hoch. Um diese Kosten decken zu können, suchen wir Sponsoren.
    Wenn ihr unseren Podcast gut findest, sprecht mit euren Chefs. Bei Interesse, kontaktiert uns per E-Mail: sponsoring@workingdraft.de.
  </p>

  <div class="card_action">
    <button class="button button--primary">Jetzt spenden</button>
  </div>
</div>

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


<?php if($wp_query->max_num_pages > 1 ): ?>
<p class="nav">
  <span class="nav-prev"><?php next_posts_link('Ältere Revisionen  &rarr;'); ?></span>
  <span class="nav-next"><?php previous_posts_link('&larr; Neuere Revisionen'); ?></span>
  <span class="clear"></span>
</p>
<?php endif; ?>

<?php get_footer(); ?>
