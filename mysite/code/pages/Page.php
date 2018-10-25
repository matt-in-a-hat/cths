<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\CheckboxField;

class Page extends SiteTree
{
    private static $db = [
        'SummaryBlock' => 'HTMLText',
        'ShowChildPageSummary' => 'Boolean',
        'ShowInParentSummary' => 'Boolean',
    ];

    private static $has_one = [
        'HeaderImage' => Image::class,
    ];

    private static $owns = [
        'HeaderImage',
    ];

    private static $defaults = [
        'ShowChildPageSummary' => 0,
        'ShowInParentSummary' => 1,
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
            $fields->insertAfter('SummaryBlock', CheckboxField::create('ShowChildPageSummary')->setDescription('Shows a listing of child pages at the bottom of this page.'));
            $fields->insertAfter('SummaryBlock', CheckboxField::create('ShowInParentSummary')->setDescription('Uncheck to not show this on the bottom of the parent page (if it has the summary enabled)'));
        }
        return $fields;
    }
}
