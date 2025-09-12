<div id="events">

<?php get_header(); ?>

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
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php
                        if ( has_post_thumbnail() ) :
                            $thumbnail_url = get_the_post_thumbnail_url() ; 
                        else:
                            $thumbnail_url = get_stylesheet_directory_uri() . 'event-sample-image.png';
                        endif;
                    ?>
                    <a href="<?php the_permalink(); ?>">
                        <div class="item">
                            <span class="date"><?php echo get_the_date(); ?></span>
                            <?php echo wp_trim_words( get_the_content(), 50, '...' ); ?>
                            <div class="image" style="background-image: url('<?php echo esc_url($thumbnail_url); ?>');">                        
                                <h4 class="title">
                                    <?php the_title(); ?>
                                </h4>
                            </div>
                        </div>
                        
                        
                    </a>
                <?php endwhile; ?>
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