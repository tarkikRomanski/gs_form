<?php
/*
Plugin Name: GS Forms
Description: Generator Super Forms | Creation of forms for gathering information about site visitors, forms of questionnaires
Text Domain: gs_form
Version: 0.2.19
Author: Tarkik
Author URI: tarkik.pe.hu
Corporation: SlavaKil Agency
*/

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'admin_menu', 'gs_form_localization');
add_action( 'admin_menu', 'gs_form_add_admin_menu' );

add_action( 'wp_head', 'gs_form_style_colors' );

$gs_form_domain = 'gs_form';

include 'gs_form_month_loc.php';

/*Инициализация локализации*/
function gs_form_localization()
{
    global $gs_form_domain;

    load_plugin_textdomain($gs_form_domain, PLUGINDIR.'/'.dirname(plugin_basename(__FILE__)));

}


/*Инициализация данных для отправки формы*/
function gs_form_ajax(){
	wp_localize_script('gs_form_script', 'gsajax', 
		array(
			'url' => admin_url('admin-ajax.php')
		)
	);
}

/*Ответчик на ajax запрос*/
function gs_form_action_callback() {
    /*Sanitize request*/
    $_GET   = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
    $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    /*Validation request*/
	if(isset( $_POST['gs_name'] )
	&& isset( $_POST['gs_lastname'] )
	&& isset( $_POST['gs_number'] )
	&& isset( $_POST['gs_plz'] )
    && isset( $_POST['gs_anceta'] )
	&& isset( $_POST['gs_email'] ) ) {

	    $gs_form_name = esc_sql( $_POST['gs_name'] );
	    $gs_form_lastname = esc_sql( $_POST['gs_lastname'] );
	    $gs_form_number = esc_sql( intval( $_POST['gs_number'] ) );
	    $gs_form_email = esc_sql( sanitize_email( $_POST['gs_email'] ) );
	    $gs_form_plz = esc_sql( intval( $_POST['gs_plz'] ) );
	    $gs_form_anceta = esc_sql( $_POST['gs_anceta'] );

		global $wpdb;

		$gs_form_data_table = $wpdb->prefix.'gs_form_data';

		$data = [
			'name' => $gs_form_name,
			'lastname' => $gs_form_lastname,
			'email' => $gs_form_email,
			'phone_number' => $gs_form_number,
			'plz' => $gs_form_plz,
			'anceta' => $gs_form_anceta
		];

		$format = [ '%s', '%s', '%s', '%s', '%s', '%s' ];

		$res = $wpdb->insert( $gs_form_data_table, $data, $format );

		$headers[] = 'From: Der Anwalt <'.get_option('gs_form_admin_email').'>';
		$headers[] = 'content-type: text/html';

		$mail_text = htmlspecialchars_decode( get_option( 'gs_form_email_message', 'Welcome' ) );

		echo wp_mail( $gs_form_email, 'Тема', $mail_text, $headers );

		return $res;
	} 
	wp_die();
}

/*Загрузка основных ресурсов*/
function gs_form_load_resourse(){
	wp_enqueue_script( 'gs_form_script', plugins_url( 'assets/js/main.js', __FILE__ ), array( 'jquery' ) );
	gs_form_ajax();
	wp_enqueue_style( 'gs_form_style_main',  plugins_url( 'assets/css/gs_form_main.css', __FILE__ ) );
}

