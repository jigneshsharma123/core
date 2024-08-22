/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	 config.language = 'fr';
	
	 config.allowedContent = true;
   //config.extraAllowedContent = '*(*)';
   config.extraAllowedContent = 'span;ul;li;table;td;style;*[id];*(*);*{*}';
	 config.uiColor = '#999999';

	 config.filebrowserBrowseUrl = BASE_URL+'assets/admin/kcfinder/browse.php?opener=ckeditor&type=files';
   config.filebrowserImageBrowseUrl = BASE_URL+'assets/admin/kcfinder/browse.php?opener=ckeditor&type=images';
   config.filebrowserFlashBrowseUrl = BASE_URL+'assets/admin/kcfinder/browse.php?opener=ckeditor&type=flash';
   config.filebrowserUploadUrl = BASE_URL+'assets/admin/kcfinder/upload.php?opener=ckeditor&type=files';
   config.filebrowserImageUploadUrl = BASE_URL+'assets/admin/kcfinder/upload.php?opener=ckeditor&type=images';
   config.filebrowserFlashUploadUrl = BASE_URL+'assets/admin/kcfinder/upload.php?opener=ckeditor&type=flash';
		
};

CKEDITOR.dtd.$removeEmpty['i'] = false;
CKEDITOR.dtd.$removeEmpty['span'] = false;

