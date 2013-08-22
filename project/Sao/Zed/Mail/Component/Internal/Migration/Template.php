<?php
/**
 * @version $Id$
 */
class Sao_Zed_Mail_Component_Internal_Migration_Template
{
    const LOCAL_LEGACY_DB = 'sao_legacy';
    const LEGACY_NOTIFICATIONS_TABLE = 'notifications';

    const KEY_NAME = 'name';
    const KEY_SUBJECT = 'subject';
    const KEY_TEXT = 'text';
    const KEY_HTML = 'html';
    const KEY_DELETED = 'deleted';

    /**
     * migrate old templates from legacy platform to new template table
     * !
     */
    public function migrateTemplates()
    {
        $db = Propel::getConnection();
        $res = $db->query('SELECT * FROM ' . self::LOCAL_LEGACY_DB . '.' . self::LEGACY_NOTIFICATIONS_TABLE);
        $templates = $res->fetchAll(PDO::FETCH_ASSOC);
        $created = $updated = 0;
        foreach ($templates as $template) {

            $replacedSubjectPlaceholder = $this->replacePlaceholder($template[self::KEY_SUBJECT]);
            $replacedTextPlaceholder = $this->replacePlaceholder($template[self::KEY_TEXT]);
            $replacedHtmlPlaceholder = $this->replacePlaceholder($template[self::KEY_HTML]);

            $templateQuery = new Sao_Zed_Mail_Persistence_SaoMailTemplateQuery();
            $templateQuery->filterByName($template[self::KEY_NAME]);
            $templateEntity = $templateQuery->findOneOrCreate();

            if ($templateEntity->isNew()) {
                $templateEntity->setSubject($replacedSubjectPlaceholder);
                $templateEntity->setText($replacedTextPlaceholder);
                $templateEntity->setHtml($replacedHtmlPlaceholder);
                $templateEntity->setDeleted($template[self::KEY_DELETED]);
                $templateEntity->setVersionCreatedBy($this->getCurrentUsername());
                $templateEntity->save();
                $created++;
            } else {
                $templateEntity->setSubject($replacedSubjectPlaceholder);
                $templateEntity->setText($replacedTextPlaceholder);
                $templateEntity->setHtml($replacedHtmlPlaceholder);
                $templateEntity->setDeleted($template[self::KEY_DELETED]);
                $templateEntity->setVersionCreatedBy($this->getCurrentUsername());
                if ($templateEntity->isModified()) {
                    $templateEntity->save();
                    $updated++;
                }
            }
        }
        echo 'Created: ' . $created . ' new templates<br />';
        echo 'Updated: ' . $updated . ' templates<br />';
    }

    /**
     * @param string $content
     * @return string
     */
    protected function replacePlaceholder($content)
    {
        return preg_replace('/@([a-zA-Z]+)/', '{%$1}', $content);
    }

    /**
     * @return string
     */
    protected function getCurrentUsername()
    {
        $username = 'noAuth';
        $user = ProjectA_Zed_Auth_Component_Model_Auth::getInstance()->getCurrentUser();
        if ($user instanceof ProjectA_Zed_Acl_Persistence_PacAclUser) {
            $username = $user->getUsername();
        }
        return $username;
    }
}
