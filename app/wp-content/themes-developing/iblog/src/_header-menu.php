<div class="container content-bbt-menu">

	<div class="navbar-header">
		<a class="navbar-brand" href="<?php echo get_site_url(); ?>" title="<?php echo get_bloginfo('name') ?>">
			<!-- <img src="" title="" alt="" class="float-left"> -->
			<?php echo get_bloginfo('name') ?>
		</a>
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
