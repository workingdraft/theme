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

  <link rel="preload"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500|Material+Icons"
    as="style"
    onload="this.rel = 'stylesheet'"
  >
  <link
    rel="preload"
    href="<?php bloginfo( 'template_url' ); ?>/dist/index.css"
    as="style"
    onload="this.rel = 'stylesheet'"
  >

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
      <img
        src="<?php bloginfo( 'template_url' ); ?>/app/images/logo.svg"
        alt="<?php bloginfo('name') ?>"
        class="header_logo_name"
      />
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
