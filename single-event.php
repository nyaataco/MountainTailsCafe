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

            <main id="single-event" class="site-main">
                <article class="post-5468 post type-post status-publish format-standard has-post-thumbnail hentry category-blog ast-article-single">
                    <header class="entry-header">
                        <h1><?php the_title(); ?></h1>
                    </header>
                    <div>
                        <?php
                        $event_date = get_post_meta( get_the_ID(), 'event_date', true );
                        if ( $event_date ) {
                            echo '<p class="event-date">Event Date: <span>' . esc_html( $event_date ) . '</span></p>';
                        }
                        ?>
                    </div>

                    <div class="entry-content clear">
                        <p class="event-content">
                            <?php the_content(); ?>
                        </p>
                        <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('medium');
                            }
                        ?>
                    </div>
                </article>
            </main>
                
            </div>

		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() === 'right-sidebar' ) { ?>

	<?php get_sidebar(); ?>

<?php } ?>

<?php get_footer(); ?>