<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class JSON_API_vvkd_heights_Controller
{

    public function get_values()
    {
        global $wpdb;
        global $json_api;
        $table_name = $wpdb->prefix . JSON_API_Heights::TABLE_NAME;

        if (isset($json_api->query->start) && isset($json_api->query->end)) {
            $start = $json_api->query->start;
            $end = $json_api->query->end;
            $sql = $wpdb->prepare(
                "SELECT * FROM $table_name WHERE `Date` BETWEEN %s and %s ORDER BY `Date` ASC;",
                $start,
                $end
            );
            $results = $wpdb->get_results($sql, OBJECT);
        } else {
            $results = $wpdb->get_results("SELECT * FROM $table_name ORDER BY `Date` ASC;", OBJECT);
        }
        $rows = array();
        foreach ($results as $r) {
            $rows[] = new JSON_API_Heights($r);
        }

        return array("values" => array_values($rows));
    }

    public function put_value()
    {
        $roles = wp_get_current_user()->roles;
        if ((array_search('administrator', $roles, true) === false)) {
            return ("ok");
        }
        global $json_api;
        $newSegment = new JSON_API_Heights($json_api->query);
        $newSegment->save();
        return "done";
    }

    public function delete_value()
    {
        $roles = wp_get_current_user()->roles;
        if ((array_search('administrator', $roles, true) === false)) {
            return ("ok");
        }
        global $json_api;
        $newSegment = new JSON_API_Heights($json_api->query);
        $newSegment->delete();
        return "done";
    }

}

?>