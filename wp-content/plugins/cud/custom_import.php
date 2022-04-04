<?php
/*
    Plugin Name: Canadian University Dubai
    Plugin URI: http://www.cud.ac.ae
    Description: Plugin for importing external json exposed by the drupal version
    Author: ++g++
    Date: 05-05-2020
    Version: 0.1
    Author URI: http://www.gccgeek.com
    */

function cud_import_drupal_faculty()
{

    // unhook this function so it doesn't loop infinitely
    remove_action('admin_post_cud_import_drupal_faculty', 'cud_import_drupal_faculty');

    include plugin_dir_path(__FILE__)  . 'imports/faculty.php';

    echo "----- done! -----";

    die();
}

add_action('admin_footer', 'ajax_cud_import_drupal_faculty');

function ajax_cud_import_drupal_faculty()
{
?>
    <script type="text/javascript">
        jQuery('#faculty').on('click', function() {

            jQuery('#faculty-result').html("Started...");

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'cud_import_drupal_faculty'
                },
                success: function(data) {
                    jQuery('#faculty-result').html(data);
                }
            });

        });
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_cud_import_drupal_faculty', 'cud_import_drupal_faculty');
add_action('wp_ajax_nopriv_cud_import_drupal_faculty', 'cud_import_drupal_faculty');


function cud_import_drupal_department()
{

    // unhook this function so it doesn't loop infinitely
    remove_action('admin_post_cud_import_drupal_department', 'cud_import_drupal_department');

    include plugin_dir_path(__FILE__)  . 'imports/department.php';

    echo "----- done! -----";

    die();
}

add_action('admin_footer', 'ajax_cud_import_drupal_department');

function ajax_cud_import_drupal_department()
{
?>
    <script type="text/javascript">
        jQuery('#department').on('click', function() {

            jQuery('#department-result').html("Started...");

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'cud_import_drupal_department'
                },
                success: function(data) {
                    jQuery('#department-result').html(data);
                }
            });

        });
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_cud_import_drupal_department', 'cud_import_drupal_department');
add_action('wp_ajax_nopriv_cud_import_drupal_department', 'cud_import_drupal_department');


function cud_import_drupal_studyplan()
{
    // unhook this function so it doesn't loop infinitely
    remove_action('admin_post_cud_import_drupal_studyplan', 'cud_import_drupal_studyplan');

    include plugin_dir_path(__FILE__)  . 'imports/studyplan.php';

    echo "----- done! -----";

    die();
}

add_action('admin_footer', 'ajax_cud_import_drupal_studyplan');

function ajax_cud_import_drupal_studyplan()
{
?>
    <script type="text/javascript">
        jQuery('#studyplan').on('click', function() {

            jQuery('#studyplan-result').html("Started...");

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'cud_import_drupal_studyplan'
                },
                success: function(data) {
                    jQuery('#studyplan-result').html(data);
                }
            });

        });
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_cud_import_drupal_studyplan', 'cud_import_drupal_studyplan');
add_action('wp_ajax_nopriv_cud_import_drupal_studyplan', 'cud_import_drupal_studyplan');


function cud_import_drupal_program()
{
    // unhook this function so it doesn't loop infinitely
    remove_action('admin_post_cud_import_drupal_program', 'cud_import_drupal_program');

    include plugin_dir_path(__FILE__)  . 'imports/program_as_courses.php';

    echo "----- done! -----";

    die();
}

add_action('admin_footer', 'ajax_cud_import_drupal_program');

function ajax_cud_import_drupal_program()
{
?>
    <script type="text/javascript">
        jQuery('#program').on('click', function() {

            jQuery('#program-result').html("Started...");

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'cud_import_drupal_program'
                },
                success: function(data) {
                    jQuery('#program-result').html(data);
                }
            });

        });
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_cud_import_drupal_program', 'cud_import_drupal_program');
add_action('wp_ajax_nopriv_cud_import_drupal_program', 'cud_import_drupal_program');


/* ------------------------------------------------ accreditation ------------------------------------------------ */

function cud_import_drupal_accreditation()
{
    // unhook this function so it doesn't loop infinitely
    remove_action('admin_post_cud_import_drupal_accreditation', 'cud_import_drupal_accreditation');

    include plugin_dir_path(__FILE__)  . 'imports/accreditation.php';

    echo "----- done! -----";

    die();
}

add_action('admin_footer', 'ajax_cud_import_drupal_accreditation');

function ajax_cud_import_drupal_accreditation()
{
?>
    <script type="text/javascript">
        jQuery('#accreditation').on('click', function() {

            jQuery('#accreditation-result').html("Started...");

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'cud_import_drupal_accreditation'
                },
                success: function(data) {
                    jQuery('#accreditation-result').html(data);
                }
            });

        });
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_cud_import_drupal_accreditation', 'cud_import_drupal_accreditation');
add_action('wp_ajax_nopriv_cud_import_drupal_accreditation', 'cud_import_drupal_accreditation');

/* ------------------------------------------------ alumni ------------------------------------------------ */

function cud_import_drupal_alumni()
{
    // unhook this function so it doesn't loop infinitely
    remove_action('admin_post_cud_import_drupal_alumni', 'cud_import_drupal_alumni');

    include plugin_dir_path(__FILE__)  . 'imports/alumni.php';

    echo "----- done! -----";

    die();
}

add_action('admin_footer', 'ajax_cud_import_drupal_alumni');

function ajax_cud_import_drupal_alumni()
{
?>
    <script type="text/javascript">
        jQuery('#alumni').on('click', function() {

            jQuery('#alumni-result').html("Started...");

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'cud_import_drupal_alumni'
                },
                success: function(data) {
                    jQuery('#alumni-result').html(data);
                }
            });

        });
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_cud_import_drupal_alumni', 'cud_import_drupal_alumni');
add_action('wp_ajax_nopriv_cud_import_drupal_alumni', 'cud_import_drupal_alumni');

/* ------------------------------------------------ outreach ------------------------------------------------ */

function cud_import_drupal_outreach()
{
    // unhook this function so it doesn't loop infinitely
    remove_action('admin_post_cud_import_drupal_outreach', 'cud_import_drupal_outreach');

    include plugin_dir_path(__FILE__)  . 'imports/outreach.php';

    echo "----- done! -----";

    die();
}

