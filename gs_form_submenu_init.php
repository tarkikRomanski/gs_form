<?php
if ( ! defined( 'ABSPATH' ) ) exit;
if( current_user_can('edit_others_posts') ) {
    add_submenu_page(
        'gs_form_main_menu',
        'GS Form | ' . __('Add new form', 'gs_form'),
        __('Add new form', 'gs_form'),
        'manage_options',
        'gs_form_main_menu_forms_add',
        'gs_form_show_admin_forms_add');
}
if( current_user_can('manage_options') ) {
    add_submenu_page(
        'gs_form_main_menu',
        'GS Form | ' . __('Static menu settings', 'gs_form'),
        __('Static menu settings', 'gs_form'),
        'manage_options',
        'gs_form_main_menu_static_forms',
        'gs_form_show_admin_static_forms');
}
if( current_user_can('edit_others_posts') ) {
    add_submenu_page(
        'gs_form_main_menu',
        'GS Form | ' . __('Forms list', 'gs_form'),
        __('Forms list', 'gs_form'),
        'manage_options',
        'gs_form_main_menu_forms_list',
        'gs_form_show_admin_forms_list');
}
if( current_user_can('edit_others_posts') ) {
    add_submenu_page(
        'gs_form_main_menu',
        'GS Form | ' . __('Questionnaires list', 'gs_form'),
        __('Questionnaires list', 'gs_form'),
        'manage_options',
        'gs_form_main_menu_user_list',
        'gs_form_show_admin_user_list');
}
if( current_user_can('manage_options') ) {
    add_submenu_page(
        'gs_form_main_menu',
        'GS Form | ' . __('Email text', 'gs_form'),
        __('Email text', 'gs_form'),
        'manage_options',
        'gs_form_main_menu_edit_email_text',
        'gs_form_show_email_text_edit');
}
if( current_user_can('edit_others_posts') ) {
    add_submenu_page(
        'gs_form_main_menu',
        'GS Form | ' . __('How use it', 'gs_form'),
        __('How use it', 'gs_form'),
        'manage_options',
        'gs_form_main_menu_doc',
        'gs_form_show_admin_doc');
}