/*Функция для шорткода 1го типа формы*/
function gs_form_plz_form($atts){
	/*Подгружаем скрипты и стили*/
	gs_form_load_resourse();
	wp_enqueue_style( 'gs_form_style_loader',  plugins_url( 'assets/css/loader.min.css', __FILE__ ) );
	wp_enqueue_style('gs_form_first_style',  plugins_url( 'assets/css/first.css', __FILE__ ) );

	/*Инициализуем атрибуты шорткода*/
	extract(shortcode_atts(array(
     "headline" => 'Finde den besten Anwalt für Arbeitsrecht in Deiner Nähe',
     "subline" => 'Schnell, kostenlos & unverbindlich.'
     ), $atts));

	/*Возвращаем html разметку шорткода*/
	return '
		<form class="gs_form gs_form_type_1">
		<header>
			<h2 class="gs_form_headline">'.$headline.'</h2>
			<p class="gs_form_subline">'.$subline.'</p>

			<div class="gs_form_timeBlock">
				<p>Letzte Anfrage</p>
				<p>vor: <span id="gs_form_time">'.random_int(0, 20).'</span> min</p>
			</div>
		</header>

		<section data-step="1" class="gs_form_section gs_form_show">
			<h2>'.get_option( 'gs_form_static1_1_title' ).'</h2>
			<p class="gs_form_subtitle">'.get_option( 'gs_form_static1_1_subtitle' ).'</p>

			<input type="text" 
                maxlength="5" 
                id="gs_form_plz_num" 
                class="gs_form_min5 gs_form_input_number" >

			<button type="button" 
			        disabled="disabled" 
			        class="gs_form_button gs_form_next_step">
			    '. get_option( 'gs_form_static1_1_button' ) .'
			</button>
		</section>

		<section data-step="2" class="gs_form_section gs_form_randomaider">
			<h2>'. get_option( 'gs_form_static1_2_title' ) .'</h2>
			<p class="gs_form_subtitle">'. get_option( 'gs_form_static1_2_subtitle' ) .'</p>
			<div class="overlay-loader">
				<div class="loader">
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
				</div>
			</div>
			 
			 <p><span id="gs_form_lawyercounter">1</span> '. get_option( 'gs_form_static1_2_after' ) .'</p>

			 <input type="hidden" id="gs_form_rand_time" value="'.get_option('gs_form_rand_time', 2000).'">
			 <input type="hidden" id="gs_form_rand_proc" value="'.get_option('gs_form_rand_proc', 30).'">
		</section>

		<section data-step="3" class="gs_form_section">
			<h2>'. get_option( 'gs_form_static1_3_title' ) .'</h2>
			<img src="'. plugins_url( 'assets/img/smile.png', __FILE__ ) .'">
			 
			 <p>'. get_option( 'gs_form_static1_3_before' ) .' <span id="gs_form_lawyercount">22</span> '. get_option( 'gs_form_static1_3_after' ) .'</p>
			 <button class="gs_form_button gs_form_next_step">'. get_option( 'gs_form_static1_3_button' ) .'</button>
		</section>

		<section data-step="4" class="gs_form_section">
			'. gs_form_get_user_anceta() .'
		</section>

		<section data-step="5" class="gs_form_section">
			'. gs_form_get_last_section() .'
		</section>
	</form>
	';
}

/*Функция возвращает последнюю секуцию формы*/
function gs_form_get_last_section() {
    return '<h2>'. get_option( 'gs_form_last_title' ) .'</h2>
			<p class="gs_form_subtitle">'. get_option( 'gs_form_last_subtitle' ) .'</p>

			<div style="color:#97b795; text-align: left;">
                <span style="font-size:50px;padding-right:10px;font-weight:700;">1</span><span style="display:inline-block;width:124px;">'. get_option( 'gs_form_last_1' ) .'</span>
                <span style="font-size:40px;font-weight:normal;padding-top:10px;padding-right:2px;" class="glyphicon glyphicon-chevron-right"></span><br>
                <span style="font-size:50px;padding-right:10px;font-weight:700;">2</span><span style="display:inline-block;width:112px;">'. get_option( 'gs_form_last_2' ) .'</span>
                <span style="font-size:40px;font-weight:normal;padding-top:10px;padding-right:2px;" class="glyphicon glyphicon-chevron-right"></span><br>
                <span style="font-size:50px;padding-right:10px;font-weight:700;">3</span><span style="display:inline-block;">'. get_option( 'gs_form_last_3' ) .'</span>
            </div>

			<div class="gs_form_recall">'. get_option( 'gs_form_last_before' ) .'</div>
			<div class="gs_form_hotline"><a href="tel:'.get_option( 'gs_form_phone', '0800 800 30 08' ).'">'.get_option( 'gs_form_phone', '0800 800 30 08' ).'</a><span>'.get_option( 'gs_form_last_after' ).'</span></div>';
}

