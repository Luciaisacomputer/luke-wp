<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package luke
 */

?>

<article class="lp-blog-post-card">
	<div class="lp-blog-post-card-decor">
		<span class="lp-blog-post-card-line"></span>
		<img class="lp-blog-post-card-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/react.svg" alt="" />
		<span class="lp-blog-post-card-line"></span>
	</div>
	<header class="entry-header">
		<?php
			the_title( '<h3>', '</h3>' );
        ?>
		<?php the_date('F d, Y','<p>', '</p>'); ?>
	</header><!-- .entry-header -->

	

	<div class="lp-blog-post-card-content">
		<?php
		the_excerpt( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'luke' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );
        ?>
	</div><!-- .entry-content -->
    <div class="lp-blog-post-card-controls">
        <a href="<?php the_permalink(); ?>">Read post</a>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
