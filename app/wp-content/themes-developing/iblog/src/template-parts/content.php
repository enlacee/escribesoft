<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<?php iblog_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( '[Leer más]<span class="screen-reader-text"> "%s"</span>', 'iblog-theme' ),
				get_the_title()
			) );

/*			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'iblog-theme' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'iblog-theme' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );*/
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php iblog_entry_meta(); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'iblog-theme' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