add_action('admin_footer', 'ajax_cud_import_drupal_outreach');

function ajax_cud_import_drupal_outreach()
{
?>
    <script type="text/javascript">
        jQuery('#outreach').on('click', function() {

            jQuery('#outreach-result').html("Started...");

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'cud_import_drupal_outreach'
                },
                success: function(data) {
                    jQuery('#outreach-result').html(data);
                }
            });

        });
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_cud_import_drupal_outreach', 'cud_import_drupal_outreach');
add_action('wp_ajax_nopriv_cud_import_drupal_outreach', 'cud_import_drupal_outreach');

/* ------------------------------------------------ continuing ------------------------------------------------ */

function cud_import_drupal_continuing()
{
    // unhook this function so it doesn't loop infinitely
    remove_action('admin_post_cud_import_drupal_continuing', 'cud_import_drupal_continuing');

    include plugin_dir_path(__FILE__)  . 'imports/continuing.php';

    echo "----- done! -----";

    die();
}

add_action('admin_footer', 'ajax_cud_import_drupal_continuing');

function ajax_cud_import_drupal_continuing()
{
?>
    <script type="text/javascript">
        jQuery('#continuing').on('click', function() {

            jQuery('#continuing-result').html("Started...");

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'cud_import_drupal_continuing'
                },
                success: function(data) {
                    jQuery('#continuing-result').html(data);
                }
            });

        });
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_cud_import_drupal_continuing', 'cud_import_drupal_continuing');
add_action('wp_ajax_nopriv_cud_import_drupal_continuing', 'cud_import_drupal_continuing');

/* ------------------------------------------------ corporate ------------------------------------------------ */

function cud_import_drupal_corporate()
{
    // unhook this function so it doesn't loop infinitely
    remove_action('admin_post_cud_import_drupal_corporate', 'cud_import_drupal_corporate');

    include plugin_dir_path(__FILE__)  . 'imports/corporate.php';

    echo "----- done! -----";

    die();
}

add_action('admin_footer', 'ajax_cud_import_drupal_corporate');

function ajax_cud_import_drupal_corporate()
{
?>
    <script type="text/javascript">
        jQuery('#corporate').on('click', function() {

            jQuery('#corporate-result').html("Started...");

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'cud_import_drupal_corporate'
                },
                success: function(data) {
                    jQuery('#corporate-result').html(data);
                }
            });

        });
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_cud_import_drupal_corporate', 'cud_import_drupal_corporate');
add_action('wp_ajax_nopriv_cud_import_drupal_corporate', 'cud_import_drupal_corporate');

/* ------------------------------------------------ current ------------------------------------------------ */

function cud_import_drupal_current()
{
    // unhook this function so it doesn't loop infinitely
    remove_action('admin_post_cud_import_drupal_current', 'cud_import_drupal_current');

    include plugin_dir_path(__FILE__)  . 'imports/current.php';

    echo "----- done! -----";

    die();
}

add_action('admin_footer', 'ajax_cud_import_drupal_current');

function ajax_cud_import_drupal_current()
{
?>
    <script type="text/javascript">
        jQuery('#current').on('click', function() {

            jQuery('#current-result').html("Started...");

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'cud_import_drupal_current'
                },
                success: function(data) {
                    jQuery('#current-result').html(data);
                }
            });

        });
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_cud_import_drupal_current', 'cud_import_drupal_current');
add_action('wp_ajax_nopriv_cud_import_drupal_current', 'cud_import_drupal_current');


/* ------------------------------------------------ faq ------------------------------------------------ */

function cud_import_drupal_faq()
{
    // unhook this function so it doesn't loop infinitely
    remove_action('admin_post_cud_import_drupal_faq', 'cud_import_drupal_faq');

    include plugin_dir_path(__FILE__)  . 'imports/faq.php';

    echo "----- done! -----";

    die();
}

add_action('admin_footer', 'ajax_cud_import_drupal_faq');

function ajax_cud_import_drupal_faq()
{
?>
    <script type="text/javascript">
        jQuery('#faq').on('click', function() {

            jQuery('#faq-result').html("Started...");

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'cud_import_drupal_faq'
                },
                success: function(data) {
                    jQuery('#faq-result').html(data);
                }
            });

        });
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_cud_import_drupal_faq', 'cud_import_drupal_faq');
add_action('wp_ajax_nopriv_cud_import_drupal_faq', 'cud_import_drupal_faq');

/* ------------------------------------------------ fee ------------------------------------------------ */

function cud_import_drupal_fee()
{
    // unhook this function so it doesn't loop infinitely
    remove_action('admin_post_cud_import_drupal_fee', 'cud_import_drupal_fee');

    include plugin_dir_path(__FILE__)  . 'imports/fee.php';

    echo "----- done! -----";

    die();
}

add_action('admin_footer', 'ajax_cud_import_drupal_fee');

function ajax_cud_import_drupal_fee()
{
?>
    <script type="text/javascript">
        jQuery('#fee').on('click', function() {

            jQuery('#fee-result').html("Started...");

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'cud_import_drupal_fee'
                },
                success: function(data) {
                    jQuery('#fee-result').html(data);
                }
            });

        });
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_cud_import_drupal_fee', 'cud_import_drupal_fee');
add_action('wp_ajax_nopriv_cud_import_drupal_fee', 'cud_import_drupal_fee');


/* ------------------------------------------------ personnel ------------------------------------------------ */

function cud_import_drupal_personnel()
{
    // unhook this function so it doesn't loop infinitely
    remove_action('admin_post_cud_import_drupal_personnel', 'cud_import_drupal_personnel');

    include plugin_dir_path(__FILE__)  . 'imports/personnel.php';

    echo "----- done! -----";

    die();
}

add_action('admin_footer', 'ajax_cud_import_drupal_personnel');

function ajax_cud_import_drupal_personnel()
{
?>
    <script type="text/javascript">
        jQuery('#personnel').on('click', function() {

            jQuery('#personnel-result').html("Started...");

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'cud_import_drupal_personnel'
                },
                success: function(data) {
                    jQuery('#personnel-result').html(data);
                }
            });

        });
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_cud_import_drupal_personnel', 'cud_import_drupal_personnel');
add_action('wp_ajax_nopriv_cud_import_drupal_personnel', 'cud_import_drupal_personnel');


