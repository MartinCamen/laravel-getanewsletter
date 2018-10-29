<?php

namespace MartinCamen\GetANewsletter\Modules\Reports;

use MartinCamen\GetANewsletter\Connector\ApiConnector;

class NonOpened extends ApiConnector
{
    /**
     * @param string|int $reportId
     * @param array $data
     * @param bool $asCollection
     * @return mixed
     */
    public function get($reportId, array $data = [], bool $asCollection = true)
    {
        return $this->callWithOptionalReturn('get', "reports/$reportId/have_not_opened", $data, $asCollection);
    }

    /**
     * @param string|int $reportId
     * @param string|int $notOpenedId
     * @param bool $asCollection
     * @return mixed
     */
    public function find($reportId, $notOpenedId, bool $asCollection = true)
    {
        return $this->getSingleWithOptionalReturn("reports/$reportId/have_not_opened/$notOpenedId", $asCollection);
    }
}
