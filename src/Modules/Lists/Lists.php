<?php

namespace MartinCamen\GetANewsletter\Modules\Lists;

use Exception;
use MartinCamen\GetANewsletter\Connector\ApiConnector;

class Lists extends ApiConnector
{
    /**
     * @param array $data
     * @param bool $asCollection
     * @return mixed
     */
    public function get(array $data = [], bool $asCollection = true)
    {
        return $this->callWithOptionalReturn('get', 'lists', $data, $asCollection);
    }

    /**
     * @param string $email
     * @param array $data
     * @param bool $asCollection
     * @return mixed
     * @throws Exception
     */
    public function create(array $data, bool $asCollection = true)
    {
        $requiredFields = [
            'email',
            'name',
            'sender',
        ];

        foreach ($requiredFields as $requiredField) {
            if (! array_key_exists($requiredField, $data)) {
                throw new Exception("$requiredField is required when creating a new list.");
            }
        }

        return $this->callWithOptionalReturn('post', 'lists', $data, $asCollection);
    }

    /**
     * @param string $hash
     * @param array $data
     * @param bool $asCollection
     * @return mixed
     */
    public function update(string $hash, array $data = [], bool $asCollection = true)
    {
        return $this->callWithOptionalReturn('patch', "lists/$hash", $data, $asCollection);
    }

    /**
     * @param string $hash
     * @return mixed
     */
    public function delete(string $hash)
    {
        return $this->callWithOptionalReturn('delete', "lists/$hash");
    }
}