/* ------------------------------------------------ partner ------------------------------------------------ */

function cud_import_drupal_partner()
{
    // unhook this function so it doesn't loop infinitely
    remove_action('admin_post_cud_import_drupal_partner', 'cud_import_drupal_partner');

    include plugin_dir_path(__FILE__)  . 'imports/partner.php';

    echo "----- done! -----";

    die();
}

add_action('admin_footer', 'ajax_cud_import_drupal_partner');

function ajax_cud_import_drupal_partner()
{
?>
    <script type="text/javascript">
        jQuery('#partner').on('click', function() {

            jQuery('#partner-result').html("Started...");

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'cud_import_drupal_partner'
                },
                success: function(data) {
                    jQuery('#partner-result').html(data);
                }
            });

        });
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_cud_import_drupal_partner', 'cud_import_drupal_partner');
add_action('wp_ajax_nopriv_cud_import_drupal_partner', 'cud_import_drupal_partner');


/* ------------------------------------------------ pages ------------------------------------------------ */

function cud_import_drupal_pages()
{
    // unhook this function so it doesn't loop infinitely
    remove_action('admin_post_cud_import_drupal_pages', 'cud_import_drupal_pages');

    include plugin_dir_path(__FILE__)  . 'imports/common_pages.php';

    echo "----- done! -----";

    die();
}

add_action('admin_footer', 'ajax_cud_import_drupal_pages');

function ajax_cud_import_drupal_pages()
{
?>
    <script type="text/javascript">
        jQuery('#pages').on('click', function() {

            jQuery('#pages-result').html("Started...");

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'cud_import_drupal_pages'
                },
                success: function(data) {
                    jQuery('#pages-result').html(data);
                }
            });

        });
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_cud_import_drupal_pages', 'cud_import_drupal_pages');
add_action('wp_ajax_nopriv_cud_import_drupal_pages', 'cud_import_drupal_pages');

/* ------------------------------------------------ privilege ------------------------------------------------ */

function cud_import_drupal_privilege()
{
    // unhook this function so it doesn't loop infinitely
    remove_action('admin_post_cud_import_drupal_privilege', 'cud_import_drupal_privilege');

    include plugin_dir_path(__FILE__)  . 'imports/privilege.php';

    echo "----- done! -----";

    die();
}

add_action('admin_footer', 'ajax_cud_import_drupal_privilege');

function ajax_cud_import_drupal_privilege()
{
?>
    <script type="text/javascript">
        jQuery('#privilege').on('click', function() {

            jQuery('#privilege-result').html("Started...");

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'cud_import_drupal_privilege'
                },
                success: function(data) {
                    jQuery('#privilege-result').html(data);
                }
            });

        });
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_cud_import_drupal_privilege', 'cud_import_drupal_privilege');
add_action('wp_ajax_nopriv_cud_import_drupal_privilege', 'cud_import_drupal_privilege');

/* ------------------------------------------------ prospective ------------------------------------------------ */

function cud_import_drupal_prospective()
{
    // unhook this function so it doesn't loop infinitely
    remove_action('admin_post_cud_import_drupal_prospective', 'cud_import_drupal_prospective');

    include plugin_dir_path(__FILE__)  . 'imports/prospective.php';

    echo "----- done! -----";

    die();
}

add_action('admin_footer', 'ajax_cud_import_drupal_prospective');

function ajax_cud_import_drupal_prospective()
{
?>
    <script type="text/javascript">
        jQuery('#prospective').on('click', function() {

            jQuery('#prospective-result').html("Started...");

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'cud_import_drupal_prospective'
                },
                success: function(data) {
                    jQuery('#prospective-result').html(data);
                }
            });

        });
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_cud_import_drupal_prospective', 'cud_import_drupal_prospective');
add_action('wp_ajax_nopriv_cud_import_drupal_prospective', 'cud_import_drupal_prospective');

/* ------------------------------------------------ lrc_resource ------------------------------------------------ */

function cud_import_drupal_lrc_resource()
{
    // unhook this function so it doesn't loop infinitely
    remove_action('admin_post_cud_import_drupal_lrc_resource', 'cud_import_drupal_lrc_resource');

    include plugin_dir_path(__FILE__)  . 'imports/lrc_resource.php';

    echo "----- done! -----";

    die();
}

add_action('admin_footer', 'ajax_cud_import_drupal_lrc_resource');

function ajax_cud_import_drupal_lrc_resource()
{
?>
    <script type="text/javascript">
        jQuery('#lrc_resource').on('click', function() {

            jQuery('#lrc_resource-result').html("Started...");

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'cud_import_drupal_lrc_resource'
                },
                success: function(data) {
                    jQuery('#lrc_resource-result').html(data);
                }
            });

        });
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_cud_import_drupal_lrc_resource', 'cud_import_drupal_lrc_resource');
add_action('wp_ajax_nopriv_cud_import_drupal_lrc_resource', 'cud_import_drupal_lrc_resource');


/* ------------------------------------------------ lrc ------------------------------------------------ */

function cud_import_drupal_lrc()
{
    // unhook this function so it doesn't loop infinitely
    remove_action('admin_post_cud_import_drupal_lrc', 'cud_import_drupal_lrc');

    include plugin_dir_path(__FILE__)  . 'imports/lrc.php';

    echo "----- done! -----";

    die();
}

add_action('admin_footer', 'ajax_cud_import_drupal_lrc');

function ajax_cud_import_drupal_lrc()
{
?>
    <script type="text/javascript">
        jQuery('#lrc').on('click', function() {

            jQuery('#lrc-result').html("Started...");

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'cud_import_drupal_lrc'
                },
                success: function(data) {
                    jQuery('#lrc-result').html(data);
                }
            });

        });
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_cud_import_drupal_lrc', 'cud_import_drupal_lrc');
add_action('wp_ajax_nopriv_cud_import_drupal_lrc', 'cud_import_drupal_lrc');

/* ------------------------------------------------ research ------------------------------------------------ */

