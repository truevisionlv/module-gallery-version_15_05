<?php
namespace Modules\Gallery\Object;
use Modules\CommonObject;

/**
 * Class GalleryCategory
 * @package Modules\Gallery\Object
 *
 * @method string getTitle()
 * @method bool getActive()
 * @method int getOrder()
 *
 * @method setTitle(array)
 * @method setActive(bool)
 * @method setOrder(int)
 */
class GalleryCategory extends CommonObject {
    protected $db_table = 'm_gallery_categories';
    protected $multi_lng_fields = ['title'];
}