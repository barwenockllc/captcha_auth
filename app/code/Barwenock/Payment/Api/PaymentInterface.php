<?php

namespace Barwenock\Payment\Api;

interface PaymentInterface
{
    /**
     * @return mixed
     */
    public function sendPaymentData();
}
