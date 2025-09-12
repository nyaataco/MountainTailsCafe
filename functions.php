<?php
add_action( 'wp_enqueue_scripts', 'astra_child_enqueue_styles' );
function astra_child_enqueue_styles() {
    wp_enqueue_style( 'astra-child-style', get_stylesheet_uri(), array( 'astra-theme-css' ), '1.0.0' );
}

// 追加したページ用のstyle
function custom_styles() {
  wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/custom.css' );
}
add_action( 'wp_enqueue_scripts', 'custom_styles' );


// カスタム投稿 Event
function MTC_init() {

    // 各種ラベルの定義
	$event_labels = array(
        'name' => 'Event',
        'add_new' => '新規追加',
        'add_new_item' => '新しいイベントを追加',
        'edit_item' => 'イベントを編集',
        'new_item' => '新しいイベント',
        'view_item' => 'イベントを見る',
        'search_items' => 'イベントを検索',
        'not_found' => 'イベントが見つかりませんでした',
        'not_found_in_trash' => 'ゴミ箱にイベントはありません',
        'parent_item_colon' => ''
	);

    //  WordPressに登録
	register_post_type( 'event', array(
		'label' => 'Event',
		'labels' => $event_labels,
		'public' => true,
		'publicly_queryable' => true,
		'menu_position' => 5,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'event' ),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'supports' => array( 'title', 'editor', 'thumbnail' )
 	) );

	// カスタムタクソノミー "event > category"
    $event_category_labels = array(
        'name' => 'イベントカテゴリー',
        'singular_name' => 'イベントカテゴリー',
	);
	register_taxonomy( 'event_category', 'event', array(
		'labels' => $event_category_labels,
		'hierarchical' => true,
		'show_admin_column' => true,
	) );

}
add_action('init', 'MTC_init');


// アイキャッチ画像の設定場所が上に来るように
function mtc_move_featured_image_meta_box() {
    // 一度削除
    remove_meta_box( 'postimagediv', 'event', 'side' );

    // 再登録
    add_meta_box(
        'postimagediv',
        __('アイキャッチ画像'),
        'post_thumbnail_meta_box',
        'event',
        'side',
        'high'
    );
}
add_action( 'do_meta_boxes', 'mtc_move_featured_image_meta_box' );
