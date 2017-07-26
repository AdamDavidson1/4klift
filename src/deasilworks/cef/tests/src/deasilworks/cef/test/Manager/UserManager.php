<?php

namespace deasilworks\cef\test\Manager;

use deasilworks\cef\EntityManager;
use deasilworks\cef\Statement\Simple;
use deasilworks\cef\StatementBuilder\Select;
use deasilworks\cef\test\Collection\UserCollection;
use deasilworks\cef\test\Model\LocalModel;

class UserManager extends EntityManager
{
    /**
     * A ResultContainer class.
     *
     * @var string
     */
    protected $collectionClass = UserCollection::class;

    /**
     * @var Simple Simple Statement Manger
     */
    protected $ssm;

    /**
     * Get Simple statement manager.
     */
    public function getSimpleStatementManager()
    {
        if (!$this->ssm) {
            /* @var Simple $simple */
            $this->ssm = $this
                ->getStatementManager(Simple::class)
                ->setConfig($this->getConfig());
        }

        return $this->ssm;
    }

    /**
     * Get user by username.
     *
     * @param $username
     * @param $type
     *
     * @return LocalModel
     */
    public function getUserByUsername($username, $type = Select::SELECT_TYPE)
    {
        $ssm = $this->getSimpleStatementManager();

        /** @var Select $stmtBuilder */
        $stmtBuilder = $ssm->getStatementBuilder(Select::class);

        $ssm->setStatement(
            $stmtBuilder->setWhere(['username = :username'])->setType($type)
        )
            ->setArguments(['username' => (string) $username]);

        /** @var \deasilworks\cef\test\Collection\UserCollection $userCollection */
        $userCollection = $ssm->execute();

        /* @var \deasilworks\cef\test\Model\LocalModel $localModel */
        return $userCollection->current();
    }
}
