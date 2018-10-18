<?php

use SilverStripe\Forms\TreeDropdownField;

class HomePage extends Page
{
    private static $singular_name = 'Home Page';
    private static $plural_name = 'Home Pages';
    private static $description = 'CTHS Specialised Home Page template';

    private static $has_one = [
        'FeaturedPage' => Page::class,
    ];

    public function GetActionBoxes() {
        return HomePageAction::get();
    }

    public function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Main', new TreeDropdownField('FeaturedPageID', 'Featured Page', 'Page'), 'Content');
        return $fields;
    }
}
