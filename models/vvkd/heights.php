<?php
class JSON_API_Heights {
    var $id;      // Integer
    var $Date;    // String
    var $ObjectId;     // String
    var $Height;     // String
    const TABLE_NAME = 'vvkd_heights';
    function JSON_API_Heights ($row) {
        if ($row) {
            $this->import_wp_object($row);
        }
    }

    function import_wp_object($row) {

        if(isset($row->id)) $this->id = (int) $row->id;

        if(isset($row->Date)) $this->Date = $row->Date ;
        if(isset($row->ObjectId)) $this->ObjectId = $row->ObjectId;
        if(isset($row->Height)) $this->Height = $row->Height;

    }

    function save(){
        global $wpdb;
        $wpdb->prefix .JSON_API_Heights::TABLE_NAME;
        if(isset($this->id)){
            $wpdb->update(
                $wpdb->prefix .JSON_API_Heights::TABLE_NAME,
                array(
                    'Date' => $this->Date,
                    'ObjectId' => $this->ObjectId,
                    'Height' => $this->Height
                ),
                array( 'id' => $this->id ),
                array(
                    '%s',
                    '%s',
                    '%s'
                ),
                array( '%d' )
            );
        }else{
            $wpdb->insert(
                $wpdb->prefix .JSON_API_Heights::TABLE_NAME,
                array(
                    'Date' => $this->Date,
                    'ObjectId' => $this->ObjectId,
                    'Height' => $this->Height
                ),
                array(
                    '%s',
                    '%s',
                    '%s'
                )
            );
        }
    }

    function delete(){
        global $wpdb;
        if(isset($this->id)){
            $wpdb->delete(
                $wpdb->prefix .JSON_API_Heights::TABLE_NAME,
                array( 'id' => $this->id ),
                array( '%d' )
            );
        }
    }
}
