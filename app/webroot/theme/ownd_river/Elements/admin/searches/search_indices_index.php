<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.View
 * @since			baserCMS v 2.0.0
 * @license			http://basercms.net/license/index.html
 */

/**
 * [ADMIN] 検索インデックス一覧検索ボックス
 */
$priorities = array('0.1' => '0.1', '0.2' => '0.2', '0.3' => '0.3', '0.4' => '0.4', '0.5' => '0.5',
	'0.6' => '0.6', '0.7' => '0.7', '0.8' => '0.8', '0.9' => '0.9', '1.0' => '1.0');
$types = BcUtil::unserialize($this->BcBaser->siteConfig['content_types']);
?>


<?php echo $this->BcForm->create('SearchIndex', array('url' => array('action' => 'index'))) ?>
<?php echo $this->BcForm->hidden('SearchIndex.open', array('value' => true)) ?>
<p class="bca-search__input-list">
	<span class="bca-search__input-item"><?php echo $this->BcForm->label('SearchIndex.type', 'タイプ') ?> <?php echo $this->BcForm->input('SearchIndex.type', array('type' => 'select', 'class' => 'bca-select', 'options' => $types, 'empty' => '指定なし')) ?></span>
	<span class="bca-search__input-item"><?php echo $this->BcForm->label('SearchIndex.site_id', 'サブサイト') ?> <?php echo $this->BcForm->input('SearchIndex.site_id', array('type' => 'select', 'class' => 'bca-select', 'options' => $sites)) ?></span>
	<?php $this->BcBaser->img('admin/ajax-loader-s.gif', array('style' => 'vertical-align:middle;display:none', 'id' => 'SearchIndexSiteIdLoader')) ?>
	<span class="bca-search__input-item"><?php echo $this->BcForm->label('SearchIndex.folder_id', 'フォルダ') ?> <?php echo $this->BcForm->input('SearchIndex.folder_id', array('type' => 'select', 'class' => 'bca-select', 'options' => $folders, 'empty' => '指定なし', 'escape' => false)) ?></span>
	<span class="bca-search__input-item"><?php echo $this->BcForm->label('SearchIndex.keyword', 'キーワード') ?> <?php echo $this->BcForm->input('SearchIndex.keyword', array('type' => 'text', 'size' => '30')) ?></span>
	<span class="bca-search__input-item"><?php echo $this->BcForm->label('SearchIndex.status', '公開状態') ?> 
		<?php echo $this->BcForm->input('SearchIndex.status', array('type' => 'select', 'class' => 'bca-select', 'options' => $this->BcText->booleanMarkList(), 'empty' => '指定なし')) ?></span>
	<span class="bca-search__input-item"><?php echo $this->BcForm->label('SearchIndex.priority', '優先度') ?> 
		<?php echo $this->BcForm->input('SearchIndex.priority', array('type' => 'select', 'class' => 'bca-select', 'options' => $priorities, 'empty' => '指定なし')) ?></span>
</p>
<div class="button bca-search__btns">
	<div class="bca-search__btns-item"><?php $this->BcBaser->link('検索', "javascript:void(0)", array('id' => 'BtnSearchSubmit', 'class' => 'bca-btn', 'data-bca-btn-type' => 'search')) ?></div>
	<div class="bca-search__btns-item"><?php $this->BcBaser->link('クリア', "javascript:void(0)", array('id' => 'BtnSearchClear', 'class' => 'bca-btn', 'data-bca-btn-type' => 'clear')) ?></div>
</div>
<?php $this->BcForm->end() ?>