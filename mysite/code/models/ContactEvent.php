<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Permission;

class ContactEvent extends DataObject {

    private static $db = [
        'Name' => 'Text',
        'Email' => 'Text',
        'Message' => 'Text',
    ];

    private static $searchable_fields = [
        'Name', 'Email', 'Message',
    ];

    private static $default_sort = 'Created DESC';

    private static $summary_fields = ['ID', 'Name', 'Email', 'Message.Summary'];


    public function exportFields() {
        return [
            'ID', 'LastEdited', 'Created', 'Name', 'Email', 'Message',
        ];
    }

    public function canView($member = null, $context = array()) {
        return Permission::check('CMS_ACCESS_ContactEventAdmin', 'any', $member);
    }

    public function canEdit($member = null, $context = array()) {
        return false;
    }

    public function canDelete($member = null, $context = array()) {
        return false;
    }

    public function canCreate($member = null, $context = array()) {
        return false;
    }
}
