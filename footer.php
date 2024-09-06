<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package School_Theme
 */

?>

	<footer id="colophon" class="site-footer">
		<nav class="footer-logo">
			<a href="#" class="custom-logo-link">
				<img src="" alt="School Site Logo">
			</a>
		</nav>
		<section class="footer-credits">
			<h2><?php esc_html_e('Credits'); ?></h2>
			<p>
				<?php esc_html_e('Created by '); ?>
				<a href="<?php echo esc_url('https://dongwonkang.info/'); ?>" target="_blank">
					<?php esc_html_e('Dongwon Kang'); ?>
				</a>
				<?php esc_html_e(' & '); ?>
				<a href="<?php echo esc_url('https://frazermok.com/'); ?>" target="_blank">
					<?php esc_html_e('Frazer Mok'); ?>
				</a>
				<?php esc_html_e('.'); ?>
			</p>
			<p>
				<?php esc_html_e('Photos courtesy of '); ?>
				<a href="<?php echo esc_url('https://www.shopify.com/stock-photos'); ?>">
					<?php esc_html_e('Burst'); ?>
				</a>
				<?php esc_html_e('.'); ?>
			</p>
		</section>
		<nav class="footer-nav">
			<h2><?php esc_html_e('Links'); ?></h2>
			<!-- Need to update footer nav on mindset so that it displays Schedule instead of Staff  -->
			<?php wp_nav_menu(array( 'theme_location' => 'footer-nav')); ?>
		</nav>






		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'school-theme' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'school-theme' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'school-theme' ), 'school-theme', '<a href="https://frazermok.com/school/">Dongwon Kang, Frazer Mok</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