function cud_import_drupal_research()
{
    // unhook this function so it doesn't loop infinitely
    remove_action('admin_post_cud_import_drupal_research', 'cud_import_drupal_research');

    include plugin_dir_path(__FILE__)  . 'imports/research.php';

    echo "----- done! -----";

    die();
}

add_action('admin_footer', 'ajax_cud_import_drupal_research');

function ajax_cud_import_drupal_research()
{
?>
    <script type="text/javascript">
        jQuery('#research').on('click', function() {

            jQuery('#research-result').html("Started...");

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'cud_import_drupal_research'
                },
                success: function(data) {
                    jQuery('#research-result').html(data);
                }
            });

        });
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_cud_import_drupal_research', 'cud_import_drupal_research');
add_action('wp_ajax_nopriv_cud_import_drupal_research', 'cud_import_drupal_research');


/* ------------------------------------------------ testimonial ------------------------------------------------ */

function cud_import_drupal_testimonial()
{
    // unhook this function so it doesn't loop infinitely
    remove_action('admin_post_cud_import_drupal_testimonial', 'cud_import_drupal_testimonial');

    include plugin_dir_path(__FILE__)  . 'imports/testimonial.php';

    echo "----- done! -----";

    die();
}

add_action('admin_footer', 'ajax_cud_import_drupal_testimonial');

function ajax_cud_import_drupal_testimonial()
{
?>
    <script type="text/javascript">
        jQuery('#testimonial').on('click', function() {

            jQuery('#testimonial-result').html("Started...");

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'cud_import_drupal_testimonial'
                },
                success: function(data) {
                    jQuery('#testimonial-result').html(data);
                }
            });

        });
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_cud_import_drupal_testimonial', 'cud_import_drupal_testimonial');
add_action('wp_ajax_nopriv_cud_import_drupal_testimonial', 'cud_import_drupal_testimonial');

/* ------------------------------------------------ program_other ------------------------------------------------ */

function cud_import_drupal_program_other()
{
    // unhook this function so it doesn't loop infinitely
    remove_action('admin_post_cud_import_drupal_program_other', 'cud_import_drupal_program_other');

    include plugin_dir_path(__FILE__)  . 'imports/program_others.php';

    echo "----- done! -----";

    die();
}

add_action('admin_footer', 'ajax_cud_import_drupal_program_other');

function ajax_cud_import_drupal_program_other()
{
?>
    <script type="text/javascript">
        jQuery('#program_other').on('click', function() {

            jQuery('#program_other-result').html("Started...");

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'cud_import_drupal_program_other'
                },
                success: function(data) {
                    jQuery('#program_other-result').html(data);
                }
            });

        });
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_cud_import_drupal_program_other', 'cud_import_drupal_program_other');
add_action('wp_ajax_nopriv_cud_import_drupal_program_other', 'cud_import_drupal_program_other');


/* ------------------------------------------------ news ------------------------------------------------ */

function cud_import_drupal_news()
{
    // unhook this function so it doesn't loop infinitely
    remove_action('admin_post_cud_import_drupal_news', 'cud_import_drupal_news');

    include plugin_dir_path(__FILE__)  . 'imports/news.php';

    echo "----- done! -----";

    die();
}

add_action('admin_footer', 'ajax_cud_import_drupal_news');

function ajax_cud_import_drupal_news()
{
?>
    <script type="text/javascript">
        jQuery('#news').on('click', function() {

            jQuery('#news-result').html("Started...");

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'cud_import_drupal_news'
                },
                success: function(data) {
                    jQuery('#news-result').html(data);
                }
            });

        });
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_cud_import_drupal_news', 'cud_import_drupal_news');
add_action('wp_ajax_nopriv_cud_import_drupal_news', 'cud_import_drupal_news');


/* ------------------------------------------------ news excerpts only------------------------------------------------ */

function cud_import_drupal_newsexcerpt()
{
    // unhook this function so it doesn't loop infinitely
    remove_action('admin_post_cud_import_drupal_newsexcerpt', 'cud_import_drupal_newsexcerpt');

    include plugin_dir_path(__FILE__)  . 'imports/newsexcerpt.php';

    echo "----- done! -----";

    die();
}

add_action('admin_footer', 'ajax_cud_import_drupal_newsexcerpt');

function ajax_cud_import_drupal_newsexcerpt()
{
?>
    <script type="text/javascript">
        jQuery('#newsexcerpt').on('click', function() {

            jQuery('#newsexcerpt-result').html("Started...");

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'cud_import_drupal_newsexcerpt'
                },
                success: function(data) {
                    jQuery('#newsexcerpt-result').html(data);
                }
            });

        });
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_cud_import_drupal_newsexcerpt', 'cud_import_drupal_newsexcerpt');
add_action('wp_ajax_nopriv_cud_import_drupal_newsexcerpt', 'cud_import_drupal_newsexcerpt');



/* ------------------------------------------------ studentwork ------------------------------------------------ */

function cud_import_drupal_studentwork()
{
    // unhook this function so it doesn't loop infinitely
    remove_action('admin_post_cud_import_drupal_studentwork', 'cud_import_drupal_studentwork');

    include plugin_dir_path(__FILE__)  . 'imports/studentwork.php';

    echo "----- done! -----";

    die();
}

add_action('admin_footer', 'ajax_cud_import_drupal_studentwork');

function ajax_cud_import_drupal_studentwork()
{
?>
    <script type="text/javascript">
        jQuery('#studentwork').on('click', function() {

            jQuery('#studentwork-result').html("Started...");

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'cud_import_drupal_studentwork'
                },
                success: function(data) {
                    jQuery('#studentwork-result').html(data);
                }
            });

        });
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_cud_import_drupal_studentwork', 'cud_import_drupal_studentwork');
add_action('wp_ajax_nopriv_cud_import_drupal_studentwork', 'cud_import_drupal_studentwork');

/* ------------------------------------------------ events ------------------------------------------------ */

function cud_import_drupal_events()
{
    // unhook this function so it doesn't loop infinitely
    remove_action('admin_post_cud_import_drupal_events', 'cud_import_drupal_events');

    include plugin_dir_path(__FILE__)  . 'imports/events.php';

    echo "----- done! -----";

    die();
}

add_action('admin_footer', 'ajax_cud_import_drupal_events');

