<?php

namespace MartinCamen\GetANewsletter\Modules\Attributes;

use MartinCamen\GetANewsletter\Connector\ApiConnector;

class Attributes extends ApiConnector
{
    /**
     * @param array $data
     * @param bool $asCollection
     * @return mixed
     */
    public function get(array $data = [], bool $asCollection = true)
    {
        return $this->callWithOptionalReturn('get', 'attributes', $data, $asCollection);
    }

    /**
     * @param string $name
     * @param array $data
     * @param bool $asCollection
     * @return mixed
     */
    public function create(string $name, array $data = [], bool $asCollection = true)
    {
        $data = array_merge(
            ['name' => $name],
            $data
        );

        return $this->callWithOptionalReturn('post', 'attributes', $data, $asCollection);
    }

    /**
     * @param string $name
     * @param string $code
     * @param bool $asCollection
     * @return mixed
     */
    public function update(string $name, string $code, bool $asCollection = true)
    {
        $data = [
            'name' => $name,
        ];

        return $this->callWithOptionalReturn('patch', "attributes/$code", $data, $asCollection);
    }

    /**
     * @param string $code
     * @return mixed
     */
    public function delete(string $code)
    {
        return $this->callWithOptionalReturn('delete', "attributes/$code");
    }
}
