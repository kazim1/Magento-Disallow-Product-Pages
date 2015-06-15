<?php
/*
Developer: Ali Kazim
*/

class Poly_Restrict_Model_Observer {
    
    /*
    * Restrict product listing page for non loggedin users
    * @param $observer object
    * @return null
    */
    
    public function restrictListing( $observer ) {
        
        if( Mage::helper('restrict')->getConfig('hide_listing') && !Mage::helper('customer')->isLoggedIn() ) {
            Mage::app()->getFrontController()->getResponse()->setRedirect(Mage::getUrl('customer/account/login'))->sendResponse();
            exit();
        }
    }
    
    /*
    * Restrict product view page for non loggedin users
    * @param $observer object
    * @return null
    */
    
    public function restrictView( $observer ) {
        
        if( Mage::helper('restrict')->getConfig('hide_view') && !Mage::helper('customer')->isLoggedIn() ) {
            Mage::app()->getFrontController()->getResponse()->setRedirect(Mage::getUrl('customer/account/login'))->sendResponse();
            exit();
        }
    }
    
    /*
    * Hide pricing for list and view pages non loggedin users
    * @param $observer object
    * @return null
    */
    
    public function hidePrice( $observer ) {
        
        if( $observer->getEvent()->getBlock()->getType() != 'catalog/product_price' ) return;
        
        if( !Mage::helper('customer')->isLoggedIn() && Mage::helper('restrict')->getConfig('hide_price') ) {
            $observer->getEvent()->getBlock()->setTemplate('restrict/hideprice.phtml');
        }
    }
}