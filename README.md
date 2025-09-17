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
<div>
    <p>イベント一覧 (カスタム投稿) :</p>
    <img src="https://github.com/nyaataco/MountainTailsCafe/blob/main/images/admin_custom-category-event.jpg" width="80%" alt="イベント一覧 (カスタム投稿)のイメージ" />
</div>
<br><br>
<div>
    <p>イベントカテゴリー (カスタムカテゴリー) :</p>
    <img src="https://github.com/nyaataco/MountainTailsCafe/blob/main/images/admin_custom-category-event2.jpg" width="80%" alt="イベントカテゴリー(カスタムカテゴリー)のイメージ" />
</div>
<br><br>
<div>
    <p>カテゴリー編集ページ（画像アップ機能付き）:</p>
    <img src="https://github.com/nyaataco/MountainTailsCafe/blob/main/images/admin_custom-category-event3.jpg" width="80%" alt="カテゴリー編集ページ（画像アップ機能付き）のイメージ" />
</div>
<br><br>
<div>
    <p>カスタム投稿編集ページ（イベント日付入力機能付き）:</p>
    <img src="https://github.com/nyaataco/MountainTailsCafe/blob/main/images/admin_custom-category-event4.jpg" width="80%" alt="カスタム投稿編集ページ（イベント日付入力機能付き）のイメージ" />
</div>
<br><br>

🏞️ **wordpressのイメージ**
<br>
<div>
    <p>
        taxonomy-event_category.php:<br>親テーマを引き継ぎつつEvent Date表示エリアを追加
    </p>
    <img src="https://github.com/nyaataco/MountainTailsCafe/blob/main/images/taxonomy-event_category.jpg" width="80%" alt="taxonomy-event_category.phpのイメージ" />
</div>
<br><br>
<div>
     <p>archive-event.php:<br>好きな画像を設定できます。画像がなければsample-image.jpgを表示</p>
    <img src="https://github.com/nyaataco/MountainTailsCafe/blob/main/images/archive-event.jpg" width="80%" alt="archive-event.phpのイメージ" />
</div>
<br><br>
<div>
     <p>single-event.php:<br>設定した日付とアイキャッチ画像を含んだ内容が投稿されます</p>
    <img src="https://github.com/nyaataco/MountainTailsCafe/blob/main/images/single-event.jpg" width="80%" alt="single-event.phpのイメージ" />
</div>
<br><br>

※ このサイトはポートフォリオ作成のためのもので、実在する店舗ではありません。  
※ This site was created as part of a portfolio project. The café and its events are entirely fictional.

---

## その他

- ブロックエディタの使い方、サイトのデザインは[WordPress for Beginners: The Complete 2024 Master Class](https://www.udemy.com/course/wordpress-for-beginners-the-complete-2019-wordpress-guide/?srsltid=AfmBOopa9PHOUjp1yTAU0-mgcL3QsbAvhoZ2r616mu-TsvPkbAOE1wbK&couponCode=PMNVD2525) で学習、作成したものをカスタマイズしました。
- PHPカスタマイズは、Astraの親テーマ、他のwordpressテーマのコードを参考にしました。
- コンテンツの文章はCopilotを活用して作成しています。

---

