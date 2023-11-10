<?php

declare(strict_types=1);

namespace Barwenock\PaymentRecaptcha\Model;

class CheckoutConfigProvider implements \Magento\Checkout\Model\ConfigProviderInterface
{
    /**
     * @var \Magento\ReCaptchaUi\Model\IsCaptchaEnabledInterface
     */
    private $isCaptchaEnabled;

    /**
     * @param \Magento\ReCaptchaUi\Model\IsCaptchaEnabledInterface $isCaptchaEnabled
     */
    public function __construct(
        \Magento\ReCaptchaUi\Model\IsCaptchaEnabledInterface $isCaptchaEnabled
    ) {
        $this->isCaptchaEnabled = $isCaptchaEnabled;
    }

    /**
     * @inheritdoc
     */
    public function getConfig()
    {
        return [
            'barwenock_payment' => $this->isCaptchaEnabled->isCaptchaEnabledFor('barwenock_payment')
        ];
    }
}
