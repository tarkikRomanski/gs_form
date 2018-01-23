<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/*Страница изминения сообщения рассылки*/
function gs_form_show_email_text_edit(){
    if( current_user_can('manage_options') ) {
        gs_form_bootstrap_style();
        add_action('in_admin_footer', 'gs_form_bootstrap_script');

        /*Sanitize request*/
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($_POST['gs_form_mail_text'])
            && $_POST['gs_form_mail_text'] != get_option('gs_form_email_message')
        ) {

            $gs_form_mail_text = esc_sql($_POST['gs_form_mail_text']);

            update_option('gs_form_email_message', $gs_form_mail_text);
            gs_form_show_message('Mail text chainged!');
        }

        require_once 'templates/admin_email_edit.php';
    }
}

/*Главная страница меню плагина*/
function gs_form_show_admin_main_page(){
    if( current_user_can('manage_options') ) {
        gs_form_bootstrap_style();
        add_action('in_admin_footer', 'gs_form_bootstrap_script');
        /*Sanitize request*/
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($_POST['gs_form_main_color']) || isset($_POST['gs_form_accent_color'])) {

            $gs_form_main_color = esc_sql($_POST['gs_form_main_color']);
            $gs_form_accent_color = esc_sql($_POST['gs_form_accent_color']);

            update_option('gs_form_main_color', $gs_form_main_color);
            update_option('gs_form_accent_color', $gs_form_accent_color);

            gs_form_show_message(__('Forms color changed!', 'gs_form'));
        }

        if (isset($_POST['gs_form_phone'])
            && $_POST['gs_form_phone'] != get_option('gs_form_phone')
        ) {

            $gs_form_phone = esc_sql(intval($_POST['gs_form_phone']));

            update_option('gs_form_phone', $gs_form_phone);
            gs_form_show_message(__('Your phone number changed!', 'gs_form'));
        }

        if (isset($_POST['gs_form_rand_time'])
            && $_POST['gs_form_rand_time'] != get_option('gs_form_rand_time')
        ) {

            $gs_form_time = esc_sql(intval($_POST['gs_form_rand_time']));

            update_option('gs_form_rand_time', $gs_form_time);
            gs_form_show_message(__('Simulation time changed!', 'gs_form'));
        }

        if (isset($_POST['gs_form_rand_proc'])
            && $_POST['gs_form_rand_proc'] != get_option('gs_form_rand_proc')
        ) {

            $gs_form_rand_proc = esc_sql(intval($_POST['gs_form_rand_proc']));

            update_option('gs_form_rand_proc', $gs_form_rand_proc);
            gs_form_show_message(__('Randomize procent changed!', 'gs_form'));
        }

        if (isset($_POST['gs_form_email']) && $_POST['gs_form_email'] != get_option('gs_form_admin_email')) {

            $gs_form_email = esc_sql(sanitize_email($_POST['gs_form_email']));

            update_option('gs_form_admin_email', $gs_form_email);
            gs_form_show_message(__('Admin email changed!', 'gs_form'));
        }

        if (isset($_POST['gs_form_language']) && $_POST['gs_form_language'] != get_option('gs_form_admin_locale')) {

            $gs_form_language = esc_sql($_POST['gs_form_language']);

            update_option('gs_form_admin_locale', $gs_form_language);
            gs_form_show_message(__('Language changed!', 'gs_form'));
        }

        require_once 'templates/admin_main_page.php';
    }
}

/*Страница редактирования статических форм*/
function gs_form_show_admin_static_forms(){
    if( current_user_can('manage_options') ) {
        gs_form_bootstrap_style();
        add_action('in_admin_footer', 'gs_form_bootstrap_script');
        /*Sanitize request*/
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $options = [
            'gs_form_static1_1_title',
            'gs_form_static1_1_subtitle',
            'gs_form_static1_1_button',
            'gs_form_static1_2_title',
            'gs_form_static1_2_subtitle',
            'gs_form_static1_2_after',
            'gs_form_static1_3_title',
            'gs_form_static1_3_before',
            'gs_form_static1_3_after',
            'gs_form_static1_3_button',
            'gs_form_static1_4_title',
            'gs_form_static1_4_button',
            'gs_form_last_title',
            'gs_form_last_subtitle',
            'gs_form_last_1',
            'gs_form_last_2',
            'gs_form_last_3',
            'gs_form_last_before',
            'gs_form_last_after',
            'gs_form_static2_1_title',
            'gs_form_static2_1_subtitle',
            'gs_form_static2_1_button',
            'gs_form_static2_2_title',
            'gs_form_static2_2_steps',
            'gs_form_static2_2_button',
        ];

        $edit = false;

        foreach ($options as $option) {
            if (isset($_POST[$option])) {
                if ($_POST[$option] != get_option($option)) {

                    $option_val = esc_sql($_POST[$option]);

                    update_option($option, $option_val);
                    $edit = true;
                }
            }
        }

        if ($edit === true)
            gs_form_show_message(__('Data changed!', 'gs_form'));

        require_once 'templates/admin_forms_static_edit.php';
    }
}

