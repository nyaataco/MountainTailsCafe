<?php
add_action( 'wp_enqueue_scripts', 'astra_child_enqueue_styles' );
function astra_child_enqueue_styles() {
    wp_enqueue_style( 'astra-child-style', get_stylesheet_uri(), array( 'astra-theme-css' ), '1.0.0' );
}

// Eventカテゴリー用css
function custom_styles() {
  wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/custom.css' );
}
add_action( 'wp_enqueue_scripts', 'custom_styles' );


// 管理サイト用css
function custom_admin_styles() {
  wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/custom_admin.css' );
}
add_action( 'admin_enqueue_scripts', 'custom_admin_styles' );


// カスタムタクソノミー用js
function custom_taxonomy_image_upload() {
    wp_enqueue_media(); // メディアアップローダー用
    wp_enqueue_script(
        'custom-taxonomy-image-upload',
        get_stylesheet_directory_uri() . '/js/custom-taxonomy-image-upload.js',
        array('jquery'),
        null,
        true
    );
};
add_action( 'admin_enqueue_scripts', 'custom_taxonomy_image_upload' );


// カスタム投稿 『Event』
function MTC_init() {

    // 各種ラベルの定義
	$event_labels = array(
        'name' => 'Event',
        'all_items' => 'イベント一覧',
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
        'show_in_rest' => true,
		'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields')
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


// カスタムタクソノミーに画像を追加
add_action('event_category_add_form_fields', function () {
    ?>   
    <div class="form-field">
        <label for="term_image">画像</label>
        <div class="term_image_preview"></div>
        <input type="text" name="term_image" id="term_image" value="" />
        <button class="upload_image_button button button-primary" type="button">画像を選択</button>
        <button class="remove_image_button button" type="button">画像を削除</button>
        <p class="description">画像のURLを入力するか、ボタンで選択してください。</p>
    </div>
    <?php
});

// 編集画面
add_action('event_category_edit_form_fields', function ($term) {
    $image = get_term_meta($term->term_id, 'term_image', true);
    ?>
    <tr class="form-field">
        <th scope="row"><label for="term_image">画像URL</label></th>
        <td>
            <div class="term_image_preview">
                <?php if ($image): ?>
                    <img src="<?php echo esc_url($image)?>">; 
                <?php endif; ?>
            </div>
            <input type="text" name="term_image" id="term_image" value="<?php echo esc_attr($image); ?>" />
            <button class="upload_image_button button button-primary" type="button">画像を選択</button>
            <button class="remove_image_button button" type="button">画像を削除</button>
            <p class="description">画像のURLを入力するか、ボタンで選択してください。</p>
        </td>
    </tr>
    <?php
});

// 保存処理
function save_event_category_image($term_id) {
    if (isset($_POST['term_image'])) {
        update_term_meta($term_id, 'term_image', sanitize_text_field($_POST['term_image']));
    }
}
add_action('created_event_category', 'save_event_category_image');
add_action('edited_event_category', 'save_event_category_image');


// カスタムメタボックスで日付を追加
function add_event_date_meta_box() {
    add_meta_box(
        'event_date_meta_box',
        'イベント日付',
        'display_event_date_meta_box',
        'event',
        'side',
        'high'
    );
}
add_action('add_meta_boxes', 'add_event_date_meta_box');

function display_event_date_meta_box($post) {
    $event_date = get_post_meta($post->ID, 'event_date', true);
    echo '<input type="date" name="event_date" value="' . esc_attr($event_date) . '" />';
}

function save_event_date_meta_box($post_id) {
    if (isset($_POST['event_date'])) {
        update_post_meta($post_id, 'event_date', sanitize_text_field($_POST['event_date']));
    }
}
add_action('save_post', 'save_event_date_meta_box');


// カスタム投稿のアイキャッチ画像の設定場所が上に来るように
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


// カスタム投稿 『News』
function News_init() {

	$news_labels = array(
        'name' => 'News',
        'all_items' => 'お知らせ一覧',
        'add_new' => '新規追加',
        'add_new_item' => '新しいお知らせを追加',
        'edit_item' => 'お知らせを編集',
        'new_item' => '新しいお知らせ',
        'view_item' => 'お知らせを見る',
        'search_items' => 'お知らせを検索',
        'not_found' => 'お知らせが見つかりませんでした',
        'not_found_in_trash' => 'ゴミ箱にお知らせはありません',
        'parent_item_colon' => ''
	);

	register_post_type( 'news', array(
		'label' => 'News',
		'labels' => $news_labels,
		'public' => true,
		'publicly_queryable' => true,
		'menu_position' => 5,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'news' ),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
        'show_in_rest' => true,
		'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields')
 	) );

    $news_category_labels = array(
        'name' => 'ニュースカテゴリー',
        'singular_name' => 'ニュースカテゴリー',
	);
	register_taxonomy( 'news_category', 'news', array(
		'labels' => $news_category_labels,
		'hierarchical' => true,
		'show_admin_column' => true,
	) );

}
add_action('init', 'News_init');
