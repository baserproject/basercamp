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
 * [ADMIN] テーマファイル一覧　テーブル
 */
?>

<div class="bca-data-list__top">
  <!-- 一括処理 -->
  <?php if ($this->BcBaser->isAdminUser()): ?>
    <div class="bca-action-table-listup">
      <?php echo $this->BcForm->input('ListTool.batch', array('type' => 'select',
        'options' => array(
          'del' => __d('baser', '削除')
        ),
        'empty' => __d('baser', '一括処理'), 'data-bca-select-size' =>'lg')) ?>
      <?php echo $this->BcForm->button(__d('baser', '適用'), array('id' => 'BtnApplyBatch', 'disabled' => 'disabled' , 'class' => 'bca-btn', 'data-bca-btn-size' => 'lg')) ?>
    </div>
  <?php endif ?>
  <div class="bca-data-list__sub">
    <!-- list-num -->
    <?php $this->BcBaser->element('list_num') ?>
    <!-- pagination -->
    <?php $this->BcBaser->element('pagination') ?>
  </div>
</div>


<table class="list-table bca-table-listup" id="ListTable">
<thead class="bca-table-listup__thead">
	<tr>
    <th class="list-tool bca-table-listup__thead-th  bca-table-listup__thead-th--select"><?php // 一括選択 ?>
      <?php if ($this->BcBaser->isAdminUser() && $theme != 'core'): ?>
        <?php echo $this->BcForm->input('ListTool.checkall', ['type' => 'checkbox', 'label' => __d('baser', '一括選択')]) ?>
      <?php endif ?>

      <?php if ($path): ?>
        <?php $this->BcBaser->link('', array('action' => 'index', $theme, $plugin, $type, dirname($path)), array(
            'title' => __d('baser', '上へ移動'),
            'class' => 'bca-btn-icon',
            'data-bca-btn-type'=>'up-directory',
            'data-bca-btn-size'=>'lg',
            'data-bca-btn-status'=>'white',
            'aria-label'=>'一つ上の階層へ'
          )) ?>
      <?php endif ?>
		</th>
		<th class="bca-table-listup__thead-th">フォルダ名／テーマファイル名</th>
    <th class="bca-table-listup__thead-th"><?php // アクション ?>
      <?php echo __d('baser', 'アクション') ?>
    </th>
	</tr>
</thead>
<tbody class="bca-table-listup__tbody">
	<?php if (!empty($themeFiles)): ?>
		<?php foreach ($themeFiles as $data): ?>
			<?php $this->BcBaser->element('theme_files/index_row', array('data' => $data)) ?>
		<?php endforeach; ?>
	<?php else: ?>
	<tr>
		<td colspan="8"><p class="no-data">データが見つかりませんでした。</p></td>
	</tr>
	<?php endif; ?>
</tbody>
</table>