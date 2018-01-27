<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Blog.View
 * @since			baserCMS v 0.1.0
 * @license			http://basercms.net/license/index.html
 */

/**
 * [管理画面] ブログ記事 一覧
 */
$this->BcBaser->css('Blog.admin/style', array('inline' => false));
$this->BcBaser->js(array(
	'admin/libs/jquery.baser_ajax_data_list',
	'admin/libs/jquery.baser_ajax_batch',
	'admin/libs/baser_ajax_data_list_config',
	'admin/libs/baser_ajax_batch_config'
));
?>


<script type="text/javascript">
$(document).ready(function(){
	$.baserAjaxDataList.init();
	$.baserAjaxBatch.init({ url: $("#AjaxBatchUrl").html()});
});
</script>


<div id="AjaxBatchUrl" hidden><?php $this->BcBaser->url(array('controller' => 'blog_posts', 'action' => 'ajax_batch')) ?></div>
<div id="AlertMessage" class="message" hidden></div>
<div id="MessageBox" hidden><div id="flashMessage" class="notice-message"></div></div>
<div id="DataList"><?php $this->BcBaser->element('blog_posts/index_list') ?></div>