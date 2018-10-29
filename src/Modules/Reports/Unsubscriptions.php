<?php

namespace MartinCamen\GetANewsletter\Modules\Reports;

use MartinCamen\GetANewsletter\Connector\ApiConnector;

class Unsubscriptions extends ApiConnector
{
    /**
     * @param string|int $reportId
     * @param array $data
     * @param bool $asCollection
     * @return mixed
     */
    public function get($reportId, array $data = [], bool $asCollection = true)
    {
        return $this->callWithOptionalReturn('get', "reports/$reportId/unsubscribed", $data, $asCollection);
    }

    /**
     * @param string|int $reportId
     * @param string|int $unsubscribedId
     * @param bool $asCollection
     * @return mixed
     */
    public function find($reportId, $unsubscribedId, bool $asCollection = true)
    {
        return $this->getSingleWithOptionalReturn("reports/$reportId/unsubscribed/$unsubscribedId", $asCollection);
    }
}
