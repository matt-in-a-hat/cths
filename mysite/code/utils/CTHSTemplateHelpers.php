<?php
use SilverStripe\View\TemplateGlobalProvider;

class CTHSTemplateHelpers implements TemplateGlobalProvider {
    public static function get_template_global_variables() {
        return [
            'GetBoxColour',
            'GetWordCount',
            'GetRequestParam',
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

    public static function GetWordCount($string) {
        if (is_object($string) && method_exists($string, 'Plain')) {
            $string = $string->Plain();
        } else if (!is_string($string)) {
            $string = (string) $string;
        }
        return count(explode(' ', $string));
    }

    /**
     * Gets the GET/POST param by name.
     * WARNING - don't output anything directly on page
     * @param string $name get or post var name
     */
    public static function GetRequestParam($name) {
        return isset($_REQUEST[$name]) ? $_REQUEST[$name] : null;
    }
}
