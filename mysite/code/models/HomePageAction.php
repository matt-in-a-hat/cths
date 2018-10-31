<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Permission;

class HomePageAction extends DataObject {

    private static $db = [
        'Title' => 'Text',
        'Content' => 'HTMLText',
        'LinkText' => 'Varchar(55)',
        'LinkUrl' => 'Varchar(255)',
        'SortOrder' => 'Int',
        'IsActive' => 'Boolean',
    ];

    private static $searchable_fields = ['Title', 'Content', 'LinkText', 'LinkUrl', 'IsActive'];

    private static $summary_fields = [
        'SortOrder' => 'Order',
        'Title' => 'Title',
        'ContentSummary' => 'Content',
        'LinkText' => 'Link text',
        'LinkUrl' => 'URL',
        'IsActive' => 'Active',
    ];

    private static $default_sort = 'SortOrder';

    public function exportFields() {
        return [
            'ID', 'LastEdited', 'Created', 'Title', 'Content', 'LinkText', 'LinkUrl', 'SortOrder', 'IsActive',
        ];
    }

    public function ContentSummary () {
        return $this->dbObject('Content')->Summary(10);
    }

    public function extendedCan($methodName, $member, $context = array()) {
        return Permission::check('CMS_ACCESS_ContentAdmin', 'any', $member);
    }
}
