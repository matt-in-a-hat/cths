<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;

class Page extends SiteTree
{
    private static $db = [];

    private static $has_one = [
        'HeaderImage' => Image::class,
    ];

    private static $owns = [
        'HeaderImage',
    ];

    public function getCMSFields() {
        $this->beforeUpdateCMSFields(function ($fields) {
            $uploadField = UploadField::create('HeaderImage');
            $uploadField->getValidator()->setAllowedExtensions(['jpg', 'jpeg', 'png', 'gif']);
            $fields->insertAfter('Content', $uploadField);
        });

        return parent::getCMSFields();
    }
}
