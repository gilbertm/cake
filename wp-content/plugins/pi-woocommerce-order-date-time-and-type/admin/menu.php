<?php

class pisol_dtt_menu{

    
    function __construct(){
       
        add_action( 'admin_menu', array($this,'plugin_menu') );
        add_action('pisol_dtt_promotion', array($this,'promotion'));
    }

    function plugin_menu(){

        $require_capability = $this->getCapability();

        $menu = add_submenu_page('woocommerce', __('Date & Time','pisol-dtt'), __('Date & Time','pisol-dtt'), $require_capability, 'pisol-dtt',  array($this, 'menu_option_page')  );

        add_action("load-".$menu, array($this,'menu_page_style'));
    }

    function  getCapability(){
        $capability = 'manage_options';

        return (string)apply_filters('pisol_dtt_settings_cap', $capability);
    }

    function menu_option_page(){
        if(function_exists('settings_errors')){
            settings_errors();
        }
        ?>
        <div class="bootstrap-wrapper">
        <div class="container mt-2">
            <div class="row">
                    <div class="col-12">
                        <div class='bg-dark'>
                        <div class="row">
                            <div class="col-12 col-sm-2 py-2">
                            <a href="https://www.piwebsolution.com/" target="_blank"><img class="img-fluid ml-2" src="<?php echo PISOL_DTT_URL; ?>admin/img/pi-web-solution.svg"></a>
                            </div>
                            <div class="col-12 col-sm-10 d-flex text-center small pisol-top-menu">
                                <?php do_action('pisol_dtt_tab'); ?>
                                <a class=" mr-0 ml-auto fon-weight-bold px-2 text-light d-flex align-items-center bg-primary border-left border-right" target="_blank" href="https://www.piwebsolution.com/documentation-for-order-delivery-pickup-date-time-and-location-for-woocommerce/">
            Documentation 
        </a>
                            </div>
                        </div>
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-12">
                <div class="bg-light border p-3">
                    <div class="row">
                        <div class="col">
                        <?php do_action('pisol_dtt_tab_content'); ?>
                        </div>
                        <?php do_action('pisol_dtt_promotion'); ?>
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
        <?php
    }

    function menu_page_style(){
        wp_enqueue_style('pi_dtt_menu_page_style_bootstrap', plugins_url('css/bootstrap.css', __FILE__), array(), '2.4.9');
        wp_enqueue_style('pi_dtt_menu_page_style', plugins_url('css/style.css', __FILE__));

        wp_enqueue_style('pi_dtt_timepicker', plugins_url('css/jquery.timepicker.min.css', __FILE__));
    
        wp_enqueue_script( 'jquery-ui-datepicker' );
        wp_enqueue_script( 'pisol-jquery-ui-timepicker', plugins_url('js/jquery.timepicker.min.js', __FILE__) );
    
        wp_enqueue_style( 'jquery-ui',  plugins_url('css/jquery-ui.css', __FILE__));
        wp_enqueue_script( 'pi-dtt-custom',plugins_url('js/custom.js', __FILE__) );
           
        wp_localize_script('pi-dtt-custom','pi_dtt_settings', array('delivery_type'=> get_option('pi_type','Both')));

        wp_register_script( 'selectWoo', WC()->plugin_url() . '/assets/js/selectWoo/selectWoo.full.min.js', array( 'jquery' ) );
        wp_enqueue_script( 'selectWoo' );
        wp_enqueue_style( 'select2', WC()->plugin_url() . '/assets/css/select2.css');
    }

