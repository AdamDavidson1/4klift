<?php

/*
 * MIT License
 *
 * Copyright (c) 2017 Deasil Works, Inc
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace deasilworks\cef\StatementBuilder;

use deasilworks\cef\StatementBuilder;

/**
 * Class Update.
 */
class Update extends StatementBuilder
{
    /**
     * @var string
     */
    protected $type = 'UPDATE';

    /**
     * @var array
     */
    protected $columValueMap = [];

    /**
     * @var array
     */
    protected $where = [];

    /**
     * @var bool
     */
    protected $ifExists = false;

    /**
     * To String.
     */
    public function __toString()
    {
        return $this->getStatement();
    }

    /**
     * @return string
     */
    public function getStatement()
    {
        $cql = '';

        $cql .= $this->getType().' '.$this->getFrom().' SET '.$this->getColValMap();

        if ($where = $this->getWhere()) {
            $cql .= ' WHERE '.$where;

            if ($this->isIfExists()) {
                $cql .= ' IF EXISTS';
            }
        }

        return $cql;
    }

    /**
     * @return string | null
     */
    public function getColValMap()
    {
        $setString = null;

        foreach ($this->columValueMap as $col => $val) {
            $setString ? $setString .= ', ' : false;

            if (is_string($val)) {
                $val = '\''.str_replace("'", "''", $val).'\'';
            }

            $setString .= $col.' = '.$val;
        }

        return $setString;
    }

    /**
     * @param array $columValueMap
     *
     * @return Update
     */
    public function setColValMap($columValueMap)
    {
        $this->columValueMap = $columValueMap;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return Update
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getWhere()
    {
        $whereString = implode(' and ', $this->where);

        return $whereString;
    }

    /**
     * @param array $where
     *
     * @return Update
     */
    public function setWhere($where)
    {
        $this->where = $where;

        return $this;
    }

    /**
     * @return bool
     */
    public function isIfExists()
    {
        return $this->ifExists;
    }

    /**
     * @param bool $ifExists
     *
     * @return Update
     */
    public function setIfExists($ifExists)
    {
        $this->ifExists = $ifExists;

        return $this;
    }
}
