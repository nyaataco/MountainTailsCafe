<div id="events">

<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header(); ?>

<?php if ( astra_page_layout() === 'left-sidebar' ) { ?>

	<?php get_sidebar(); ?>

<?php } ?>

<?php astra_entry_before(); ?>

<article
    <?php
            echo wp_kses_post(
                astra_attr(
                    'article-content',
                    array(
                        'id'    => 'post-' . get_the_id(),
                        'class' => join( ' ', get_post_class() ),
                    )
                )
            );
            ?>
    >
	<?php astra_entry_top(); ?>

	<header class="entry-header <?php astra_entry_header_class(); ?>">

		<h3 class="uagb-heading-text">Events</h3>

	</header><!-- .entry-header -->

	<div class="entry-content clear"
	<?php
				echo wp_kses_post(
					astra_attr(
						'article-entry-content',
						array(
							'class' => '',
						)
					)
				);
				?>
	>

		<?php astra_entry_content_before(); ?>

		<?php if ( have_posts() ) : ?>
            <div class="event-list">
                <?php 
                    $terms = get_terms(array(
                    'taxonomy' => 'event_category',
                    'hide_empty' => false,
                    ));

                    foreach ($terms as $term) {
                        $image_url = get_term_meta($term->term_id, 'term_image', true);
                        if ($image_url) :
                            $thumbnail_url = $image_url ; 
                        else:
                            $thumbnail_url = get_stylesheet_directory_uri() . '/sample-image.jpg';
                        endif;
                ?>
                    <a href="<?php echo get_term_link($term) ?>">
                        <div class="item">
                            <div class="image" style="background-image: url('<?php echo esc_url($thumbnail_url); ?>');">                        
                                <h4 class="title">
                                    <?php echo wp_trim_words( esc_html($term->name), 25, '...' ); ?>
                                </h4>
                            </div>
                            <p class="description"><?php echo esc_html($term->description) ?></p>
                        </div>
                    </a>
                <?php } ?>
            </div>
        <?php else : ?>
            <p>イベントが見つかりませんでした。</p>
        <?php endif; ?>

    </div><!-- .entry-content .clear -->

</article>

<?php astra_entry_content_after(); ?>

    
<?php if ( astra_page_layout() === 'right-sidebar' ) { ?>

	<?php get_sidebar(); ?>

<?php } ?>

<?php get_footer(); ?>

</div>