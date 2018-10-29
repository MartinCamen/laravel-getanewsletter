<?php

namespace MartinCamen\GetANewsletter\Modules\Reports;

use MartinCamen\GetANewsletter\Connector\ApiConnector;

class Reports extends ApiConnector
{
    /**
     * @param array $data
     * @param bool $asCollection
     * @return mixed
     */
    public function get(array $data = [], bool $asCollection = true)
    {
        return $this->callWithOptionalReturn('get', 'reports', $data, $asCollection);
    }

    /**
     * @param string|int $id
     * @param bool $asCollection
     * @return mixed
     */
    public function find($id, bool $asCollection = true)
    {
        return $this->getSingleWithOptionalReturn("reports/$id", $asCollection);
    }
}
