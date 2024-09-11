

<?php

get_header();

?>



	<main id="primary" class="site-main">

		<?php
			if ( is_home() ) {
				?>
				<header>
					<h1><?php single_post_title(); ?></h1>		
				</header>
				<?php
				if (have_posts()) {
					while (have_posts()) {
						the_post();
						?>
						<article class="post-item" data-aos="fade-up">
							<header class="entry-header">
								<a href="<?php the_permalink(); ?>">
									<h2><?php the_title(); ?></h2>
								</a>
								<div class="entry-meta">
									<p>
										<?php esc_html_e('Posted in: ') ?>
										<a href="<?php echo esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))); ?>">
											<?php echo get_the_date(); ?>
										</a>
										by <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID')))?>"><?php the_author(); ?></a>
									</p>
								</div>
							</header>
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail(); ?>
							</a>
							<div class="entry-content">
								<?php the_excerpt(); ?>
							</div>
							<footer class="entry-footer">
								<p class="category-names"><?php esc_html_e('Posted in: ') ?><?php the_category(); ?></p>
								<p><?php the_tags(); ?></p>
								<a href="<?php the_permalink() ?>/#respond"><?php esc_html_e('Leave a Comment') ?></a>
							</footer>
						</article>
						<?php
					}
				}
			}
		?>

	</main>

<?php
get_sidebar();
get_footer();