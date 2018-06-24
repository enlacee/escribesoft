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
			<nav>
				<label for='drop' class='toggle'><span>&#9776;</span></label>
				<input type='checkbox' id='drop' />
				<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class'     => 'primary-menu',
						'container' => false,
						'menu_class' => 'menu'
					 ) );
				?>
			</nav>
		</div>
	<?php endif; ?>

</div>
