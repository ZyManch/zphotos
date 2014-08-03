<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 01.08.14
 * Time: 17:36
 */
class Category extends CCategory {


    /**
     * @return Category[]
     */
    public function getParentPages() {
        $result = array($this);
        $category = $this;
        while ($category = $category->parent) {
            $result[] = $category;
        }
        $topCategory = new Category();
        $topCategory->title = 'Список категорий';
        $result[] = $topCategory;
        return array_reverse($result);
    }

    public function __toString() {
        return CHtml::link($this->title,array('category/view','id' => $this->id));
    }
}