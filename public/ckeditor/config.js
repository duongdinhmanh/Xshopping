/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';


    config.extraPlugins = 'fontawesome';

    config.allowedContent = true;
    config.extraPlugins = 'lineutils';
    config.extraPlugins = 'widget';
    config.extraPlugins = 'fontawesome';
    config.fullPage = false;
    window.CKEDITOR.dtd.$removeEmpty['span'] = false;

};
