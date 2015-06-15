<?php

/*
Developer: Ali Kazim    
*/

class Poly_Restrict_Helper_Data extends Mage_Core_Helper_Abstract {
    
    /*
    * Get store config for Poly Restrict settings
    * @param key string
    * @return value mixed
    */
    
    public function getConfig( $key ) {
        return Mage::getStoreConfig('restrict/general/'.$key);
    }
    
}