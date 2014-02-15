<?php
/**
 * Talk
 *
 * @category initKi
 * @package hituzi
 * @author kawamura.hryk
 * @license MIT License
 * @copyright Small Social Coding
 */

namespace Hituzi;

class Talk extends \Initki\Shell
{
	const SHELL = '/usr/bin/env ruby';

	protected static $file = '../vendor/sixamo_rb20.rb';
	protected static $path = __DIR__;

	protected static function command_line_from_file($args)
	{
		$args = array('"'.str_replace('"', '\"', implode(' ', $args)).'"');
		$data_dir = static::data_dir();
		array_unshift($args, $data_dir);
		$option = \File::read_dir($data_dir) ? '-m' : '--init';
		array_unshift($args, $option);
		return parent::command_line_from_file($args);
	}

	private static function data_dir()
	{
		\Config::load('hituzi::config', 'config');
		$data_dir = \Config::get('config.data_dir');
		return $data_dir ? $data_dir : realpath(static::$path.'/../data');
	}
}
