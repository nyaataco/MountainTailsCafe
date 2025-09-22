# WordPressカスタマイズ(astra-child)

WordPress、Astraのテーマをカスタマイズしました。  
カスタム投稿タイプ、カスタムタクソノミーを追加、伴ってcategory, archive, singlページ を作成、スタイルを調整しています。  
架空の「ペットと一緒に行ける山のカフェ」をテーマに、イベント情報の管理などを実装しています。

---

## 概要

- Astraテーマ＋Spectraプラグインをベースに構築
- カスタム投稿タイプ「event」＋カスタムタクソノミー「event_category」
- アイキャッチ画像の登録・プレビュー機能（JavaScript＋WordPressメディアアップローダー）
- WordPress管理画面のカスタマイズ（カテゴリー編集画面に画像フィールド追加）
- フロント画面のデザイン調整（style.css、custom.css）
- 管理画面のスタイル調整（custom_admin.css）


---

## ファイル構成

- `functions.php`：カスタム投稿タイプ、カスタムタクソノミーの登録
- `js/custom-taxonomy-image-upload.js`：画像アップロード・プレビュー・削除機能
- `taxonomy-event_category.php`：イベントカテゴリーごとの一覧ページ
- `archive-event.php`：カテゴリー内のイベント一覧ページ
- `single-event.php`：イベント詳細ページ
- `custom.css`：イベント関連のスタイル
- `custom_admin.css`：管理画面のスタイル


---

## 技術スタック

- WordPress（ブロックエディタ + PHP）
- HTML / CSS / JavaScript 

---

## images
<br><br>

🧩**管理画面のイメージ**
<br>
<!-- <div>
    <p>イベント一覧 (カスタム投稿) :</p>
    <img src="https://github.com/nyaataco/MountainTailsCafe/blob/main/images/admin_custom-category-event.jpg" alt="イベント一覧 (カスタム投稿)のイメージ" />
</div>
<br><br> -->
<div>
    <p>
        <b>イベントカテゴリー (カスタムカテゴリー) :</b><br>画像アップ機能を追加
    </p>
    <img src="https://github.com/nyaataco/MountainTailsCafe/blob/main/images/admin_custom-category-event2.jpg" alt="イベントカテゴリー(カスタムカテゴリー)のイメージ" />
</div>
<br><br>
<div>
    <p>
        <b>カテゴリー編集ページ:</b><br>画像アップ、プレビュー、削除
    </p>
    <img src="https://github.com/nyaataco/MountainTailsCafe/blob/main/images/admin_custom-category-event3.jpg" alt="カテゴリー編集ページ（画像アップ機能付き）のイメージ" />
</div>
<br><br>
<div>
    <p>
        <b>カスタム投稿編集ページ:</b><br>イベント日付入力機能付き
    </p>
    <img src="https://github.com/nyaataco/MountainTailsCafe/blob/main/images/admin_custom-category-event4.jpg" alt="カスタム投稿編集ページ（イベント日付入力機能付き）のイメージ" />
</div>
<br><br>

🏞️ **wordpressのイメージ**
<br>
<div>
     <p>
        <b>archive-event.php:</b><br>Eventカテゴリー一覧ページ。リンクで各カテゴリー内の記事一覧へ。<br>好きな画像を設定できます。画像がなければsample-image.jpgを表示。
    </p>
    <img src="https://github.com/nyaataco/MountainTailsCafe/blob/main/images/archive-event.jpg" alt="archive-event.phpのイメージ" />
</div>
<br><br>
<div>
    <p>
        <b>taxonomy-event_category.php:</b><br>Event各カテゴリー内の記事一覧。<br>親テーマを引き継ぎつつEvent Date表示エリアを追加しました。
    </p>
    <img src="https://github.com/nyaataco/MountainTailsCafe/blob/main/images/taxonomy-event_category.jpg" alt="taxonomy-event_category.phpのイメージ" />
</div>
<br><br>
<div>
     <p>
        <b>single-event.php:</b><br>カスタム投稿WEventの個別投稿ページ。<br>設定した日付とアイキャッチ画像を含んだ内容が投稿されます。
     </p>
    <img src="https://github.com/nyaataco/MountainTailsCafe/blob/main/images/single-event.jpg" alt="single-event.phpのイメージ" />
</div>
<br><br>

※ このサイトはポートフォリオ作成のためのもので、実在する店舗ではありません。  
※ This site was created as part of a portfolio project. The café and its events are entirely fictional.

---

## その他

<!-- - ブロックエディタの使い方、サイトのデザインは[WordPress for Beginners: The Complete 2024 Master Class](https://www.udemy.com/course/wordpress-for-beginners-the-complete-2019-wordpress-guide/?srsltid=AfmBOopa9PHOUjp1yTAU0-mgcL3QsbAvhoZ2r616mu-TsvPkbAOE1wbK&couponCode=PMNVD2525) で学習、作成したものをカスタマイズしました。 -->
- PHPカスタマイズは、Astraの親テーマ、他のwordpressテーマのコードを参考にしました。
- サンプルテキストはCopilotを活用して作成しています。

---