function ajax_cud_import_drupal_events()
{
?>
    <script type="text/javascript">
        jQuery('#events').on('click', function() {

            jQuery('#events-result').html("Started...");

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'cud_import_drupal_events'
                },
                success: function(data) {
                    jQuery('#events-result').html(data);
                }
            });

        });
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_cud_import_drupal_events', 'cud_import_drupal_events');
add_action('wp_ajax_nopriv_cud_import_drupal_events', 'cud_import_drupal_events');

/* ------------------------------------------------ files ------------------------------------------------ */

function cud_import_drupal_files()
{
    // unhook this function so it doesn't loop infinitely
    remove_action('admin_post_cud_import_drupal_files', 'cud_import_drupal_files');

    include plugin_dir_path(__FILE__)  . 'imports/files.php';

    echo "----- done! -----";

    die();
}

add_action('admin_footer', 'ajax_cud_import_drupal_files');

function ajax_cud_import_drupal_files()
{
?>
    <script type="text/javascript">
        jQuery('#files').on('click', function() {

            jQuery('#files-result').html("Started...");

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'cud_import_drupal_files'
                },
                success: function(data) {
                    jQuery('#files-result').html(data);
                }
            });

        });
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_cud_import_drupal_files', 'cud_import_drupal_files');
add_action('wp_ajax_nopriv_cud_import_drupal_files', 'cud_import_drupal_files');

function cud_main_options_panel()
{
    add_menu_page('Canadian University Dubai', 'Canadian University Dubai', 'manage_options', 'cud-custom-site-wide', 'cud_general_funcs');
    add_submenu_page('cud-custom-site-wide', 'Canadian University Dubai - Settings', 'General settings', 'manage_options', 'cud-custom-option-settings', 'cud_custom_option_settings');
    add_submenu_page('cud-custom-site-wide', 'Canadian University Dubai - Theme', 'Custom Theme settings', 'manage_options', 'cud-custom-option-theme-settings', 'cud_custom_option_theme_settings');
    add_submenu_page('cud-custom-site-wide', 'Canadian University Dubai - Imports', 'Drupal to WordPress Imports', 'manage_options', 'cud-custom-option-drupal-imports', 'cud_custom_option_drupal_imports');
}

add_action('admin_menu', 'cud_main_options_panel');

add_action('admin_post_cud_import_drupal_news', 'cud_import_drupal_news');

add_action('admin_post_cud_import_drupal_faculty', 'cud_import_drupal_faculty');


function cud_general_funcs()
{
    echo '<div class="wrap"><div id="icon-options-general" class="icon32"><br></div>
        <h2>Canadian University Dubai</h2></div>';
}

function cud_custom_option_settings()
{
    echo '<div class="wrap"><div id="icon-options-general" class="icon32"><br></div>
        <h2>Canadian University Dubai - Settings</h2></div>';
}

function cud_custom_option_theme_settings()
{
    echo '<div class="wrap"><div id="icon-options-general" class="icon32"><br></div>
        <h2>Canadian University Dubai - Theme</h2></div>';
}

