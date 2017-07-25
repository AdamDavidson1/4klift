<?php

namespace deasilworks\cef\test\Collection;

use deasilworks\cef\ResultContainer;
use deasilworks\cef\test\Model\UserModel;

class UserCollection extends ResultContainer
{
    /**
     * Overridden to customize Model Class.
     *
     * @var string
     */
    protected $valueClass = UserModel::class;
}
