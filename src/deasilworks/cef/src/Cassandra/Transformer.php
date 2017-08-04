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

namespace deasilworks\CEF\Cassandra;

use Cassandra\Timestamp;

/**
 * Class Transformer.
 *
 * Responsible for transforming data returned by Cassandra
 * into a hash data structure suitable for later marshalling to
 * a CEF EntityModel.
 */
class Transformer
{
    /**
     * Transform Cassandra Rows.
     *
     * @param \Cassandra\Rows $rows
     *
     * @return array
     */
    public function transformRows(\Cassandra\Rows $rows)
    {
        // @todo add this to implementing class
        //$resultContainer->setArguments($this->previousArguments);
        //$resultContainer->setStatement((string) $this->getSb());

        $entries = [];

        // page through all results and transform as we go
        while (true) {
            while ($rows->valid()) {

                // transform
                $entry = $this->transform($rows->current());

                if ($entry) {
                    array_push($entries, $entry);
                }

                $rows->next();
            }

            if ($rows->isLastPage()) {
                break;
            }

            $rows = $rows->nextPage();
        }

        return $entries;
    }

    /**
     * @param Timestamp $timestamp
     *
     * @return mixed
     */
    protected function handleTimestamp(Timestamp $timestamp)
    {
        return $timestamp->time();
    }

    /**
     * @param $row
     *
     * @return mixed
     */
    protected function transform($row)
    {
        // loop through the object keys and normalize
        $entry = [];

        if (is_object($row) && get_class($row) == 'Cassandra\\Map') {
            /** @var \Cassandra\Map $row */
            $keys = $row->keys();
            $data = [];
            foreach ($keys as $key) {
                $data[(string) $key] = $row->offsetGet($key);
            }
            $row = $data;
        }

        $handlerMap = [
            'Cassandra\\Timestamp' => function ($value) {
                return $this->handleTimestamp($value);
            },
            'Cassandra\\UserTypeValue' => function ($value) {
                return $this->transform($value);
            },
            'Cassandra\\Map' => function ($value) {
                return $this->transform($value);
            },
            'Cassandra\\Set' => function ($value) {
                return $this->transform($value);
            },
        ];

        foreach ($row as $key => $value) {

            // if it's not an object just assign it
            if (!is_object($value)) {
                $entry[$key] = $value;

                continue;
            }

            // it's an object so let's get the class
            $class = get_class($value);

            // it this a Cassandra object?
            if (array_key_exists($class, $handlerMap)) {
                $entry[$key] = $handlerMap[$class];

                continue;
            }

            // it's an object but not a known cassandra object so let
            // the hydrator deal with it.

            $entry[$key] = $value;
        }

        return $entry;
    }
}
