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
        get_template_part( 'template-parts/content', get_post_type() );

        $args = array( 
            'post_type'      => 'post',
            'posts_per_page' => 3 
        );

        $blog_query = new WP_Query( $args );

        if ( $blog_query -> have_posts() ) {
            echo "<section class='entry-content'>";

            echo "<h2>Recent News</h2>";
            while ( $blog_query -> have_posts() ) {
                $blog_query -> the_post();
                ?>
                <article>
                    <a href="<?php the_permalink(); ?>">
                        <h3><?php the_title(); ?></h3>
                        <?php the_post_thumbnail( 'medium' ); ?>
                    </a>
                </article>
                <?php
            }
            wp_reset_postdata();
            echo "<p><a href='". get_the_permalink( 106 ). "'>See All News</a></p>";
            echo "</section>";
        }
			?>

    </main>

<?php 
get_footer();