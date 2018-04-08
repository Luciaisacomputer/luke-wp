<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package luke
 */

get_header();
?>

	<div id="primary" class="lp-content-area">
		<main id="main" class="lp-main">
            <?php if ( !is_paged() ): ?>
		    <div class="lp-home-section lp-introduction">
                <div>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/luke-pettway.jpg" alt="Image of Luke Pettway" />
                </div>
                <div>
                    <p>I'm a web developer, accessibility advocate, WordPress contributor, and security hobbyist. I have over 15 years of experience working with the web. Currently I'm building cool things with React in Philadelphia.</p>
                    <p><a href="/about">Read my story here.</a></p>
                </div>
            </div>
            <?php endif; ?>
			<div class="lp-home-section lp-blog-posts">
				<h2>Blog Posts</h2>
				<div class="lp-blog-posts-container">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/post-card', get_post_type() );
					endwhile;
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
                </div>
                <div>
                    <?php if(have_posts()) : the_posts_navigation(); endif; ?>
                </div>
			</div>
            <?php if ( !is_paged() ): ?>
			<div class="lp-home-section lp-current-read">
                <h2>Currently Reading</h2>
                <div class="lp-current-read-container">
                    <?php
                        $args = array(
                            'post_type' => array( 'current_read' ),
                            'posts_per_page' => '1',
                        );
                        $current_read_query = new WP_Query( $args );
                        if ( $current_read_query->have_posts() ):
                            while ( $current_read_query->have_posts() ):
                                $current_read_query->the_post();
                        ?>
                            <div class="lp-current-read-content">
                                <img class="lp-current-read-book-img" src="<?php the_field("book"); ?>" alt="Weapons of Math Destruction" />
                            </div>
                            <div class="lp-current-read-content">
                                <h3><?php the_title(); ?></h3>
                                <?php the_content(); ?>
                            </div>
                        <?php
                            endwhile;
                        endif;
                        wp_reset_query();
                    ?>
                </div>
            </div>

			<div class="lp-home-section lp-social-media">
                <h2>Connect With Me</h2>
                <div class="lp-social-media-container">
                    <div class="social-media-icon">
                        <a href="https://twitter.com/LukePettway">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter.svg" alt="" />
                            <span>Twitter</span>
                        </a>
                    </div>
                    <div class="social-media-icon">
                        <a href="https://github.com/LukePettway">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/github.svg" alt="" />
                            <span>Github</span>
                        </a>
                    </div>
                    <div class="social-media-icon">
                        <a href="https://www.linkedin.com/pub/luke-pettway/50/344/76b">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/linked-in.svg" alt="" />
                            <span>Linked In</span>
                        </a>
                    </div>
                </div>
            </div>

            <?php endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
