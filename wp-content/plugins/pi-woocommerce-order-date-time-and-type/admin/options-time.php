<?php

class pisol_dtt_option_time{

    private $setting = array();

    private $active_tab;

    private $this_tab = 'time';

    private $tab_name = "Time setting";

    private $setting_key = 'pisol_dtt_time';

    function __construct(){

        $this->tab = filter_input( INPUT_GET, 'tab', FILTER_SANITIZE_STRING );
        $this->active_tab = $this->tab != "" ? $this->tab : 'default';

        

        $this->settings = array(
                array('field'=>'pi_delivery_start_time', 'label'=>__('Delivery start time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly'), 

                array('field'=>'pi_delivery_end_time', 'label'=>__('Delivery end time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly') , 

                array('field'=>'pi_pickup_start_time', 'label'=>__('Pickup start time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly'), 

                array('field'=>'pi_pickup_end_time', 'label'=>__('Pickup end time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly'), 

                array('field'=>'sunday', 'class'=> 'bg-secondary text-light', 'class_title'=>'text-light font-weight-light h4', 'label'=>__('You can set pickup or delivery start and end time specific to days using the below setting','pisol-dtt'), 'type'=>'setting_category'), 
                array('field'=>'sunday', 'class'=> 'bg-primary text-light', 'class_title'=>'text-light font-weight-light h4', 'label'=>__('Sunday','pisol-dtt'), 'type'=>'setting_category'), 

                array('field'=>'pi_delivery_sunday_start_time', 'label'=>__('Delivery start time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly','pro'=>true), 

                array('field'=>'pi_delivery_sunday_end_time', 'label'=>__('Delivery end time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly','pro'=>true) , 

                array('field'=>'pi_pickup_sunday_start_time', 'label'=>__('Pickup start time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly','pro'=>true), 

                array('field'=>'pi_pickup_sunday_end_time', 'label'=>__('Pickup end time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly','pro'=>true), 

                array('field'=>'monday', 'class'=> 'bg-primary text-light', 'class_title'=>'text-light font-weight-light h4', 'label'=>__('Monday','pisol-dtt'), 'type'=>'setting_category'), 

                array('field'=>'pi_delivery_monday_start_time', 'label'=>__('Delivery start time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly','pro'=>true),

                array('field'=>'pi_delivery_monday_end_time', 'label'=>__('Delivery end time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly','pro'=>true) ,

                array('field'=>'pi_pickup_monday_start_time', 'label'=>__('Pickup start time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly','pro'=>true), 

                array('field'=>'pi_pickup_monday_end_time', 'label'=>__('Pickup end time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly','pro'=>true), 

                array('field'=>'tuesday', 'class'=> 'bg-primary text-light', 'class_title'=>'text-light font-weight-light h4', 'label'=>__('Tuesday','pisol-dtt'), 'type'=>'setting_category'), 

                array('field'=>'pi_delivery_tuesday_start_time', 'label'=>__('Delivery start time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly','pro'=>true), 

                array('field'=>'pi_delivery_tuesday_end_time', 'label'=>__('Delivery end time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly','pro'=>true) , 

                array('field'=>'pi_pickup_tuesday_start_time', 'label'=>__('Pickup start time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly','pro'=>true), 

                array('field'=>'pi_pickup_tuesday_end_time', 'label'=>__('Pickup end time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly','pro'=>true), 

                array('field'=>'wednesday', 'class'=> 'bg-primary text-light', 'class_title'=>'text-light font-weight-light h4', 'label'=>__('Wednesday','pisol-dtt'), 'type'=>'setting_category'), 

                array('field'=>'pi_delivery_wednesday_start_time', 'label'=>__('Delivery start time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly','pro'=>true),

                array('field'=>'pi_delivery_wednesday_end_time', 'label'=>__('Delivery end time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly','pro'=>true) ,

                array('field'=>'pi_pickup_wednesday_start_time', 'label'=>__('Pickup start time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly','pro'=>true),

                array('field'=>'pi_pickup_wednesday_end_time', 'label'=>__('Pickup end time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly','pro'=>true), 

                array('field'=>'thursday', 'class'=> 'bg-primary text-light', 'class_title'=>'text-light font-weight-light h4', 'label'=>__('Thursday','pisol-dtt'), 'type'=>'setting_category'), 

                array('field'=>'pi_delivery_thursday_start_time', 'label'=>__('Delivery start time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly','pro'=>true), 

                array('field'=>'pi_delivery_thursday_end_time', 'label'=>__('Delivery end time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly','pro'=>true) , 

                array('field'=>'pi_pickup_thursday_start_time', 'label'=>__('Pickup start time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly','pro'=>true), 

                array('field'=>'pi_pickup_thursday_end_time', 'label'=>__('Pickup end time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly','pro'=>true), 

                array('field'=>'friday', 'class'=> 'bg-primary text-light', 'class_title'=>'text-light font-weight-light h4', 'label'=>__('Friday','pisol-dtt'), 'type'=>'setting_category'), 

                array('field'=>'pi_delivery_friday_start_time', 'label'=>__('Delivery start time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly','pro'=>true),

                array('field'=>'pi_delivery_friday_end_time', 'label'=>__('Delivery end time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly','pro'=>true) , 

                array('field'=>'pi_pickup_friday_start_time', 'label'=>__('Pickup start time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly','pro'=>true), 

                array('field'=>'pi_pickup_friday_end_time', 'label'=>__('Pickup end time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly','pro'=>true), 

                array('field'=>'saturday', 'class'=> 'bg-primary text-light', 'class_title'=>'text-light font-weight-light h4', 'label'=>__('Saturday','pisol-dtt'), 'type'=>'setting_category'), 

                array('field'=>'pi_delivery_saturday_start_time', 'label'=>__('Delivery start time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly','pro'=>true),

                array('field'=>'pi_delivery_saturday_end_time', 'label'=>__('Delivery end time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly','pro'=>true) ,

                array('field'=>'pi_pickup_saturday_start_time', 'label'=>__('Pickup start time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly','pro'=>true),

                array('field'=>'pi_pickup_saturday_end_time', 'label'=>__('Pickup end time','pisol-dtt'), 'type'=>'text', 'required'=>'required', 'readonly'=>'readonly','pro'=>true), 
            
            );
        

        if($this->this_tab == $this->active_tab){
            add_action('pisol_dtt_tab_content', array($this,'tab_content'));
        }

        add_action('pisol_dtt_tab', array($this,'tab'),2);     
        
        add_action('admin_notices',array($this,'validateTime'));

        $this->register_settings();

        if(PISOL_DTT_FREE_RESET_SETTING){
            $this->delete_settings();
        }

    }

    function delete_settings(){
        foreach($this->settings as $setting){
            delete_option( $setting['field'] );
        }
    }

    function register_settings(){   

        foreach($this->settings as $setting){
                register_setting( $this->setting_key, $setting['field']);
        }
    
    }

    function tab(){
        $page = filter_input( INPUT_GET, 'page', FILTER_SANITIZE_STRING );
        ?>
        <a class=" px-2 text-light d-flex align-items-center  border-left border-right  <?php echo ($this->active_tab == $this->this_tab ? 'bg-primary' : 'bg-secondary'); ?>" href="<?php echo admin_url( 'admin.php?page='.$page.'&tab='.$this->this_tab ); ?>">
            <?php _e( $this->tab_name, 'pisol-dtt' ); ?> 
        </a>
        <?php
    }

    function tab_content(){
       ?>
        <form method="post" action="options.php"  class="pisol-setting-form">
        <?php settings_fields( $this->setting_key ); ?>
        <?php
            foreach($this->settings as $setting){
                new pisol_class_form($setting, $this->setting_key);
            }
        ?>
        <input type="submit" name="submit" id="submit" class="btn btn-primary btn-lg my-3" value="<?php echo __('Save Changes','pisol-dtt'); ?>">
        </form>
       <?php
    }

    function validateTime(){
        $delivery_start = get_option('pi_delivery_start_time', '');
        $delivery_end = get_option('pi_delivery_end_time', '');
        $pickup_start = get_option('pi_pickup_start_time', '');
        $pickup_end = get_option('pi_pickup_end_time', '');
        
        $time_enabled = get_option('pi_datetime', true);

        if(empty($time_enabled)) return;

        $delivery_types = get_option('pi_type', 'Both');
        

        if($delivery_types == 'Both' || $delivery_types == 'Delivery'){
            if( !empty($delivery_start) && !empty($delivery_end) ){
                $delivery_start_time = strtotime($delivery_start);
                $delivery_end_time = strtotime($delivery_end);

                if($delivery_start_time > $delivery_end_time){
                    self::adminError('Delivery start time cant be grater then the end time');
                }
            }

            if( empty($delivery_start) && empty($delivery_end) ){
                
                self::adminError('Set delivery timing else default timing will be used 9 AM to 9 PM');
                
            }
        }

        if($delivery_types == 'Both' || $delivery_types == 'Pickup'){
            if(!empty($pickup_start) && !empty($pickup_end) ){
                $pickup_start_time = strtotime($pickup_start);
                $pickup_end_time = strtotime($pickup_end);

                if($pickup_start_time > $pickup_end_time){
                    self::adminError('Pickup start time cant be grater then the end time');
                }
            }

            if( empty($delivery_start) && empty($delivery_end) ){
                
                self::adminError('Set pickup timing else default timing will be used 9 AM to 9 PM');
                
            }
        }

    }

    static function adminError($msg){
        $page = admin_url('admin.php?page=pisol-dtt&tab=time');
        echo sprintf('<div class="notice notice-error is-dismissible"><p><strong>%s</strong> <a href="%s">Click here to correct this issue</a></p></div>', $msg, esc_attr($page));
    }
   
}

/* if we have pro version setting for time tab then we can disable this */
new pisol_dtt_option_time();


