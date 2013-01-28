<?php
if (class_exists('MailPress') && !class_exists('MailPress_autoresponder'))
{
/*
Plugin Name: MailPress_autoresponder
Plugin URI: http://www.mailpress.org/wiki/index.php?title=Add_ons:Autoresponder
Description: Autoresponders (based on wp-cron)
Version: 5.3
*/

// 3.

/** for admin plugin pages */
define ('MailPress_page_autoresponders', 	'mailpress_autoresponders');

/** for admin plugin urls */
$mp_file = 'admin.php';
define ('MailPress_autoresponders', $mp_file . '?page=' . MailPress_page_autoresponders);

class MailPress_autoresponder
{
	const taxonomy = 'MailPress_autoresponder';
	const log_name = 'autoresponder';

	const bt = 100;

	function __construct()
	{
// for taxonomy
		add_action('init', 			array(__CLASS__, 'init'), 1);

// for plugin
		add_action('MailPress_addons_loaded', 			array(__CLASS__, 'addons_loaded'));

// for autoresponder (from older mailpress versions)
		add_action('mp_autoresponder_process', 			array(__CLASS__, 'process'));
		add_action('mp_process_autoresponder', 			array(__CLASS__, 'process'));

// for wp admin
		if (is_admin())
		{
		// for install
			register_activation_hook(plugin_basename(__FILE__), 	array(__CLASS__, 'install'));
		// for link on plugin page
			add_filter('plugin_action_links', 			array(__CLASS__, 'plugin_action_links'), 10, 2 );
		// for role & capabilities
			add_filter('MailPress_capabilities', 		array(__CLASS__, 'capabilities'), 1, 1);
		// for settings
			add_action('MailPress_settings_logs', 		array(__CLASS__, 'settings_logs'), 10);
		// for load admin page
			add_filter('MailPress_load_admin_page', 		array(__CLASS__, 'load_admin_page'), 10, 1);
		// for mails list
			add_action('MailPress_get_icon_mails', 		array(__CLASS__, 'get_icon_mails'), 8, 1);
		// for meta box in write page
			add_action('MailPress_update_meta_boxes_write',	array(__CLASS__, 'update_meta_boxes_write'));
			add_filter('MailPress_styles', 			array(__CLASS__, 'styles'), 8, 2);
			add_filter('MailPress_scripts', 			array(__CLASS__, 'scripts'), 8, 2);
			add_action('MailPress_add_meta_boxes_write',	array(__CLASS__, 'add_meta_boxes_write'), 8, 2);
		}

// for ajax
		add_action('mp_action_add_atrspndr', 			array(__CLASS__, 'mp_action_add_atrspndr'));
		add_action('mp_action_delete_atrspndr', 			array(__CLASS__, 'mp_action_delete_atrspndr'));
		add_action('mp_action_add_wa', 				array(__CLASS__, 'mp_action_add_wa'));
		add_action('mp_action_delete_wa', 				array(__CLASS__, 'mp_action_delete_wa'));
	}

//// Taxonomy ////

	public static function init() 
	{
		register_taxonomy(self::taxonomy, 'MailPress_autoresponder', array('update_count_callback' => array(__CLASS__, 'update_count_callback')));
	}

	public static function update_count_callback( $autoresponders )
	{
		return 0;
	}

//// Plugin ////

	public static function addons_loaded()
	{
		new MP_Autoresponder_events();
	}

////  Autoresponder  ////

	public static function process($args)
	{
		MP_::no_abort_limit();

		extract($args);		// $umeta_id, $mail_order
		$meta_id = (isset($umeta_id)) ? $umeta_id : $meta_id;

		$meta = MP_User_meta::get_by_id($meta_id);
		$term_id 	= (!$meta) ? false : str_replace('_MailPress_autoresponder_', '', $meta->meta_key);
		if (!$term_id) return;
		
		$autoresponder = MP_Autoresponder::get($term_id);

		do_action('mp_process_autoresponder_' . $autoresponder->description['event'], $args);
	}

////  ADMIN  ////
////  ADMIN  ////
////  ADMIN  ////
////  ADMIN  ////

// install
	public static function install() 
	{
		$logs = get_option(MailPress::option_name_logs);
		if (!isset($logs[self::log_name]))
		{
			$logs[self::log_name] = MailPress::$default_option_logs;
			update_option(MailPress::option_name_logs, $logs );
		}
	}

// for link on plugin page
	public static function plugin_action_links($links, $file)
	{
		return MailPress::plugin_links($links, $file, plugin_basename(__FILE__), 'logs');
	}

// for role & capabilities
	public static function capabilities($capabilities)
	{
		$capabilities['MailPress_manage_autoresponders'] = array(	'name'	=> __('Autoresponders', MP_TXTDOM),
												'group'	=> 'mails',
												'menu'	=> 15,

												'parent'	=> false,
												'page_title'=> __('MailPress Autoresponders', MP_TXTDOM),
												'menu_title'=> '&#160;' . __('Autoresponders', MP_TXTDOM),
												'page'	=> MailPress_page_autoresponders,
												'func'	=> array('MP_AdminPage', 'body')
									);
		return $capabilities;
	}

// for settings
	public static function settings_logs($logs)
	{
		MP_AdminPage::logs_sub_form(self::log_name, $logs, __('Autoresponder', MP_TXTDOM));
	}

// for load admin page
	public static function load_admin_page($hub)
	{
		$hub[MailPress_page_autoresponders] = 'autoresponders';
		return $hub;
	}

//