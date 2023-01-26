<?php
/**
 * Copyright © Mucan All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Mucan\OrderDetails\Plugins;

use Magento\Quote\Model\ShippingAddressManagement;
use Magento\Quote\Api\Data\AddressInterface;
use Psr\Log\LoggerInterface as Logger;

/**
 * Class ShippingAddressManagementPlugin
 */
class ShippingAddressManagementPlugin
{
    /**
     * @var Logger
     */
    protected Logger $logger;

    /**
     * @param Logger $logger
     */
    public function __construct(
        Logger $logger
    )
    {
        $this->logger = $logger;
    }

    /**
     * @param ShippingAddressManagement $subject
     * @param $cartId
     * @param AddressInterface $address
     * @return void
     */
    public function beforeAssign(
        ShippingAddressManagement $subject,
                                  $cartId,
        AddressInterface          $address
    )
    {
        $extAttributes = $address->getExtensionAttributes();
        if ($extAttributes->getNearestLandmark() !== null) {
            try {
                $address->setNearestLandmark($extAttributes->getNearestLandmark());
            } catch (\Exception $e) {
                $this->logger->critical($e->getMessage());
            }
        }
    }
}
