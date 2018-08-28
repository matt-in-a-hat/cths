<?php
use SilverStripe\View\TemplateGlobalProvider;

class CTHSTemplateHelpers implements TemplateGlobalProvider {
    public static function get_template_global_variables() {
        return [
            'GetBoxColour',
        ];
    }

    public static function GetBoxColour($pos) {
        $colours = [
            'cths-light-blue',
            'cths-green',
            'cths-orange',
        ];
        return $colours[$pos % count($colours)];
    }
}