/*Функция возвращает анкету пользователя*/
function gs_form_get_user_anceta() {
    return '<h2>'. get_option( 'gs_form_static1_4_title' ) .'</h2>
						 
			 <input type="text" placeholder="'. get_option( 'gs_form_t_name' ) .'" class="gs_form_required gs_form_input_name gs_form_input_string">
			 <input type="text" placeholder="'. get_option( 'gs_form_t_lastname' ) .'" class="gs_form_required gs_form_input_lastname gs_form_input_string">
			 <input type="number" 
			        minlength="5" 
			        maxlength="19" 
			        placeholder="'. get_option( 'gs_form_t_phone' ) .'" 
			        class="gs_form_required gs_form_input_number ">
			 <input type="email" placeholder="'. get_option( 'gs_form_t_email' ) .'" class="gs_form_required gs_form_input_email">

			 <button  disabled="disabled" class="gs_form_button gs_form_end gs_form_next_step">
    '. get_option( 'gs_form_static1_4_button' ) .'
    </button>';
}

/*Функция для шорткода 2го типа формы*/
function gs_form_three_step_form($atts){
	/*Подгружаем скрипты и стили*/
	gs_form_load_resourse();
	wp_enqueue_style( 'gs_form_second_style',  plugins_url( 'assets/css/second.css', __FILE__ ) );

	/*Инициализуем атрибуты шорткода*/
	extract( shortcode_atts( array(
     "headline" => 'Finde den besten Anwalt für Arbeitsrecht in Deiner Nähe',
     "subline" => 'Schnell, kostenlos & unverbindlich.',
     "step_name" => get_option( 'gs_form_static2_2_steps' ),
     ), $atts));

	$step_name_array = explode( ',', $step_name );

	/*Возвращаем html разметку шорткода*/
	return '
		<form class="gs_form gs_form_type_2">
		<header>
			<h2 class="gs_form_headline">'. $headline .'</h2>
			<p class="gs_form_subline">'. $subline .'</p>
		</header>
			<div class="gs_form_steps_progress">
                <div class="gs_form_steps_progress_circles_block">
                    <div class="gs_form_progress-circle-1 gs_form_steps_progress__circle gs_form_steps_active">1</div>
                    <div class="gs_form_steps_progress__line line-1 gs_form_steps_active"></div>
                    <div class="gs_form_steps_progress__line line-2"></div>
                    <div class="gs_form_progress-circle-2 gs_form_steps_progress__circle" style="">2</div>
                    <div class="gs_form_steps_progress__line line-2"></div>
                    <div class="gs_form_steps_progress__line line-3"></div>
                    <div class="gs_form_progress-circle-3 gs_form_steps_progress__circle">3</div>                    
                </div>
		
                <div class="gs_form_steps_progress_circles_labels_block">
                    <div class="gs_form_steps_active gs_form_steps_progress__label label-1">'.$step_name_array[0].'</div>
                    <div class="gs_form_steps_progress__label label-2">'.$step_name_array[1].'</div>
                    <div class="gs_form_steps_progress__label label-3">'.$step_name_array[2].'</div>
                </div>
			</div>
			
		

		<section data-step="1" class="gs_form_section gs_form_show">
			<h2>'. get_option( 'gs_form_static2_1_title' ) .'</h2>			
			<p class="gs_form_label"><label for="beschreibe">'. get_option( 'gs_form_static2_1_subtitle' ) .'</label></p>
			<textarea name="beschreibe" class="gs_form_required" id="beschreibe" rows="12"></textarea>

			<button type="button" disabled="disabled" class="gs_form_button gs_form_next_step">
			    '. get_option( 'gs_form_static2_1_button' ) .'
            </button>
		</section>

		<section data-step="2" class="gs_form_section">
			<h2>'. get_option( 'gs_form_static2_2_title' ) .'</h2>			
			<div id="gs_form_user_data">

				 <div class="gs_form_control">
					<label for="gs_form_plz_name">'. get_option( 'gs_form_t_name' ) .'</label>
					 <input type="text" class="gs_form_required gs_form_input_name gs_form_input_string">
				</div>

				<div class="gs_form_control">
					 <label for="gs_form_plz_lastname">'. get_option( 'gs_form_t_lastname' ) .'</label>
					 <input type="text" class="gs_form_required gs_form_input_lastname gs_form_input_string">
				 </div>

				<div class="gs_form_control">
				 <label for="gs_form_plz_number">'. get_option( 'gs_form_t_phone' ) .'</label>
				 <input type="number" 
				        minlength="5" 
				        maxlength="19" 
				        class="gs_form_required gs_form_input_number">
				 </div>

				<div class="gs_form_control">
				 <label for="gs_form_plz_email">'. get_option( 'gs_form_t_email' ) .'</label>
				 <input type="email" class="gs_form_required gs_form_input_email">
				</div>

				 <button type="button" disabled="disabled" class="gs_form_button gs_form_end gs_form_next_step">
				 	'. get_option( 'gs_form_static2_2_button' ) .'
				 </button>

			</div>

		</section>
		
		<section data-step="3" class="gs_form_section">
			<h2>Danke für Deine Anfrage!</h2>			
			<p>Wir werden uns schnellstmöglich bei Dir melden.</p>
			<p>Falls Du weitere Fragen hast, kannst Du Dich gerne an unsere freundlichen Service-Mitarbeiter wenden unter 030 / 12 08 86 22 (Mo-Fr, 9-18 Uhr).</p>
			

		</section>

	</form>
	';
}

