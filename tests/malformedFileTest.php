<?php

use IptcJpeg\Iptc;
use IptcJpeg\Exception AS IptcException;

class malformedFileTest extends PHPUnit_Framework_TestCase
{
    private $_iptc;

    public function setUp() {
        $this->_iptc = new Iptc(__DIR__ . '/images/bad_file.jpg');
    }

    public function testWriteIptcToBadFile() {
        $this->_iptc->set(Iptc::OBJECT_NAME, 'test');
        // Trying to save the iptc data to this file should fail...
        try {
            $this->_iptc->write();
        } catch (IptcException $e) {
            $this->assertEquals($e->getMessage(), 'Failed to save IPTC data into file');
        }
    }
}
