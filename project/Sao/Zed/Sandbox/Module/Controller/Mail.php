<?php
/**
 * @property Sao_Zed_Mail_Component_Facade $facadeMail
 */
class Sao_Zed_Sandbox_Module_Controller_Mail extends ProjectA_Zed_Library_Controller_Action implements
    ProjectA_Zed_Mail_Component_Dependency_Facade_Interface,
    Sao_Zed_Mail_Component_Model_Constants
{
    use ProjectA_Zed_Mail_Component_Dependency_Facade_Trait;

    public function preDispatch()
    {
        if (ProjectA_Shared_Library_Environment::isNotDevelopment()) {
            throw new ProjectA_Zed_Library_Exception('Sandbox is for development only!');
        }
    }

    /**
     * the template render shall be used e.g. in the SendMail Provider Model
     * to build the subject, text, html parts of the email
     */
    public function templateRenderAction()
    {
        header('Content-Type:text/html;charset=utf-8');

        $template = $this->_getParam('template', null);
        if (!$template) {
            $out = 'Missing Parameter "template"' . PHP_EOL;
            $out.= 'You may also use the "data" Parameter containing a json string' . PHP_EOL;
            $out.= '?template=order_confirmation&data={"replyEmail":"lalalcheckööööö"}"' . PHP_EOL;
            die(nl2br($out));
        }

        $replaceVars = $this->_getParam('data', array());
        if ($replaceVars) {
            $replaceVars = json_decode($replaceVars, true);
        }

        //load template
        $templateEntity = $this->facadeMail->getTemplateByName($template);
        if (!$templateEntity) {
            die('Template "' . $template . '" not found.');
        }

        //subject
        $subject = $this->facadeMail->renderTemplate(
            $templateEntity,
            $replaceVars,
            Sao_Zed_Mail_Component_Model_Template::RENDER_SUBJECT
        );

        //subject
        $html = $this->facadeMail->renderTemplate(
            $templateEntity,
            $replaceVars,
            Sao_Zed_Mail_Component_Model_Template::RENDER_HTML
        );

        //text
        $text = $this->facadeMail->renderTemplate(
            $templateEntity,
            $replaceVars,
            Sao_Zed_Mail_Component_Model_Template::RENDER_TEXT
        );

        Zend_Debug::dump($replaceVars, 'replaceVars');
        echo "<hr /><hr />";
        Zend_Debug::dump($subject, 'subject');
        echo "<hr /><hr />";
        Zend_Debug::dump($html, 'html');
        echo "<hr /><hr />";
        Zend_Debug::dump($text, 'text');
        die();
    }

    /**
     * migrate old templates from legacy platform to new template table
     */
    public function migrationAction()
    {
        $migration = new Sao_Zed_Mail_Component_Internal_Migration_Template();
        $migration->migrateTemplates();
        die('finished');
    }

    /**
     * run sql script to add templates
     */
    public function installAction()
    {
        $install = new Sao_Zed_Mail_Component_Internal_Install();
        $install->installFromSql();
        die('finished');
    }

    public function createAbandonedMailAction()
    {
        $queueMail = $this->_getParam('queue', null);
        $template = $this->_getParam('template', null);
        $userId = $this->_getParam('userId', 1);

        if (!$template) {
            die('you need to define a "template" to use');
        }

        $filterChain = new Zend_Filter();
        $filterChain->addFilter(new Zend_Filter_Word_UnderscoreToCamelCase());
        $filterChain->addFilter(new Zend_Filter_Word_SeparatorToSeparator('_', ''));

        $templateFacadeMethod  = 'get' . $filterChain->filter($template) . 'MailTransfer';

        /* @var Sao_Zed_Cart_Persistence_SaoCartUser $saoCartUserEntity */
        $saoCartUserEntity = (new Sao_Zed_Cart_Persistence_SaoCartUserQuery())->findOneByUserId($userId);
        if ($saoCartUserEntity) {
            $cartUser = $saoCartUserEntity->getCartUser();
            $mailTransfer = $this->facadeMail->{$templateFacadeMethod}($cartUser);

            $params = [
                'template' => $template,
                'data' => json_encode($mailTransfer->toArray())
            ];

            if ($queueMail) {
                $result = $this->facadeMail->sendMail($mailTransfer);
            }

            $this->_forward('template-render', 'mail', 'sandbox', $params);
        } else {
            die('could not find any cart for user_id: ' . $userId);
        }
    }

}
