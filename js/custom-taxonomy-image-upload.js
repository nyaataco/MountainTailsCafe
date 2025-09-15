jQuery(document).ready(function($) {
    if ($('#term_image')) {
        // メディアアップローダー起動
        $(document).on('click', '.upload_image_button', function(e) {
            e.preventDefault();

            var inputField = $('#term_image');

            var custom_uploader = wp.media({
                title: '画像を選択',
                button: {
                    text: 'この画像を使う'
                },
                multiple: false
            });

            custom_uploader.on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                inputField.val(attachment.url);
                $('.term_image').prev('.term_image_preview').html('<img src="' + attachment.url + '">');
            });

            custom_uploader.open();
        });

        // 入力欄が変更されたらプレビューも更新
        $('#term_image').on('input', function() {
            var url = $(this).val();
            if (url) {
                $('#term_image').prev('.term_image_preview').html('<img src="' + url + '">');
            } else {
                $('#term_image').prev('.term_image_preview').empty();
            }
        });
        
        // 削除ボタン処理
        $(document).on('click', '.remove_image_button', function(e) {
            e.preventDefault();
            $('#term_image').val('');
            $('.term_image_preview').empty();
        });


    }
});

