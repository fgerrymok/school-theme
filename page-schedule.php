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
            if( have_rows('weekly_course_schedule') ):
                $field = get_field_object('weekly_course_schedule');
                $sub_fields = $field['sub_fields'];
                ?>
                <table class='schedule'>
                <caption>Weekly Course Schedule</caption>
                    <thead>
                        <tr>
                            <?php foreach( $sub_fields as $sub_field ): ?>
                                <th><?php echo esc_html( $sub_field['label'] ); ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                while( have_rows('weekly_course_schedule') ) : the_row();
                    ?>
                    <tr>
                        <?php foreach( $sub_fields as $sub_field ): ?>
                            <td><?php echo acf_esc_html( get_sub_field($sub_field['name']) ); ?></td>
                        <?php endforeach; ?>
                    </tr>    
                    <?php
                endwhile;
                ?>
                    </tbody>
                </table>
                <?php
            else :
                // No rows found
            endif;
            ?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();


