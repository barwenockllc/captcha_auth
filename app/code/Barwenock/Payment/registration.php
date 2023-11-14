<?php
/**
 * @author Barwenock
 * @copyright Copyright (c) Barwenock
 * @package Payment for Magento 2
 */

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    'Barwenock_Payment',
    __DIR__
);
