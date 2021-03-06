<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.Lib.TestSuite
 * @since			baserCMS v 3.0.6
 * @license			http://basercms.net/license/index.html
 */

App::uses('CakeTestSuiteCommand', 'TestSuite');
App::uses('BaserTestLoader', 'TestSuite');
App::uses('BaserTestCase', 'TestSuite');

/**
 * Class to customize loading of test suites from CLI
 *
 * @package       Baser.Lib.TestSuite
 */
class BaserTestSuiteCommand extends CakeTestSuiteCommand {

/**
 * Handles output flag used to change printing on webrunner.
 *
 * @param string $reporter
 * @return void
 */
	public function handleReporter($reporter) {
		$object = null;

		$reporter = ucwords($reporter);
		// CUSTOMIZE MODIFY 2014/07/02 ryuring
		// >>>
		//$coreClass = 'Cake' . $reporter . 'Reporter';
		// ---
		$coreClass = 'Baser' . $reporter . 'Reporter';
		// <<<
		App::uses($coreClass, 'TestSuite/Reporter');

		$appClass = $reporter . 'Reporter';
		App::uses($appClass, 'TestSuite/Reporter');

		if (!class_exists($appClass)) {
			$object = new $coreClass(null, $this->_params);
		} else {
			$object = new $appClass(null, $this->_params);
		}
		return $this->arguments['printer'] = $object;
	}

}
