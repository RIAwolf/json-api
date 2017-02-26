<?php
/**
 * Created by PhpStorm.
 * User: Martynas
 * Date: 2/26/2017
 * Time: 11:42
 */
class JSON_API_Options_Segments {
    var $id;      // Integer
    var $Name;    // String
    var $Number;     // String
    function JSON_API_Options_Segments ($wp_row) {
        if ($wp_row) {
            $this->import_wp_object($wp_row);
        }
    }

    function import_wp_object($wp_row) {
        global $json_api;
        $this->id = (int) $wp_row->id;
        $this->Name = $wp_row->Name;
        $this->Number = $wp_row->Number;
    }
}
