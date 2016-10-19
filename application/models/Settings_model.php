<?php
/**
 * MySui Online Judge
 * @file Settings_model.php
 * @author MySui Team <mysuioj@gmail.com>
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * This model deals with global settings
 */

class Settings_model extends CI_Model
{


	public function __construct()
	{
		parent::__construct();
	}


	// ------------------------------------------------------------------------


	public function get_setting($key)
	{
		return $this->db->select('msoj_value')->get_where('settings', array('msoj_key'=>$key))->row()->msoj_value;
	}


	// ------------------------------------------------------------------------


	public function set_setting($key, $value)
	{
		$this->db->where('msoj_key', $key)->update('settings', array('msoj_value'=>$value));
	}


	// ------------------------------------------------------------------------


	public function get_all_settings()
	{
		$result = $this->db->get('settings')->result_array();
		$settings = array();
		foreach($result as $item)
		{
			$settings[$item['msoj_key']] = $item['msoj_value'];
		}
		return $settings;
	}


	// ------------------------------------------------------------------------


	public function set_settings($settings)
	{
		foreach ($settings as $key => $value)
		{
			$this->set_setting($key, $value);
		}
	}



}