<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">
	<header class="page-header">
			<h1 class='page-title'>The Class</h1>
	</header><!-- .page-header -->
		<?php if ( have_posts() ) : ?>
			<?php
			$args = array(
				'post_type'      => 'sc-student',
				'posts_per_page' => -1,
				'orderby'        => 'title', 
				'order'          => 'ASC',   
			);
			$query = new WP_Query ( $args );
			if ( $query -> have_posts() ):
			?>
			<section class="students">
				<?php while ($query -> have_posts()) :
					$query -> the_post();
					?>
					<!-- output contents -->
						<article class="student-item">
						<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
							<?php the_post_thumbnail( 'custom' ); ?>
						<?php the_excerpt();?>
						<!-- Taxonomy terms -->
						<?php 
					//  the_terms( post id,      taxonomy,                String to use before the terms,     String to use between the terms,     String to use after the terms,       ) 
						the_terms( get_the_ID(), 'sc-student-specialty',  '<p class="student-specialty">Specialty: ',  ', ',  '</p>' ); 
						?>
						</article>
					<?php
					endwhile;
					wp_reset_postdata();
				endif;
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif; ?>
				</div>
			</section>
	</main><!-- #main -->

<?php
get_footer();
