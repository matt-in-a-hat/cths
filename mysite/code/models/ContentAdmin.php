<?php
use SilverStripe\Admin\ModelAdmin;
use SilverStripe\Forms\GridField\GridField;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

class ContentAdmin extends ModelAdmin {
    private static $managed_models = ['HomePageAction'];
    private static $url_segment = 'content';
    private static $menu_title = 'Content';

    public function getExportFields() {
        if (method_exists(singleton($this->modelClass), 'exportFields')) {
            return singleton($this->modelClass)->exportFields();
        }
        return parent::getExportFields();
    }

    public function getEditForm($id = null, $fields = null) {
        $form = parent::getEditForm($id, $fields);

        if ($this->modelClass == 'HomePageAction' && $gridField = $form->Fields()->dataFieldByName($this->sanitiseClassName($this->modelClass))) {
            if ($gridField instanceof GridField) {
                $gridField->getConfig()->addComponent(new GridFieldSortableRows('SortOrder'));
            }
        }

        return $form;
    }
}
