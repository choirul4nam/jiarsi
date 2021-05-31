<?php
/* ThemeREX Updater support functions
------------------------------------------------------------------------------- */


// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'lymcoin_trx_updater_theme_setup9' ) ) {
    add_action( 'after_setup_theme', 'lymcoin_trx_updater_theme_setup9', 9 );
    function lymcoin_trx_updater_theme_setup9() {
        if ( is_admin() ) {
            add_filter( 'lymcoin_filter_tgmpa_required_plugins', 'lymcoin_trx_updater_tgmpa_required_plugins', 8 );
        }
    }
}


// Filter to add in the required plugins list
if ( !function_exists( 'lymcoin_trx_updater_tgmpa_required_plugins' ) ) {

    function lymcoin_trx_updater_tgmpa_required_plugins($list=array()) {
        if (lymcoin_storage_isset('required_plugins', 'trx_updater')) {
            $path = lymcoin_get_file_dir('plugins/trx_updater/trx_updater.zip');
            $list[] = array(

                'name' 		=> lymcoin_storage_get_array('required_plugins', 'trx_updater'),
                'slug'     => 'trx_updater',
                'version'  => '1.4.1',
                'source'	=> !empty($path) ? $path : 'upload://trx_updater.zip',
                'required' => false,
            );
        }
        return $list;
    }
}
