<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.View
 * @since			baserCMS v 4.0.0
 * @license			http://basercms.net/license/index.html
 */

/**
 * コンテンツ一覧 テーブル
 */
?>


<?php $this->BcBaser->element('pagination') ?>

<!-- list -->
<table cellpadding="0" cellspacing="0" class="list-table bca-table-listup sort-table" id="ListTable">
	<thead class="bca-table-listup__thead">
	<tr>
		<th class="list-tool bca-table-listup__thead-th">
			<?php if ($this->BcBaser->isAdminUser()): ?>
				<div>
					<?php echo $this->BcForm->checkbox('ListTool.checkall', ['title' => '一括選択']) ?>
					<?php echo $this->BcForm->input('ListTool.batch', ['type' => 'select', 'options' => ['del' => '削除', 'publish' => '公開', 'unpublish' => '非公開'], 'empty' => '一括処理']) ?>
					<?php echo $this->BcForm->button('適用', ['id' => 'BtnApplyBatch', 'disabled' => 'disabled']) ?>
				</div>
			<?php endif ?>
		</th>
		<th class="bca-table-listup__thead-th"><?php echo $this->Paginator->sort('id', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' NO', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' NO'), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?></th>
		<th class="bca-table-listup__thead-th"><?php echo $this->Paginator->sort('type', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' タイプ', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' タイプ'), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?></th>
		<th class="bca-table-listup__thead-th">
			<?php echo $this->Paginator->sort('url', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' URL', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' URL'), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?>
			<br>
			<?php echo $this->Paginator->sort('title', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' タイトル', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' タイトル'), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?>
		</th>
		<th class="bca-table-listup__thead-th"><?php echo $this->Paginator->sort('status', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' 公開状態', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' 公開状態'), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?></th>
		<th class="bca-table-listup__thead-th"><?php echo $this->Paginator->sort('author_id', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' 作成者', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' 作成者'), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?></th>
		<th class="bca-table-listup__thead-th">
			<?php echo $this->Paginator->sort('created_date', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' 作成日', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' 作成日'), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?>
			<br />
			<?php echo $this->Paginator->sort('modified_date', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順'))) . ' 更新日', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('class' => 'bca-table-listup__img', 'alt' => __d('baser', '降順'), 'title' => __d('baser', '降順'))) . ' 更新日'), array('escape' => false, 'class' => 'btn-direction bca-table-listup__a')) ?>
		</th>
	</tr>
	</thead>
	<tbody>
	<?php if (!empty($datas)): ?>
		<?php $count = 0; ?>
		<?php foreach ($datas as $data): ?>
			<?php $this->BcBaser->element('contents/index_row_table', array('data' => $data, 'count' => $count)) ?>
			<?php $count++; ?>
		<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="7"><p class="no-data">データが見つかりませんでした。</p></td>
		</tr>
	<?php endif; ?>
	</tbody>
</table>

<?php $this->BcBaser->element('list_num') ?>
