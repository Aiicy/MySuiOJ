<?php
/**
 * MySui Online Judge
 * @file msoj_helper.php
 * @author MySui Team <mysuioj@gmail.com>
 */
defined('BASEPATH') OR exit('No direct script access allowed');


if ( ! function_exists('msoj_now'))
{
	/**
	 * Returns server time (uses time zone in settings table)
	 */
	function msoj_now()
	{
		if ( ! defined('MSOJ_NOW') )
		{
			$CI =& get_instance();
			$CI->load->model('settings_model');
			$now = new DateTime('now', new DateTimeZone($CI->settings_model->get_setting('timezone')));
			sscanf($now->format('j-n-Y G:i:s'), '%d-%d-%d %d:%d:%d', $day, $month, $year, $hour, $minute, $second);
			define('MSOJ_NOW', mktime($hour, $minute, $second, $month, $day, $year));
		}
		return MSOJ_NOW;
	}
}



if ( ! function_exists('msoj_now_str'))
{
	/**
	 * Returns server time (uses time zone in settings table)
	 */
	function msoj_now_str()
	{
		if ( ! defined('MSOJ_NOW_STR') )
			define('MSOJ_NOW_STR', date("Y-m-d H:i:s", msoj_now()));
		return MSOJ_NOW_STR;
	}
}



if ( ! function_exists('time_hhmm') )
{
	/**
	 * Formats time (HH:MM)
	 *
	 * HH is total hours
	 *
	 * @param $seconds
	 * @return string
	 */
	function time_hhmm($seconds)
	{
		$m = floor($seconds / 60);
		$hours = str_pad(floor($m / 60), 2, '0', STR_PAD_LEFT);
		$minutes = str_pad($m % 60, 2, '0', STR_PAD_LEFT);
		return "$hours:$minutes";
	}
}



if ( ! function_exists('filetype_to_extension'))
{

	/**
	 * Converts code type to file extension
	 */
	function filetype_to_extension($file_type)
	{
		$file_type = strtolower($file_type);
		switch ($file_type) {
			case 'c': return 'c';
			case 'cpp': return 'cpp';
			case 'py2': return 'py';
			case 'py3': return 'py';
			case 'java': return 'java';
			case 'zip': return 'zip';
			case 'pdf': return 'pdf';
			default: return FALSE;
		}
	}
}


if ( ! function_exists('filetype_to_language'))
{

	/**
	 * Converts code type to language
	 */
	function filetype_to_language($file_type)
	{
		$file_type = strtolower($file_type);
		switch ($file_type) {
			case 'c': return 'C';
			case 'cpp': return 'C++';
			case 'py2': return 'Py 2';
			case 'py3': return 'Py 3';
			case 'java': return 'Java';
			case 'zip': return 'Zip';
			case 'pdf': return 'PDF';
			default: return FALSE;
		}
	}
}


if ( ! function_exists('process_the_queue'))
{
	function process_the_queue()
	{
		shell_exec(
			'export MSOJ_BASE_URL='.escapeshellarg(base_url()).'; '.
			'php '.escapeshellarg(FCPATH.'index.php')." queueprocess run >/dev/null 2>/dev/null &"
		);
	}
}


if ( ! function_exists('msoj_random_password'))
{
	function msoj_random_password($len = 6)
	{
		$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ|!@#$%^&*()_-+=\\/[]{}\'":;?<>.,~';
		$password = '';
		for ($i = 0; $i < $len; $i++)
			$password .= $pool [ rand(0, strlen($pool)-1) ];
		return $password;
	}
}



if ( ! function_exists('msoj_basename'))
{
	function msoj_basename($path)
	{
		return preg_replace('$^.*[\\\\/]$', '', $path);
	}
}


/* End of file msoj_helper.php */
/* Location: ./application/helpers/msoj_helper.php */