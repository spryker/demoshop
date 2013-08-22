<?php

/**
 * Class Sao_Zed_Salesrule_Component_Model_CostDistribution
 *
 * @property Sao_Zed_Salesrule_Component_Facade $facadeSalesrule
 */
class Sao_Zed_Salesrule_Component_Model_CostDistribution implements ProjectA_Zed_Library_Dependency_Factory_Interface
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /**
     * @var Sao_Zed_Salesrule_Component_Factory
     */
    protected $factory;

    /**
     * @param ProjectA_Zed_Salesrule_Persistence_PacSalesrule     $salesrule
     * @param Sao_Shared_Sales_Transfer_Discount $transferSalesDiscount
     *
     * @return void
     *
     * @throws LogicException
     */
    public function appendCostDistribution(
        ProjectA_Zed_Salesrule_Persistence_PacSalesrule $salesrule, Sao_Shared_Sales_Transfer_Discount $transferSalesDiscount
    ) {
        $amount = $transferSalesDiscount->getAmount();
        $costDistribution = $this->getCostDistribution($salesrule);

        switch ($costDistribution) {
            case Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::COST_DISTRIBUTION_ARTIST_ALL:
                $artistPercentage = 100;
                $saoPercentage = 0;
                break;
            case Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::COST_DISTRIBUTION_ARTIST_NORMAL:
                $artistPercentage = 50;
                $saoPercentage = 50;
                break;
            case Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::COST_DISTRIBUTION_ARTIST_NONE:
                $artistPercentage = 0;
                $saoPercentage = 100;
                break;
            default:
                throw new LogicException('Received unknown cost_distribution ' . $costDistribution);
        }

        $artistAmount = ProjectA_Shared_Library_Currency::round($amount / 100 * $artistPercentage);
        $saatchiAmount = ProjectA_Shared_Library_Currency::round($amount / 100 * $saoPercentage);

        $roundingError = $amount - $artistAmount - $saatchiAmount;
        $saatchiAmount += $roundingError;

        $transferSalesDiscount->setArtistAmount($artistAmount);
        $transferSalesDiscount->setSaatchiAmount($saatchiAmount);

        return;
    }

    /**
     * @param ProjectA_Zed_Salesrule_Persistence_PacSalesrule $salesrule
     *
     * @return string
     */
    protected function getCostDistribution(ProjectA_Zed_Salesrule_Persistence_PacSalesrule $salesrule)
    {
        $entity = $this->factory->getModelSalesrule()->read($salesrule->getIdSalesrule())->getEntity();

        return $entity->getVirtualColumn('cost_distribution');

    }
}