/*Функция для шорткода 3й формы*/
function gs_form_steps_form($atts){
	/*Подгружаем скрипты и стили*/
	gs_form_load_resourse();
	wp_enqueue_script( 'gs_form_thrid_script', plugins_url( 'assets/js/third.js', __FILE__ ) );
	wp_enqueue_style( 'gs_form_thrid_style',  plugins_url( 'assets/css/thrid.css', __FILE__ ) );

	/*Инициализуем атрибуты шорткода*/
	extract(shortcode_atts(array(
        "form_id" => 1,
        "navigation" => 'true'
     ), $atts));

	global $wpdb;
	$gs_form_pages_table = $wpdb->prefix.'gs_form_pages';
	$query = 'select * from `'.$gs_form_pages_table.'` where `id`='.$form_id;
	$form = $wpdb->get_row( $query );
	$content = htmlspecialchars_decode( $form->content );

	return '
		<form class="gs_form gs_form_type_3">
		<header>
			<h2 class="gs_form_headline">'.$form->title.'</h2>
			<p class="gs_form_subline">'.$form->subtitle.'</p>

			<div class="gs_form_timeBlock">
				<p>Letzte Anfrage</p>
				<p>vor: <span id="gs_form_time">'.random_int(0, 20).'</span> min</p>
			</div>
		</header>
		
		'.  ( $navigation=='true'?'<div class="gs_form_section_navigation"></div>':' ' ) .'

		'. do_shortcode( str_replace( '\\', '', $content ) ) .'

		<section class="gs_form_section gs_static">
			'. gs_form_get_user_anceta() .'
		</section>
		<section class="gs_form_section gs_static">
			'. gs_form_get_last_section() .'
		</section>
		</form>
	';
}

