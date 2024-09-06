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

			get_template_part( 'template-parts/content', get_post_type() );
			
			echo "<aside>";
			
			the_post_navigation(
				array(
					'prev_text'          => '%title',
					'next_text'          => '%title',
					'excluded_terms'     => '',
				)
				);
				
		endwhile; // End of the loop.
		echo "</aside>";
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
