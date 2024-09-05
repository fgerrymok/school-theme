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

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

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
			<section>
				<h1>The Class</h1>
				<div class="students-wrapper">
				<?php while ($query -> have_posts()) :
					$query -> the_post();
					?>
					<!-- output contents -->
						<article>
							<a href="<?php the_permalink();?>"><h2><?php the_title();?></h2></a>
							<?php the_post_thumbnail( 'medium' ); ?>
						<?php the_excerpt();?>
						<!-- Taxonomy terms -->
						<?php 
					//  the_terms( post id,      taxonomy,                String to use before the terms,     String to use between the terms,     String to use after the terms,       ) 
						the_terms( get_the_ID(), 'sc-student-specialty',  '<div class="student-specialty">Specialty: ',  ', ',  '</div>' ); 
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
