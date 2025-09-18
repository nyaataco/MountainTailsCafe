# WordPressカスタマイズ(astra-child)

WordPress、Astraのテーマをカスタマイズしました。  
カスタム投稿タイプ、カスタムタクソノミーを追加、それに伴ったcategory, archive, singleページを作成、スタイルを調整しています。  
架空の「ペットと一緒に行ける山のカフェ」をテーマに、イベント情報の管理などを実装しています。

---

## 概要

- Astraテーマ＋Spectraプラグインをベースに構築
- カスタム投稿タイプ「event」＋カスタムタクソノミー「event_category」
- アイキャッチ画像の登録・プレビュー機能（JavaScript＋WordPressメディアアップローダー）
- WordPress管理画面のカスタマイズ（カテゴリー編集画面に画像フィールド追加）
- もともとのテーマのデザイン調整はstyle.css、追加したEventカテゴリー関係はcustom.css, custom_admin.cssでスタイル調整しています。


---

## 技術スタック

- WordPress（ブロックエディタ + PHP）
- HTML / CSS / JavaScript / jQuery
- Photoshop (写真の補正)
- Illustrator (sample素材の作成)

---

## images

🧩**管理画面のイメージ**
<br>
### イベント一覧 (カスタム投稿) :  
    ![イベント一覧 (カスタム投稿)](https://github.com/nyaataco/MountainTailsCafe/blob/main/images/admin_custom-category-event.jpg)
<br><br>
### イベントカテゴリー (カスタムカテゴリー) :  
    ![イベントカテゴリー (カスタムカテゴリー)](https://github.com/nyaataco/MountainTailsCafe/blob/main/images/admin_custom-category-event2.jpg)
<br><br>
### カテゴリー編集ページ（画像アップ機能付き）:  
    ![カテゴリー編集ページ（画像アップ機能付き）](https://github.com/nyaataco/MountainTailsCafe/blob/main/images/admin_custom-category-event3.jpg)
<br><br>
### カスタム投稿編集ページ（イベント日付入力機能付き）:  
    ![カスタム投稿編集ページ（イベント日付入力機能付き）](https://github.com/nyaataco/MountainTailsCafe/blob/main/images/admin_custom-category-event4.jpg)
<br><br>

🏞️ **wordpressのイメージ**
<br>
### taxonomy-event_category.php:  
親テーマを引き継ぎつつEvent Date表示エリアを追加  
    ![taxonomy-event_category.php](https://github.com/nyaataco/MountainTailsCafe/blob/main/images/taxonomy-event_category.jpg)
<br><br>
### archive-event.php:  
好きな画像を設定できます。画像がなければsample-image.jpgを表示  
    ![archive-event.php](https://github.com/nyaataco/MountainTailsCafe/blob/main/images/archive-event.jpg)
<br><br>
### single-event.php:  
設定した日付とアイキャッチ画像を含んだ内容が投稿されます  
    ![single-event.php](https://github.com/nyaataco/MountainTailsCafe/blob/main/images/single-event.jpg)
<br><br>

※ このサイトはポートフォリオ作成のためのもので、実在する店舗ではありません。  
※ This site was created as part of a portfolio project. The café and its events are entirely fictional.

---

## その他

- ブロックエディタの使い方、サイトのデザインは[WordPress for Beginners: The Complete 2024 Master Class](https://www.udemy.com/course/wordpress-for-beginners-the-complete-2019-wordpress-guide/?srsltid=AfmBOopa9PHOUjp1yTAU0-mgcL3QsbAvhoZ2r616mu-TsvPkbAOE1wbK&couponCode=PMNVD2525) で学習、作成したものをカスタマイズしました。
- PHPカスタマイズは、Astraの親テーマ、他のwordpressテーマのコードを参考にしました。
- サンプルテキストはCopilotを活用して作成しています。

---

