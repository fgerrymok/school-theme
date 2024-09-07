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
					// Designer | Developer
					$taxonomy = 'sc-student-specialty'; 
					$post_id = get_the_ID();
					$currentTitle = get_the_title();
					
					$terms = get_the_terms( $post_id, $taxonomy );
					if ( $terms && ! is_wp_error( $terms ) ) :
						foreach ( $terms as $term ) {
								$currentTerm = $term->name;
								echo '<h3>Meet other '. $term->name .' students:</h3>';
						}		
					endif;
					;?>
			<?php
			// the others except current student
			$args = array(
				'post_type'      => 'sc-student',
				'posts_per_page' => -1,
				'orderby'        => 'title', 
				'order'          => 'ASC',
				'tax_query'		 => array(
					array(
						'taxonomy' => 'sc-student-specialty',
						'field'	   => 'slug',
						'terms'	   => $currentTerm,
					)
				)
			);
			$query = new WP_Query( $args );
			if ( $query-> have_posts() ) :
				while ($query -> have_posts()) :
					$query -> the_post();
					if ( $currentTitle != get_the_title() ) {
						?>
						<p><a href="<?php the_permalink() ?>"> <?php the_title() ?> </a></p>
						<?php
					}
				endwhile;
			endif;
		endwhile; // End of the loop.
		?>
		</aside>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
