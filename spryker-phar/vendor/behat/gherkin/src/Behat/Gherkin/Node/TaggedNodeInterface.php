<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Behat\Gherkin\Node;

/**
 * Gherkin tagged node interface.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
interface TaggedNodeInterface extends NodeInterface
{

    /**
     * Checks if node is tagged with tag.
     *
     * @param string $tag
     *
     * @return Boolean
     */
    public function hasTag($tag);

    /**
     * Checks if node has tags (both inherited from feature and own).
     *
     * @return Boolean
     */
    public function hasTags();

    /**
     * Returns node tags (including inherited from feature).
     *
     * @return string[]
     */
    public function getTags();

}
