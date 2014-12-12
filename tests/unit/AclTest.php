<?php

use Generated\Shared\Library\TransferLoader;
use Generated\Zed\Acl\Component\AclFactory;
use Generated\Zed\DependencyInjectionContainer;
use ProjectA\Zed\Acl\Component\AclFacade;

class AclTest extends \Codeception\TestCase\Test
{
    const ID_ADMIN = 1;

    /**
     * @var AclFacade
     */
    private $aclFacade;

    protected function setUp()
    {
        parent::setUp();
        $aclFactory = new AclFactory();
        $this->aclFacade = new AclFacade();
        $dependencyContainer = new DependencyInjectionContainer();
        $dependencyContainer->doInjection($this->aclFacade, $aclFactory);
    }

    public function testSaveUser()
    {
        $transferUser = $this->createTransferUser();

        $userEntity = $this->aclFacade->saveUser($transferUser);
        $this->assertTrue($userEntity instanceof ProjectA_Zed_Library_Propel_BaseObject);
        $this->assertTrue($userEntity->getIsNew());

        $transferUser->setIdAclUser($userEntity->getIdAclUser());
        $newName = 'AAAAA' . time();
        $transferUser->setFirstname($newName);
        $userEntity = $this->aclFacade->saveUser($transferUser);
        $this->assertTrue($userEntity->getFirstname() === $newName);
    }

    public function testResetPassword()
    {
        $user = \ProjectA_Zed_Acl_Persistence_PacAclUserQuery::create()->findOneByIdAclUser(self::ID_ADMIN);
        $oldPassword = $user->getPassword();
        $this->aclFacade->resetPassword($user);
        $this->assertNotEquals($oldPassword, $user->getPassword());
    }

    public function testReactivateUser()
    {
        $user = \ProjectA_Zed_Acl_Persistence_PacAclUserQuery::create()->findOneByIdAclUser(self::ID_ADMIN);
        $user->setIsDeleted(true);
        $user->save();

        $this->aclFacade->reactivateUser(self::ID_ADMIN);
        $this->assertFalse($user->getIsDeleted());
    }

    public function testLogin()
    {
        $result = $this->aclFacade->login('aaa', 'bbb');
        $this->assertFalse($result);
    }

    public function testSaveRole()
    {
        $roleTransfer = TransferLoader::loadAclRole();
        $roleTransfer->setName('TestRole');

        $roleEntity = $this->aclFacade->saveRole($roleTransfer);
        $this->assertTrue($roleEntity->getIdAclRole() > self::ID_ADMIN);
    }

    public function testUpdateGroupPrivileges()
    {
        $roleId = 1;
        $enabledGroupIds = [];
        $this->aclFacade->updateGroupPrivileges($roleId, $enabledGroupIds);

        $roleEntity = \ProjectA_Zed_Acl_Persistence_PacAclRoleQuery::create()->findOneByIdAclRole($roleId);
        $privilegeEntities = $roleEntity->getAclGroupPrivileges();
        $this->assertTrue($privilegeEntities->count() === 0);
    }

    public function testSaveGroup()
    {
        $groupTransfer = TransferLoader::loadAclGroup()
            ->setName('TestGroup');

        $groupEntity = $this->aclFacade->saveGroup($groupTransfer);

        $idGroup = $groupEntity->getIdAclGroup();
        $this->assertTrue($groupEntity->getIdAclGroup() > 0);

        $groupTransfer->setIdAclGroup($idGroup);
        $groupTransfer->setName('TestGroupRenames');
        $groupEntity = $this->aclFacade->saveGroup($groupTransfer);
        $this->assertTrue($idGroup === $groupEntity->getIdAclGroup());
    }

    public function testDeleteResource()
    {
        $this->aclFacade->deleteResource(1);
        $ressourceEntity = \ProjectA_Zed_Acl_Persistence_PacAclResourceQuery::create()->findOneByIdAclResource(1);
        $this->assertTrue($ressourceEntity->getIsDeleted());
    }

    public function testSaveResource()
    {
        $resourceTransfer = TransferLoader::loadAclResource()
            ->setBlackList(false)
            ->setFkAclGroup(1)
            ->setPattern('#.*#');

        $resourceEntity = $this->aclFacade->saveResource($resourceTransfer);
        $this->assertTrue($resourceEntity->getIdAclResource() > 0);
    }

    /**
     * @return \Generated\Shared\Acl\Transfer\User
     */
    protected function createTransferUser()
    {
        $transferUser = TransferLoader::loadAclUser()
            ->setFirstname('Max')
            ->setLastname('Muster')
            ->setUsername('max.muster' . time())
            ->setEmail(time() . 'max.muster@spryker.com')
            ->setFkAclRole(1);
        return $transferUser;
    }

}
