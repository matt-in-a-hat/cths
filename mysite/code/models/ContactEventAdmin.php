<?php
use SilverStripe\Admin\ModelAdmin;

class ContactEventAdmin extends ModelAdmin {
    private static $managed_models = ['ContactEvent'];
    private static $url_segment = 'messages';
    private static $menu_title = 'Messages';
    // Remove ability to import these models
    private static $model_importers = [];

    public function getExportFields() {
        if (method_exists(singleton($this->modelClass), 'exportFields')) {
            return singleton($this->modelClass)->exportFields();
        }
        return parent::getExportFields();
    }
}
