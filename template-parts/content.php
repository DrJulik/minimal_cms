<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Minimal_CMS
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<section class="post-content">
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
		endif;

		if ( 'post' === get_post_type() ) :

			minimal_cms_edit_post();
			?>
			
		<?php endif; ?>
	</header><!-- .entry-header -->
		
	<!-- meta goes below header -->
	<div class="entry-meta">
				<?php
				minimal_cms_posted_on();
				// minimal_cms_posted_by();
				?>
			</div><!-- .entry-meta -->
			
	<div class="entry-content">
	<?php minimal_cms_post_thumbnail(); ?>
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'minimal_cms' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'minimal_cms' ),
			'after'  => '</div>',
		) );
		?>
		
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php minimal_cms_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	</section>
	<? get_sidebar();?>
</article><!-- #post-<?php the_ID(); ?> -->
