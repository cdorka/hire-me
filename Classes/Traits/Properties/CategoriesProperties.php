<?php


declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Properties;

use ChristianDorka\HireMe\Domain\Model\Category;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;


trait CategoriesProperties
{
    /**
     * @var ObjectStorage<Category>|null
     */
    protected ?ObjectStorage $categories = null;

    /**
     * Add a category to the storage
     *
     * @param Category $category
     *
     * @return void
     */
    public function addCategory(Category $category): void
    {
        $this->categories->attach($category);
    }

    /**
     * Remove a category from the storage
     *
     * @param Category $category
     *
     * @return void
     */
    public function removeCategory(Category $category): void
    {
        $this->categories->detach($category);
    }

    /**
     * Remove all categories from the storage
     *
     * @return void
     */
    public function removeAllCategories(): void
    {
        $this->categories = new ObjectStorage();
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

    /**
     * @param ObjectStorage<Category>|null $categories
     *
     * @return void
     */
    public function setCategories(?ObjectStorage $categories): void
    {
        $this->categories = $categories;
    }
}
