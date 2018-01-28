<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Feed.Config
 * @since			baserCMS v 0.1.0
 * @license			http://basercms.net/license/index.html
 */

/**
 * システムナビ
 */
$config['BcApp.adminNavigation'] = [
	'Systems' => [
		'Feed' => [
			'title' => __d('baser', 'フィード管理'),
			'type' => 'system',
			'menus' => [
				'FeedConfigs' => ['title' => __d('baser', 'フィード設定'), 'url' => ['admin' => true, 'plugin' => 'feed', 'controller' => 'feed_configs', 'action' => 'index']],
				'FeedDeleteCache' => ['title' => __d('baser', 'フィードキャッシュ削除'), 'url' => ['admin' => true, 'plugin' => 'feed', 'controller' => 'feed_configs', 'action' => 'delete_cache'], 'options' => ['confirm' => 'フィードキャッシュを削除します。いいですか？']],
			]
		],
	],
];
// @deprecated 5.0.0 since 4.2.0 BcApp.adminNavigation の形式に変更
$config['BcApp.adminNavi.feed'] = array(
	'name' => 'フィードプラグイン',
	'contents' => array(
		array('name' => 'フィード設定一覧', 'url' => array('admin' => true, 'plugin' => 'feed', 'controller' => 'feed_configs', 'action' => 'index')),
		array('name' => 'フィード設定登録', 'url' => array('admin' => true, 'plugin' => 'feed', 'controller' => 'feed_configs', 'action' => 'add')),
		array('name' => 'フィードキャッシュ削除', 'url' => array('admin' => true, 'plugin' => 'feed', 'controller' => 'feed_configs', 'action' => 'delete_cache'), 'options' => array('confirm' => 'フィードキャッシュを削除します。いいですか？'))
	)
);