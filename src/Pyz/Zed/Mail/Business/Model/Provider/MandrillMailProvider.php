<?php


namespace Pyz\Zed\Mail\Business\Model\Provider;

use Generated\Shared\Mail\Transfer\Mail as MailTransfer;
use Generated\Zed\Mail\Business\Dependency\MailFactoryTrait;
use ProjectA\Zed\Library\Dependency\DependencyFactoryInterface;
use ProjectA\Zed\Mail\Business\Model\Provider\AbstractMailProvider;
use ProjectA\Zed\Mail\Business\Model\Provider\MailProviderResponse;
use Pyz\Zed\Mail\Business\Model\Provider\Mandrill\MandrillSettings;

/**
 * Class MandrillMailProvider
 * @package Zoo\Zed\Mail\Component\Model\Provider
 */
class MandrillMailProvider extends AbstractMailProvider implements DependencyFactoryInterface
{
    use MailFactoryTrait;

    /**
     * @param MailTransfer $mailTransfer
     * @return MailProviderResponse
     * @throws \ProjectA_Zed_Library_Exception
     */
    public function send(MailTransfer $mailTransfer)
    {
        $settings = $this->factoryMail->createModelProviderMandrillMandrillSettings();
        $client = new \Mandrill($settings->getApiKey());
        $templateIds = $settings->getTemplateIds();

        if (!isset($templateIds[$mailTransfer->getType()])) {
            throw new \ProjectA_Zed_Library_Exception(
                'No Mandrill-Id specified in Mail_Settings for Mail-Type: ' . $mailTransfer->getType());
        }

        /** @var array $mandrillResponse */
        $mandrillResponse = $client->messages->sendTemplate(
            $templateIds[$mailTransfer->getType()],
            null,
            $this->buildMessage($mailTransfer, $settings)
        );

        $response = $this->factoryMail->createModelProviderMailProviderResponse();
        if ($mandrillResponse[0]['status'] === 'rejected' || $mandrillResponse[0]['status'] === 'invalid') {
            $response->setStatus(false);
        } else {
            $response->setStatus(true);
        }

        $response->setMessage(json_encode($mandrillResponse[0]));

        return $response;
    }

    /**
     * @return string
     */
    public static function getName()
    {
        return 'mandrill';
    }

    /**
     * @param MailTransfer $mailTransfer
     * @param MandrillSettings $settings
     * @return array
     */
    protected function buildMessage(MailTransfer $mailTransfer, MandrillSettings $settings)
    {
        return [
            'subject' => null,
            'from_email' => $settings->getFromEmail(),
            'from_name' => $settings->getFromName(),
            'to' => [
                [
                    'email' => $mailTransfer->getRecipientAddress(),
                    'name' => $mailTransfer->getRecipientFullname(),
                    'type' => 'to'
                ]
            ],
            'track_clicks' => false,
            'global_merge_vars' => $this->getVarsFromMailTransfer($mailTransfer),
            'merge_language' => 'handlebars',
            'headersEncoding' => ['Encoding' => 'UTF8']
        ];
    }

    protected function getVarsFromMailTransfer(MailTransfer $mailTransfer)
    {
        $mapperFactory = $this->factoryMail->createModelProviderMandrillFactory();
        $mapper = $mapperFactory->getMapperByTransfer($mailTransfer);

        return $mapper->transformTransferToArray($mailTransfer);
    }
}
