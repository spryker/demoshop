<?php

class Sao_Zed_Sandbox_Module_Controller_Tick extends ProjectA_Zed_Library_Controller_Action
{

    public function preDispatch()
    {
        if (APPLICATION_ENV !== 'development') {
            throw new ProjectA_Zed_Library_Exception('Sandbox is for development only!');
        }
    }


    public function graphAction()
    {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $classes = ProjectA_Shared_Library_Log::getFlashInFile('callgraph.log');

        $c = 0;
        $gv = new ProjectA_Zed_Library_Service_GraphViz();
        foreach ($classes as $class => $callers) {

            if (!$this->ok($class)) continue;

            $class = $this->getNodeName($class);

            // $gv->addNode($class);
            foreach ($callers as $caller => $x) {
                if (!$this->ok($caller)) continue;
                $caller = $this->getNodeName($caller);

                $gv->addEdge(array($caller => $class));
                $c++;
            }

        }

        echo $gv->image();

    }

    protected function getNodeName($class)
    {
        return $class;

        $expl = explode('::', $class);
        return empty($expl[0]) ? $expl[1] : $expl[0];
    }

    protected function ok($class)
    {
        if (strpos($class, '_') === false) {
            return false;
        }

        $blacklist = array(); //array('Zend_', 'BaseEntity_', 'Entity_','ProjectA_Zed_Library_Dependency_Injector');
        foreach ($blacklist as $prefix) {
            if (strpos($class, $prefix) !== false) {
                return false;
            }
        }
        return true;

    }
}