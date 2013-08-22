<?php

class Sao_Zed_AclDE_Component_Gui_Form_User extends ProjectA_Zed_Acl_Component_Gui_Form_User
{

    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    const ROLE_GUEST = 'guest';

    /**
     * @var Generated_Zed_Acl_Component_Factory
     */
    protected $factory;

    public function initAfterDependencyInjection()
    {
        $firstName = new ProjectA_Zed_Library_Form_Element_Text('firstname');
        $firstName->setLabel('Firstname DE')
            ->setRequired(true);
        $this->addElement($firstName);

        $lastName = new ProjectA_Zed_Library_Form_Element_Text('lastname');
        $lastName->setLabel('Lastname DE')
            ->setRequired(true);
        $this->addElement($lastName);

        $email = new ProjectA_Zed_Library_Form_Element_Text('email');
        $email->setLabel('Email DE')
            ->setRequired(true);
        $this->addElement($email);

        $userName = new ProjectA_Zed_Library_Form_Element_Text('username');
        $userName->setLabel('Username')
            ->setRequired(true);
        $this->addElement($userName);

        $password = new ProjectA_Zed_Library_Form_Element_Password('password');
        $password->setLabel('Password')
            ->setDescription('For new user: If empty, a random one will be generated.');
        $this->addElement($password);

        $fkRole = new ProjectA_Zed_Library_Form_Element_Select('fk_acl_role');
        $fkRole->setLabel('Role')
            ->addMultiOptions($this->getRoles())
            ->setRequired(true);
        $this->addElement($fkRole);

        $saveButton = new ProjectA_Zed_Library_Form_Element_Submit('save');
        $this->addElement($saveButton);
    }

    /**
     * @return array
     */
    protected function getRoles()
    {
        $query = new ProjectA_Zed_Acl_Persistence_PacAclRoleQuery();
        $query->addAscendingOrderByColumn(ProjectA_Zed_Acl_Persistence_PacAclRolePeer::NAME);
        $rolesMultiOptions = array(null => 'select');
        /* @var $role ProjectA_Zed_Acl_Persistence_PacAclRole */
        foreach ($query->find() as $role) {
            if ($role->getName() === self::ROLE_GUEST) {
                continue;
            }
            $rolesMultiOptions[$role->getPrimaryKey()] = $role->getName();
        }
        return $rolesMultiOptions;
    }

    /**
     * @param array $values
     * @return void|Zend_Form
     */
    public function populate(array $values)
    {
        if (isset($values['password'])) {
            unset($values['password']);
        }
        parent::populate($values);
    }
}
