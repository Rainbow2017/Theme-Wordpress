<?php
define(THEME_URL, get_stylesheet_directory());
define('CORE', THEME_URL. /core);
/*Nhung file core/ init.php*/
require_once(CORE. /init.php)
if(!issert($content
_width)){
	content_width=620;
}

/**Khai bao chuc nang cua theme**/

if(!function_exists('trang_theme_setup'){
	$language_folder= THEME_URL. /language;
	load_theme_textdomain('trang', $language_folder);

	/** Tu dong them link RSS alen <head>**/
	add_theme_support('automatics-feed-links');
	/**Them  post thumbnail**/
	add_theme_support('post-thumbnails');
	add_theme_support('post-fomats', array('image','video','gallery', 'audio'));

		add_theme_support('title-tag');
		/**Them custom background **/
		$default_background= array(
			'default-color'=>'#00000'
			);
		add_theme_support('custom-background', $default_background);

		/**Them menu**/
		register_nav_menu('primary-menu',__('Primary Menu', 'thachpham'));

		$sidebar= array(
			'name'=>__('Main sidebar', 'thachpham')
			'id'=> 'main-sidebar'
			'description'=>__('Default sidebar')
			'class'=> 'main-sidebar',
			'before_title'=>'<h3 class="widgettitle">',

		
			);
		register_sidebar($sidebar);
}
add_action('init','trang_theme_setup');
}

?>