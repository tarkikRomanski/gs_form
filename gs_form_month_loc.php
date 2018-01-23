<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function gs_form_getMonthArray($language = null ) {
    if ( $language === null )
        $language = get_option( 'gs_form_admin_locale' );

    switch ( $language ) {
        case 'ua':
            return [
              'Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень',
            ];
        case 'ru':
            return [
                'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь',
            ];
        case 'en':
            return [
                'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August','September','October','November','December',
            ];
        case 'de':
            return [
                'Januar', 'Februar', 'März', 'April', 'Mai', 'June', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember',
            ];
    }
}