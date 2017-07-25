<?php

namespace deasilworks\cef\test\Collection;

use deasilworks\cef\ResultContainer;
use deasilworks\cef\test\Model\LocalModel;

class LocalCollection extends ResultContainer
{
    /**
     * Overridden to customize Model Class.
     *
     * @var string
     */
    protected $valueClass = LocalModel::class;
}
