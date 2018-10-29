<?php

namespace MartinCamen\GetANewsletter\Modules\Contacts;

use MartinCamen\GetANewsletter\Connector\ApiConnector;

class Contacts extends ApiConnector
{
    /**
     * @param array $data
     * @param bool $asCollection
     * @return mixed
     */
    public function get(array $data = [], bool $asCollection = true)
    {
        return $this->callWithOptionalReturn('get', 'contacts', $data, $asCollection);
    }

    /**
     * @param string $email
     * @param array $data
     * @param bool $asCollection
     * @return mixed
     */
    public function create(string $email, array $data = [], bool $asCollection = true)
    {
        $data = array_merge(
            ['email' => $email],
            $data
        );

        return $this->callWithOptionalReturn('post', 'contacts', $data, $asCollection);
    }

    /**
     * @param string $email
     * @param array $data
     * @param bool $asCollection
     * @return mixed
     */
    public function update(string $email, array $data = [], bool $asCollection = true)
    {
        return $this->callWithOptionalReturn('patch', "contacts/$email", $data, $asCollection);
    }

    /**
     * @param string $email
     * @return mixed
     */
    public function delete(string $email)
    {
        return $this->callWithOptionalReturn('delete', "contacts/$email");
    }
}
