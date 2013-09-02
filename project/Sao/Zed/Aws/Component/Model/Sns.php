<?php

use Aws\Sns\SnsClient;

class Sao_Zed_Aws_Component_Model_Sns implements ProjectA_Zed_Library_Dependency_Factory_Interface
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;



    /**
     * @param string $topic
     * @param string $message
     * @param null|string $subject
     * @return string message id
     */
    public function publishMessage($topic, $message, $subject = null)
    {
        $topic = $this->getFullTopicName($topic);
        $client = $this->getClient($topic);

        $content = array('TopicArn' => $topic,
                         'Message'  => $message,
                         'Subject'  => $subject);

        $response = $client->publish($content);

        return $response->get('MessageId');
    }

    /**
     * @param string $topic
     * @return SnsClient
     */
    protected function getClient($topic)
    {
        $zone = $this->getZoneFromTopic($topic);

        return SnsClient::factory($this->getConfig($zone));
    }

    /**
     * @param string $topic
     * @return mixed
     * @throws ProjectA_Zed_Library_Exception
     */
    protected function getZoneFromTopic($topic)
    {
        // example: arn:aws:sns:us-west-1:682102581715:topic_new_order
        $topicFragments = explode(':', $topic);

        if (count($topicFragments) != 6) {
            throw new ProjectA_Zed_Library_Exception('AWS SNS topic seems to be in a wrong format');
        }

        return $topicFragments[3];
    }

    /**
     * @param string $zone
     * @return array
     */
    protected function getConfig($zone)
    {
        $awsConfig = ProjectA_Shared_Library_Config::get('aws');

        return array(
            'key'    => $awsConfig->credentials->key,
            'secret' => $awsConfig->credentials->secret,
            'region' => $zone
        );
    }

    /**
     * @param string $targetTopic
     * @return string
     * @throws ProjectA_Zed_Library_Exception
     */
    protected function getFullTopicName($targetTopic)
    {
        $awsConfig = ProjectA_Shared_Library_Config::get('aws');
        $snsConfig = $awsConfig->sns;

        if (!isset($snsConfig->topics->$targetTopic)) {
            throw new ProjectA_Zed_Library_Exception('sns topic could not be found in config_default or local');
        }

        $topicConfig = $snsConfig->topics->$targetTopic;
        $zone = isset($topicConfig['zone']) ? $topicConfig['zone'] : $snsConfig->zone;

        $topic = [];
        $topic[] = "arn:aws:sns";
        $topic[] = $zone;
        $topic[] = $awsConfig->account_id;
        $topic[] = $topicConfig['key'];

        return implode(':', $topic);
    }
}
