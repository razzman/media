<?php
/**
 * mm: the PHP media library
 *
 * Copyright (c) 2007-2010 David Persson
 *
 * Distributed under the terms of the MIT License.
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright  2007-2010 David Persson <nperson@gmx.de>
 * @license    http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link       http://github.com/davidpersson/mm
 */

require_once 'PHPUnit/Framework.php';
require_once 'Media/Process.php';
require_once 'Media/Process/Document.php';
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/mocks/Media/Process/Adapter/GenericMock.php';

class Media_Process_ConversionTest extends PHPUnit_Framework_TestCase {

	protected $_files;
	protected $_data;

	protected function setUp() {
		$this->_files = dirname(dirname(dirname(dirname(__FILE__)))) . '/data';
		$this->_data = dirname(dirname(dirname(dirname(dirname(__FILE__))))) .'/data';
	}

	public function testMediaChangeButSameAdapter() {
		Media_Process::config(array(
			'image' => 'GenericMock',
			'document' => 'GenericMock'
		));
		$media = new Media_Process_Document(array(
			'source' => "{$this->_files}/application_pdf.pdf",
			'adapter' => 'GenericMock'
		));
		$result = $media->convert('image/jpg');
		$this->assertType('Media_Process_Image', $result);
	}
}

?>