function cud_custom_option_drupal_imports()
{
    echo '<div class="wrap"><div id="icon-options-general" class="icon32"><br></div>
        <h2>Canadian University Dubai - Imports</h2></div>';

    echo '<div style="font-size:1.1rem;display:block;width:100%;margin-bottom:0.5rem;cursor:pointer;font-weight:500;">1. <a id="faculty">Faculty</a></div><div id="faculty-result" style="margin-bottom:1.5rem;font-style:italic"></div>';

    echo '<div style="font-size:1.1rem;display:block;width:100%;margin-bottom:0.5rem;cursor:pointer;font-weight:500;">2. <a id="department">Department</a></div><div id="department-result" style="margin-bottom:1.5rem;font-style:italic"></div>';

    echo '<div style="font-size:1.1rem;display:block;width:100%;margin-bottom:0.5rem;cursor:pointer;font-weight:500;">3. <a id="studyplan">Study Plan</a></div><div id="studyplan-result" style="margin-bottom:1.5rem;font-style:italic"></div>';

    echo '<div style="font-size:1.1rem;display:block;width:100%;margin-bottom:0.5rem;cursor:pointer;font-weight:500;">4. <a id="program">Program</a></div><div id="program-result" style="margin-bottom:1.5rem;font-style:italic"></div>';

    echo '<div style="font-size:1.1rem;display:block;width:100%;margin-bottom:0.5rem;cursor:pointer;font-weight:500;">5. <a id="accreditation">Accreditation</a></div><div id="accreditation-result" style="margin-bottom:1.5rem;font-style:italic"></div>';

    echo '<div style="font-size:1.1rem;display:block;width:100%;margin-bottom:0.5rem;cursor:pointer;font-weight:500;">6. <a id="alumni">Alumni</a></div><div id="alumni-result" style="margin-bottom:1.5rem;font-style:italic"></div>';

    echo '<div style="font-size:1.1rem;display:block;width:100%;margin-bottom:0.5rem;cursor:pointer;font-weight:500;">7. <a id="outreach">Community Outreach</a></div><div id="outreach-result" style="margin-bottom:1.5rem;font-style:italic"></div>';

    echo '<div style="font-size:1.1rem;display:block;width:100%;margin-bottom:0.5rem;cursor:pointer;font-weight:500;">8. <a id="continuing">Continuing Education</a></div><div id="continuing-result" style="margin-bottom:1.5rem;font-style:italic"></div>';

    echo '<div style="font-size:1.1rem;display:block;width:100%;margin-bottom:0.5rem;cursor:pointer;font-weight:500;">9. <a id="corporate">Corporate</a></div><div id="corporate-result" style="margin-bottom:1.5rem;font-style:italic"></div>';

    echo '<div style="font-size:1.1rem;display:block;width:100%;margin-bottom:0.5rem;cursor:pointer;font-weight:500;">10. <a id="current">Current</a></div><div id="current-result" style="margin-bottom:1.5rem;font-style:italic"></div>';

    echo '<div style="font-size:1.1rem;display:block;width:100%;margin-bottom:0.5rem;cursor:pointer;font-weight:500;">11. <a id="faq">Faq</a></div><div id="faq-result" style="margin-bottom:1.5rem;font-style:italic"></div>';

    echo '<div style="font-size:1.1rem;display:block;width:100%;margin-bottom:0.5rem;cursor:pointer;font-weight:500;">12. <a id="fee">Fee</a></div><div id="fee-result" style="margin-bottom:1.5rem;font-style:italic"></div>';

    echo '<div style="font-size:1.1rem;display:block;width:100%;margin-bottom:0.5rem;cursor:pointer;font-weight:500;">13. <a id="personnel">Personnel</a></div><div id="personnel-result" style="margin-bottom:1.5rem;font-style:italic"></div>';

    echo '<div style="font-size:1.1rem;display:block;width:100%;margin-bottom:0.5rem;cursor:pointer;font-weight:500;">14. <a id="partner">Partner</a></div><div id="partner-result" style="margin-bottom:1.5rem;font-style:italic"></div>';

    echo '<div style="font-size:1.1rem;display:block;width:100%;margin-bottom:0.5rem;cursor:pointer;font-weight:500;">15. <a id="pages">Common Pages</a></div><div id="pages-result" style="margin-bottom:1.5rem;font-style:italic"></div>';

    echo '<div style="font-size:1.1rem;display:block;width:100%;margin-bottom:0.5rem;cursor:pointer;font-weight:500;">16. <a id="privilege">Privileges</a></div><div id="privilege-result" style="margin-bottom:1.5rem;font-style:italic"></div>';

    echo '<div style="font-size:1.1rem;display:block;width:100%;margin-bottom:0.5rem;cursor:pointer;font-weight:500;">17. <a id="prospective">Prospective</a></div><div id="prospective-result" style="margin-bottom:1.5rem;font-style:italic"></div>';

    echo '<div style="font-size:1.1rem;display:block;width:100%;margin-bottom:0.5rem;cursor:pointer;font-weight:500;">18. <a id="lrc">LRC</a></div><div id="lrc-result" style="margin-bottom:1.5rem;font-style:italic"></div>';

    echo '<div style="font-size:1.1rem;display:block;width:100%;margin-bottom:0.5rem;cursor:pointer;font-weight:500;">19. <a id="lrc_resource">LRC Resource</a></div><div id="lrc_resource-result" style="margin-bottom:1.5rem;font-style:italic"></div>';

    echo '<div style="font-size:1.1rem;display:block;width:100%;margin-bottom:0.5rem;cursor:pointer;font-weight:500;">20. <a id="research">Research</a></div><div id="research-result" style="margin-bottom:1.5rem;font-style:italic"></div>';
    
    echo '<div style="font-size:1.1rem;display:block;width:100%;margin-bottom:0.5rem;cursor:pointer;font-weight:500;">21. <a id="testimonial">Testimonial</a></div><div id="testimonial-result" style="margin-bottom:1.5rem;font-style:italic"></div>';

    echo '<div style="font-size:1.1rem;display:block;width:100%;margin-bottom:0.5rem;cursor:pointer;font-weight:500;">22. <a id="program_other">Program Other</a></div><div id="program_other-result" style="margin-bottom:1.5rem;font-style:italic"></div>';

    echo '<div style="font-size:1.1rem;display:block;width:100%;margin-bottom:0.5rem;cursor:pointer;font-weight:500;">23. <a id="news">News</a></div><div id="news-result" style="margin-bottom:1.5rem;font-style:italic"></div>';

    echo '<div style="font-size:1.1rem;display:block;width:100%;margin-bottom:0.5rem;cursor:pointer;font-weight:500;">23. <a id="newsexcerpt">News - Excerpt ONLY</a></div><div id="newsexcerpt-result" style="margin-bottom:1.5rem;font-style:italic"></div>';

    echo '<div style="font-size:1.1rem;display:block;width:100%;margin-bottom:0.5rem;cursor:pointer;font-weight:500;">23. <a id="studentwork">Studentwork</a></div><div id="studentwork-result" style="margin-bottom:1.5rem;font-style:italic"></div>';

    echo '<div style="font-size:1.1rem;display:block;width:100%;margin-bottom:0.5rem;cursor:pointer;font-weight:500;">23. <a id="events">Events</a></div><div id="events-result" style="margin-bottom:1.5rem;font-style:italic"></div>';

    echo '<div style="font-size:1.1rem;display:block;width:100%;margin-bottom:0.5rem;cursor:pointer;font-weight:500;">23. <a id="files">Files</a></div><div id="files-result" style="margin-bottom:1.5rem;font-style:italic"></div>';

}

/* Metabox */

// add_action('add_meta_boxes', 'dynamic_add_custom_extending_lp_courase_with_pods_box');
// add_action('save_post', 'custom_extending_lp_courase_with_pods_implementation_save', 10, 2);

/* Adds a box to the main column on the Post and Page edit screens */
function dynamic_add_custom_extending_lp_courase_with_pods_box()
{
    add_meta_box(
        'custom_extending_lp_courase_with_pods_box',
        __('CUD Program Extra Info', 'custom_plugin_custom_extending_lp_courase_with_pods_title'),
        'custom_extending_lp_courase_with_pods_implementation_ui',
        'lp_course',
        'side',
        'high'
    );
}

// add_action('add_meta_boxes', 'dynamic_add_custom_extending_lp_courase_with_pods_box_custom_fields');
// add_action('save_post', 'custom_extending_lp_courase_with_pods_implementation_studyplan_save', 10, 2);

/* Adds a box to the main column on the Post and Page edit screens */
function dynamic_add_custom_extending_lp_courase_with_pods_box_custom_fields()
{
    add_meta_box(
        'custom_extending_lp_courase_with_pods_box_studyplan',
        __('CUD Program  - Custom Fields', 'dynamic_add_custom_extending_lp_courase_with_pods_box_custom_fields_all'),
        'custom_extending_lp_courase_with_pods_implementation_studyplan_ui',
        'lp_course',
        'advanced',
        'high'
    );
}

