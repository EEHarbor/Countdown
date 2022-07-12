<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Countdown
{
    public $return_data = "";

    public function __construct()
    {
		$day = ee()->TMPL->fetch_param('day');
		$month = ee()->TMPL->fetch_param('month');
		$year = ee()->TMPL->fetch_param('year');
		$hour = ee()->TMPL->fetch_param('hour');

		// get current unix timestamp
		$today = time();

		//make unix timestamp for given date
		$countdowndate = mktime(0, 0, $hour, $month, $day, $year);

		//calculate difference  
		$difference = $countdowndate - $today;
		$difference = $difference < 0 ? 0 : $difference;

		$days_left = floor($difference/60/60/24);
		$hours_left = floor(($difference - $days_left*60*60*24)/60/60);
		
		$variables = array();
		$variables[] = array(
			'days' => $days_left,
			'hours' => $hours_left
		);

        var_dump($variables);
        var_dump($difference);

		$this->return_data = ee()->TMPL->parse_variables(ee()->TMPL->tagdata, $variables);
        return $this->return_data;
    }
}
