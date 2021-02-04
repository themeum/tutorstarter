<?php
/**
 * Handles adding select options for sub schema type
 * 
 * @package Tutor_Starter
 */

defined( 'ABSPATH' ) || exit;

/**
 * Local business options
 */
function tutorstarter_local_business_oprions() {
    $local_business = array(
        'AccountingService'  => __( 'Accounting Service', 'tutorstarter' ),
        'AmusementPark'      => __( 'Amusement Park', 'tutorstarter' ),
        'AutomotiveBusiness' => __( 'Automotive Business', 'tutorstarter' ),
    );

    return $local_business;
}
