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
 * [ADMIN] ユーザーグループ登録/編集フォーム
 */
?>


<?php echo $this->BcForm->create('Permission') ?>
<?php echo $this->BcForm->input('Permission.id', array('type' => 'hidden')) ?>

<!-- form -->
<div class="section">
	<table cellpadding="0" cellspacing="0" id="FormTable" class="form-table bca-form-table">
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('Permission.user_group_id', __d('baser', 'ユーザーグループ')) ?></th>
			<td class="col-input bca-form-table__input">
				<?php $userGroups = $this->BcForm->getControlSource('user_group_id') ?>
				<?php echo $userGroups[$this->BcForm->value('Permission.user_group_id')] ?>
				<?php echo $this->BcForm->input('Permission.user_group_id', array('type' => 'hidden')) ?>
			</td>
		</tr>
		<?php if ($this->request->action == 'admin_edit'): ?>
			<tr>
				<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('Permission.id', 'NO') ?></th>
				<td class="col-input bca-form-table__input">
					<?php echo $this->BcForm->value('Permission.no') ?>
				</td>
			</tr>
		<?php endif; ?>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('Permission.name', __d('baser', 'ルール名')) ?>&nbsp;<span class="bca-label" data-bca-label-type="required">必須</span></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('Permission.name', array('type' => 'text', 'size' => 40, 'maxlength' => 255, 'autofocus' => true)) ?>
				<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpName', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
				<?php echo $this->Form->error('Permission.name') ?>
				<div id="helptextName" class="helptext"> ルール名には日本語が利用できます。特定しやすいわかりやすい名称を入力してください。 </div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('Permission.url', __d('baser', 'URL設定')) ?>&nbsp;<span class="bca-label" data-bca-label-type="required">必須</span></th>
			<td class="col-input bca-form-table__input">
				<strong>/<?php echo $permissionAuthPrefix ?>/</strong>
				<?php echo $this->BcForm->input('Permission.url', array('type' => 'text', 'size' => 40, 'maxlength' => 255)) ?>
				<?php echo $this->Html->image('admin/icn_help.png', array('id' => 'helpUrl', 'class' => 'btn help', 'alt' => __d('baser', 'ヘルプ'))) ?>
				<?php echo $this->Form->error('Permission.url') ?>
				<div id="helptextUrl" class="helptext">
					<ul>
						<li>baserCMSの設置URLを除いたスラッシュから始まるURLを入力してください。<br />
							（例）/admin/users/index</li>
						<li>管理画面など認証がかかっているURLしか登録できません。</li>
						<li>特定のフォルダ配下に対しアクセスできないようにする場合などにはワイルドカード（*）を利用します。<br />
							（例）ユーザー管理内のURL全てアクセスさせない場合： /admin/users* </li>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('Permission.auth', __d('baser', 'アクセス')) ?></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('Permission.auth', array('type' => 'radio', 'options' => $this->BcText->booleanAllowList(__d('baser', 'アクセス')))) ?>
				<?php echo $this->BcForm->error('Permission.auth') ?>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('Permission.status', __d('baser', '利用状態')) ?></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('Permission.status', array('type' => 'checkbox', 'label' => __d('baser', '有効'))) ?>
				<?php echo $this->BcForm->error('Permission.status') ?>
			</td>
		</tr>
		<?php echo $this->BcForm->dispatchAfterForm() ?>
	</table>
</div>
<div class="submit bca-actions">
	<div class="bca-actions__main">
		<?php echo $this->BcForm->button(__d('baser', '保存'), array('div' => false, 'class' => 'button bca-btn bca-actions__item', 'id' => 'BtnSave', 'data-bca-btn-type' => 'save', 'data-bca-btn-size' => 'xl')) ?>
	</div>
	<?php if ($this->request->action == 'admin_edit'): ?>
		<div class="bca-actions__sub">
			<?php $this->BcBaser->link(__d('baser', '削除'), array('action' => 'delete', $this->request->params['pass'][0], $this->BcForm->value('Permission.id')), array('class' => 'submit-token button bca-btn bca-actions__item', 'data-bca-btn-status' => 'delete', 'data-bca-btn-size' => 'sm'), sprintf(__d('baser', '%s を本当に削除してもいいですか？'), $this->BcForm->value('Permission.name')), false); ?>
		</div>
	<?php endif; ?>
</div>

<?php echo $this->BcForm->end() ?>
