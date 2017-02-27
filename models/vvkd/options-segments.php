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

        if(isset($wp_row->id)){
	        $this->id = (int) $wp_row->id;
        }

	    if(isset($wp_row->Name)) {
		    $this->Name = $wp_row->Name;
	    }

	    if(isset($wp_row->Number)) {
		    $this->Number = $wp_row->Number;
	    }
    }

    function save(){
		global $wpdb;
	    $table_name = $wpdb->prefix . 'vvkd_optionssegments';
		if(isset($this->id)){
			$wpdb->update(
				$table_name,
				array(
					'Name' => $this->Name,
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
				$table_name,
				array(
					'Name' => $this->Name,
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
        $table_name = $wpdb->prefix . 'vvkd_optionssegments';
        if(isset($this->id)){
            $wpdb->delete(
                $table_name,
                array( 'id' => $this->id ),
                array( '%d' )
            );
        }
    }
}
