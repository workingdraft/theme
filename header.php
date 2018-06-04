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
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title(' | ', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php echo $description; ?>">
	<link rel="shortcut icon" href="<?php bloginfo('url'); ?>/favicon.png" type="image/png">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>">
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
	<h1><a href="<?php bloginfo(url); ?>"><?php bloginfo('name') ?></a></h1>
	<h2><?php bloginfo('description') ?></h2>
</hgroup>


<a href="<?php bloginfo(url); ?>"><img id="icon" src="<?php bloginfo(template_url); ?>/icon.png" alt=""></a>

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
		<dd><a href="http://twitter.com/workingdraft">Twitter</a></dd>
		<dd><a href="/comments/feed/">Kommentarfeed</a></dd>
		<dt>Moderatoren:</dt>
		<dd>Peter Kröner (<a href="http://twitter.com/sir_pepe">@sir_pepe</a>)</dd>
		<dd>Hans Christian Reinl (<a href="http://twitter.com/drublic">@drublic</a>)</dd>
		<dd>Rodney Rehm (<a href="http://twitter.com/rodneyrehm">@rodneyrehm</a>)</dd>
		<dd>Stefan Baumgartner (<a href="http://twitter.com/ddprrt">@ddprrt</a>)</dd>
		<dd>Christian "Schepp" Schaefer (<a href="http://twitter.com/derSchepp">@derSchepp</a>)</dd>
		<dt>Verdiente Ruheständler:</dt>
		<dd>Markus Schlegel (<a href="http://twitter.com/markus_schlegel">@markus_schlegel</a>)</dd>
		<dd>Kahlil Lechelt (<a href="http://twitter.com/distilledhype">@distilledhype</a>)</dd>
		<dd>Anselm Hannemann (<a href="http://twitter.com/helloanselm">@helloanselm</a>)</dd>
		<dt>Rechtliches:</dt>
		<dd><a href="/impressum/">Impressum</a></dd>
		<dd><a href="/datenschutzerklaerung/">Datenschutzerklärung</a></dd>
	</dl>


	<div id="schnorren">
		<h2>Spenden für Soundqualität!</h2>
		<p>Unsere Aufnahmen werden optimiert mit <a href="https://auphonic.com/donate_credits?user=Schepp">Auphonic</a>.<br>Flattern oder direkt bei <a href="https://auphonic.com/donate_credits?user=Schepp">Auphonic spenden</a>.</p>
	</div>
</div>


<div class="message" id="sponsoring">
  <h2>Sponsoren gesucht!</h2>

  <p>Als Podcast versuchen wir die Qualität der Aufnahmen hoch zu halten. Dafür verwenden wir Tools, die nicht kostenlos sind. Auch unser Aufnahme-Equipment kostet Geld.</p>
  <p>Mit rund 15.000 Downloads pro Folge im Schnitt haben wir Herausforderungen im Hosting zu bewältigen, vor allem der Traffic ist recht hoch.</p>
  <p>Um diese Kosten decken zu können, suchen wir Sponsoren. Wenn ihr unseren Podcast gut findest, sprecht mit euren Chefs.
  Bei Interesse, kontaktiert uns per E-Mail: <a href="mailto:sponsoring@workingdraft.de">sponsoring@workingdraft.de</a>.</p>
</div>
<?php
	}
?>
