<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
class pi_dtt_order{
    function __construct(){

        $this->email_position = pisol_dtt_get_setting('pi_dtt_detail_position_in_email', 'woocommerce_email_order_meta');
        /* Update order meta data */
        add_action( 'woocommerce_checkout_update_order_meta', array($this,'storeDetailInOrder') );

       // Displays order meta on order detail page on front end
       add_action( 'woocommerce_order_details_after_order_table_items', array($this,'orderSuccessPage'), 10, 1 );

       // Admin order page
       add_action( 'woocommerce_admin_order_data_after_shipping_address', array($this,'adminOrderSuccessPage'), 10, 1 );

       if($this->email_position == 'woocommerce_email_order_meta'){
            add_filter( 'woocommerce_email_order_meta_fields', array($this,"orderMetaFieldForEmail"), 10, 3 );
       }else{
            add_action( $this->email_position, array($this,"orderSuccessPageEmail"), 10, 4);
       }

       $this->extra_type_support_pickup_location = apply_filters('pisol_dtt_type_supporting_pickup_location','');

    }

    function storeDetailInOrder($order_id){
        if(pi_dtt_display_fields::showDateAndTime()):

            if ( ! empty( $_POST['pi_system_delivery_date'] ) ) {
                $system_date = strtotime($_POST['pi_system_delivery_date']) ? date('Y/m/d',strtotime($_POST['pi_system_delivery_date'])) : "";
                update_post_meta( $order_id, 'pi_system_delivery_date', sanitize_text_field( $system_date ) );
                $display_format = pi_dtt_date::translatedDate($system_date);
                update_post_meta( $order_id, 'pi_delivery_date', sanitize_text_field( $display_format ) );
            }
                
            if ( ! empty( $_POST['pi_delivery_time'] ) ) {
                update_post_meta( $order_id, 'pi_delivery_time', pisol_dtt_time::formatTimeForStorage(sanitize_text_field( $_POST['pi_delivery_time'] )) );
            }
        endif;
        
        $type = pi_dtt_delivery_type::getType();
        if ( !empty( $type ) && isset($_POST['pi_delivery_type'])) {
            update_post_meta( $order_id, 'pi_delivery_type', sanitize_text_field($type) );
        }else{
            update_post_meta( $order_id, 'pi_delivery_type', 'non-deliverable' );
        }

        if ( isset($_POST['pickup_location']) && ! empty( $_POST['pickup_location'] ) &&  ($_POST['pi_delivery_type'] == 'pickup' || $_POST['pi_delivery_type'] ==  $this->extra_type_support_pickup_location)) {
            $pickup_address = get_option($_POST['pickup_location'], "");

            update_post_meta( $order_id, 'pickup_location', sanitize_text_field($pickup_address) );
        }
        
            
    }

    function orderSuccessPage($order){
        

        $order_id = version_compare( WC_VERSION, '3.0.0', '<' ) ? $order->id : $order->get_id();
        
        $type = get_post_meta( $order_id, 'pi_delivery_type', true );
        $old_date = get_post_meta( $order_id, 'pi_delivery_date', true );
        $date = get_post_meta( $order_id, 'pi_system_delivery_date', true );
        $time = get_post_meta( $order_id, 'pi_delivery_time', true );
        $location = get_post_meta( $order_id, 'pickup_location', true );

        $dateLabel = __('Date','pisol-dtt');
        $timeLabel = __('Time','pisol-dtt');

        if($type == 'delivery'){
            $delivery_type = pisol_dtt_get_setting('pi_delivery_label', __('Delivery','pisol-dtt'));;
        }elseif($type == 'pickup'){
            $delivery_type = pisol_dtt_get_setting('pi_pickup_label', __('Pickup','pisol-dtt'));
        }elseif($type == 'non-deliverable'){
            $delivery_type = '';
        }

        
        $delivery_type = apply_filters('pisol_dtt_delivery_type_label_value',$delivery_type, $type, $order);

        $delivery_type = apply_filters('pisol_dtt_delivery_type_filter_by_order',$delivery_type, $type, $order);

        do_action('pisol_dtt_before_delivery_details', $order);

        if(!empty($type) && $type !== 'non-deliverable'){
        echo '<p class="pi-order-meta-type"> <strong>'.__('Delivery type','pisol-dtt').':</strong> ' . $delivery_type . '</p>';
        }

        if(pi_dtt_display_fields::showDateAndTime($type)):

            if(!empty($date)){
                echo '<p class="pi-order-meta-date"> <strong>'.esc_html($dateLabel).':</strong> ' . esc_html(pi_dtt_date::translatedDate($date)) . '</p>';
            }elseif(!empty($old_date)){
                echo '<p class="pi-order-meta-date"> <strong>'.esc_html($dateLabel).':</strong> ' . esc_html($old_date) . '</p>';
            }

           
            if(!empty($time)){
                echo '<p class="pi-order-meta-time"> <strong>'.esc_html($timeLabel).':</strong> ' . esc_html(pisol_dtt_time::formatTimeForDisplay($time)) . '</p>';
            }
            

        endif; 

        

        $location  = get_post_meta( $order_id, 'pickup_location', true );
        if(($type == 'pickup' || $type == $this->extra_type_support_pickup_location)  && $location != ''){
            echo '<p class="pi-order-pickup-location"><strong>'.apply_filters('pisol_dtt_pickup_location_label',__('Pickup location','pisol-dtt'), $type).':</strong><br> ' . ($location) . '</p>';
        }  

        do_action('pisol_dtt_after_delivery_details', $order);
        
    }

