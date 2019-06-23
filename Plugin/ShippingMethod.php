<?php

namespace EasyAndFaster\AdminShipping\Plugin;

class ShippingMethod extends \Magento\Quote\Model\Quote\Address
{

    public function getShippingRatesCollection()
    {

        if (null === $this->_rates) {
            $this->_rates = $this->_rateCollectionFactory->create()->setAddressFilter($this->getId());
            if ($this->getId()) {
                foreach ($this->_rates as $rate) {
                    $rate->setAddress($this);
                }
            }
        }

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $helper = $objectManager->create('EasyAndFaster\AdminShipping\Helper\Data');

        $removeRates = [];

        if ($helper->getIsEnable()) {
            $methods = $helper->getShippingMethod();

            $shippingMethod = explode(',', $methods);

            $display = $helper->getDisplay();

            if ($display == 1) {
                foreach ($this->_rates as $key => $rate) {
                    if (!(in_array($rate->getCarrier(), $shippingMethod))) {
                          $removeRates[] = $key;
                    }
                }
            } else {
                foreach ($this->_rates as $key => $rate) {
                    if ((in_array($rate->getCarrier(), $shippingMethod))) {
                          $removeRates[] = $key;
                    }
                }
            }

            foreach ($removeRates as $key) {
                $this->_rates->removeItemByKey($key);
            }
        }
        return $this->_rates;
    }
}
