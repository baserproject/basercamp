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
 * [ADMIN] プラグイン一覧　行
 */
?>


<tr>
	<td class="row-tools bca-table-listup__tbody-td">
		<div><?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_down.png', array('title' => __d('baser', 'ダウンロード'), 'alt' => __d('baser', 'ダウンロード'))), $data['link'], array('target' => '_blank')) ?></div>
	</td>
	<td class="bca-table-listup__tbody-td">
		<?php echo $data['title'] ?>
	</td>
	<td class="bca-table-listup__tbody-td"><?php echo $data['version'] ?></td>
	<td class="bca-table-listup__tbody-td"><?php echo $data['description'] ?></td>
	<td class="bca-table-listup__tbody-td"><?php $this->BcBaser->link($data['author'], $data['authorLink'], array('target' => '_blank')) ?></td>
	<td class="bca-table-listup__tbody-td" style="width:10%;white-space: nowrap">
		<?php echo $this->BcTime->format('Y-m-d', $data['created']) ?><br />
		<?php echo $this->BcTime->format('Y-m-d', $data['modified']) ?>
	</td>
</tr>