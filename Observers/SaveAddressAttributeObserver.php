<?php
/**
 * Copyright © Mucan All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Mucan\OrderDetails\Observers;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface as Logger;

/**
 * Class SaveAddressAttributeObserver
 */
class SaveAddressAttributeObserver implements ObserverInterface
{
    /**
     * @var Logger
     */
    protected $logger;

    /**
     * @param Logger $logger
     */
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param Observer $observer
     * @return $this|void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        try {
            $order = $observer->getEvent()->getOrder();
            $quote = $observer->getEvent()->getQuote();
            if ($quote->getBillingAddress()) {
                $order->getBillingAddress()->setNearestLandmark(
                        $quote->getBillingAddress()->getExtensionAttributes()->getNearestLandmark()
                    );
            }
            if (!$quote->isVirtual()) {
                $order->getShippingAddress()->setNearestLandmark($quote->getShippingAddress()->getNearestLandmark());
            }
            $order->save();
        } catch (Exception $e) {
            $this->logger->critical($e->getMessage());
        }
    }
}
