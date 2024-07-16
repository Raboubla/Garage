<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Csv_import {

    public function __construct() {
        $this->CI =& get_instance();
    }

    public function get_array($file_path) {
        $csv_array = array();
        if (($handle = fopen($file_path, 'r')) !== FALSE) {
            $header = fgetcsv($handle, 1000, ',');
            while (($row = fgetcsv($handle, 1000, ',')) !== FALSE) {
                $csv_array[] = array_combine($header, $row);
            }
            fclose($handle);
        }
        return $csv_array;
    }
}
