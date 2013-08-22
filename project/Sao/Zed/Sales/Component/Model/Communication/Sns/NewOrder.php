<?php

class Sao_Zed_Sales_Component_Model_Communication_Sns_NewOrder
    implements ProjectA_Zed_Catalog_Component_Dependency_Facade_Interface, Sao_Zed_Aws_Component_Dependency_Facade_Interface
{
    use ProjectA_Zed_Catalog_Component_Dependency_Facade_Trait;
    use Sao_Zed_Aws_Component_Dependency_Facade_Trait;

    /** @var  $entity ProjectA_Zed_Sales_Persistence_PacSalesOrderItem */
    protected $entity;

    /**
     * @throws Exception
     */
    protected function getMessage()
    {
        throw new Exception('not implemented yet');
    }

    /**
     * @return string
     */
    protected function getTopic()
    {
        return 'new_order';
    }

    /**
     * @return null
     */
    protected function getSubject()
    {
        return null;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $entity
     * @return string
     */
    public function send(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $entity)
    {
        $this->entity = $entity;

        $subject = $this->getSubject();
        $message = $this->getMessage();
        $topic = $this->getTopic();

        return $this->facadeAws->publishSnsMessage($topic, $message, $subject);
    }

}