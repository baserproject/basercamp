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

/**
 * [ADMIN] ウィジェットエリア管理メニュー
 */
?>


<tr>
	<th><?php echo __d('baser', 'ウィジェットエリア管理メニュー')?></th>
	<td>
		<ul class="cleafix">
			<li><?php $this->BcBaser->link(__d('baser', 'ウィジェットエリア一覧'), ['controller' => 'widget_areas', 'action' => 'index']) ?></li>
			<li><?php $this->BcBaser->link(__d('baser', 'ウィジェットエリア新規追加'), ['controller' => 'widget_areas', 'action' => 'add']) ?></li>
		</ul>
	</td>
</tr>