<!--
/**
 * @author Barwenock
 * @copyright Copyright (c) Barwenock
 * @package Payment Captcha for Magento 2
 */
 -->
/* global grecaptcha */
require(
    [
        'jquery'
    ],
    function ($) {
        'use strict';

        // Dynamically add the reCAPTCHA script to the document
        let recaptchaScript = document.createElement('script');
        let googleApiKey = 'YOUR_GOOGLE_RECAPTCHA_SITE_KEY';
        recaptchaScript.src = 'https://www.google.com/recaptcha/api.js?render=' + googleApiKey;
        document.head.appendChild(recaptchaScript);

        // Wait for the reCAPTCHA script to be loaded
        recaptchaScript.onload = function () {
            grecaptcha.ready(function () {
                grecaptcha.execute(googleApiKey, {action: 'submit'}).then(function (token) {
                    $.ajax({
                        url: 'https://magento2.ddev.site/index.php/rest/V1/barwenock/payment-send',
                        type: 'POST',
                        headers: {
                            'x-recaptcha': token // the token is passed in the header
                        },
                        success: function (response) {
                            console.log('Success')
                        },
                        error: function (xhr, status, error) {
                            console.log('Error')
                        }
                    });
                });
            });
        }
    }
);
