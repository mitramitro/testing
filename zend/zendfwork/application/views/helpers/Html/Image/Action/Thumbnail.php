<?php
/**
 * @author     Mohamed Alsharaf
 * @category   Core
 * @package    Core_ViewHelper
 * @copyright  Copyright (c) 2008-2009 Mohamed Alsharaf.
 * @license    http://framework.zend.com/license/new-bsd  New BSD License
 */
class Core_ViewHelper_Html_Image_Action_Thumbnail
    implements Core_ViewHelper_Html_Image_ActionInterface
{
    public function build($imageInstance) {
        // add your code to generate thumbnail
        return $this->_test($imageInstance);
    }

    /**
     * Test method to generate the thumbnail
     *
     * @return boolean
     */
    private function _test($imageInstance) {
        // dir to where you want to save the thumbnail image
        $dir = APPLICATION_PUBLIC . dirname($imageInstance->getImagePath()) . '/thumbs/';

        // create the directory if it does not exist
        clearstatcache();
        if(!is_dir($dir)) {
            mkdir($dir, 0777);
        }
        // name of the image based on the size of the thumbnail
        // @todo the sizes can be in config file/database. for not its hard coded
        $thumbPath = $dir . '100x100' . '_'  . $imageInstance->getImageName();

        // if thumbnail exists then set new image and return false
        if(file_exists($thumbPath)) {
            $imageInstance->setNewImage($thumbPath);
            return false;
        }

        // resize image -
        $image = new My_Image();
        // open original image to resize it
        // set the thumnail sizes
        // set new image path and quality
        $image->open(APPLICATION_PUBLIC . $imageInstance->getImagePath())
              ->resize(100, 100)
              ->save($thumbPath, 75);

        // pass new image details to image view helper
        $imageInstance->setNewImage($thumbPath, $image->getWidth(), $image->getHeight());
        return true;
    }
}

