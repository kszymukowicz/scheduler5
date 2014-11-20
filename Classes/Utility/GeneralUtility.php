<?php

namespace V\Scheduler5\Utility;

class GeneralUtility {

	// Example that task can be also created from frontend.
	// page.40 = USER
	// page.40.userFunc = V\Scheduler5\Utility\GeneralUtility->createNewTask

	public static function createNewTask() {
		/** @var $newTask \V\Scheduler1\Task\SampleTask */
		$newTask = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('\\V\\Scheduler5\\Task\\SampleTask');
		$newTask->setDescription('Task description');
		$newTask->setTaskGroup(0);
		$newTask->registerRecurringExecution($start = time(), $interval = 400, $end = 0, $multiple = FALSE, $cron_cmd = '');
		$newTask->email = 'test.drwho+' . rand(0, 10) . '@gmail.com';

		/** @var \TYPO3\CMS\Scheduler\Scheduler $scheduler */
		$scheduler = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance("\\TYPO3\\CMS\\Scheduler\\Scheduler");
		$scheduler->addTask($newTask);
	}

}