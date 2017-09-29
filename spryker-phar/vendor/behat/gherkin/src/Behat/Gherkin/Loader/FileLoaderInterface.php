<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Behat\Gherkin\Loader;

/**
 * File Loader interface.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
interface FileLoaderInterface extends LoaderInterface
{

    /**
     * Sets base features path.
     *
     * @param string $path Base loader path
     */
    public function setBasePath($path);

}
