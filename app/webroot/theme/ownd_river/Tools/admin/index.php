<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.View
 * @since			baserCMS v 0.1.0
 * @license			http://basercms.net/license/index.html
 */
?>


<div class="section bca-main__section">
	<h2 class="bca-main__heading" data-bca-heading-size="lg">サーバーキャッシュ削除</h2>
	<p class="bca-main__text">baserCMSは、表示速度向上の為、サーバーサイドのキャッシュ機構利用しています。<br>これによりテンプレートを直接編集した際など、変更内容が反映されない場合がありますので、その際には、サーバーサイドのキャッシュを削除します。</p>
	<?php $this->BcBaser->link(__d('baser', 'サーバーキャッシュを削除する'), array('controller' => 'site_configs', 'action' => 'del_cache'), array('class' => 'submit-token button-small bca-btn', 'data-bca-btn-type' => 'clear', 'confirm' => __d('baser', 'サーバーキャッシュを削除します。いいですか？'))) ?>　
</div>

<div class="section bca-main__section">
	<h2 class="bca-main__heading" data-bca-heading-size="lg">固定ページテンプレート</h2>
	<p class="bca-main__text">別サーバーへの移設時には、固定ページ機能を正常動作させる為、固定ページテンプレート書出を実行してください。<br>また、固定ページテンプレートを直接編集した場合、データベースに反映する為には、固定ページテンプレート読込を実行します。</p>
	<?php $this->BcBaser->link(__d('baser', '固定ページテンプレート書出'), array('controller' => 'pages', 'action' => 'write_page_files'), array('class' => 'submit-token button-small bca-btn', 'confirm' => __d('baser', 'データベース内のページデータを、ページテンプレートとして /app/View/Pages 内に全て書出します。本当によろしいですか？'))) ?>　
	<?php $this->BcBaser->link(__d('baser', '固定ページテンプレート読込'), array('controller' => 'pages', 'action' => 'entry_page_files'), array('class' => 'submit-token button-small bca-btn', 'confirm' => __d('baser', '/app/View/Pages フォルダ内のページテンプレートを全て読み込みます。本当によろしいですか？'))) ?>　
</div>
<div class="section bca-main__section">
	<h2 class="bca-main__heading" data-bca-heading-size="lg">スペシャルサンクスクレジット</h2>
	<p class="bca-main__text">baserCMSの開発や運営、普及にご協力頂いた方々をご紹介します。</p>
	<?php $this->BcBaser->link(__d('baser', 'クレジットを表示'), 'javascript:void(0)', array('class' => 'button-small bca-btn', 'id' => 'BtnCredit')) ?>
</div>