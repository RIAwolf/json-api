<?php
class JSON_API_Options_Segments {
    var $id;      // Integer
    var $Name;    // String
    var $Number;     // String
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
