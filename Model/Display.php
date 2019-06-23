<?php
namespace EasyAndFaster\AdminShipping\Model;
  
use \Magento\Framework\App\Config\ScopeConfigInterface;
use \Magento\Shipping\Model\Config;
  
class Display extends \Magento\Framework\DataObject implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
            [
                'value' => 0,
                'label' => __('Hide'),
            ],
            [
                'value' => 1,
                'label' => __('Show'),
            ]
        ];
    }
}
