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

<!doctype html>
<html lang="de">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport"
        content="width=device-width, initial-scale=1">
	<title><?php wp_title(' | ', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php echo $description; ?>">
	<link rel="shortcut icon" href="<?php bloginfo('url'); ?>/favicon.png" type="image/png">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> | Alle Kommentare" href="<?php bloginfo('comments_rss2_url'); ?>">
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


<hgroup>
	<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name') ?></a></h1>
	<h2><?php bloginfo('description') ?></h2>
</hgroup>


<a href="<?php bloginfo('url'); ?>"><img id="icon" src="<?php bloginfo('template_url'); ?>/icon.png" alt=""></a>

<?php
	if(!is_single() AND !is_page()){
?>
<div class="clearfix">

	<dl id="navi">
		<?php
			$headernavi = get_posts('numberposts=2&order=DESC');
			$headernavititles = array('Vorherige Revision:', 'Neueste Revision:');
			foreach($headernavi as $post){
				setup_postdata($post);
				echo '<dt>' . array_pop($headernavititles) . '</dt>';
				echo '<dd><a href="' . get_permalink($post->ID) . '">' . get_the_title() . ' (' . get_the_time('j. F Y') . ')</a></dd>';
			}
		?>
		<dt>Versionsgeschichte:</dt>
		<dd><a href="/dateiarchiv.php"><?php echo wp_count_posts('post')->publish; ?> Revisionen im Archiv</a></dd>
		<dt>Abonnieren:</dt>
		<dd><a href="<?php bloginfo('rss_url'); ?>">RSS-Feed</a></dd>
		<dd><a href="http://itunes.apple.com/de/podcast/working-draft/id402204581">iTunes-Feed</a></dd>
		<dd><a href="https://twitter.com/workingdraft">Twitter</a></dd>
		<dd><a href="/comments/feed/">Kommentarfeed</a></dd>
		<dt>Moderatoren:</dt>
		<dd>Peter Kröner (<a href="https://twitter.com/sir_pepe">@sir_pepe</a>)</dd>
		<dd>Hans Christian Reinl (<a href="https://twitter.com/drublic">@drublic</a>)</dd>
		<dd>Rodney Rehm (<a href="https://twitter.com/rodneyrehm">@rodneyrehm</a>)</dd>
		<dd>Stefan Baumgartner (<a href="https://twitter.com/ddprrt">@ddprrt</a>)</dd>
		<dd>Kahlil Lechelt (<a href="https://twitter.com/distilledhype">@kahliltweets</a>)</dd>
		<dd>Christian "Schepp" Schaefer (<a href="https://twitter.com/derSchepp/">@derSchepp</a>)</dd>
		<dd>Vanessa Otto (<a href="https://twitter.com/vannsl">@vannsl</a>)</dd>
		<dt>Verdiente Ruheständler:</dt>
		<dd>Markus Schlegel (<a href="https://twitter.com/markus_schlegel">@markus_schlegel</a>)</dd>
		<dd>Anselm Hannemann (<a href="https://twitter.com/helloanselm">@helloanselm</a>)</dd>
		<dt>Rechtliches:</dt>
		<dd><a href="/impressum/">Impressum</a></dd>
		<dd><a href="/datenschutzerklaerung/">Datenschutzerklärung</a></dd>
	</dl>


	<div id="schnorren">
		<h2>Unterstützung</h2>
		<p>
		Wir optimieren unser Audio mit Auphonic, wo ihr uns <a href="https://auphonic.com/donate_credits?user=Schepp">Processing-Time kaufen könnt!</a>
		Alternativ findet Ihr uns auch auf Patreon:<br><br> <a href="https://www.patreon.com/bePatron?u=13677588" data-patreon-widget-type="become-patron-button">Become a Patron!</a><script async src="https://c6.patreon.com/becomePatronButton.bundle.js"></script>
		</p>
	</div>
</div>


<div class="message" id="sponsoring">
  <h2>Werben bei Working Draft!</h2>
  <p>Mit zehnjähriger Geschichte und über 5000 Downloads pro Folge ist Working Draft
  der etablierteste Podcast für Webentwickler im deutschsprachigen Raum.
  Wenn ihr neue Entwicklerkollegen sucht oder ein Produkt für Webentwickler
  anbietet, schreibt uns unter <a href="mailto:sponsoring@workingdraft.de">sponsoring@workingdraft.de</a>.
  </p>
</div>
<?php
	}
?>
