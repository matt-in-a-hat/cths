<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Assets\Image;

class TinySiteConfig extends DataExtension {
    private static $db = [
        'GACode' => 'Varchar(55)',
        'SendContactEmailsTo' => 'Varchar(255)',
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
            TextField::create('SendContactEmailsTo', 'Send Contact Emails To')->setDescription('When someone fills in the Contact Us form. Leave blank to not send emails (they still get saved in the CMS).'),
            UploadField::create('SiteLogo'),
        ]);
    }
}
