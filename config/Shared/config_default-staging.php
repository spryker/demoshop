<?php
/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a staging environment.
 */

// Fakeorder
$config['mail'] = array(
    'defaultReplyEmail' => 'monika.depka@project-a.com',
    'viewOrderUrl' => 'http://www.qa.saatchionline.com/accounts/orders',
    'availabilityCheckUrl' => 'http://www.qa.saatchionline.com/artworkavailability',
    /**
     * fakeOrderData used in "GetUserInformation from Legacy" Command
     */
    'overrideOrderData' => array(
        'email' => 'monika.depka@project-a.com',
        'firstname' => 'Monika',
        'lastname' => 'Depka'
    )
);
