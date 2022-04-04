<?php

namespace VendorFPF;

/**
 * WP Desk Tracker
 *
 * @class        WPDESK_Tracker
 * @version        1.3.2
 * @package        WPDESK/Helper
 * @category    Class
 * @author        WP Desk
 */
if (!\defined('ABSPATH')) {
    exit;
}
if (!\class_exists('VendorFPF\\WPDesk_Tracker_Data_Provider_Jetpack')) {
    /**
     * Class WPDesk_Tracker_Data_Provider_Jetpack
     */
    class WPDesk_Tracker_Data_Provider_Jetpack implements \WPDesk_Tracker_Data_Provider
    {
        /**
         * Info about jetpack.
         *
         * @return array Data provided to tracker.
         */
        public function get_data()
        {
            $data = [];
            $data['jetpack_version'] = \defined('VendorFPF\\JETPACK__VERSION') ? \VendorFPF\JETPACK__VERSION : 'none';
            $data['jetpack_connected'] = \class_exists('VendorFPF\\Jetpack') && \is_callable('Jetpack::is_active') && \VendorFPF\Jetpack::is_active() ? 'yes' : 'no';
            $data['jetpack_is_staging'] = \class_exists('VendorFPF\\Jetpack') && \is_callable('Jetpack::is_staging_site') && \VendorFPF\Jetpack::is_staging_site() ? 'yes' : 'no';
            $data['connect_installed'] = \class_exists('VendorFPF\\WC_Connect_Loader') ? 'yes' : 'no';
            $data['connect_active'] = \class_exists('VendorFPF\\WC_Connect_Loader') && \wp_next_scheduled('wc_connect_fetch_service_schemas') ? 'yes' : 'no';
            return $data;
        }
    }
}
