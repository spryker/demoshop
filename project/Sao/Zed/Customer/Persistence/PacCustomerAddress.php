<?php



/**
 * Skeleton subclass for representing a row from the 'pac_customer_address' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.core/Zed/application/components/Pac/Customer/Entity
 */
class ProjectA_Zed_Customer_Persistence_PacCustomerAddress extends Generated_Zed_Customer_Persistence_Om_BasePacCustomerAddress {

    /**
     * check if the address is not used in the customer
     *
     * @param PropelPDO $con
     * @return bool|void
     */
    public function preDelete(PropelPDO $con = null)
    {
        $customer = $this->getCustomer($con);

        if ($customer->getDefaultBillingAddress() == $this->getPrimaryKey())
        {
            $customer->setDefaultBillingAddress(null);
        }

        if ($customer->getDefaultShippingAddress() == $this->getPrimaryKey())
        {
            $customer->setDefaultShippingAddress(null);
        }

        if ($customer->isModified()) {
            $customer->save($con);
        }

        return parent::preDelete($con);
    }
} // ProjectA_Zed_Customer_Persistence_PacCustomerAddress
