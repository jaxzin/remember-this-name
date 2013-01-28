var mp_form = {

	selectors : {
		submit  : 'div.MailPress input.mp_submit', 
		form    : 'form.mp-form', 
		formdiv : 'div.mp-formdiv', 
		loading : 'div.mp-loading', 
		message : 'div.mp-message'
	}, 

	init : function() {
		jQuery(mp_form.selectors.submit).click( function() { mp_form.ajax(jQuery(this).parents('.MailPress')); return false;} );
	}, 

	ajax : function(div) {
		var data = {};
		jQuery(mp_form.selectors.form+' [type!=submit]',  div).each(function(){
			data[ jQuery(this).attr('name') ] = jQuery(this).val();
		});
		jQuery(mp_form.selectors.formdiv, div).fadeTo(500,0);
	 	jQuery(mp_form.selectors.loading, div).fadeTo(500,1);

		//