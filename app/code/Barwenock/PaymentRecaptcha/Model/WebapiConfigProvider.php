<?php

declare(strict_types=1);

namespace Barwenock\PaymentRecaptcha\Model;

use Magento\ReCaptchaUi\Model\IsCaptchaEnabledInterface;
use Magento\ReCaptchaUi\Model\ValidationConfigResolverInterface;
use Magento\ReCaptchaValidationApi\Api\Data\ValidationConfigInterface;
use Magento\ReCaptchaWebapiApi\Api\Data\EndpointInterface;
use Magento\ReCaptchaWebapiApi\Api\WebapiValidationConfigProviderInterface;

/**
 * @inheritdoc
 */
class WebapiConfigProvider implements WebapiValidationConfigProviderInterface
{
    private const PAYMENT_CAPTCHA_ID = 'barwenock_payment';

    /**
     * @var IsCaptchaEnabledInterface
     */
    private $isEnabled;

    /**
     * @var ValidationConfigResolverInterface
     */
    private $configResolver;

    /**
     * @param IsCaptchaEnabledInterface $isEnabled
     * @param ValidationConfigResolverInterface $configResolver
     */
    public function __construct(IsCaptchaEnabledInterface $isEnabled, ValidationConfigResolverInterface $configResolver)
    {
        $this->isEnabled = $isEnabled;
        $this->configResolver = $configResolver;
    }

    /**
     * @inheritDoc
     */
    public function getConfigFor(EndpointInterface $endpoint): ?ValidationConfigInterface
    {
        if ($endpoint->getServiceClass() === 'Barwenock\Payment\Api\PaymentInterface') {
            if ($this->isEnabled->isCaptchaEnabledFor(self::PAYMENT_CAPTCHA_ID)) {
                return $this->configResolver->get(self::PAYMENT_CAPTCHA_ID);
            }
        }

        return null;
    }
}