/*Шорткод секции*/
function gs_form_section($atts){
	extract(shortcode_atts(array(
     'question' => 'Question',
     'subtitle' => 'Subtitle',
     'answears' => 'Answear 1/Answear 2/Answear 3',
     'type' => 'radio-block',
     'button' => 'Send'
     ), $atts));

	

	switch ($type) {
		case 'radio-block':
			$answears_array = explode('/', $answears);
			
			$answear_grid = '<div class="gs_form_answear_grid">';
            $question_index = time() . random_int(0, 1000);
			foreach ($answears_array as $k=>$answear) {

				$answear_grid .= '<input class="gs_form_anceta_input" type="radio" id="'.$question_index.'-answear-'.$k.'" name="'.$question_index.'-answear" value="'.$answear.'" >';
				$answear_grid .= '<label for="'.$question_index.'-answear-'.$k.'"><span>'.$answear.'</span></label>';
			}
			$answear_grid .= '</div>';
			$html = '
				<section class="gs_form_section">
					<h2>'.$question.'</h2>
					<p class="gs_form_subtitle">'.$subtitle.'</p>

					' . $answear_grid . '

					<button type="button" disabled="disabled" class="gs_form_button gs_form_next_step">'.$button.'</button>
				</section>
			';

			return $html;
		case 'text':
			$html = '
				<section class="gs_form_section">
					<h2>'.$question.'</h2>
					<p class="gs_form_subtitle">'.$subtitle.'</p>

					<input type="text" class="gs_form_required gs_form_anceta_input" placeholder="'.$answears.'" >

					<button type="button" disabled="disabled" class="gs_form_button gs_form_next_step">'.$button.'</button>
				</section>
			';
			return $html;
        case 'plz':
        $html = '
				<section class="gs_form_section">
					<h2>'.$question.'</h2>
					<p class="gs_form_subtitle">'.$subtitle.'</p>

					<input type="text" maxlength="5" class="gs_form_required gs_form_anceta_input gs_form_input_number" placeholder="'.$answears.'" >

					<button type="button" disabled="disabled" class="gs_form_button gs_form_next_step">'.$button.'</button>
				</section>
			';
			return $html;
		case 'select':
			$answears_array = explode('/', $answears);
			$options = '';
			foreach ($answears_array as $value) {
				$options .= '<option value="'.$value.'">'.$value.'</option>';
			}
			$html = '
				<section class="gs_form_section">
					<h2>'.$question.'</h2>
					<p class="gs_form_subtitle">'.$subtitle.'</p>

					<select class="gs_form_anceta_input">
					<option selected="selected" disabled="disabled">--Select--</option>
					'.$options.'
					</select>

					<button type="button" disabled="disabled" class="gs_form_button gs_form_next_step">'.$button.'</button>
				</section>
			';

			return $html;
        case 'short_date':
            $month = gs_form_getMonthArray();
            $dayOptions = '';
                for ( $i=1; $i<=31; $i++ ) {
                    $dayOptions .= '<option value="Day: '. $i .'">'. $i .'</option>';
                 }
            $monthOptions = '';
                foreach ( $month as $m ) {
                    $monthOptions .= '<option value="Month: ' . $m . '">' . $m . '</option>';
                }

            $html = '
            <section class="gs_form_section">
                <h2>'. $question .'</h2>
                <p class="gs_form_subtitle">'. $subtitle .'</p>
            
                <select class="gs_form_anceta_input">
                    <option selected="selected" disabled="disabled">--Day--</option>
                   '. $dayOptions .'
                </select>
            
                <select class="gs_form_anceta_input">
                    <option selected="selected" disabled="disabled">--Month--</option>
                    '. $monthOptions .'
                </select>
            
                <button type="button" disabled="disabled" class="gs_form_button gs_form_next_step">'. $button .'</button>
            </section>
            ';
            return $html;
        case 'short_date_year':
            $month = gs_form_getMonthArray();
            $monthOptions = '';
            foreach ( $month as $m ) {
                $monthOptions .= '<option value="Month: ' . $m . '">' . $m . '</option>';
            }
            $yearOptions = '';
            for ( $i=1950; $i<=2050; $i++ ) {
                $yearOptions .= '<option '. (date('Y')==$i?'selected="selected"':'') .' value="Year: '. $i .'">'. $i .'</option>';
            }

            $html = '
            <section class="gs_form_section">
                <h2>'. $question .'</h2>
                <p class="gs_form_subtitle">'. $subtitle .'</p>
            
                <select class="gs_form_anceta_input">
                    <option selected="selected" disabled="disabled">--Month--</option>
                   '. $monthOptions .'
                </select>
            
                <select class="gs_form_anceta_input">
                    <option selected="selected" disabled="disabled">--Year--</option>
                    '. $yearOptions .'
                </select>
            
                <button type="button" disabled="disabled" class="gs_form_button gs_form_next_step">'. $button .'</button>
            </section>
            ';
            return $html;
        case 'date':
            $month = gs_form_getMonthArray();
            $dayOptions = '';
            for ( $i=1; $i<=31; $i++ ) {
                $dayOptions .= '<option value="Day: '. $i .'">'. $i .'</option>';
            }
            $yearOptions = '';
            for ( $i=1950; $i<=2050; $i++ ) {
                $yearOptions .= '<option '. (date('Y')==$i?'selected="selected"':'') .' value="Year: '. $i .'">'. $i .'</option>';
            }
            $monthOptions = '';
            foreach ( $month as $m ) {
                $monthOptions .= '<option value="Month: ' . $m . '">' . $m . '</option>';
            }

            $html = '
            <section class="gs_form_section">
                <h2>'. $question .'</h2>
                <p class="gs_form_subtitle">'. $subtitle .'</p>
                <div class="dateSection">
                    <select class="gs_form_anceta_input">
                        <option selected="selected" disabled="disabled">--Day--</option>
                       '. $dayOptions .'
                    </select>
                
                    <select class="gs_form_anceta_input">
                        <option selected="selected" disabled="disabled">--Month--</option>
                        '. $monthOptions .'
                    </select>
                    
                    <select class="gs_form_anceta_input">
                        <option selected="selected" disabled="disabled">--Year--</option>
                        '. $yearOptions .'
                    </select>
                </div>
                <button type="button" disabled="disabled" class="gs_form_button gs_form_next_step">'. $button .'</button>
            </section>
            ';
            return $html;
        case 'ptext':
            $html = '
				<section class="gs_form_section">
					<h2>'.$question.'</h2>
					<p class="gs_form_subtitle">'.$subtitle.'</p>

                    <div style="position:relative;">
                        <input type="text" 
                            class="gs_form_required gs_form_anceta_input gs_form_p_text" 
                            placeholder="'.$answears.'" >
                            <div>&#8364;</div>
                    </div>
					<button type="button" disabled="disabled" class="gs_form_button gs_form_next_step">'.$button.'</button>
				</section>
			';
            return $html;
		default:
			return 'fail';
	}
}

