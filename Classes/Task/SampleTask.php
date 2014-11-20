<?php

namespace V\Scheduler5\Task;

use TYPO3\CMS\Core\Utility\GeneralUtility;

class SampleTask extends \TYPO3\CMS\Scheduler\Task\AbstractTask {

	public function execute() {

		/** @var $newTask \V\Scheduler5\Task\SampleTask  */
		$newTask = GeneralUtility::makeInstance('\\V\\Scheduler5\\Task\\SampleTask');
		$newTask->setDescription('Task description');
		$newTask->setTaskGroup(0);
		$newTask->registerRecurringExecution($start = time(), $interval = 86400, $end = 0, $multiple = FALSE, $cron_cmd = '');
		$newTask->email = 'test.drwho+' . rand(0,10) . '@gmail.com';

		/** @var \TYPO3\CMS\Scheduler\Scheduler $scheduler */
		$scheduler = GeneralUtility::makeInstance("\\TYPO3\\CMS\\Scheduler\\Scheduler");
		$scheduler->addTask($newTask);

		return TRUE;
	}

	public function getAdditionalInformation() {
		return 'Email:' . $this->email;
	}

}