<?php

namespace MartinCamen\GetANewsletter\Modules\Mail;

use Exception;
use Illuminate\Support\Collection;
use MartinCamen\GetANewsletter\Connector\ApiConnector;

class Mail extends ApiConnector
{
    protected function callAndGatherResult(
        string $endpoint,
        string $type = 'sent',
        array $data = [],
        $asCollection = true
    )
    {
        $response = $this->call('get', "mails/$endpoint", $data);
        if (! $asCollection) {
            return $response;
        }

        return collect($response->results)
            ->each(function ($mail) use ($type) {
                $mail->mail_status = $type;
                return $mail;
            })
            ->sortBy('updated');
    }

    public function allMails()
    {
        $sent = $this->callAndGatherResult('sent');
        $drafts = $this->callAndGatherResult('drafts', 'draft');

        return $sent->merge($drafts)->sortBy('updated');
    }

    /**
     * @param string|int $id
     * @param string $endpoint
     * @param bool $asCollection
     * @return mixed
     */
    public function getSingle($id, string $endpoint, bool $asCollection = true)
    {
        return $this->getSingleWithOptionalReturn("mails/$endpoint/$id", $asCollection);
    }
}
