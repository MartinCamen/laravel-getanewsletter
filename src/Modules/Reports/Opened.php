<?php

namespace MartinCamen\GetANewsletter\Modules\Reports;

use MartinCamen\GetANewsletter\Connector\ApiConnector;

class Opened extends ApiConnector
{
    /**
     * @param string|int $reportId
     * @param array $data
     * @param bool $asCollection
     * @return mixed
     */
    public function get($reportId, array $data = [], bool $asCollection = true)
    {
        return $this->callWithOptionalReturn('get', "reports/$reportId/opens", $data, $asCollection);
    }

    /**
     * @param string|int $reportId
     * @param string|int $openId
     * @param bool $asCollection
     * @return mixed
     */
    public function find($reportId, $openId, bool $asCollection = true)
    {
        return $this->getSingleWithOptionalReturn("reports/$reportId/opens/$openId", $asCollection);
    }

    /**
     * @param int|string $reportId
     * @param array $data
     * @param bool $asCollection
     * @return mixed
     */
    public function aggregated($reportId, array $data = [], bool $asCollection = true)
    {
        return $this->callWithOptionalReturn('get', "reports/$reportId/opens/aggregated", $data, $asCollection);
    }
}
