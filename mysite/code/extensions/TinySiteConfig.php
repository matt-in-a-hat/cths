<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Assets\Image;

class TinySiteConfig extends DataExtension {
    private static $db = [
        'GACode' => 'Varchar(55)',
    ];

    private static $has_one = [
        'SiteLogo' => Image::class,
    ];

    private static $owns = [
        'SiteLogo',
    ];

    public function updateCMSFields(FieldList $fields) {
        $fields->addFieldsToTab('Root.Main', [
            TextField::create('GACode', 'Google Analytics Code'),
            UploadField::create('SiteLogo'),
        ]);
    }
}
