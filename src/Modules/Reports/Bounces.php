<?php

namespace MartinCamen\GetANewsletter\Modules\Reports;

use MartinCamen\GetANewsletter\Connector\ApiConnector;

class Bounces extends ApiConnector
{
    /**
     * @param string|int $reportId
     * @param array $data
     * @param bool $asCollection
     * @return mixed
     */
    public function get($reportId, array $data = [], bool $asCollection = true)
    {
        return $this->callWithOptionalReturn('get', "reports/$reportId/bounces", $data, $asCollection);
    }

    /**
     * @param string|int $reportId
     * @param string|int $bounceId
     * @param bool $asCollection
     * @return mixed
     */
    public function find($reportId, $bounceId, bool $asCollection = true)
    {
        return $this->getSingleWithOptionalReturn("reports/$reportId/bounces/$bounceId", $asCollection);
    }
}
