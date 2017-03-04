<?php
class JSON_API_Options_Object_Types {
    var $id;      // Integer
    var $Type;    // String
    var $Number;     // String
    const TABLE_NAME = 'vvkd_optionsobjecttypes';
    function JSON_API_Options_Object_Types ($row) {
        if ($row) {
            $this->import_wp_object($row);
        }
    }

    function import_wp_object($row) {

        if(isset($row->id)){
            $this->id = (int) $row->id;
        }

        if(isset($row->Type)) {
            $this->Type = $row->Type ;
        }

        if(isset($row->Number)) {
            $this->Number = $row->Number;
        }
    }

    function save(){
        global $wpdb;
        $wpdb->prefix .JSON_API_Options_Object_Types::TABLE_NAME;
        if(isset($this->id)){
            $wpdb->update(
                $wpdb->prefix .JSON_API_Options_Object_Types::TABLE_NAME,
                array(
                    'Type' => $this->Type,
                    'Number' => $this->Number
                ),
                array( 'id' => $this->id ),
                array(
                    '%s',
                    '%d'
                ),
                array( '%d' )
            );
        }else{
            $wpdb->insert(
                $wpdb->prefix .JSON_API_Options_Object_Types::TABLE_NAME,
                array(
                    'Type' => $this->Type,
                    'Number' => $this->Number
                ),
                array(
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
                $wpdb->prefix .JSON_API_Options_Object_Types::TABLE_NAME,
                array( 'id' => $this->id ),
                array( '%d' )
            );
        }
    }
}
