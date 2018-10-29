<?php

namespace MartinCamen\GetANewsletter\Modules\Reports;

use MartinCamen\GetANewsletter\Connector\ApiConnector;

class Links extends ApiConnector
{
    /**
     * @param string|int $reportId
     * @param array $data
     * @param bool $asCollection
     * @return mixed
     */
    public function get($reportId, array $data = [], bool $asCollection = true)
    {
        return $this->callWithOptionalReturn('get', "reports/$reportId/links", $data, $asCollection);
    }

    /**
     * @param string|int $reportId
     * @param string|int $linkId
     * @param bool $asCollection
     * @return mixed
     */
    public function find($reportId, $linkId, bool $asCollection = true)
    {
        return $this->getSingleWithOptionalReturn("reports/$reportId/links/$linkId", $asCollection);
    }
}
