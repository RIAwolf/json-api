<?php
class JSON_API_Options_Buoy_Colors {
    var $id;      // Integer
    var $Image;    // String
    var $BuoyColor;    // String
    var $Number;     // String
    const TABLE_NAME = 'vvkd_optionsbuoycolors';
    function JSON_API_Options_Buoy_Colors ($row) {
        if ($row) {
            $this->import_wp_object($row);
        }
    }

    function import_wp_object($row) {

        if(isset($row->id)){
            $this->id = (int) $row->id;
        }

        if(isset($row->Image)) {
            $this->Image = $row->Image ;
        }

        if(isset($row->BuoyColor)) {
            $this->BuoyColor = $row->BuoyColor ;
        }

        if(isset($row->Number)) {
            $this->Number = $row->Number;
        }
    }

    function save(){
        global $wpdb;

        if(isset($this->id)){
            $wpdb->update(
                $wpdb->prefix .JSON_API_Options_Buoy_Colors::TABLE_NAME,
                array(
                    'Image' => $this->Image,
                    'BuoyColor' => $this->BuoyColor,
                    'Number' => $this->Number
                ),
                array( 'id' => $this->id ),
                array(
                    '%s',
                    '%s',
                    '%d'
                ),
                array( '%d' )
            );
        }else{
            $wpdb->insert(
                $wpdb->prefix .JSON_API_Options_Buoy_Colors::TABLE_NAME,
                array(
                    'BuoyColor' => $this->BuoyColor,
                    'Image' => $this->Image,
                    'Number' => $this->Number
                ),
                array(
                    '%s',
                    '%s',
                    '%d'
                )
            );
        }
    }

    function delete(){
        global $wpdb;
        if(isset($this->id)){
            $wpdb->delete(
                $wpdb->prefix .JSON_API_Options_Buoy_Colors::TABLE_NAME,
                array( 'id' => $this->id ),
                array( '%d' )
            );
        }
    }
}
