<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Behat\Gherkin\Node;

/**
 * Gherkin keyword node interface.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
interface KeywordNodeInterface extends NodeInterface
{

    /**
     * Returns node keyword.
     *
     * @return string
     */
    public function getKeyword();

    /**
     * Returns node title.
     *
     * @return null|string
     */
    public function getTitle();

}
