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
    ];

    private static $searchable_fields = ['Title', 'Content', 'LinkText', 'LinkUrl'];

    private static $summary_fields = ['Title', 'Content.Summary(10)', 'LinkText', 'LinkUrl'];

    private static $default_sort = 'SortOrder';

    public function exportFields() {
        return [
            'ID', 'LastEdited', 'Created', 'Title', 'Content', 'LinkText', 'LinkUrl', 'SortOrder',
        ];
    }
}
