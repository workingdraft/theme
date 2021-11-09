<?php
/**
 * The template for displaying Category pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header('small'); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<header class="archive-header">
			<h1 class="archive-title"><?php printf( single_cat_title( '', false ) ); ?></h1>

			<?php if ( category_description() ) : // Show an optional category description ?>
			<div class="archive-meta"><?php echo category_description(); ?></div>
			<?php endif; ?>
		</header><!-- .archive-header -->

		<?php if ( have_posts() ) : ?>
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="postcontainer" id="post-<?php the_ID(); ?>">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

					<p class="commenthead">
						<?php the_time('j. F Y'); ?> | <?php comments_popup_link('Keine Kommentare', '1 Kommentar', '% Kommentare'); ?>
					</p>

					<div class="postcontent clearfix">
						<?php the_excerpt(); ?>
					</div>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
