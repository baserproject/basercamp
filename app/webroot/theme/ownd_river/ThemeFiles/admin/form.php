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
 * [ADMIN] テーマファイル登録・編集
 */
$params = explode('/', $path);
?>
<!-- current -->
<div class="em-box align-left">
	現在の位置：<?php echo $currentPath ?>
</div>

<?php if($theme	!= 'core' && !$isWritable): ?>
<div id="AlertMessage">ファイルに書き込み権限がないので編集できません。</div>
<?php endif ?>

<?php if ($this->request->action == 'admin_add'): ?>
	<?php echo $this->BcForm->create('ThemeFile', array('id' => 'ThemeFileForm', 'url' => array_merge(array('action' => 'add'), array($theme, $plugin, $type), explode('/', $path)))) ?>
<?php elseif ($this->request->action == 'admin_edit'): ?>
	<?php echo $this->BcForm->create('ThemeFile', array('id' => 'ThemeFileForm', 'url' => array_merge(array('action' => 'edit'), array($theme, $plugin, $type), explode('/', $path)))) ?>
<?php endif ?>

<?php echo $this->BcForm->input('ThemeFile.parent', array('type' => 'hidden')) ?>

<!-- form -->
<div class="section">
	<table cellpadding="0" cellspacing="0" id="FormTable" class="form-table bca-form-table">
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('ThemeFile.name', __d('baser', 'ファイル名')) ?>&nbsp;<span class="bca-label" data-bca-label-type="required">必須</span></th>
			<td class="col-input bca-form-table__input">
				<?php if ($this->request->action != 'admin_view'): ?>
					<?php echo $this->BcForm->input('ThemeFile.name', array('type' => 'text', 'size' => 30, 'maxlength' => 255, 'autofocus' => true)) ?>
					<?php if ($this->BcForm->value('ThemeFile.ext')): ?>.<?php endif ?>
					<?php echo $this->BcForm->value('ThemeFile.ext') ?>
					<?php echo $this->BcForm->input('ThemeFile.ext', array('type' => 'hidden')) ?>
					<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpName', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
					<?php echo $this->BcForm->error('ThemeFile.name') ?>
					<div id="helptextName" class="helptext">
						<ul>
							<li>ファイル名は半角で入力してください。</li>
						</ul>
					</div>
				<?php else: ?>
					<?php echo $this->BcForm->input('ThemeFile.name', array('type' => 'text', 'size' => 30, 'readonly' => 'readonly')) ?> .<?php echo $this->BcForm->value('ThemeFile.ext') ?>
					<?php echo $this->BcForm->input('ThemeFile.ext', array('type' => 'hidden')) ?>
				<?php endif ?>
			</td>
		</tr>
		<?php if ($this->request->action == 'admin_add' || (($this->request->action == 'admin_edit' || $this->request->action == 'admin_view') && in_array($this->request->data['ThemeFile']['type'], array('text', 'image')))): ?>
			<tr>
				<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('ThemeFile.contents', __d('baser', '内容')) ?></th>
				<td class="col-input bca-form-table__input">
					<?php if (($this->request->action == 'admin_edit' || $this->request->action == 'admin_view') && $this->request->data['ThemeFile']['type'] == 'image'): ?>
						<div style="margin:20px auto">
							<?php $this->BcBaser->link(
								$this->BcBaser->getImg(array_merge(array('action' => 'img_thumb', 550, 550, $theme, $plugin, $type), explode('/', $path)), array('alt' => basename($path))), array_merge(array('action' => 'img', $theme, $plugin, $type), explode('/', $path)), array('rel' => 'colorbox', 'title' => basename($path))
							); ?>
						</div>
					<?php elseif ($this->request->action == 'admin_add' || $this->request->data['ThemeFile']['type'] == 'text'): ?>
						<?php if ($this->request->action != 'admin_view'): ?>
							<?php echo $this->BcForm->input('ThemeFile.contents', array('type' => 'textarea', 'cols' => 80, 'rows' => 30)) ?>
							<?php echo $this->BcForm->error('ThemeFile.contents') ?>
						<?php else: ?>
							<?php echo $this->BcForm->input('ThemeFile.contents', array('type' => 'textarea', 'cols' => 80, 'rows' => 30, 'readonly' => 'readonly')) ?>
						<?php endif ?>
					<?php endif ?>
				</td>
			</tr>
		<?php endif ?>
		<?php echo $this->BcForm->dispatchAfterForm() ?>
	</table>
</div>
<div class="submit bca-actions">
	<?php if ($this->request->action == 'admin_add'): ?>
		<div class="bca-actions__main">
			<?php echo $this->BcForm->button(__d('baser', '保存'), array('div' => false, 'class' => 'button bca-btn', 'data-bca-btn-type' => 'save', 'data-bca-btn-size' => 'lg', 'data-bca-btn-width' => 'lg','id' => 'BtnSave')) ?>
		</div>
	<?php elseif ($this->request->action == 'admin_edit'): ?>
		<?php if($isWritable): ?>
			<div class="bca-actions__main">
				<?php echo $this->BcForm->button(__d('baser', '保存'), array('div' => false, 'class' => 'button bca-btn', 'data-bca-btn-type' => 'save', 'data-bca-btn-size' => 'lg', 'data-bca-btn-width' => 'lg','id' => 'BtnSave')) ?>
			</div>
			<div class="bca-actions__sub">
				<?php $this->BcBaser->link(__d('baser', '削除'), array_merge(array('action' => 'del', $theme, $plugin, $type), $params), array('class' => 'submit-token button bca-btn', 'data-bca-btn-type' => 'delete', 'data-bca-btn-size' => 'sm'), sprintf(__d('baser', '%s を本当に削除してもいいですか？'), basename($path)), false) ?>
			</div>
		<?php endif ?>	
	<?php else: ?>
		<?php // プラグインのアセットの場合はコピーできない ?>
		<?php if (!$safeModeOn): ?>
			<?php //if($theme == 'core' && !(($type == 'css' || $type == 'js' || $type == 'img') && $plugin)): ?>
			<?php if ($theme == 'core'): ?>
				<?php $this->BcBaser->link(__d('baser', '現在のテーマにコピー'), array_merge(array('action' => 'copy_to_theme', $theme, $plugin, $type), explode('/', $path)), array('class' => 'submit-token btn-red button bca-btn'), sprintf(__d('baser', '本当に現在のテーマ「%s」にコピーしてもいいですか？\n既に存在するファイルは上書きされます。'), Inflector::camelize($siteConfig['theme']))); ?>
			<?php endif; ?>
		<?php else: ?>
			<?php echo __d('baser', '機能制限のセーフモードで動作していますので、現在のテーマへのコピーはできません。') ?>
		<?php endif; ?>
	<?php endif; ?>
</div>

<?php if ($this->request->action == 'admin_add' || $this->request->action == 'admin_edit'): ?>
	<?php $this->BcBaser->link(__d('baser', '一覧に戻る'), array_merge(array('action' => 'index', $theme, $plugin, $type), $params), array('class' => 'btn-gray button bca-btn', 'data-bca-btn-type' => 'back-to-list')); ?>
<?php else: ?>
	<?php $this->BcBaser->link(__d('baser', '一覧に戻る'), array_merge(array('action' => 'index', $theme, $plugin, $type), explode('/', dirname($path))), array('class' => 'btn-gray button bca-btn', 'data-bca-btn-type' => 'back-to-list')); ?>
<?php endif; ?>


<?php echo $this->BcForm->end() ?>
