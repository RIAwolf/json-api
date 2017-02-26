<?php

class JSON_API_vvkd_segments_Controller {

	public function get_segments() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'vvkd_optionssegments';
		$results = $wpdb->get_results( "SELECT * FROM $table_name;",ARRAY_A );
		$rows = array();
		foreach( $results as $r) {
			$rows[] = $r;
		}
		return $results;
		return $rows;
	}

}

?>