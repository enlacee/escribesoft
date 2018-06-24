<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php iblog_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Paginas:', 'iblog-theme' ) . '</span>',
			'after'       => '</div>',
			// 'link_before' => '<span>',
			// 'link_after'  => '</span>',
			// 'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'iblog-theme' ) . ' </span>%',
			// 'separator'   => '<span class="screen-reader-text">, </span>',
			// 'nextpagelink'=> __( 'Next page', 'iblog-theme'),
			// 'previouspagelink' => __( 'Previous page', 'iblog-theme' ),
		) );
		?>
	</div><!-- .entry-content -->

	<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Editar<span class="screen-reader-text"> "%s"</span>', 'iblog-theme' ),
				get_the_title()
			),
			'<footer class="entry-footer"><span class="edit-link">',
			'</span></footer><!-- .entry-footer -->'
		);
	?>

</article><!-- #post-## -->
