<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>, Daniel Tschinder <daniel.tschinder@project-a.com>, Robert Hänsel
 * @property Nu3_Feed_Facade $facadeFeed
 */
class Sao_Zed_Feed_Module_Controller_Cronjob extends ProjectA_Zed_Feed_Module_Controller_Cronjob implements
    ProjectA_Zed_Feed_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Feed_Component_Dependency_Facade_Trait;

    /**
     * this function calls all others
     * call it from shell (don't call it as a cronjob!)
     */
    public function generateAllAction()
    {
        $reflectionClass = new ReflectionClass(get_class($this));

        $methods = $reflectionClass->getMethods(ReflectionMethod::IS_PUBLIC);

        foreach ($methods as $method) {
            /* @var $method ReflectionMethod */
            if (!strpos($method->getName(), 'Action') || $method->getName() == 'generateAllAction') {
                continue;
            }

            $controllerMethod = substr($method->getName(), 0, strpos($method->getName(), 'Action'));
            echo "Generate " . $controllerMethod . ' ... ';
            $this->{$method->getName()}();
            echo " ... DONE!" . PHP_EOL;


        }

        $this->handleResult(array('voller Erfolg!"')); // dt: rofl
    }

    public function genericAction()
    {
        $result = $this->facadeFeed->generateGenericFeed();
        $this->addSummary(self::CREATE_FEED, Nu3_Feed_Settings::FEED_GENERIC);
        $this->handleResult($result);
    }

    public function googleBaseAction()
    {
        $result = $this->facadeFeed->generateGoogleBaseFeed();
        $this->addSummary(self::CREATE_FEED, Nu3_Feed_Settings::FEED_GOOGLE_BASE);
        $this->handleResult($result);
    }

    public function affiliateAction()
    {
        $result = $this->facadeFeed->generateAffiliateFeed();
        $this->addSummary(self::CREATE_FEED, Nu3_Feed_Settings::FEED_AFFILIATE);
        $this->handleResult($result);
    }

    public function retargetingAction()
    {
        $result = $this->facadeFeed->generateRetargetingFeed();
        $this->addSummary(self::CREATE_FEED, Nu3_Feed_Settings::FEED_RETARGETING);
        $this->handleResult($result);
    }

    public function semAction()
    {
        $result = $this->facadeFeed->generateSemFeed();
        $this->addSummary(self::CREATE_FEED, Nu3_Feed_Settings::FEED_SEM);
        $this->handleResult($result);
    }

    public function socioManicAction()
    {
        $result = $this->facadeFeed->generateSocioManicFeed();
        $this->addSummary(self::CREATE_FEED, Nu3_Feed_Settings::FEED_SOCIOMANIC);
        $this->handleResult($result);
    }

    public function soqueroAction()
    {
        $result = $this->facadeFeed->generateSoqueroFeed();
        $this->addSummary(self::CREATE_FEED, Nu3_Feed_Settings::FEED_SOQUERO);
        $this->handleResult($result);
    }

    public function zanoxAction()
    {
        $result = $this->facadeFeed->generateZanoxFeed();
        $this->addSummary(self::CREATE_FEED, Nu3_Feed_Settings::FEED_ZANOX);
        $this->handleResult($result);
    }
}
