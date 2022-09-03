<?php
if (is_single() or is_page()) {
  the_post();
  $description = trim(strip_tags(str_replace(array("\n", '[...]'), ' ', get_the_excerpt())));
  rewind_posts();
} else {
  $description = 'Working Draft ist ein wöchentlicher News-Podcast für Webdesigner und Webentwickler';
}
?>

<!doctype html>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title(' | ', true, 'right'); ?> <?php bloginfo('name'); ?></title>
  <meta name="description" content="<?php echo $description; ?>">
  <link rel="shortcut icon" href="<?php bloginfo('url'); ?>/favicon.png" type="image/png">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>">
  <?php
  /* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
  if (is_singular() && get_option('thread_comments'))
    wp_enqueue_script('comment-reply');

  /* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
  wp_head();
  ?>
</head>

<body>


  <hgroup>
    <h1><a href="<?php bloginfo(url); ?>"><?php bloginfo('name') ?></a></h1>
    <h2><?php bloginfo('description') ?></h2>
  </hgroup>


  <a href="<?php bloginfo(url); ?>"><img id="icon" src="<?php bloginfo(template_url); ?>/icon.png" alt=""></a>

  <div id="schnorren" style="margin-left: 2rem;">
    <h2>Spenden für Soundqualität!</h2>
    <p>Unsere Aufnahmen werden optimiert mit <a href="https://auphonic.com/donate_credits?user=Schepp">Auphonic</a>.<br>Dort könnt Ihr uns <a href="https://auphonic.com/donate_credits?user=Schepp">Processing-Time kaufen</a>.</p>
    <p>Alternativ findet Ihr uns jetzt auch auf Patreon:<br><br> <a href="https://www.patreon.com/bePatron?u=13677588" data-patreon-widget-type="become-patron-button">Become a Patron!</a>
      <script async src="https://c6.patreon.com/becomePatronButton.bundle.js"></script>
    </p>
  </div>