/*Функция активации плагина*/
function gs_form_on(){

    if( current_user_can( 'activate_plugins' ) ) {


	global $wpdb;

	$gs_form_data_table = $wpdb->prefix.'gs_form_data';
	$gs_form_pages_table = $wpdb->prefix.'gs_form_pages';

	//Создаем БД
	if($wpdb->get_var('SHOW TABLES LIKE `'.$gs_form_data_table.'`') != $gs_form_data_table) {
		$query = 'CREATE TABLE `'.$gs_form_data_table.'` ( 
		`id` Int( 255 ) AUTO_INCREMENT NOT NULL,
		`name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
		`lastname` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
		`phone_number` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
		`email` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
		`plz` VarChar( 20 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
		`anceta` Text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
		PRIMARY KEY id (id) );';

		$wpdb->query($query);
	}

	if($wpdb->get_var('SHOW TABLES LIKE `'.$gs_form_pages_table.'`') != $gs_form_pages_table) {
		$query = 'CREATE TABLE `'.$gs_form_pages_table.'` ( 
		`id` Int( 255 ) AUTO_INCREMENT NOT NULL,
		`shortcode` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
		`title` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
		`subtitle` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
		`content` Text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
		PRIMARY KEY id (id) );';

		$wpdb->query($query);
	}

	/*Инициализация опций*/
	require_once 'gs_form_option_init.php';

    }
}

/*Функция деактивации плагина*/
function gs_form_off(){
    if( current_user_can( 'activate_plugins' ) ) {
        require_once 'gs_form_option_deinit.php';
    }
}

/*Функция инициализации админ-меню*/
function gs_form_add_admin_menu(){
    if( current_user_can('edit_others_posts') ) {
        add_menu_page(
            'GS Form',
            'GS Form',
            'manage_options',
            'gs_form_main_menu',
            'gs_form_show_admin_main_page',
            'dashicons-format-aside',
            4);

        /*Инициализация подменю*/
        require_once 'gs_form_submenu_init.php';
    }
}

/*Подключение файла с функциями меню*/
require_once 'gs_form_admin_menu_functions.php';

/*Вывод сообщения*/
function gs_form_show_message($text){
    require_once 'templates/admin_show_message.php';
}

function gs_form_bootstrap_style(){
    wp_enqueue_style('gs_form_font_style', plugins_url( 'assets/css/font-awesome.min.css', __FILE__ ) );
    wp_enqueue_style('gs_form_bootstrap', plugins_url( 'assets/css/bootstrap.min.css', __FILE__ ) );
    wp_enqueue_style( 'gs_form_colorpicker', plugins_url( 'assets/css/bootstrap-colorpicker.min.css', __FILE__ ) );
}

function gs_form_style_colors() {
    $gs_form_main_color = get_option( 'gs_form_main_color' );
    $gs_form_accent_color = get_option( 'gs_form_accent_color' );
    echo '
    <style>
        .gs_form_type_1 .gs_form_button,
        .gs_form_type_2 .gs_form_button,
        .gs_form_type_3 .gs_form_button 
         {
                border-color: '. $gs_form_accent_color .';
                background-color: '. $gs_form_accent_color .';
        }
        
        .gs_form_type_1 .gs_form_button:hover,
         .gs_form_type_1 .gs_form_hotline a,
         .gs_form_type_3 .gs_form_hotline a,
         .gs_form_type_1 #gs_form_lawyercount, .gs_form_type_1 #gs_form_lawyercounter,
         .gs_form_type_3 #gs_form_lawyercount, .gs_form_type_3 #gs_form_lawyercounter,
         .gs_form_type_2 .gs_form_button:hover,
         .gs_form_type_3 .gs_form_button:hover
         {
            color: '. $gs_form_accent_color .';
        }
        
        .gs_form_type_1.gs_form input,
        .gs_form_type_3.gs_form input,
         .gs_form_type_2.gs_form, 
         .gs_form_type_3.gs_form, 
         .gs_form_type_1.gs_form,
         .gs_form_type_3 .gs_form_section_navigation_item,
         .gs_form_type_3.gs_form select
         {
                border: 2px solid '. $gs_form_main_color .' !important;
        }       
        
        .gs_form_type_3 .gs_form_section_navigation_item.active,
        .gs_form_type_3 .gs_form_anceta_input.gs_form_p_text+div
        {
            background-color: '. $gs_form_accent_color .';
        }
        
        .gs_form_type_3 .gs_form_answear_grid [type="radio"] + label 
        {
                border: 2px solid '. $gs_form_main_color .';
                color: '. $gs_form_main_color .';
        }
        
        .gs_form_type_3 .gs_form_answear_grid [type="radio"]:checked + label,
        .gs_form_type_3.gs_form header, 
        .gs_form_type_1.gs_form header, 
        .gs_form_type_2.gs_form header
        {
            background-color: '. $gs_form_main_color .';
        }
        
        
     </style>
    ';
}

function gs_form_bootstrap_script(){

    wp_enqueue_script(
        'gs_form_script_bootstrap',
        plugins_url( 'assets/js/bootstrap.min.js', __FILE__ ),
        array( 'jquery' ),
        '3.1',
        true);

    wp_enqueue_script(
        'gs_form_script_colorpicker',
        plugins_url('assets/js/bootstrap-colorpicker.min.js', __FILE__),
        array( 'gs_form_script_bootstrap' ),
        '0.1',
        true);

    wp_enqueue_script(
        'gs_form_script_admin',
        plugins_url('assets/js/admin.js', __FILE__),
        array( 'gs_form_script_bootstrap', 'gs_form_script_colorpicker' ),
        '0.1',
        true);

	echo '        
        <style>
            .tooltip-inner {
                    max-width: 600px !important;
                    width: 600px !important;;
            }
            .tooltip img {
                max-width: 100%;
            }
        </style>
	';
}

function gs_form_remove_ver_css( $src ) {
    if ( strpos( $src, 'ver=' ) 
        && ( strpos( $src, 'gs_form_main' )
            || strpos( $src, 'first' ) 
            || strpos( $src, 'second' ) 
            || strpos( $src, 'thrid' )) ) {
        $src = remove_query_arg( 'ver', $src );
        $theme = substr( get_option( 'gs_form_main_color' ), 1 )
            . substr( get_option( 'gs_form_accent_color' ), 1 );
        $src = add_query_arg( 'ver', $theme, $src );
    }
    return $src;
}
add_filter( 'style_loader_src', 'gs_form_remove_ver_css', 9999 );

// Добавляем шорткоди
add_shortcode('GS_FORM_1', 'gs_form_plz_form');
add_shortcode('GS_FORM_2', 'gs_form_three_step_form');
add_shortcode('GS_FORM_3', 'gs_form_steps_form');

add_shortcode('GS_FORM_SECTION', 'gs_form_section');

// Добавляем хуки
register_activation_hook( __FILE__, 'gs_form_on');
register_deactivation_hook( __FILE__, 'gs_form_off');
// Ajax хуки
add_action('wp_ajax_gs_form_action', 'gs_form_action_callback');
add_action('wp_ajax_nopriv_gs_form_action', 'gs_form_action_callback');
