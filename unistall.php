<?php
if ( ! defined( 'ABSPATH' ) ) exit;
if( ! defined('WP_UNINSTALL_PLUGIN') ) exit;

global $wpdb;
     $gs_form_pages_table = $wpdb->prefix.'gs_form_pages';
     $sql = "DROP TABLE IF EXISTS ".$gs_form_pages_table.';';
     $wpdb->query($sql);