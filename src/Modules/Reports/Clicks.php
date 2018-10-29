<?php

namespace MartinCamen\GetANewsletter\Modules\Reports;

use MartinCamen\GetANewsletter\Connector\ApiConnector;

class Clicks extends ApiConnector
{
    /**
     * @param string|int $reportId
     * @param string|int $linkId
     * @param array $data
     * @param bool $asCollection
     * @return mixed
     */
    public function get($reportId, $linkId, array $data = [], bool $asCollection = true)
    {
        return $this->callWithOptionalReturn('get', "reports/$reportId/links/$linkId/clicks", $data, $asCollection);
    }

    /**
     * @param string|int $reportId
     * @param string|int $linkId
     * @param string|int $clickId
     * @param bool $asCollection
     * @return mixed
     */
    public function find($reportId, $linkId, $clickId, bool $asCollection = true)
    {
        return $this->getSingleWithOptionalReturn("reports/$reportId/links/$linkId/clicks/$clickId", $asCollection);
    }
}
