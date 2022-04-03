<?php

class pisol_dtt_option_pickup_location{

    private $setting = array();

    private $active_tab;

    private $this_tab = 'pickup_location';

    private $tab_name = "Pickup Locations";

    private $setting_key = 'pisol_dtt_pickup_location';

    function __construct(){

        $this->tab = filter_input( INPUT_GET, 'tab', FILTER_SANITIZE_STRING );
        $this->active_tab = $this->tab != "" ? $this->tab : 'default';

        $this->settings = array(
                array('field'=>'pi_pickup_address_1', 'label'=>__('Pickup location one','pisol-dtt'),'desc'=>__('Type your pickup address in this text box','pisol-dtt'), 'type'=>'textarea'), 

                array('field'=>'pi_pickup_address_2', 'label'=>__('Pickup location two','pisol-dtt'),'desc'=>__('Type your pickup address in this text box','pisol-dtt'), 'type'=>'textarea'), 
            );
        

        if($this->this_tab == $this->active_tab){
            add_action('pisol_dtt_tab_content', array($this,'tab_content'));
        }

        add_action('pisol_dtt_tab', array($this,'tab'),4);


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
        <div class="alert alert-info my-3 text-center">
        <h2 class="h5">Pro version allows you to add <i><u>Unlimited</u></i> number of pickup locations<h2>
        <a class="btn btn-primary btn-lg" href="<?php echo PISOL_DTT_BUY_URL; ?>" target="_blank">Click to Buy Now</a>
        </div>
        <input type="submit" name="submit" id="submit" class="btn btn-primary btn-lg my-3" value="<?php echo __('Save Changes','pisol-dtt'); ?>">
        </form>
       <?php
    }

   
}

/* if we have pro version setting for time tab then we can disable this */
new pisol_dtt_option_pickup_location();