    function promotion(){
        if(isset($_GET['tab']) && $_GET['tab'] === 'addons') return;
        ?>
        <div class="col-12 col-sm-4">

           
            
            <div class="bg-dark text-light text-center mb-3">
                    <a href="<?php echo PISOL_DTT_BUY_URL; ?>" target="_blank">
                        <?php  new pisol_promotion("pi_order_date_time_installation_date"); ?>
                    </a>
            </div>  
            <div class="bg-primary p-3 text-light text-center mb-3 pi-shadow promotion-bg">
                <h2 class="text-light font-weight-light h3"><span>Get Pro for <h2 class="h2 font-weight-bold my-2 text-light"><?php echo PISOL_DTT_PRICE; ?></h2></span></h2>
                <a class="btn btn-danger btn-sm text-uppercase mb-2" href="<?php echo  PISOL_DTT_BUY_URL; ?>" target="_blank">Buy Now !!</a><br>
                <a class="btn btn-sm mb-2 btn-light text-uppercase" href="http://websitemaintenanceservice.in/dtt_demo/" target="_blank">Try Pro on demo site</a>
                <div class="inside">
                    PRO version offer more advanced features like:<br><br>
                    <ul class="text-left  h6 font-weight-light pisol-pro-feature-list">
                    <li class="border-top py-2 h6 font-weight-light">Set <span class="font-weight-bold text-light">order limit on Days, Date, & Time Slot</span></li>
                    <li class="border-top py-2 h6 font-weight-light">Set different <span class="font-weight-bold text-light">preparation time for Delivery and Pickup</span></li>
                    
                    <li class="border-top py-2 h6 font-weight-light">Show pickup or delivery time as a <span class="font-weight-bold text-light">Range of time instead of the exact time</span></li>
                    <li class="border-top py-2 h6 font-weight-light">Set pickup, delivery times restriction based on the <span class="font-weight-bold text-light">days of the week</span></li>
                    <li class="border-top py-2 h6 font-weight-light"><span class="font-weight-bold text-light">Disable delivery time</span> option and have an only delivery date</li>
                    <li class="border-top py-2 h6 font-weight-light">
                    <span class="font-weight-bold text-light">Disable date and time based on delivery method</span>, so you can remove date and time option if user want delivery and show it if user want a pickup
                    </li>
                    <li class="border-top py-2 h6 font-weight-light">Set unlimited <span class="font-weight-bold text-light">pickup location</span></li>
                    <li class="border-top border-top py-2 h6 font-weight-light">Set unlimited <span class="font-weight-bold text-light">pickup holidays</span></li>
                    <li class="border-top border-top py-2 h6 font-weight-light">Set unlimited <span class="font-weight-bold text-light">delivery holidays</span></li>
                    <li class="border-top border-top py-2 h6 font-weight-light">Change the <span class="font-weight-bold text-light">time interval</span> in the time selection</li>
                    <li class="border-top border-top py-2 h6 font-weight-light">Set a pre-order day <span class="font-weight-bold text-light">greater than 10 days</span></li>
                    <li class="border-top border-top py-2 h6 font-weight-light">Set <span class="font-weight-bold text-light">different delivery or pickup time</span> for different days of the week</li>
                    <li class="border-top border-top py-2 h6 font-weight-light">Make <span class="font-weight-bold text-light">Time as non-required</span> field based on delivery type, so time can be required for pic-up but can be left blank for delivery</li>
                    <li class="border-top border-top py-2 h6 font-weight-light">
                    <span class="font-weight-bold text-light">You can make Delivery/Pickup date optional too</span>, that you can have it optional for delivery but required for preparation 
                    </li>
                    <li class="border-top border-top py-2 h6 font-weight-light">
                    <span class="font-weight-bold text-light">Show custom message</span> e.g: date and time of delivery are approximate
                    </li>
                    <li class="border-top border-top py-2 h6 font-weight-light">
                    <span class="font-weight-bold text-light">Change the background color</span> of the button from within the plugin setting
                    </li>
                    <li class="border-top border-top py-2 h6 font-weight-light">
                    Pro version support <span class="font-weight-bold text-light">Invoice PDF</span> generated by"WooCommerce PDF Invoices & Packing Slips" plugin</li>
                    <li class="border-top border-top py-2 h6 font-weight-light">You can <span class="font-weight-bold text-light">hide checkout form field</span> as per the shipping type (delivery or pickup) selected by the customer</li>
                    <li class="border-top border-top py-2 h6 font-weight-light">Change the first day of the Week in the front end calendar</li>
                    <li class="border-top border-top py-2 h6 font-weight-light">Allows you to handle <span class="font-weight-bold text-light">Virtual product</span>, E.g: remove this plugin setting if all the product in cart are Virtual product</li>
                    <li class="border-top border-top py-2 h6 font-weight-light">Set a Same day Delivery/Pickup <span class="font-weight-bold text-light">Virtual product</span>cutoff time</span></li>
                    <li class="border-top border-top py-2 h6 font-weight-light">Set a Next day Delivery/Pickup <span class="font-weight-bold text-light">Virtual product</span>cutoff time</span></li>
                    <li class="border-top border-top py-2 h6 font-weight-light"><span class="font-weight-bold text-light">Change payment gateway/method</span> as per the delivery type selected by customer</li>
                    <li class="border-top border-top py-2 h6 font-weight-light">Send new <span class="font-weight-bold text-light">order email to respective store</span> from which user will pickup his order</li>
                    <li class="border-top border-top py-2 h6 font-weight-light"><span class="font-weight-bold text-light">Allow special date</span> outside your pre-order date range</li>
                    <li class="border-top border-top py-2 h6 font-weight-light"><span class="font-weight-bold text-light">Force special date</span> order only</li>
                    <li class="border-top border-top py-2 h6 font-weight-light"><span class="font-weight-bold text-light">And many more features...</span></li>
                    </ul>
                    <a class="btn btn-light" href="<?php echo  PISOL_DTT_BUY_URL; ?>" target="_blank">Click to Buy Now</a>
                </div>
            </div>
        </div>
        
        <?php
    }

}

new pisol_dtt_menu();