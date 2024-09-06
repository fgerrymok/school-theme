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
			<?php
			if ( function_exists( 'the_custom_logo' ) ) {
				the_custom_logo();
			}
			?>		
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

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
