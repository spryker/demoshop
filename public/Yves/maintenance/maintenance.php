<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

if (file_exists(__DIR__ . '/maintenance.marker')) {
    http_response_code(503);
    echo file_get_contents(__DIR__ . '/index.html');
    die();
}
