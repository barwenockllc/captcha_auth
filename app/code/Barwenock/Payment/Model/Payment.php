<?php

namespace Barwenock\Payment\Model;

class Payment implements \Barwenock\Payment\Api\PaymentInterface
{
    /**
     * @var \Magento\Framework\App\Request\Http
     */
    protected $request;

    /**
     * @param \Magento\Framework\App\Request\Http $request
     */
    public function __construct(
        \Magento\Framework\App\Request\Http $request
    ) {
        $this->request = $request;
    }

    public function sendPaymentData()
    {
        $this->request->getParams();


        //Some logic for handling payment information
    }
}
