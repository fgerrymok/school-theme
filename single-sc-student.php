<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package School_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<article>
				<header class="entry-header">
					<h1><?php the_title(); ?></h1>
				</header>
				<div class="entry-content">
					<?php the_post_thumbnail( 'medium', array( 'class' => 'alignright'))?>
					<?php the_content();?>
				</a>
			</div>
			</article>
			
			<aside>
				<h3>Meet other Designer students:</h3>
			<?php
			the_post_navigation(
				array(
					'prev_text'          => '%title',
					'next_text'          => '%title',
					'excluded_terms'     => '',
				)
				);
				
		endwhile; // End of the loop.
		?>
		</aside>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
