<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) {
			the_post();
			// Outputting the CPT title using a tempalate part:
			get_template_part( 'template-parts/content', 'page' );

			// get roles taxonomy
			$terms = get_terms( array('taxonomy' => 'sc-roles') );

			if ( $terms && !is_wp_error($terms) ){
				foreach ( $terms as $term ) {
					// output the term
					?>
					<section class="staff-wrapper">
						<h2><?php echo esc_html_e($term->name) ?></h2>	
						<?php
						// get posts associated with roles taxonomy type
						$args = array (
							'post_type' => 'sc-staff',
							'posts_per_page' => -1,
							'order' => 'ASC',
							'orderby' => 'title',
							'tax_query' => array (
								array (
									'taxonomy' => 'sc-roles',
									'field' => 'slug',
									'terms' => $term->slug,
									)
								),
							);

						$postsQuery = new WP_Query( $args );
						//output all posts with that specific role
						if ( $postsQuery->have_posts() ){
							while ( $postsQuery->have_posts() ){
								$postsQuery->the_post();
								?>
								<article class="staff-item">
								<?php
								if ( function_exists('get_field') ){
									if ( get_field('biography') ){
										?>
										<h3><?php the_title(); ?></h3>
										<p><?php the_field('biography'); ?></p>
										<?php
									}
									if ( get_field('courses') ) {
										?>
										<p><?php the_field('courses'); ?></p>
										<?php
									}
									if ( get_field('website') ) {
										?>
										<a href="<?php the_field('website') ?>">
											<?php esc_html_e('Instructor Website') ?>
										</a>
										<?php
									}
								}
								?>
								</article>
								<?php
							}
						}
					?>
					</section>
					<?php
				}
			}
		}
		?>

	</main>

<?php
get_sidebar();
get_footer();
