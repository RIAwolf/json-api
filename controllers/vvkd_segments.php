<?php

class JSON_API_vvkd_segments_Controller {

	public function get_segments() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'vvkd_optionssegments';
		$results = $wpdb->get_results( "SELECT * FROM $table_name;",OBJECT );
		$rows = array();
		foreach( $results as $r) {
			$rows[] = new JSON_API_Options_Segments($r);
		}
		//return $results;
		return array("segments"=>array_values($rows));
	}
    public function add_segment(){

        if(array_search('administrator',wp_get_current_user()->roles,true) === false){
            return $this->get_segments();
        }else {
            return "works";
        }
    }
}

?>