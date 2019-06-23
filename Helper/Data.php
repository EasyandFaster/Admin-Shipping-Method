<?php
namespace EasyAndFaster\AdminShipping\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{

    const MODULE_ENABLE = 'easyandfaster_adminshipping/general/enabled';

    const SHIPPINGMETHOD = 'easyandfaster_adminshipping/general/adminshipping';

    const SHIPPINGMETHODSHOW = 'easyandfaster_adminshipping/general/adminshipping_display';

    public function __construct(
        \Magento\Framework\App\Helper\Context $context
    ) {
        parent::__construct($context);
    }
    public function getIsEnable()
    {
        return $this->scopeConfig->getValue(
            self::MODULE_ENABLE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
    public function getShippingMethod()
    {
        return $this->scopeConfig->getValue(
            self::SHIPPINGMETHOD,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
    public function getDisplay()
    {
        return $this->scopeConfig->getValue(
            self::SHIPPINGMETHODSHOW,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}
