<?php

namespace MartinCamen\GetANewsletter\Modules\Mail;

use Exception;

class Drafts extends Mail
{
    /**
     * @param array $data
     * @param bool $asCollection
     * @return mixed
     */
    public function get(array $data = [], bool $asCollection = true)
    {
        return $this->callAndGatherResult('drafts', 'draft', $data, $asCollection);
    }

    /**
     * @param string|int $id
     * @param bool $asCollection
     * @return mixed
     */
    public function find($id, bool $asCollection = true)
    {
        return $this->getSingle($id, 'drafts', $asCollection);
    }

    /**
     * @param array $data
     * @param bool $asCollection
     * @return mixed
     * @throws Exception
     */
    public function create(array $data, bool $asCollection = true)
    {
        $requiredFields = [
            'subject',
            'body',
        ];

        foreach ($requiredFields as $requiredField) {
            if (! array_key_exists($requiredField, $data)) {
                throw new Exception("$requiredField is required when creating a new mail.");
            }
        }

        return $this->callWithOptionalReturn('post', 'mails/drafts', $data, $asCollection);
    }

    /**
     * @param int $id
     * @param array $data
     * @param bool $asCollection
     * @return mixed
     */
    public function update(int $id, array $data = [], bool $asCollection = true)
    {
        return $this->callWithOptionalReturn('patch', "mails/drafts/$id", $data, $asCollection);
    }

    /**
     * @param int $id
     * @param bool $asCollection
     * @return mixed
     */
    public function copy(int $id, $asCollection = true)
    {
        return $this->callWithOptionalReturn('post', "mails/drafts/$id/copy", [], $asCollection);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        return $this->callWithOptionalReturn('delete', "mails/drafts/$id");
    }
}
