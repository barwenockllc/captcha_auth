<?php

declare(strict_types=1);

namespace Barwenock\PaymentRecaptcha\Model;

/**
 * @inheritdoc
 */
class WebapiConfigProvider implements \Magento\ReCaptchaWebapiApi\Api\WebapiValidationConfigProviderInterface
{
    private const PAYMENT_CAPTCHA_ID = 'barwenock_payment';

    /**
     * @var \Magento\ReCaptchaUi\Model\IsCaptchaEnabledInterface
     */
    private $isEnabled;

    /**
     * @var \Magento\ReCaptchaUi\Model\ValidationConfigResolverInterface
     */
    private $configResolver;

    /**
     * @param \Magento\ReCaptchaUi\Model\IsCaptchaEnabledInterface $isEnabled
     * @param \Magento\ReCaptchaUi\Model\ValidationConfigResolverInterface $configResolver
     */
    public function __construct(
        \Magento\ReCaptchaUi\Model\IsCaptchaEnabledInterface $isEnabled,
        \Magento\ReCaptchaUi\Model\ValidationConfigResolverInterface $configResolver)
    {
        $this->isEnabled = $isEnabled;
        $this->configResolver = $configResolver;
    }

    /**
     * @inheritDoc
     */
    public function getConfigFor(\Magento\ReCaptchaWebapiApi\Api\Data\EndpointInterface $endpoint):
        ?\Magento\ReCaptchaValidationApi\Api\Data\ValidationConfigInterface
    {
        if ($endpoint->getServiceClass() === 'Barwenock\Payment\Api\PaymentInterface') {
            if ($this->isEnabled->isCaptchaEnabledFor(self::PAYMENT_CAPTCHA_ID)) {
                return $this->configResolver->get(self::PAYMENT_CAPTCHA_ID);
            }
        }

        return null;
    }
}
