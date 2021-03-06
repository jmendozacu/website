<?php
class Ves_Parallax_Model_Mysql4_Banner_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract {
    /**
     * Constructor method
     */
    protected function _construct() {
        $this->_init('ves_parallax/banner');
    }
    /**
     * Add Filter by store
     *
     * @param int|Mage_Core_Model_Store $store
     * @return Ves_Slider_Model_Mysql4_Brand_Collection
     */
    public function addStoreFilter($store) {
        if (!Mage::app()->isSingleStoreMode()) {
            if ($store instanceof Mage_Core_Model_Store) {
                $store = array($store->getId());
            }

            $this->getSelect()->join(
                    array('store_table' => $this->getTable('ves_parallax/banner_store')),
                    'main_table.banner_id = store_table.banner_id',
                    array()
                    )
                    ->where('store_table.store_id in (?)', array(0, $store))
                    ->group('main_table.banner_id');
            return $this;
        }
        return $this;
    }

    /**
     * After load processing - adds store information to the datasets
     *
     */
    protected function _beforeLoad()
    {
       $store_id = Mage::app()->getStore()->getId();
       if($store_id){
         $this->addStoreFilter($store_id);
       }
       
       parent::_beforeLoad();
    }
    
    /**
     * Add Filter by status
     *
     * @param int $status
     * @return Ves_Slider_Model_Mysql4_Banner_Collection
     */
    public function addEnableFilter($status = 1) {
        $this->getSelect()->where('main_table.is_active = ?', $status);
        return $this;
    }
}