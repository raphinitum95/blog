<?php
/**
 * This template is used in the Loop to display posts with the Link format
 *
 * @package Baskerville 2
 */
?>

<?php if ( ! is_single() ) : ?>
	<div class="post-container">
<?php endif; ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php

		if ( is_single() ) :
			/**
			 * Post Title - only show on single.php view
			 */

			$before_title = '<header class="post-header"><h1 class="post-title entry-title"><a href="' . esc_url( baskerville_2_get_link_url() ) . '" rel="bookmark">';
			$after_title = '</a></h1></header>';
			the_title( $before_title, $after_title );


			/**
			 * Post Thumbnail - only show on single.php view
			 */
			if ( has_post_thumbnail() ) : ?>
				<div class="featured-media">
					<?php the_post_thumbnail( 'baskerville-2-post-image' ); ?>
				</div> <!-- /featured-media -->
			<?php endif;
		endif;


		/**
		 * Post Content
		 */
		$content = get_the_content();
		if ( ! empty( $content ) ) : ?>

			<div class="post-content clear">

				<?php if ( is_single() ) :
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'baskerville-2' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );
					wp_link_pages();
				else :
					the_content();
					$before_title = '<header class="link-header"><h1 class="post-title entry-title"><a href="' . esc_url( baskerville_2_get_link_url() ) . '" rel="bookmark"><i class="fa fa-link"></i>';
					$after_title = '</a></h1></header>';
					the_title( $before_title, $after_title );
				endif; ?>

			</div><!--/.post-content-->

		<?php endif;


		/**
		 * Post Meta
		 */
		if ( is_single() ) : ?>

			<footer class="post-meta-container clear">
				<?php baskerville_2_author_bio(); ?>

				<div class="post-meta clear">
					<?php baskerville_2_single_post_meta(); ?>
					<?php the_post_navigation(); ?>
					<?php edit_post_link(
							sprintf(
								/* translators: %1$s: Pencil icon, %2$s: Name of current post */
								esc_html__( '%1$s Edit %2$s', 'baskerville-2' ),
								'<i class="fa fa-pencil-square-o"></i>',
								the_title( '<span class="screen-reader-text">"', '"</span>', false )
							),
							'<span class="edit-link">',
							'</span>'
					); ?>
				</div>
			</footer> <!-- /post-meta-container -->
			<?php comments_template( '', true );

		else :
			baskerville_2_post_meta();
		endif; ?>

	</article> <!-- /post -->

<?php if ( ! is_single() ) : ?>
	</div>
<?php endif; ?>