function custom_extending_lp_courase_with_pods_implementation_ui()
{

    global $post;
    // Use nonce for verification
    wp_nonce_field(plugin_basename(__FILE__), 'custom_extending_lp_courase_with_pods_implementation_nonce');
?>
    <div id="meta_inner">
        <?php

        //get the saved meta as an arry
        // $existing_pods_lp_course = get_post_meta( $post->ID, 'lp_course', true );
        $existing_pods_lp_course = pods('lp_course', $post->ID);

        $custom_extending_lp_courase_with_pods_implementation_is_new = (int) $existing_pods_lp_course->field('is_new');

        $custom_extending_lp_courase_with_pods_implementation_is_only_arabic = (int) $existing_pods_lp_course->field('is_only_arabic');

        $custom_extending_lp_courase_with_pods_implementation_is_also_in_arabic = (int) $existing_pods_lp_course->field('is_also_in_arabic');

        $custom_extending_lp_courase_with_pods_implementation_is_ministry_accredited = (int) $existing_pods_lp_course->field('is_ministry_accredited');

        ?>

        <div class="row">
            <div class="col-sm-12 col-md-6">
                <p>Years<br /><input type="text" class="w-100" name="custom_extending_lp_courase_with_pods_implementation_years" value="<?php echo !empty($existing_pods_lp_course->field('years')) ? $existing_pods_lp_course->field('years') : "" ?>" /></p>
            </div>
            <div class="col-sm-12 col-md-6">
                <p>Credit Hours<br /><input type="text" class="w-100" name="custom_extending_lp_courase_with_pods_implementation_credit_hours" value="<?php echo !empty($existing_pods_lp_course->field('credit_hours')) ? $existing_pods_lp_course->field('credit_hours') : "" ?>" /></p>
            </div>
            <div class="col-sm-12 col-md-12">
                <p>Minor<br /><input type="text" class="w-100" name="custom_extending_lp_courase_with_pods_implementation_minor" value="<?php echo !empty($existing_pods_lp_course->field('minor')) ? $existing_pods_lp_course->field('minor') : "" ?>" /></p>
            </div>
            <div class="col-sm-12 col-md-12">
                <p>Opening Dates<br /><input type="text" class="w-100" name="custom_extending_lp_courase_with_pods_implementation_opening_dates" value="<?php echo !empty($existing_pods_lp_course->field('opening_dates')) ? $existing_pods_lp_course->field('opening_dates') : "" ?>" /></p>
            </div>
            <div class="col-sm-12 col-md-12">
                <p>Group<br /><input type="text" class="w-100" name="custom_extending_lp_courase_with_pods_implementation_group" value="<?php echo !empty($existing_pods_lp_course->field('group')) ? $existing_pods_lp_course->field('group') : "" ?>" /></p>
            </div>
            <div class="col-md-6">
                <p>Is New<br />
                    <input type="checkbox" onclick="jQuery(this).attr('value', this.checked ? 1 : 0)" name="custom_extending_lp_courase_with_pods_implementation_is_new" value="<?php echo ($custom_extending_lp_courase_with_pods_implementation_is_new == 1) ? 1 : 0 ?>" <?php echo ($custom_extending_lp_courase_with_pods_implementation_is_new == 1) ? "checked='checked'" : "" ?> /></p>
            </div>
            <div class="col-md-6">
                <p>Is Only Arabic<br />
                    <input type="checkbox" onclick="jQuery(this).attr('value', this.checked ? 1 : 0)" name="custom_extending_lp_courase_with_pods_implementation_is_only_arabic" value="<?php echo ($custom_extending_lp_courase_with_pods_implementation_is_only_arabic == 1) ? 1 : 0 ?>" <?php echo ($custom_extending_lp_courase_with_pods_implementation_is_only_arabic == 1) ? "checked='checked'" : "" ?> /></p>
            </div>
            <div class="col-md-6">
                <p>Is Also in Arabic<br />
                    <input type="checkbox" onclick="jQuery(this).attr('value', this.checked ? 1 : 0)" name="custom_extending_lp_courase_with_pods_implementation_is_also_in_arabic" value="<?php echo ($custom_extending_lp_courase_with_pods_implementation_is_also_in_arabic == 1) ? 1 : 0 ?>" <?php echo ($custom_extending_lp_courase_with_pods_implementation_is_also_in_arabic == 1) ? "checked='checked'" : "" ?> /></p>
            </div>
            <div class="col-md-6">
                <p>Is Ministry Accredited<br />
                    <input type="checkbox" onclick="jQuery(this).attr('value', this.checked ? 1 : 0)" name="custom_extending_lp_courase_with_pods_implementation_is_ministry_accredited" value="<?php echo ($custom_extending_lp_courase_with_pods_implementation_is_ministry_accredited == 1) ? 1 : 0 ?>" <?php echo ($custom_extending_lp_courase_with_pods_implementation_is_ministry_accredited == 1) ? "checked='checked'" : "" ?> /></p>
            </div>
            <div class="col-md-12">
                <p>Old Reference Id<br /><input type="text" name="custom_extending_lp_courase_with_pods_implementation_reference_node_id" value="<?php echo !empty($existing_pods_lp_course->field('reference_node_id')) ? $existing_pods_lp_course->field('reference_node_id') : "" ?>" /></p>
            </div>
        </div>
    </div>

<?php
}

