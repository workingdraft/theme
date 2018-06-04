<?php
  if(is_single() OR is_page()){
    the_post();
    $description = trim(strip_tags(str_replace(array("\n", '[...]'), ' ', get_the_excerpt())));
    rewind_posts();
  }
  else{
    $description = 'Working Draft ist ein wöchentlicher News-Podcast für Webdesigner und Webentwickler';
  }
?>
<!DOCTYPE html>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <title><?php wp_title(' | ', true, 'right'); ?> <?php bloginfo('name'); ?></title>
  <meta name="description" content="<?php echo $description; ?>">
  <link rel="shortcut icon" href="<?php bloginfo('url'); ?>/favicon.png" type="image/png">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/dist/index.css">

  <script async src="<?php bloginfo( 'template_url' ); ?>/dist/index.js"></script>
<?php
  /* We add some JavaScript to pages with the comment form
   * to support sites with threaded comments (when in use).
   */
  if ( is_singular() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );

  /* Always have wp_head() just before the closing </head>
   * tag of your theme, or you will break many plugins, which
   * generally use this hook to add elements to <head> such
   * as styles, scripts, and meta tags.
   */
  wp_head();
?>
</head>

<body>

  <header class="header">
    <a href="<?php bloginfo(url); ?>" class="header_logo">
      <svg
        viewBox="0 0 450 450"
        class="header_logo_icon">

        <rect x="198" y="110" fill="#8F098F" width="54" height="145" />
        <circle fill="#8F098F" cx="225" cy="300" r="31" />
        <circle fill="none" stroke="#8F098F" stroke-width="38" cx="225" cy="225" r="185" />
      </svg>

      <span class="header_logo_name">
        <?php bloginfo('name') ?>
      </span>

      <p class="text_type-3">
        <?php bloginfo('description') ?>
      </p>
    </a>
  </header>

  <nav class="navigation">
    <ul class="navigation_list">
      <li class="navigation_list_item">
        <a href="<?php bloginfo(url); ?>/dateiarchiv.php" class="navigation_list_item_link">
          Archiv (<?php echo wp_count_posts('post')->publish; ?>)
        </a>
      </li>

      <li class="navigation_list_item">
        <a href="<?php bloginfo('rss_url'); ?>" class="navigation_list_item_link">
          RSS-Feed
        </a>
      </li>

      <li class="navigation_list_item">
        <a
          href="http://itunes.apple.com/de/podcast/working-draft/id402204581"
          class="navigation_list_item_link"
        >
          iTunes-Feed
        </a>
      </li>

      <li class="navigation_list_item">
        <a href="http://twitter.com/workingdraft" class="navigation_list_item_link">
          Twitter
        </a>
      </li>

      <li class="navigation_list_item">
        <a href="<?php bloginfo(url); ?>/comments/feed/" class="navigation_list_item_link">
          Kommentarfeed
        </a>
      </li>
    </ul>
  </nav>


<?php
  if(!is_single() AND !is_page()){
?>

<div class="content">
  <div class="content_inner">

    <div class="card card--highlight">
      <h2 class="text text_type-2 card_title">
        Spenden für Soundqualität!
      </h2>

      <p class="text text_type-3">
        Unsere Aufnahmen werden optimiert mit
        <a href="https://auphonic.com/donate_credits?user=Schepp">Auphonic</a>. Flattern oder direkt bei
        <a href="https://auphonic.com/donate_credits?user=Schepp">Auphonic spenden</a>.
      </p>

      <div class="card_action">
        <button class="button button--primary">Jetzt spenden</button>
      </div>
    </div>

    <div class="card card--flex">
      <p class="text text_type-3">
        Diese Webseite verwendet Cookies, um bestimmte Funktionen zu ermöglichen und das Angebot zu verbessern. Indem Sie hier fortfahren,
        stimmen Sie der Nutzung von Cookies zu.
        <a href="#">Mehr Informationen</a>.
      </p>

      <div>
        <button class="button">Akzeptieren</button>
      </div>
    </div>

<?php
  }
?>
