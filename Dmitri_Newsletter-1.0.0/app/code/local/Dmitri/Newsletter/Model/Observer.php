<?php
/**
 * @category    Mage
 * @package     Dmitri_Newsletter
 * @copyright  Copyright (c) 2006-2017 X.commerce, Inc. and affiliates (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Newsletter subscribe controller
 *
 * @category    Mage
 * @package     Dmitri_Newsletter
 * @author      Tarun  <tarun.vishnoi@bluethink.in>
 */
class Dmitri_Newsletter_Model_Observer
{
    public function newsletterSubscriberSave($observer)
    {
        $subscriber = $observer->getEvent()->getSubscriber();
        $name = Mage::app()->getRequest()->getParam('subscribername');
        $subscriber->setSubscriberName($name);

        return $this;
    }

    public function blockCreateAfter(Varien_Event_Observer $observer)
    {
        $block = $observer->getBlock();

        if ($block instanceof Mage_Adminhtml_Block_Newsletter_Subscriber_Grid) {
            $block->addColumnAfter('subscriber_name',
                array(
                    'header' => Mage::helper('newsletter')->__('Subscriber Name'),
                    'index' => 'subscriber_name'
                ),
                'status'
            );
        }
    }
}