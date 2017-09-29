<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Behat\Gherkin\Keywords;

/**
 * File initializable keywords holder.
 *
 * $keywords = new Behat\Gherkin\Keywords\CachedArrayKeywords($file);
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
class CachedArrayKeywords extends ArrayKeywords
{

    /**
     * Initializes holder with file.
     *
     * @param string $file Cached array path
     */
    public function __construct($file)
    {
        parent::__construct(include($file));
    }

}
