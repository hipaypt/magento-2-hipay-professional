<?php
namespace Hipay\HipayProfessionalGateway\Observer;

use Magento\Framework\Event\ObserverInterface;

class BeforeOrderPlaceObserver implements ObserverInterface 
{

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $order = $observer->getOrder();
        $payment = $order->getPayment();
		$methodCode = $payment->getMethod();
						
        if ($order->getCanSendNewEmailFlag() && $methodCode == "hipay_professional_gateway")
		{
				$order->setCanSendNewEmailFlag(false);
		}

    }
}
