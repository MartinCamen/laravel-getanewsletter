<?php

namespace MartinCamen\GetANewsletter\Modules\Subscriptions;

use MartinCamen\GetANewsletter\Connector\ApiConnector;

class Subscriptions extends ApiConnector
{
    /**
     * @param array $data
     * @param bool $asCollection
     * @return mixed
     */
    public function get(array $data = [], bool $asCollection = true)
    {
        return $this->callWithOptionalReturn('get', 'subscriptions', $data, $asCollection);
    }
}
