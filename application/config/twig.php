<?php
/**
 * @author Bennet Matschullat <hello@bennet-matschullat.com>
 * @since 07.03.2011 - 12:02:20
 * @version 1.0
 */
defined('BASEPATH') OR exit('No direct script access allowed');

// 默认扩展名
$config['extension'] = ".twig";

// 默认模版路劲
$config['template_dir'] = VIEWPATH;

// 缓存目录
$config['cache_dir'] = APPPATH.'cache/Twig';

// 是否开启调试模式
$config['debug'] = false;

// 自动刷新
$config['auto_reload'] = true;

/* End of file twig.php */
/* Location: ./application/config/twig.php */