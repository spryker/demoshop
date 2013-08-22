<?php
/**
 * @property Sao_Zed_Mail_Component_Facade $facadeMail
 */
class Sao_Zed_Sandbox_Module_Controller_Index extends ProjectA_Zed_Library_Controller_Action implements
    ProjectA_Zed_Mail_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Payment_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Mail_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Payment_Component_Dependency_Facade_Trait;

    public function preDispatch()
    {
        if (ProjectA_Shared_Library_Environment::isNotDevelopment()) {
            throw new ProjectA_Zed_Library_Exception('Sandbox is for development only!');
        }
    }

    public function controllerAction()
    {
        $directoryHelper = new ProjectA_Zed_Library_Helper_Directory();


        $filePaths = $directoryHelper->getFiles(APPLICATION_PROJECT . '/Zed/application');
        $currentModule = '';
        foreach ($filePaths as $fileName) {

            if (strpos($fileName, 'Controller') !== false) {
                try {
                    require_once $fileName;
                    $refl = new ReflectionClass($this->getClassName($fileName));
                    $methods = $refl->getMethods();

                    $extName = $refl->getParentClass()->getName();

                    /* TODO REST Controller */

                    $className = $refl->getName();
                    $expl = explode('_', $className);
                    $module = current($expl);
                    $controller = end($expl);

                    if ($currentModule != $module) {
                        echo '<hr /><h1>'.$module.'</h1>';
                        $currentModule = $module;
                    }

                    $Methods = count($methods);

                    echo '<pre><br /><b>' . $className . '</b> extends ' . $extName . '<ul>';

                    foreach ($methods as $method) {
                        /* @var $method ReflectionMethod */

                        $methodName = $method->getName();

                        if ($method->isPublic() !== true) {
                            continue;
                        }

                        if (strpos($methodName, 'Action') === false) {
                            continue;
                        }

                        $params = $method->getParameters();


                        $paramNames = array();
                        if (!empty($params)) {
                            foreach ($params as $param) {
                                /* @var $param ReflectionParameter */

                                $paramClass = $param->getClass();
                                if (is_object($paramClass)) {
                                    $paramNames[] = $paramClass->getName();
                                } else {
                                    $paramNames[] = $param->getName();
                                }
                            }
                        }


                        echo '<li style="margin-bottom:5px">' . $methodName . '(' . implode(',', $paramNames) . ')</li>';

                    }
                    echo '</ul>';
                } catch (Exception $e) {
                }
            }
        }


        die;

    }

    protected function getClassName($path)
    {
        $code = file_get_contents($path);
        $this->openFiles[$path] = $code;
        $tokens = token_get_all($code);

        $classDetected = false;
        foreach ($tokens as $token) {
            if (empty($token[1])) {
                continue;
            }
            $value = trim($token[1]);
            if ($value === 'class') {
                $classDetected = true;
                continue;
            }

            if ($classDetected && !empty($value)) {
                return $value;
            }
        }
        return false;
    }

    public function storeAction()
    {
        $facade = $this->facadePayment->getFacadeForProvider();
    }

    public function stompSendAction()
    {
        $conf = array(
            'host' => '127.0.0.1',
            'port' => '61613',
            'login' => 'system',
            'passcode' => 'manager',
            'vhost' => '/',
        );


        try {
            $stomp = new FuseSource\Stomp\Stomp('tcp://localhost:61613');
            $start = time();
            $stomp->connect();
            for ($i = 0; $i < 10; $i++) {
                $message = 'test' . time();
                $stomp->send('queue/foo', $message, array('persistent' => 'true'));
            }
            $end = time();

            echo $end - $start;

        } catch (FuseSource\StompException $e) {
            die('Connection failed: ' . $e->getMessage());
        }


        die('asdf');
    }
}