function custom_extending_lp_courase_with_pods_implementation_studyplan_ui()
{

    global $post;
    // Use nonce for verification
    wp_nonce_field(plugin_basename(__FILE__), 'custom_extending_lp_courase_with_pods_implementation_nonce');
?>
    <div id="meta_inner">
        <?php

        //get the saved meta as an arry
        // $existing_pods_lp_course = get_post_meta( $post->ID, 'lp_course', true );
        $existing_pods_lp_course = pods('lp_course', $post->ID);

        $custom_extending_lp_courase_with_pods_implementation_program_structure = $existing_pods_lp_course->display( 'program_structure' );
        $custom_extending_lp_courase_with_pods_implementation_studyplan = $existing_pods_lp_course->display( 'study_plan' );
        $custom_extending_lp_courase_with_pods_implementation_department = $existing_pods_lp_course->field( 'department' );
        $custom_extending_lp_courase_with_pods_implementation_faculty = $existing_pods_lp_course->field( 'faculty' );

        ?>

        <div class="row">
            <div class="col-sm-12 col-md-6">
                <p>Department<br /><input type="text" class="w-100" name="custom_extending_lp_courase_with_pods_implementation_department" value="<?php echo !empty($custom_extending_lp_courase_with_pods_implementation_department) ? $custom_extending_lp_courase_with_pods_implementation_department["ID"]: "" ?>" /></p>
            </div>
            <div class="col-sm-12 col-md-6">
                <p>Faculty<br /><input type="text" class="w-100" name="custom_extending_lp_courase_with_pods_implementation_faculty" value="<?php echo !empty($custom_extending_lp_courase_with_pods_implementation_faculty) ? $custom_extending_lp_courase_with_pods_implementation_faculty["ID"] : "" ?>" /></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <p><strong>Program structure</strong></p>
                <?php wp_editor($custom_extending_lp_courase_with_pods_implementation_program_structure, 'custom_extending_lp_courase_with_pods_implementation_program_structure_details', array(
                    'raw'       =>      true,
                    'media_buttons' =>      false,
                    'textarea_name' =>      'custom_extending_lp_courase_with_pods_implementation_program_structure_details',
                    'textarea_rows' =>      10,
                    'teeny'         =>      true
                )); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6">
                <p><strong>Study plan</strong></p>

                <?php wp_editor($custom_extending_lp_courase_with_pods_implementation_studyplan, 'custom_extending_lp_courase_with_pods_implementation_studyplan_details', array(
                    'raw'       =>      true,
                    'media_buttons' =>      false,
                    'textarea_name' =>      'custom_extending_lp_courase_with_pods_implementation_studyplan_details',
                    'textarea_rows' =>      10,
                    'teeny'         =>      true
                )); ?>
            </div>
        </div>
    </div>

<?php
}

function custom_extending_lp_courase_with_pods_implementation_save($post_id, $post)
{

    if (!isset($_POST['custom_extending_lp_courase_with_pods_implementation_nonce']) || !wp_verify_nonce($_POST['custom_extending_lp_courase_with_pods_implementation_nonce'], plugin_basename(__FILE__))) {
        return $post_id;
    }

    if ($post->post_type == 'lp_course') {
        $pod = pods('lp_course', $post_id);

        $custom_extending_lp_courase_with_pods_implementation_is_new = 0;

        if (isset($_POST["custom_extending_lp_courase_with_pods_implementation_is_new"])) {
            $custom_extending_lp_courase_with_pods_implementation_is_new = (int) $_POST["custom_extending_lp_courase_with_pods_implementation_is_new"];
        }

        $custom_extending_lp_courase_with_pods_implementation_is_only_arabic = 0;

        if (isset($_POST["custom_extending_lp_courase_with_pods_implementation_is_only_arabic"])) {
            $custom_extending_lp_courase_with_pods_implementation_is_only_arabic = (int) $_POST["custom_extending_lp_courase_with_pods_implementation_is_only_arabic"];
        }

        $custom_extending_lp_courase_with_pods_implementation_is_also_in_arabic = 0;

        if (isset($_POST["custom_extending_lp_courase_with_pods_implementation_is_also_in_arabic"])) {
            $custom_extending_lp_courase_with_pods_implementation_is_also_in_arabic = (int) $_POST["custom_extending_lp_courase_with_pods_implementation_is_also_in_arabic"];
        }

        $custom_extending_lp_courase_with_pods_implementation_is_ministry_accredited = 0;

        if (isset($_POST["custom_extending_lp_courase_with_pods_implementation_is_ministry_accredited"])) {
            $custom_extending_lp_courase_with_pods_implementation_is_ministry_accredited = (int) $_POST["custom_extending_lp_courase_with_pods_implementation_is_ministry_accredited"];
        }

        $data = array(
            'years' => isset($_POST["custom_extending_lp_courase_with_pods_implementation_years"]) ? sanitize_text_field($_POST["custom_extending_lp_courase_with_pods_implementation_years"]) : "",
            'credit_hours' => isset($_POST["custom_extending_lp_courase_with_pods_implementation_credit_hours"]) ? sanitize_text_field($_POST["custom_extending_lp_courase_with_pods_implementation_credit_hours"]) : "",
            'minor' => isset($_POST["custom_extending_lp_courase_with_pods_implementation_minor"]) ? sanitize_text_field($_POST["custom_extending_lp_courase_with_pods_implementation_minor"]) : "",
            'opening_dates' => isset($_POST["custom_extending_lp_courase_with_pods_implementation_opening_dates"]) ? sanitize_text_field($_POST["custom_extending_lp_courase_with_pods_implementation_opening_dates"]) : "",
            'group' => isset($_POST["custom_extending_lp_courase_with_pods_implementation_group"]) ? sanitize_text_field($_POST["custom_extending_lp_courase_with_pods_implementation_group"]) : "",
            'is_new' => $custom_extending_lp_courase_with_pods_implementation_is_new,
            'is_only_arabic' =>  $custom_extending_lp_courase_with_pods_implementation_is_only_arabic,
            'is_also_in_arabic' => $custom_extending_lp_courase_with_pods_implementation_is_also_in_arabic,
            'is_ministry_accredited' => $custom_extending_lp_courase_with_pods_implementation_is_ministry_accredited,
            'reference_node_id' => isset($_POST["custom_extending_lp_courase_with_pods_implementation_reference_node_id"]) ? sanitize_text_field($_POST["custom_extending_lp_courase_with_pods_implementation_reference_node_id"]) : ""
        );

        $pod->save($data);
    }
}

function custom_extending_lp_courase_with_pods_implementation_studyplan_save($post_id, $post)
{

    if (!isset($_POST['custom_extending_lp_courase_with_pods_implementation_nonce']) || !wp_verify_nonce($_POST['custom_extending_lp_courase_with_pods_implementation_nonce'], plugin_basename(__FILE__))) {
        return $post_id;
    }

    if ($post->post_type == 'lp_course') {
        $pod = pods('lp_course', $post_id);

        $data = array(
            'study_plan' => isset($_POST["custom_extending_lp_courase_with_pods_implementation_studyplan_details"]) ? $_POST["custom_extending_lp_courase_with_pods_implementation_studyplan_details"] : "",
            'program_structure' => isset($_POST["custom_extending_lp_courase_with_pods_implementation_program_structure_details"]) ? $_POST["custom_extending_lp_courase_with_pods_implementation_program_structure_details"] : ""
        );

        $pod->save($data);
    }
}
