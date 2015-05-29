<?php
namespace Modules\Gallery\Object;
use Files\FileSystem;
use Modules\CommonObject;
use Modules\Gallery\ModuleGallery;
use Modules\Images\Object\ImageCollection;


/**
 * Class Gallery
 * @package Modules\Gallery\Object
 *
 * @method string getTitle()
 * @method bool getActive()
 * @method int getOrder()
 * @method int getCategoryId()
 *
 * @method setTitle(array)
 * @method setActive(bool)
 * @method setOrder(int)
 * @method setCategoryId(int)
 */
class Gallery extends CommonObject {
    protected $db_table = 'm_gallery';
    protected $multi_lng_fields = ['title'];

    // Before delete object
    public function deleteObject() {
        // Delete Collection images from DB
        $images_collection = new ImageCollection();
        $images_collection->setWhereItemType('gallery');
        $images_collection->setWhereItemId($this->getId());
        $images_collection->deleteObjectCollection();

        // Delete files - remove folder
        $path = DIR_BASE . ModuleGallery::getGalleryImagesPath($this->getId());
        FileSystem::remdir($path);

        parent::deleteObject();
    }
}