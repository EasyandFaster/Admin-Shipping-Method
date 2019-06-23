<?php
  
namespace EasyAndFaster\AdminShipping\Model;
  
use \Magento\Framework\App\Config\ScopeConfigInterface;
use \Magento\Shipping\Model\Config;
  
class Shippingmethod extends \Magento\Framework\DataObject implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var ScopeConfigInterface
     */
    public $scopeConfig;
    /**
     * @var Config
     */
    public $deliveryModelConfig;
      
    /**
     * @param ScopeConfigInterface $scopeConfig
     * @param Config               $deliveryModelConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        Config $deliveryModelConfig
    ) {
  
        $this->scopeConfig = $scopeConfig;
        $this->deliveryModelConfig = $deliveryModelConfig;
    }
   
    public function toOptionArray()
    {
        $deliveryMethods = $this->deliveryModelConfig->getActiveCarriers();
        $deliveryMethodsArray = [];
        foreach ($deliveryMethods as $shippigCode => $shippingModel) {
            $shippingTitle = $this->scopeConfig->getValue('carriers/'.$shippigCode.'/title');
            $deliveryMethodsArray[$shippigCode] = [
                'label' => $shippingTitle,
                'value' => $shippigCode
            ];
        }
        return $deliveryMethodsArray;
    }
}
