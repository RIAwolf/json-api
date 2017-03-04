<?php
class JSON_API_Lagoon {
    var $id;                    // Integer
    var $Number;                    // Integer
    var $BuoyNr;                // String
    var $Color;                 // Integer
    var $LKS_94_X;              // String
    var $LKS_94_Y;              // String
    var $WGS_84_B;              // String
    var $WGS_84_L;              // String
    var $OptionsLagoonCategory; // String
    const TABLE_NAME = 'vvkd_lagoon';
    function JSON_API_Lagoon ($row) {
        if ($row) {
            $this->import_wp_object($row);
        }
    }

    function import_wp_object($row) {

        if (isset($row->id)) $this->id = (int)$row->id;

        if (isset($row->Number)) $this->Number = $row->Number;
        if (isset($row->BuoyNr)) $this->BuoyNr = $row->BuoyNr;
        if (isset($row->Color)) $this->Color = $row->Color;
        if (isset($row->LKS_94_X)) $this->LKS_94_X = $row->LKS_94_X;
        if (isset($row->LKS_94_Y)) $this->LKS_94_Y = $row->LKS_94_Y;
        if (isset($row->WGS_84_B)) $this->WGS_84_B = $row->WGS_84_B;
        if (isset($row->WGS_84_L)) $this->WGS_84_L = $row->WGS_84_L;
        if (isset($row->OptionsLagoonCategory)) $this->OptionsLagoonCategory = $row->OptionsLagoonCategory;
    }

    function save(){
        global $wpdb;

        if(isset($this->id)){
            $wpdb->update(
                $wpdb->prefix .JSON_API_Lagoon::TABLE_NAME,
                array(
                    'Number' =>$this->Number,
                    'BuoyNr' =>$this->BuoyNr,
                    'Color' =>$this->Color,
                    'LKS_94_X' =>$this->LKS_94_X,
                    'LKS_94_Y' =>$this->LKS_94_Y,
                    'WGS_84_B' =>$this->WGS_84_B,
                    'WGS_84_L' =>$this->WGS_84_L,
                    'OptionsLagoonCategory' =>$this->OptionsLagoonCategory
                ),
                array( 'id' => $this->id ),
                array(
                    '%d',
                    '%s',
                    '%d',
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s'
                ),
                array( '%d' )
            );
        }else{
            $wpdb->insert(
                $wpdb->prefix .JSON_API_Lagoon::TABLE_NAME,
                array(
                    'Number' =>$this->Number,
                    'BuoyNr' =>$this->BuoyNr,
                    'Color' =>$this->Color,
                    'LKS_94_X' =>$this->LKS_94_X,
                    'LKS_94_Y' =>$this->LKS_94_Y,
                    'WGS_84_B' =>$this->WGS_84_B,
                    'WGS_84_L' =>$this->WGS_84_L,
                    'OptionsLagoonCategory' =>$this->OptionsLagoonCategory
                ),
                array(
                    '%d',
                    '%s',
                    '%d',
                    '%s',
                    '%s',
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
                $wpdb->prefix .JSON_API_Lagoon::TABLE_NAME,
                array( 'id' => $this->id ),
                array( '%d' )
            );
        }
    }
}
