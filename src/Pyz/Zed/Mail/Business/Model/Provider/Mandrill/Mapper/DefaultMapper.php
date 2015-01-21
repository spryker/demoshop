<?php


namespace Pyz\Zed\Mail\Business\Model\Provider\Mandrill\Mapper;

use ProjectA\Shared\Mail\Transfer\Mail as MailTransfer;

/**
 * Class DefaultMapper
 * @package Zoo\Zed\Mail\Component\Model\Provider\Mandrill\Mapper
 */
class DefaultMapper
{
    /**
     * @param MailTransfer $mailTransfer
     * @return mixed
     */
    public function transformTransferToArray(MailTransfer $mailTransfer)
    {
        return $this->buildVariables($mailTransfer->getData());
    }

    /**
     * @param array $data
     * @return array
     */
    protected function buildVariables(array $data)
    {
        $variables = [];

        foreach ($data as $name => $content) {
            $entry = [];
            $entry['name'] = $name;
            $entry['content'] = $content;
            $variables[] = $entry;
        }

        return $variables;
    }
}
 