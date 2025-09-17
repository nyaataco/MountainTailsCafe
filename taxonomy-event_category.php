<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if ( astra_page_layout() === 'left-sidebar' ) { ?>

	<?php get_sidebar(); ?>

<?php } ?>

	<div id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>

		<?php astra_archive_header(); ?>

        <div id="event-category">
		<?php
            if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();

                $trimmed_title = wp_trim_words( get_the_title(), 30, '...' );
                
                $event_date = get_post_meta( get_the_ID(), 'event_date', true );

                $content = get_the_content();
                $trimmed_content = wp_trim_words( wp_kses_post( $content ), 100, '...' );

                $thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                if ( ! $thumbnail_url ) {
                    $thumbnail_url = get_stylesheet_directory_uri() . '/sample-image.jpg';
                }

            ?>
            <div class="box">
                <a href="<?php the_permalink(); ?>">
                    <div class="image" style="background-image: url('<?php echo esc_url( $thumbnail_url ); ?>'"></div>
                    <div class="info">
                        <h4 class="title"><?php echo $trimmed_title; ?></h4>
                        <?php
                        if ( $event_date ) {
                            echo '<p class="event-date">Event Date: <span>' . esc_html( $event_date ) . '</span></p>';
                        }
                        ?>
                        <p class="description"><?php echo $trimmed_content; ?></p>
                    </div>

                </a>
            </div>
        <?php
            endwhile;
            endif;
        ?>
        </div>

		<?php astra_pagination(); ?>

		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() === 'right-sidebar' ) { ?>

	<?php get_sidebar(); ?>

<?php } ?>

<?php get_footer(); ?>
