<?php

declare(strict_types=1);

namespace Barwenock\Payment\Api;

interface PaymentInterface
{
    /**
     * @return mixed
     */
    public function sendPaymentData();
}