/*Список всех пользователей*/
function gs_form_show_admin_user_list(){
    if( current_user_can('edit_others_posts') ) {
        gs_form_bootstrap_style();
        add_action('in_admin_footer', 'gs_form_bootstrap_script');
        /*Sanitize request*/
        $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        global $wpdb;

        $gs_form_data_table = $wpdb->prefix . 'gs_form_data';

        if (isset($_GET['gs_form_delete'])) {
            $delete_id = esc_sql(intval($_GET['gs_form_delete']));
            $result = $wpdb->delete($gs_form_data_table, ['id' => $delete_id]);
            if ($result) {
                gs_form_show_message('User data clearing');
            }
        }

        if (isset($_GET['gs_form_show'])) {
            gs_form_show_detail_anceta();
        } else {

            $show_link = $_SERVER['REQUEST_URI'] . '&gs_form_show=';
            $delete_link = $_SERVER['REQUEST_URI'] . '&gs_form_delete=';

            $query = 'SELECT * FROM `' . $gs_form_data_table . '`;';
            $data = $wpdb->get_results($query);

            require_once 'templates/admin_user_list.php';
        }
    }
}

/*Вывод анкеты*/
function gs_form_show_detail_anceta(){
    if( current_user_can('edit_others_posts') ) {
        gs_form_bootstrap_style();
        add_action('in_admin_footer', 'gs_form_bootstrap_script');

        $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        if (isset($_GET['gs_form_show']))
            $gs_form_show = esc_sql(intval($_GET['gs_form_show']));

        global $wpdb;

        $gs_form_data_table = $wpdb->prefix . 'gs_form_data';

        $query = 'SELECT * FROM `' . $gs_form_data_table . '` WHERE id=' . $gs_form_show . ';';
        $data = $wpdb->get_row($query);
        $anceta = json_decode(htmlspecialchars_decode($data->anceta));

        require_once 'templates/admin_anceta_list.php';
    }
}

/*Список всех форм*/
function gs_form_show_admin_forms_list(){
    if( current_user_can('edit_others_posts') ) {
        gs_form_bootstrap_style();
        add_action('in_admin_footer', 'gs_form_bootstrap_script');
        /*Sanitize request*/
        $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        if (isset($_GET['gs_form_edit'])) {
            gs_form_show_admin_forms_edit();
        } else {

            global $wpdb;

            $gs_form_pages_table = $wpdb->prefix . 'gs_form_pages';

            if (isset($_GET['gs_form_delete'])) {
                $delete_id = esc_sql(intval($_GET['gs_form_delete']));
                $result = $wpdb->delete($gs_form_pages_table, ['id' => $delete_id]);
                if ($result) {
                    gs_form_show_message(__('Form deleted', 'gs_form'));
                }
            }

            $edit_link = $_SERVER['REQUEST_URI'] . '&gs_form_edit=';
            $delete_link = $_SERVER['REQUEST_URI'] . '&gs_form_delete=';

            $query = 'SELECT * FROM `' . $gs_form_pages_table . '`;';
            $data = $wpdb->get_results($query);

            require_once 'templates/admin_forms_list.php';
        }
    }
}

