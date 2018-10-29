<?php

namespace MartinCamen\GetANewsletter\Modules\Mail;

use Illuminate\Support\Collection;

class AllMail extends Mail
{
    public function get()
    {
        $sent = $this->callAndGatherResult('sent');
        $drafts = $this->callAndGatherResult('drafts', 'draft');

        return $sent->merge($drafts)->sortBy('updated');
    }
}
