<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @property Sao_Zed_Catalog_Component_Factory $factory
 * @version $Id$
 */
class Sao_Zed_Mail_Component_Internal_Install implements ProjectA_Zed_Library_Component_Interface_InstallInterface, ProjectA_Zed_Library_Dependency_Factory_Interface
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    const TEMPLATES_SQL_FILENAME = 'sao_templates.sql';

    /**
     * @return bool
     */
    public function isActive()
    {
        return false;
    }

    /**
     *
     */
    public function install()
    {
    }

    /**
     * ! currently not added to installer facade, but called manually
     *   through Mail Facade
     */
    public function installFromSql()
    {
        $db = Propel::getConnection();
        $dbConfig = ProjectA_Shared_Library_Config::get('db');
        $databaseSrc = $dbConfig->database;

        $eol = $this->isCli() ? PHP_EOL : '<br />';

        //first clear both tables
        echo system('date') . ' clearing template tables...' . $eol;
        $db->exec("DELETE FROM `sao_mail_template_version`; DELETE FROM `sao_mail_template`;");

        //then run sql file
        echo system('date') . ' loading sql file "' . self::TEMPLATES_SQL_FILENAME . '" into templates tables...' . $eol;
        $db->query(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . self::TEMPLATES_SQL_FILENAME));
    }

    /**
     * @return bool
     */
    protected function isCli() {
        if (php_sapi_name() == 'cli' && empty($_SERVER['REMOTE_ADDR'])) {
            return true;
        } else {
            return false;
        }
    }
}
