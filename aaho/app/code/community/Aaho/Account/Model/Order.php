<?php
/**
 * Aaho Extension
 *
 * @category   Aaho
 * @package    Aaho_Account
 * @author     Ashok Kumar Mishra <ashokmishra.cpp@gmail.com>
 */
class Aaho_Account_Model_Order extends Mage_Core_Model_Abstract
{
    protected function _construct() {
        $this->_init('aaho_account/order');
    }
}