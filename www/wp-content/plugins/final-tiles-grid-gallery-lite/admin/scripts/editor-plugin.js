(function() {
	tinymce.create('tinymce.plugins.FinalTilesGallery', {
		init : function(ed, url)
		{
			ed.addCommand('ftg_shortcode_editor_button', function()
			{
				ed.windowManager.open(
				{
					file: ajaxurl + '?action=ftg_shortcode_editor',
					width : 900 + parseInt(ed.getLang('button.delta_width', 0)),
					height : 500 + parseInt(ed.getLang('button.delta_height', 0)),
					inline : 1
				}, {
					plugin_url : url
				});
			});

			ed.addButton('ftg_shortcode_editor', {title : 'Final Tiles Gallery', cmd : 'ftg_shortcode_editor_button', image: url.substring(0,url.lastIndexOf("/admin/scripts")) + '/admin/icon.png' });
		},	 
		getInfo : function()
		{
			return {
				longname : 'Final Tiles Gallery',
				author : 'GreenTreeLabs',
				authorurl : 'http://greentreelabs.net',
				infourl : 'http://greentreelabs.net',
				version : tinymce.majorVersion + "." + tinymce.minorVersion
			};
		}
	});
	tinymce.PluginManager.add('ftg_shortcode_editor', tinymce.plugins.FinalTilesGallery);
})();