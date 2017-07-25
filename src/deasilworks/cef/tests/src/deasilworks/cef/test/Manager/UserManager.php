<?php

namespace deasilworks\cef\test\Manager;

use Cassandra\SimpleStatement;
use deasilworks\cef\EntityManager;
use deasilworks\cef\Statement\Simple;
use deasilworks\cef\test\Collection\UserCollection;
use deasilworks\cef\StatementBuilder\Select;
use deasilworks\cef\test\Model\LocalModel;

class UserManager extends EntityManager
{
    /**
     * A ResultContainer class
     *
     * @var string $collectionClass
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
            /** @var Simple $simple */
            $this->ssm = $this
                ->getStatementManager(Simple::class)
                ->setConfig($this->getConfig());
        }

        return $this->ssm;
    }

    /**
     * Get user by username
     *
     * @param $username
     *
     * @return LocalModel
     */
    public function getUserByUsername($username)
    {
        $ssm = $this->getSimpleStatementManager();

        /** @var Select $stmtBuilder */
        $stmtBuilder = $ssm->getStatementBuilder(Select::class);

        $ssm->setStatement(
            $stmtBuilder->setWhere(['username = :username'])->setType(Select::SELECT_TYPE)
        )
            ->setArguments(['username' => (string) $username]);

        /** @var \deasilworks\cef\test\Collection\UserCollection $userCollection */
        $userCollection = $ssm->execute();

        /** @var \deasilworks\cef\test\Model\LocalModel $localModel */
        return $userCollection->current();
    }
}
