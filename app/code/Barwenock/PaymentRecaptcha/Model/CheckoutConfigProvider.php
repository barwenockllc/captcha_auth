<?php

declare(strict_types=1);

namespace Barwenock\PaymentRecaptcha\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\ReCaptchaUi\Model\IsCaptchaEnabledInterface;

class CheckoutConfigProvider implements ConfigProviderInterface
{
    /**
     * @var IsCaptchaEnabledInterface
     */
    private $isCaptchaEnabled;

    /**
     * @param IsCaptchaEnabledInterface $isCaptchaEnabled
     */
    public function __construct(
        IsCaptchaEnabledInterface $isCaptchaEnabled
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
