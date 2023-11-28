<?php
/**
 * @author Barwenock
 * @copyright Copyright (c) Barwenock
 * @package Payment for Magento 2
 */

declare(strict_types=1);

namespace Barwenock\Payment\Api;

interface PaymentInterface
{
    /**
     * Send payment data api
     *
     * @return mixed
     */
    public function sendPaymentData();
}
