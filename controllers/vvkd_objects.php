<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class JSON_API_vvkd_objects_Controller {

	public function get_values() {
		global $wpdb;
		$table_name = $wpdb->prefix . JSON_API_Objects::TABLE_NAME;
		$results    = $wpdb->get_results( "SELECT * FROM $table_name ORDER BY `Nr` ASC;", OBJECT );
		$rows       = array();
		foreach ( $results as $r ) {
			$rows[] = new JSON_API_Objects( $r );
		}

		//return $results;
		return array( "values" => array_values( $rows ) );
	}

	public function put_value() {
		$roles =  wp_get_current_user()->roles;
		if (  ( array_search( 'administrator', $roles, true ) === false ) ) {
			return ( "ok" );
		}
		global $json_api;
		$newSegment = new JSON_API_Options_Segments($json_api->query);
		$newSegment->save();
		return "done";
	}

    public function delete_value() {
        $roles =  wp_get_current_user()->roles;
        if (  ( array_search( 'administrator', $roles, true ) === false ) ) {
            return ( "ok" );
        }
        global $json_api;
        $newSegment = new JSON_API_Options_Segments($json_api->query);
        $newSegment->delete();
        return "done";
    }

}

?>