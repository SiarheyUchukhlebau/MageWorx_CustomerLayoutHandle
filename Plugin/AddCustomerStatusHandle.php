<?php
/**
 * Copyright © MageWorx. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace MageWorx\CustomerLayoutHandle\Plugin;


class AddCustomerStatusHandle
{
    /**
     * @var \Magento\Customer\Model\Session
     */
    private $customerSession;

    /**
     * AddCustomerStatusHandle constructor.
     *
     * @param \Magento\Customer\Model\Session $session
     */
    public function __construct(
        \Magento\Customer\Model\Session $session
    ) {
        $this->customerSession = $session;
    }

    /**
     * @param \Magento\Framework\View\Result\Layout $subject
     * @param \Magento\Framework\View\Result\Layout $result
     * @return \Magento\Framework\View\Result\Layout
     */
    public function afterAddDefaultHandle(
        \Magento\Framework\View\Result\Layout $subject,
        \Magento\Framework\View\Result\Layout $result
    )
    {
        if ($this->customerSession->getCustomerId()) {
            $result->addHandle('customer_logged_in');
        } else {
            $result->addHandle('customer_logged_out');
        }

        return $result;
    }
}
