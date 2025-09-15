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


// カスタムカテゴリーに画像を追加
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
add_action('created_event_category', function ($term_id) {
    if (isset($_POST['term_image'])) {
        update_term_meta($term_id, 'term_image', sanitize_text_field($_POST['term_image']));
    }
});

add_action('edited_event_category', function ($term_id) {
    if (isset($_POST['term_image'])) {
        update_term_meta($term_id, 'term_image', sanitize_text_field($_POST['term_image']));
    }
});



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