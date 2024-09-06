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

			</div>
			</article>
			
			<aside>
			<?php 
					// test here
					
					$taxonomy = 'sc-student-specialty'; 
					$post_id = get_the_ID();
					
					$terms = get_the_terms( $post_id, $taxonomy );
					if ( $terms && ! is_wp_error( $terms ) ) :
						foreach ( $terms as $term ) {
								echo '<h3>Meet other '. $term->name .' students:</h3>';
						}
					endif;
					;?>
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
