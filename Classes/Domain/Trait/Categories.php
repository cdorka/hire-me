<?php

/**
 * TODO
 * php version 8.2
 *
 * @category     TODO
 * @package      TODO
 * @license      TODO
 * @author       Christian Dorka <mail@christiandorka.de>
 */

declare(strict_types=1);

namespace ChristianDorka\HireMe\Domain\Trait;

use ChristianDorka\HireMe\Domain\Model\Category;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * TODO
 *
 * @category TODO
 * @package  TODO
 * @author   Christian Dorka <mail@christiandorka.de>
 * @license  TODO
 * @link     TODO
 */
trait Categories
{
    /**
     * @var ObjectStorage<Category>|null
     */
    protected ?ObjectStorage $categories = null;

    /**
     * @param ObjectStorage<Category>|null $categories
     *
     * @return self
     */
    public function setCategories(?ObjectStorage $categories): self
    {
        $this->categories = $categories;
        return $this;
    }

    /**
     * Add a category to the storage
     *
     * @param Category $category
     *
     * @return self
     */
    public function addCategory(Category $category): self
    {
        $this->categories->attach($category);
        return $this;
    }

    /**
     * Remove a category from the storage
     *
     * @param Category $category
     *
     * @return self
     */
    public function removeCategory(Category $category): self
    {
        $this->categories->detach($category);
        return $this;
    }

    /**
     * Remove all categories from the storage
     *
     * @return self
     */
    public function removeAllCategories(): self
    {
        $this->categories = new ObjectStorage();
        return $this;
    }

    /**
     * Remove all categories from the storage
     *
     * @return null|array
     */
    public function getCategories(): ?array
    {
        return $this->categories?->toArray();
    }
}
