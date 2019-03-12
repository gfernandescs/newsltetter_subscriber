<?php
class Gfernandescs_Subscriber_Model_Observer
{
        /**
     * @param Varien_Event_Observer $observer
     */
    public function saveAdditionalData(Varien_Event_Observer $observer)
    {
        $subscriber  = $observer->getSubscriber();
        $subscriber_firstname  = Mage::app()->getRequest()->getParam('subscriber_firstname');
        $subscriber_phone = Mage::app()->getRequest()->getParam('subscriber_phone');

        $subscriber->setSubscriber_firstname($subscriber_firstname);
        $subscriber->setSubscriber_phone($subscriber_phone);
    }

    /**
     * @param Varien_Event_Observer $observer
     */
    public function addGridColumn(Varien_Event_Observer $observer)
    {
        $block = $observer->getBlock();
        if ($block && $block instanceof Mage_Adminhtml_Block_Newsletter_Subscriber_Grid) {
            /** @var Mage_Adminhtml_Block_Newsletter_Subscriber_Grid $block */
            $block->addColumnAfter('subscriber_firstname', array(
                'header'    => 'Nome',
                'type'      => 'text',
                'index'     => 'subscriber_firstname'
            ), 'type');

            $block->addColumnAfter('subscriber_phone', array(
                'header'    => 'Telefone',
                'type'      => 'text',
                'index'     => 'subscriber_phone'
            ), 'subscriber_firstname');

        }
    }
}