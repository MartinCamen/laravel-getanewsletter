<?php

namespace MartinCamen\GetANewsletter;

use MartinCamen\GetANewsletter\Modules\Contacts\Contacts;
use MartinCamen\GetANewsletter\Modules\Lists\Lists;
use MartinCamen\GetANewsletter\Modules\Reports\Bounces;
use MartinCamen\GetANewsletter\Modules\Reports\Clicks;
use MartinCamen\GetANewsletter\Modules\Reports\Links;
use MartinCamen\GetANewsletter\Modules\Reports\NonOpened;
use MartinCamen\GetANewsletter\Modules\Reports\Opened;
use MartinCamen\GetANewsletter\Modules\Reports\Reports;
use MartinCamen\GetANewsletter\Modules\Reports\Unsubscriptions;
use MartinCamen\GetANewsletter\Connector\ApiConnector;
use MartinCamen\GetANewsletter\Modules\Mail\AllMail;
use MartinCamen\GetANewsletter\Modules\Mail\Drafts;
use MartinCamen\GetANewsletter\Modules\Mail\Sent;

class GetANewsletterModules extends ApiConnector
{
    public function contacts()
    {
        return new Contacts();
    }

    public function lists()
    {
        return new Lists();
    }

    public function emails()
    {
        return new AllMail();
    }

    public function drafts()
    {
        return new Drafts();
    }

    public function sent()
    {
        return new Sent();
    }

    public function reports()
    {
        return new Reports();
    }

    public function bounces()
    {
        return new Bounces();
    }

    public function clicks()
    {
        return new Clicks();
    }

    public function links()
    {
        return new Links();
    }

    public function nonOpened()
    {
        return new NonOpened();
    }

    public function opened()
    {
        return new Opened();
    }

    public function unsubscriptions()
    {
        return new Unsubscriptions();
    }
}
