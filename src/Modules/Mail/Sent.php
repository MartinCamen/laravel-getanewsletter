<?php

namespace MartinCamen\GetANewsletter\Modules\Mail;

class Sent extends Mail
{
    /**
     * @param array $data
     * @param bool $asCollection
     * @return mixed
     */
    public function get(array $data = [], bool $asCollection = true)
    {
        return $this->callAndGatherResult('sent', '', $data, $asCollection);
    }

    /**
     * @param string|int $id
     * @param bool $asCollection
     * @return mixed
     */
    public function find($id, bool $asCollection = true)
    {
        return $this->getSingle($id, 'sent', $asCollection);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        return $this->callWithOptionalReturn('delete', "mails/sent/$id");
    }
}
