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
/**
@ Hàm hiển thị ảnh thumbnail của post.
@ Ảnh thumbnail sẽ không được hiển thị trong trang single
@ Nhưng sẽ hiển thị trong single nếu post đó có format là Image
@ thachpham_thumbnail( $size )
**/
if ( ! function_exists( 'thachpham_thumbnail' ) ) {
  function thachpham_thumbnail( $size ) {
 
    // Chỉ hiển thumbnail với post không có mật khẩu
    if ( ! is_single() &&  has_post_thumbnail()  && ! post_password_required() || has_post_format( 'image' ) ) : ?>
      <figure class="post-thumbnail"><?php the_post_thumbnail( $size ); ?></figure><?php
    endif;
  }
}
/**
@ Hàm hiển thị tiêu đề của post trong .entry-header
@ Tiêu đề của post sẽ là nằm trong thẻ <h1> ở trang single
@ Còn ở trang chủ và trang lưu trữ, nó sẽ là thẻ <h2>
@ thachpham_entry_header()
**/
if ( ! function_exists( 'thachpham_entry_header' ) ) {
  function thachpham_entry_header() {
    if ( is_single() ) : ?>
 
      <h1 class="entry-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <?php the_title(); ?>
        </a>
      </h1>
    <?php else : ?>
      <h2 class="entry-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <?php the_title(); ?>
        </a>
      </h2><?php
 
    endif;
  }
}
/**
@ Hàm hiển thị thông tin của post (Post Meta)
@ thachpham_entry_meta()
**/
if( ! function_exists( 'thachpham_entry_meta' ) ) {
  function thachpham_entry_meta() {
    if ( ! is_page() ) :
      echo '<div class="entry-meta">';
 
        // Hiển thị tên tác giả, tên category và ngày tháng đăng bài
        printf( __('<span class="author">Posted by %1$s</span>', 'thachpham'),
          get_the_author() );
 
        printf( __('<span class="date-published"> at %1$s</span>', 'thachpham'),
          get_the_date() );
 
        printf( __('<span class="category"> in %1$s</span>', 'thachpham'),
          get_the_category_list( ', ' ) );
 
        // Hiển thị số đếm lượt bình luận
        if ( comments_open() ) :
          echo ' <span class="meta-reply">';
            comments_popup_link(
              __('Leave a comment', 'thachpham'),
              __('One comment', 'thachpham'),
              __('% comments', 'thachpham'),
              __('Read all comments', 'thachpham')
             );
          echo '</span>';
        endif;
      echo '</div>';
    endif;
  }
}
/*
 * Thêm chữ Read More vào excerpt
 */
function thachpham_readmore() {
  return '...<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'thachpham') . '</a>';
}
add_filter( 'excerpt_more', 'thachpham_readmore' );
 
/**
@ Hàm hiển thị nội dung của post type
@ Hàm này sẽ hiển thị đoạn rút gọn của post ngoài trang chủ (the_excerpt)
@ Nhưng nó sẽ hiển thị toàn bộ nội dung của post ở trang single (the_content)
@ thachpham_entry_content()
**/
if ( ! function_exists( 'thachpham_entry_content' ) ) {
  function thachpham_entry_content() {
 
    if ( ! is_single() ) :
      the_excerpt();
    else :
      the_content();
 
      /*
       * Code hiển thị phân trang trong post type
       */
      $link_pages = array(
        'before' => __('<p>Page:', 'thachpham'),
        'after' => '</p>',
        'nextpagelink'     => __( 'Next page', 'thachpham' ),
        'previouspagelink' => __( 'Previous page', 'thachpham' )
      );
      wp_link_pages( $link_pages );
    endif;
 
  }
}
/**
@ Hàm hiển thị tag của post
@ thachpham_entry_tag()
**/
if ( ! function_exists( 'thachpham_entry_tag' ) ) {
  function thachpham_entry_tag() {
    if ( has_tag() ) :
      echo '<div class="entry-tag">';
      printf( __('Tagged in %1$s', 'thachpham'), get_the_tag_list( '', ', ' ) );
      echo '</div>';
    endif;
  }
}
?>