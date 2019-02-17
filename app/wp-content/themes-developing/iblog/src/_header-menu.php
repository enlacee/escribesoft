<?php
	// var_dump(is_home());
?>
<div class="container content-bbt-menu">

	<div class="site-branding">
		<?php if ( is_front_page() || is_home() ) : ?>
			<h1 class="site-title">
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<!-- <img src="" title="" alt="" class="float-left"> -->
				<?php bloginfo( 'name' ); ?>
			</a></h1>
		<?php else : ?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		<?php endif; ?>
	</div>

	<?php if ( has_nav_menu( 'primary' )) : ?>
		<div class='bbt-menu'>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" style="position: absolute;top: -47px;right: 0;">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'container' => false,
						'menu_class' => 'menu_ clearfix'
					 ) );
				?>
				</div>
			</nav>
		</div>
	<?php endif; ?>
</div>