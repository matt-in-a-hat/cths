<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

class Page extends SiteTree
{
    private static $db = [
        'SummaryBlock' => 'HTMLText',
    ];

    private static $has_one = [
        'HeaderImage' => Image::class,
    ];

    private static $owns = [
        'HeaderImage',
    ];

    public function getCMSFields() {
        $fields = parent::getCMSFields();
        if ($this->ClassName !== 'SilverStripe\Blog\Model\BlogPost') {
            $uploadField = UploadField::create('HeaderImage');
            $uploadField->getValidator()->setAllowedExtensions(['jpg', 'jpeg', 'png', 'gif']);
            $fields->insertAfter('Content', $uploadField);
            $summary = HtmlEditorField::create('SummaryBlock');
            $summary->setRows(5);
            $summary->setDescription('If no summary is specified the first part of the content will be used (as plain text).');
            $fields->insertAfter('HeaderImage', $summary);
        }
        return $fields;
    }
}
