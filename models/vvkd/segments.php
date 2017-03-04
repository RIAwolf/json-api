<?php
class JSON_API_Options_Segments {
    var $id;      // Integer
    var $Name;    // String
    var $Number;     // String
    const TABLE_NAME = 'vvkd_optionssegments';
    function JSON_API_Options_Segments ($row) {
        if ($row) {
            $this->import_wp_object($row);
        }
    }

    function import_wp_object($row) {

        if(isset($row->id)){
	        $this->id = (int) $row->id;
        }

	    if(isset($row->Name)) {
		    $this->Name = $row->Name ;
	    }

	    if(isset($row->Number)) {
		    $this->Number = $row->Number;
	    }
    }

    function save(){
		global $wpdb;
		if(isset($this->id)){
			$wpdb->update(
                $wpdb->prefix .JSON_API_Options_Segments::TABLE_NAME,
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
                $wpdb->prefix .JSON_API_Options_Segments::TABLE_NAME,
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
        if(isset($this->id)){
            $wpdb->delete(
                $wpdb->prefix .TABLE_NAME,
                array( 'id' => $this->id ),
                array( '%d' )
            );
        }
    }
}
