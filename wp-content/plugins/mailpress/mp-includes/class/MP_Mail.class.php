<?php
class MP_Mail extends MP_mail_
{
	const status_deleted = 'deleted';

	const name_required = true;
	const get8BitEncoding = true; // setting this to false can have an impact on perf see http://forums.devnetwork.net/viewtopic.php?f=52&t=96933

	function __construct( $plug = MP_FOLDER )
	{
		$this->plug = $plug;

		$this->theme = new MP_Themes();

		$this->message 	= null;

		$this->args = new stdClass();
	}

////	MP_Mail send functions	////

	function send($args)
	{
		if (is_numeric($args))
		{
			$this->args = MP_Mail::get($args);
		}
		else
		{
			$this->args = $args ;
		}
		return $this->end( $this->start() );
	}

	function start()
	{
		MP_::no_abort_limit();

		$this->row  = new stdClass();
		$this->mail = new stdClass();

		global $mp_general;
		$mp_general = get_option(MailPress::option_name_general);

////  Log it  ////

		$this->trace = new MP_Log('mp_mail', array('force' => (isset($this->args->forcelog))));

		if (!$this->args)	
		{
			$this->trace->log('MAILPRESS [ERROR] - Sorry invalid arguments in MP_Mail::send');
			return false;
		}

////  Build it  ////

		if (!isset($this->args->id))
		{
			$this->row->id = $this->args->id = MP_Mail::get_id( 'MP_Mail::start' );
		}
		else
			$this->row->id = $this->args->id;

	//