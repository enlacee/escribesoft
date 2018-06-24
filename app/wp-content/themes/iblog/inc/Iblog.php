<?php

class Iblog
{

//	private $navHeadAction;

    public function __construct()
    {
        $this->init();
        $this->postTypes();
        $this->actions();
        $this->hideAdminBar();
        $this->addImagesSizes();
    }

    public function init()
    {
        add_action('widgets_init', [$this, 'themeLoadSidebars']);
        add_action('widgets_init', [$this, 'themeLoadWidgets']);
        add_filter('upload_mimes', [$this, 'setMimeTypes']);

        add_action('admin_menu', [$this, 'removeMetaBoxes']);
        add_action('admin_init', [$this, 'addFacebookId']);
    }

    /**
     * Create Custom Posts
     */
    public function postTypes()
    {
//        $this->custom_post_type = new MyCustomPost();
    }

    /**
     * Create actions
     */
    public function actions()
    {
//        $this->navHeadAction = new NavHeadAction();
    }

	/**
	 * Remove metabox fields for all users
	 */
	public function removeMetaBoxes() {
		// post
		remove_meta_box( 'postcustom', 'post', 'normal' );
		// remove_meta_box( 'postexcerpt', 'post', 'normal' );
		remove_meta_box( 'commentstatusdiv', 'post', 'normal' );
		// page
		remove_meta_box( 'postcustom', 'page', 'normal' );
		remove_meta_box( 'commentstatusdiv', 'page', 'normal' );
		remove_meta_box( 'commentsdiv', 'page', 'normal' );
		remove_meta_box( 'revisionsdiv', 'page', 'normal' );
		remove_meta_box( 'authordiv' , 'page' , 'normal' );
	}

	/**
	 * Add input facebook_id to option [general]
	 * @return void
	 */
	public function addFacebookId() {
		register_setting( 'general', 'facebook_id', 'esc_attr' );
		add_settings_field( 'facebook_id', '<label for="facebook_id">Facebook Id</label>' , array(&$this, 'field_facebook_id_html') , 'general' );
	}
	/**
	 * html
	 * @return void
	 */
	public function field_facebook_id_html() {
		$value = get_option( 'facebook_id', '' );
		echo '<input type="number" id="facebook_id" name="facebook_id" value="' . $value . '" />';
	}


    /**
     * Hide admin bar in front
     */
    public function hideAdminBar() {
        show_admin_bar(false);
    }

    public function addImagesSizes() {

        add_image_size( 'thumbnail_380', 380 );
        add_image_size( 'thumbnail_480', 480 );

    }

    /**
     * Register Widgets
     */
    public function themeLoadSidebars()
    {
//        register_sidebar(array(
//            'name'          => __('Catálogos de Marcas', 'lbel'),
//            'id'            => 'lbel-catalog-brands',
//            'description'   => __('', 'lbel'),
//            'before_widget' => '',
//            'after_widget'  => '',
//            'before_title'  => '<h3 class="promoapp-title upper">',
//            'after_title'   => '</h3>',
//        ));
    }

    public function themeLoadWidgets() {
//        register_widget( 'LbelBrandsCatalogWidget' );
    }

    /**
     * Add support format svg upload image
     * @param $mimes
     * @return Array
     */
    public function setMimeTypes($mimes)
    {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }

	/**
	 * @return mixed
	 */
	public function getMenuTypeMetaBox()
	{
//		return $this->navHeadAction;
	}

    /**
     * @return mixed
     */
    public function getMyCustomPosts()
    {
//        return $this->custom_post_type;
    }
}
