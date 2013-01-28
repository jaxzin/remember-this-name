var mp_meta_box_post_test = {

	fields  : {'toemail' : 0, 'newsletter' : 0, 'theme' : 0},
	select  : {'toemail' : 0, 'newsletter' : 1, 'theme' : 1},
	css_err : {'border-color' : '#CC0000', 'background-color' :'#FFEBE8'},
	css     : {},

// init
	init : function() {
		
		for (field in mp_meta_box_post_test.fields)
		{
			// edit
			jQuery('.mp-edit-' 	+ field).click(function(){ var a = jQuery(this); var fld = a.attr('href').substr(4); mp_meta_box_post_test.edit(fld); return false; });
			// cancel
			jQuery('.mp-cancel-' 	+ field).click(function(){ var a = jQuery(this); var fld = a.attr('href').substr(4); mp_meta_box_post_test.cancel(fld); return false; });
			// ok
			jQuery('.mp-save-' 	+ field).click(function(){ var a = jQuery(this); var fld = a.attr('href').substr(4); mp_meta_box_post_test.ok(fld, 'init'); return false; });
			// css
			mp_meta_box_post_test.css[field] = {};
			for (prop in mp_meta_box_post_test.css_err) mp_meta_box_post_test.css[field][prop] = jQuery('#mp_' + field).css(prop);
		}

		jQuery('.mp_meta_box_post_test').click( function(){
			//