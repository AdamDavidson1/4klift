<?php

namespace deasilworks\cef\test\Collection;

use deasilworks\cef\ResultContainer;
use deasilworks\cef\test\Model\UserModel;

/**
 *
 * @package deasilworks\cef\test\Collection
 */
class UserCollection extends ResultContainer
{
    /**
     * Overridden to customize Model Class.
     *
     * @var string
     */
    protected $valueClass = UserModel::class;

}