/*Добавить новую форму*/
function gs_form_show_admin_forms_add(){
    if( current_user_can('edit_others_posts') ) {
        gs_form_bootstrap_style();
        add_action('in_admin_footer', 'gs_form_bootstrap_script');
        /*Sanitize request*/
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


        if (isset($_POST['gs_form_title'])
            && isset($_POST['gs_form_subtitle'])
            && isset($_POST['gs_form_content'])
        ) {

            $nav = (isset($_POST['gs_form_navigation']) ? '' : ' navigation="false"');

            $gs_form_title = esc_sql($_POST['gs_form_title']);
            $gs_form_subtitle = esc_sql($_POST['gs_form_subtitle']);
            $gs_form_content = esc_sql($_POST['gs_form_content']);

            global $wpdb;
            $gs_form_pages_table = $wpdb->prefix . 'gs_form_pages';
            $data = [
                'shortcode' => '[GS_FORM_3 form_id=""]',
                'title' => $gs_form_title,
                'subtitle' => $gs_form_subtitle,
                'content' => $gs_form_content
            ];
            $format = ['%s', '%s', '%s', '%s'];
            $result = $wpdb->insert($gs_form_pages_table, $data, $format);
            $id = $wpdb->insert_id;

            $data = ['shortcode' => '[GS_FORM_3 form_id="' . $id . '"' . $nav . ']'];
            $where = ['id' => $id];
            $format = ['%s'];

            $wpdb->update($gs_form_pages_table, $data, $where, $format);

            if ($result) {
                gs_form_show_message(__('Form', 'gs_form')
                    . ' <strong>' . $data['title'] . '</strong> '
                    . __('adding', 'gs_form')
                    . ' : ' . $data['shortcode'] . ' | '
                    . '. <a href="?page=gs_form_main_menu_forms_list">'
                    . __('Go to form', 'gs_form')
                    . '</a>');

            } else {
                gs_form_show_message(__('The form has not been created', 'gs_form'));

            }
        }

        require_once 'templates/admin_forms_new.php';
    }
}

/*Форма редактирования форм*/
function gs_form_show_admin_forms_edit() {
    if( current_user_can('edit_others_posts') ) {
        /*Sanitize request*/
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        global $wpdb;

        $gs_form_pages_table = $wpdb->prefix . 'gs_form_pages';
        $form_id = esc_sql(intval($_GET['gs_form_edit']));

        $query = 'select * from `' . $gs_form_pages_table . '` where `id`=' . $form_id;

        $old_data = $wpdb->get_row($query);

        if (isset($_POST['gs_form_title'])
            && isset($_POST['gs_form_subtitle'])
            && isset($_POST['gs_form_content'])
        ) {

            $nav = (isset($_POST['gs_form_navigation']) ? '' : ' navigation="false"');

            $gs_form_title = esc_sql($_POST['gs_form_title']);
            $gs_form_subtitle = esc_sql($_POST['gs_form_subtitle']);
            $gs_form_content = esc_sql($_POST['gs_form_content']);

            $data = [];
            $data['shortcode'] = '[GS_FORM_3 form_id="' . $form_id . '"' . $nav . ']';
            if ($gs_form_title != $old_data->title) {
                $data['title'] = $gs_form_title;
            }

            if ($gs_form_subtitle != $old_data->subtitle) {
                $data['subtitle'] = $gs_form_subtitle;
            }

            $data['content'] = $gs_form_content;


            $format = ['%s', '%s', '%s', '%s', '%s'];

            $where = ['id' => esc_sql($form_id)];

            $result = $wpdb->update($gs_form_pages_table, $data, $where, $format);

            $query = 'select * from `' . $gs_form_pages_table . '` where `id`=' . $form_id;

            $old_data = $wpdb->get_row($query);

            if ($result) {
                gs_form_show_message(__('Form', 'gs_form')
                    . ' <strong>' . $data['title'] . '</strong> '
                    . __('editing', 'gs_form')
                    . ' : ' . $data['shortcode']);
            }
        }

        $form_content = htmlspecialchars_decode($old_data->content);
        $form_content = explode('[GS_FORM_SECTION', str_replace('\"', '"', $form_content));
        unset($form_content[0]);

        $forms_content_array = [];
        foreach ($form_content as $k => $content) {
            $content = str_replace('" ', '",*%%*', $content);

            $content_arr = explode(',*%%*', $content);

            $buffer = [];
            foreach ($content_arr as $value) {
                preg_match('/\"(.+)\"/', $value, $result);
                $buffer[] = $result[1];
            }
            $forms_content_array[] = $buffer;
        }

        require_once "templates/admin_forms_edit.php";
    }
}

/*Documentation screen*/
function gs_form_show_admin_doc(){
    if( current_user_can('edit_others_posts') ) {
        require_once "templates/gs_form_how_use/gs_formhowuse.php";
    }
}