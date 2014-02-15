<?php
namespace Hituzi;

/**
 * Talk class Tests
 *
 * @group Modules
 */
class Test_Talk extends \TestCase
{
	public function test_exec()
	{
		is_dir('/tmp/hituzi_data') and \File::delete_dir('/tmp/hituzi_data');
		\File::create_dir('/tmp', 'hituzi_data');

		$actual = Talk::exec('hello, world "!!"');
		// At first time, initialize only
		$this->assertNull($actual);
		$this->assertTrue(file_exists('/tmp/hituzi_data/sixamo.dic'));
		$this->assertFalse(file_exists('/tmp/hituzi_data/sixamo.txt'));

		Talk::exec('hello, world "!!"');
		$expected = 'hello, world "!!"'.PHP_EOL;
		$actual = file_get_contents('/tmp/hituzi_data/sixamo.txt');
		$this->assertEquals($expected, $actual);

		\File::delete_dir('/tmp/hituzi_data');
	}
}
