<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>

	<?php iblog_post_thumbnail(); ?>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( has_excerpt() ): ?>
			<?php iblog_excerpt(); ?>
		<?php else: ?>
			<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( '<button class="btn btn-primary">SIGUE LEYENDO...</button><span class="screen-reader-text"> "%s"</span>', 'iblog-theme' ),
				get_the_title()
			) );
			?>
		<?php endif; ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php // iblog_entry_meta(); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Editar<span class="screen-reader-text"> "%s"</span>', 'iblog-theme' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