    function orderMetaFieldForEmail( $fields, $sent_to_admin, $order ) {

        $order_id = version_compare( WC_VERSION, '3.0.0', '<' ) ? $order->id : $order->get_id();
        
        $type = get_post_meta( $order_id, 'pi_delivery_type', true );
        $old_date = get_post_meta( $order_id, 'pi_delivery_date', true );
        $date = get_post_meta( $order_id, 'pi_system_delivery_date', true );
        $time = get_post_meta( $order_id, 'pi_delivery_time', true );
        $location = get_post_meta( $order_id, 'pickup_location', true );

        $dateLabel = __('Date','pisol-dtt');
        $timeLabel = __('Time','pisol-dtt');

        if($type == 'delivery'){
            $delivery_type = pisol_dtt_get_setting('pi_delivery_label', __('Delivery','pisol-dtt'));;
        }elseif($type == 'pickup'){
            $delivery_type = pisol_dtt_get_setting('pi_pickup_label', __('Pickup','pisol-dtt'));
        }elseif($type == 'non-deliverable'){
            $delivery_type = '';
        }

        

        $delivery_type = apply_filters('pisol_dtt_delivery_type_label_value',$delivery_type, $type, $order);

        $delivery_type = apply_filters('pisol_dtt_delivery_type_filter_by_order',$delivery_type, $type, $order);

        if(!empty($type) && $type !== 'non-deliverable'){
            $fields['pi_delivery_type'] = array(
                'label' => __('Delivery type','pisol-dtt'),
                'value' => $delivery_type
            );
        }
        
        if(pi_dtt_display_fields::showDateAndTime($type)):

            if(!empty($date)){
                $fields['pi_system_delivery_date'] = array(
                    'label' => esc_html($dateLabel),
                    'value' => esc_html(pi_dtt_date::translatedDate($date))
                );
            }
            
            
            if(!empty($time)){
                $fields['pi_delivery_time'] = array(
                    'label' => esc_html($timeLabel),
                    'value' => esc_html(pisol_dtt_time::formatTimeForDisplay($time))
                );
            }
           

        endif;

        $location  = get_post_meta( $order_id, 'pickup_location', true );
        if(($type == 'pickup' || $type == $this->extra_type_support_pickup_location)  && $location != ''){
            
            $pickup_location_label = apply_filters('pisol_dtt_pickup_location_label',__('Pickup location','pisol-dtt'), $type);

            $fields['pickup_location'] = array(
                'label' => $pickup_location_label,
                'value' => $location
            );
        }
    
        return $fields;
    }

