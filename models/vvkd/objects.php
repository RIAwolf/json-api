<?php

class JSON_API_Objects
{
    var $id;            // Integer
    var $Nr;            // Integer
    var $Name;          // String
    var $Description;   // String
    var $Type;          // Integer
    var $Segment;       // Integer
    var $LKS_94_X;      // String
    var $LKS_94_Y;      // String
    var $WGS_84_B;      // String
    var $WGS_84_L;      // String
    var $DistToMouth;   // Double
    var $HasMeasure;    // Boolean
    var $HasHeight;     // Boolean
    const TABLE_NAME = 'vvkd_objects';

    function JSON_API_Objects($row)
    {
        if ($row) {
            $this->import_wp_object($row);
        }
    }

    function import_wp_object($row)
    {

        if (isset($row->id)) $this->id = (int)$row->id;

        if (isset($row->Nr)) $this->Nr = $row->Nr;
        if (isset($row->Name)) $this->Name = $row->Name;
        if (isset($row->Description)) $this->Description = $row->Description;
        if (isset($row->Type)) $this->Type = $row->Type;
        if (isset($row->Segment)) $this->Segment = $row->Segment;
        if (isset($row->LKS_94_X)) $this->LKS_94_X = $row->LKS_94_X;
        if (isset($row->LKS_94_Y)) $this->LKS_94_Y = $row->LKS_94_Y;
        if (isset($row->WGS_84_B)) $this->WGS_84_B = $row->WGS_84_B;
        if (isset($row->WGS_84_L)) $this->WGS_84_L = $row->WGS_84_L;
        if (isset($row->DistToMouth)) $this->DistToMouth = $row->DistToMouth;
        if (isset($row->HasMeasure)) $this->HasMeasure = $row->HasMeasure;
        if (isset($row->HasHeight)) $this->HasHeight = $row->HasHeight;

    }

    function save()
    {
        global $wpdb;
        if (isset($this->id)) {
            $wpdb->update(
                $wpdb->prefix . JSON_API_Objects::TABLE_NAME,
                array(
                    'Nr' => $this->Nr,
                    'Name' => $this->Name,
                    'Description' => $this->Description,
                    'Type' => $this->Type,
                    'Segment' => $this->Segment,
                    'LKS_94_X' => $this->LKS_94_X,
                    'LKS_94_Y' => $this->LKS_94_Y,
                    'WGS_84_B' => $this->WGS_84_B,
                    'WGS_84_L' => $this->WGS_84_L,
                    'DistToMouth' => $this->DistToMouth,
                    'HasMeasure' => $this->HasMeasure,
                    'HasHeight' => $this->HasHeight
                ),
                array('id' => $this->id),
                array(
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%d',
                    '%d',
                    '%d'
                ),
                array('%d')
            );
        } else {
            $wpdb->insert(
                $wpdb->prefix . JSON_API_Objects::TABLE_NAME,
                array(
                    'Nr' => $this->Nr,
                    'Name' => $this->Name,
                    'Description' => $this->Description,
                    'Type' => $this->Type,
                    'Segment' => $this->Segment,
                    'LKS_94_X' => $this->LKS_94_X,
                    'LKS_94_Y' => $this->LKS_94_Y,
                    'WGS_84_B' => $this->WGS_84_B,
                    'WGS_84_L' => $this->WGS_84_L,
                    'DistToMouth' => $this->DistToMouth,
                    'HasMeasure' => $this->HasMeasure,
                    'HasHeight' => $this->HasHeight
                ),
                array(
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%d',
                    '%d',
                    '%d'
                )
            );
        }
    }

    function delete()
    {
        global $wpdb;
        if (isset($this->id)) {
            $wpdb->delete(
                $wpdb->prefix . JSON_API_Objects::TABLE_NAME,
                array('id' => $this->id),
                array('%d')
            );
        }
    }
}
