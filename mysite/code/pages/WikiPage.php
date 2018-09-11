<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Security\PermissionProvider;
use SilverStripe\Security\Permission;

class WikiPage extends Page implements PermissionProvider
{
    private static $singular_name = 'Knowledgebase Wiki Page';
    private static $plural_name = 'Wiki Pages';
    private static $description = 'CTHS Knowledgebase Page template';

    private static $default_child = 'WikiPage';
    private static $allowed_children = ['WikiPage', 'RedirectorPage'];

    public function providePermissions() {
        return [
            'EDIT_KNOWLEDGEBASE' => 'Edit Knowledgebase pages',
        ];
    }

    public function canCreate($member = null, $context = array()) {
        return parent::canCreate($member, $context) || Permission::check('EDIT_KNOWLEDGEBASE');
    }

    public function canView($member = null) {
        return parent::canView($member) || Permission::check('EDIT_KNOWLEDGEBASE');
    }

    public function canEdit($member = null) {
        return parent::canEdit($member) || Permission::check('EDIT_KNOWLEDGEBASE');
    }

    public function canDelete($member = null) {
        $canDelete = parent::canDelete($member);
        // If they only have EDIT_KNOWLEDGEBASE then they can't delete the root level page
        return $canDelete ?: Permission::check('EDIT_KNOWLEDGEBASE') && $this->ParentID;
    }
}
