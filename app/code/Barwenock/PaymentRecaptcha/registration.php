<?php
/**
 * @author Barwenock
 * @copyright Copyright (c) Barwenock
 * @package Payment Captcha for Magento 2
 */

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    'Barwenock_PaymentRecaptcha',
    __DIR__
);
