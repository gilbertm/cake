<?php

class pisol_dtt_option_time_slot{

    private $setting = array();

    private $active_tab;

    private $this_tab = 'pi_time_slot';

    private $tab_name = "Time Slot (pro)";

    private $setting_key = 'pisol_time_slot';

    private $pro_version = false;

    function __construct(){

        $this->pro_version = pi_dtt_pro_check();

        $this->tab = filter_input( INPUT_GET, 'tab', FILTER_SANITIZE_STRING );
        $this->active_tab = $this->tab != "" ? $this->tab : 'default';

        $this->settings = array(
               array('field'=>'pi_time_slot')
                
            );
        

        if($this->this_tab == $this->active_tab){
            add_action('pisol_dtt_tab_content', array($this,'tab_content'));
        }

        add_action('pisol_dtt_tab', array($this,'tab'),5);
        
        $this->register_settings();

        
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
       <div class="alert bg-primary text-light">
       <strong>Available in PROM</strong>
        Using this you can show the delivery or pickup time as time range instead of the exact time
       </div>
        <img src="<?php echo PISOL_DTT_URL; ?>admin/img/time_slot_sample.png" class="img-fluid">
        <img src="<?php echo PISOL_DTT_URL; ?>admin/img/time_slot.png" class="img-fluid">
       <?php
    }

    
}

new pisol_dtt_option_time_slot();
