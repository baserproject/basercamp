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
 * [ADMIN] ユーザー一覧　テーブル
 */
?>


<!-- pagination -->
<?php $this->BcBaser->element('pagination') ?>

<table cellpadding="0" cellspacing="0" class="list-table" id="ListTable">
<thead>
	<tr>
		<th style="width:140px" class="list-tool">
			<div>
				<?php $this->BcBaser->link($this->BcBaser->getImg('admin/btn_add.png', array('width' => 69, 'height' => 18, 'alt' => '新規追加', 'class' => 'btn', 'hidden' => 'hidden')) . '新規追加', array('action' => 'add'), array('class' => 'bca-btn', 'data-bca-btn-type' => 'add')) ?>
			</div>
		</th>
		<th><?php echo $this->Paginator->sort('id', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' NO', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' NO'), array('escape' => false, 'class' => 'btn-direction')) ?></th>
		<th><?php echo $this->Paginator->sort('name', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' アカウント名', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' アカウント名'), array('escape' => false, 'class' => 'btn-direction')) ?></th>
		<th><?php echo $this->Paginator->sort('nickname', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' ニックネーム', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' ニックネーム'), array('escape' => false, 'class' => 'btn-direction')) ?></th>
		<th><?php echo $this->Paginator->sort('user_group_id', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' グループ', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' グループ'), array('escape' => false, 'class' => 'btn-direction')) ?><br />
			<?php echo $this->Paginator->sort('real_name_1', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' 氏名', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' 氏名'), array('escape' => false, 'class' => 'btn-direction')) ?></th>
		<th><?php echo $this->Paginator->sort('created', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' 登録日', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' 登録日'), array('escape' => false, 'class' => 'btn-direction')) ?><br />
			<?php echo $this->Paginator->sort('modified', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' 更新日', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' 更新日'), array('escape' => false, 'class' => 'btn-direction')) ?></th>
	</tr>
</thead>
<tbody>
	<?php if (!empty($users)): ?>
		<?php foreach ($users as $data): ?>
			<?php $this->BcBaser->element('users/index_row', array('data' => $data)) ?>
		<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="8"><p class="no-data">データが見つかりませんでした。</p></td>
		</tr>
	<?php endif; ?>
</tbody>
</table>

<!-- list-num -->
<?php $this->BcBaser->element('list_num') ?>
