<?php

	/**
	 * Задача:
	 * Написать функцию которая принемает время.
	 * И выдаёт угол между стрелками
	 */

	class Time
	{
		private $hours;
		private $minutes;

		const ANGLE_CIRCLE = 360;
		const SECONDS_ON_THE_MINUTES = 60;
		const MINUTES_ON_THE_HOUR = 60;
		const HOURS_IN_DAY = 24;
		const HOURS_ON_THE_CLOCK = self::HOURS_IN_DAY / 2;

		/**
		 * Time constructor.
		 * @param int $hours
		 * @param int $minutes
		 */
		public function __construct($hours = 21, $minutes = 15)
		{
			//todo-splaa: Дописать проверку
			if ($hours > self::HOURS_ON_THE_CLOCK) {
				$hours %= self::HOURS_ON_THE_CLOCK;
			}
			$this->hours = $hours;
			$this->minutes = $minutes;
		}

		public function getSecondsOfMinutesHand()
		{
			return $this->minutes * self::SECONDS_ON_THE_MINUTES;
		}

		public function getSecondsOfHoursHand()
		{
			return $this->hours * self::SECONDS_ON_THE_MINUTES * self::MINUTES_ON_THE_HOUR;
		}

		public function getAngleHourHand()
		{
			return self::ANGLE_CIRCLE / self::HOURS_ON_THE_CLOCK * $this->hours;
		}

		public function getAngleMinuteHand()
		{
			//TODO-splaa: Подставить константы вместо number 360, 60.
			return 360 / 60 * $this->minutes;
		}


	}


	function angleOfClockHands(Time $time)
	{
		return abs($time->getAngleHourHand() - $time->getAngleMinuteHand());
	}

//	$time = new Time(10, 47);
	$time = new Time(3, 47);

	$angle = angleOfClockHands($time);


	//TODO-splaa: Написать тесты
	//TODO-splaa: Добавить метод angleOfClockHands() в TimeClass
	//TODO-splaa: Добавить __toString метод в TimeClass

	echo '-------------------------------' . PHP_EOL;
	echo 'Угол минутной трелки : ' . $time->getAngleMinuteHand() . PHP_EOL;
	echo 'Угол часовой стрелки трелки : ' . $time->getAngleHourHand() . PHP_EOL;
	echo '-------------------------------' . PHP_EOL;
	echo PHP_EOL . 'Угол между стрелками: ' . $angle . PHP_EOL;