    function orderSuccessPageEmail($order, $sent_to_admin, $plain_text, $email){
        

        $order_id = version_compare( WC_VERSION, '3.0.0', '<' ) ? $order->id : $order->get_id();
        
        $type = get_post_meta( $order_id, 'pi_delivery_type', true );
        $old_date = get_post_meta( $order_id, 'pi_delivery_date', true );
        $date = get_post_meta( $order_id, 'pi_system_delivery_date', true );
        $time = get_post_meta( $order_id, 'pi_delivery_time', true );
        $location = get_post_meta( $order_id, 'pickup_location', true );

        $dateLabel = __('Date','pisol-dtt');
        $timeLabel = __('Time','pisol-dtt');

        if($type == 'delivery'){
            $delivery_type = pisol_dtt_get_setting('pi_delivery_label', __('Delivery','pisol-dtt'));;
        }elseif($type == 'pickup'){
            $delivery_type = pisol_dtt_get_setting('pi_pickup_label', __('Pickup','pisol-dtt'));
        }elseif($type == 'non-deliverable'){
            $delivery_type = '';
        }

        

        $delivery_type = apply_filters('pisol_dtt_delivery_type_label_value',$delivery_type, $type, $order);

        $delivery_type = apply_filters('pisol_dtt_delivery_type_filter_by_order',$delivery_type, $type, $order);

        do_action('pisol_dtt_before_delivery_details', $order, $plain_text);

        if($plain_text){
            if(!empty($type) && $type !== 'non-deliverable'){
                echo __('Delivery type','pisol-dtt').': ' . $delivery_type . "\n";
            }

            if(pi_dtt_display_fields::showDateAndTime($type)):
                if(!empty($date)){
                    echo esc_html($dateLabel).': ' . esc_html(pi_dtt_date::translatedDate($date)) ."\n";
                }elseif(!empty($old_date)){
                    echo esc_html($dateLabel).': ' . esc_html($old_date)."\n";
                }

                if(!empty($time)){
                    echo esc_html($timeLabel).': ' . esc_html(pisol_dtt_time::formatTimeForDisplay($time)) ."\n";
                }
            endif; 

            $location  = get_post_meta( $order_id, 'pickup_location', true );
            if(($type == 'pickup' || $type == $this->extra_type_support_pickup_location)  && $location != ''){
                echo apply_filters('pisol_dtt_pickup_location_label',__('Pickup location','pisol-dtt'), $type).': ' . ($location) . "\n";
            }  
            echo "\n =====================\n\n";

        }else{

            if(!empty($type) && $type !== 'non-deliverable'){
            echo '<p class="pi-order-meta-type"> <strong>'.__('Delivery type','pisol-dtt').':</strong> ' . $delivery_type . '</p>';
            }

            if(pi_dtt_display_fields::showDateAndTime($type)):

                if(!empty($date)){
                    echo '<p class="pi-order-meta-date"> <strong>'.esc_html($dateLabel).':</strong> ' . esc_html(pi_dtt_date::translatedDate($date)) . '</p>';
                }elseif(!empty($old_date)){
                    echo '<p class="pi-order-meta-date"> <strong>'.esc_html($dateLabel).':</strong> ' . esc_html($old_date) . '</p>'.$new_line;
                }

                if(!empty($time)){
                    echo '<p class="pi-order-meta-time"> <strong>'.esc_html($timeLabel).':</strong> ' . esc_html(pisol_dtt_time::formatTimeForDisplay($time)) . '</p>';
                }

            endif; 

            

            $location  = get_post_meta( $order_id, 'pickup_location', true );
            if(($type == 'pickup' || $type == $this->extra_type_support_pickup_location)  && $location != ''){
                echo '<p><strong>'.apply_filters('pisol_dtt_pickup_location_label',__('Pickup location','pisol-dtt'), $type).':</strong><br> ' . ($location) . '</p>';
            }  
        
        }

        do_action('pisol_dtt_after_delivery_details', $order, $plain_text);
        
    }

    function adminOrderSuccessPage($order){
        ?>
        <div class="order_data_column">
		<h3><?php _e('Delivery details','pisol-dtt'); ?></h3>
        <?php
            $this->orderSuccessPage($order);
        ?>
        </div>
        <?php
    }

}

add_action('wp_loaded',function(){
    /**
     * This filter allow you to hide all the fields added by this plugin 
     * so you can use this to disable the plugin when you have virtual product in
     * your cart
     */
    /*
    $pisol_disable_dtt_completely = apply_filters('pisol_disable_dtt_completely',false);
    if($pisol_disable_dtt_completely){
        return ;
    }
    */
    new pi_dtt_order();
});
