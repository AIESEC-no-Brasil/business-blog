(function() {
	tinymce.PluginManager.add( 'themepixels_shortcodes_mce_button', function( editor, url ) {
		editor.addButton( 'themepixels_shortcodes_mce_button', {
			title: 'Themepixels Shortcodes',
			type: 'menubutton',
			icon: 'icon themepixels-shortcodes-icon',
			menu: [

				/** Accordion **/
				{
					text: 'Accordion',
					onclick: function() {
						editor.insertContent( '[accordion]<br />[accordion_section title="Accordion 1"] Your Content [/accordion_section]<br />[accordion_section title="Accordion 2"] Your Content [/accordion_section]<br />[/accordion]' );
					}
				}, // End Accordion

				/** Alert **/
				{
					text: 'Alert',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Shortcodes - Insert Alert',
							body: [

							// Alert Type
							{
								type: 'listbox',
								name: 'alertType',
								label: 'Alert Type',
								'values': [
									{text: 'Success', value: 'success'},
									{text: 'Info', value: 'info'},
									{text: 'Warning', value: 'warning'},
									{text: 'Danger', value: 'danger'}
								]
							},

							// Alert Close
							{
								type: 'listbox',
								name: 'enableAlertClose',
								label: 'Enable Close Button',
								'values': [
									{text: 'Yes', value: 'yes'},
									{text: 'No', value: 'no'}
								]
							},

							// Alert Content
							{
								type: 'textbox',
								name: 'alertContent',
								label: 'Content',
								value: 'Content',
								multiline: true,
								minWidth: 300,
								minHeight: 100
							} ],
							onsubmit: function( e ) {
								editor.insertContent( '[alert type="' + e.data.alertType + '" enable_close="' + e.data.enableAlertClose + '"]' + e.data.alertContent + '[/alert]');
							}
						});
					}
				}, // End Alert

				/* Audio Embed */
				{
					text: 'Audio',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Shortcodes - Insert Audio',
							body: [ {
								type: 'textbox', 
								name: 'audioUrl', 
								label: 'Audio URL',
								value: ''
							} ],
							onsubmit: function( e ) {
								editor.insertContent( '[audio_embed url="' + e.data.audioUrl + '"]');
							}
						});
					}
				}, // End Audio Embed

				/** Button **/
				{
					text: 'Button',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Shortcodes - Insert Button',
							body: [

							// Button Text
							{
								type: 'textbox',
								name: 'btnText',
								label: 'Button Text',
								value: 'Button'
							},

							// Button URL
							{
								type: 'textbox',
								name: 'btnUrl',
								label: 'Button URL',
								value: ''
							},

							// Button Color
							{
								type: 'listbox',
								name: 'btnColor',
								label: 'Button Color',
								'values': [
									{text: 'Primary', value: 'primary'},
									{text: 'Blue', value: 'blue'},
									{text: 'Dark Blue', value: 'darkblue'},
									{text: 'Green', value: 'green'},
									{text: 'Red', value: 'red'},
									{text: 'Pink', value: 'pink'},
									{text: 'Yellow', value: 'yellow'},
									{text: 'Brown', value: 'brown'},
									{text: 'Orange', value: 'orange'},
									{text: 'Teal', value: 'teal'},
									{text: 'Violet', value: 'violet'},
									{text: 'Black', value: 'black'}
								]
							},

							// Button Size
							{
								type: 'listbox',
								name: 'btnSize',
								label: 'Button Size',
								'values': [
									{text: 'Large', value: 'large'},
									{text: 'Medium', value: 'medium'},
									{text: 'Small', value: 'small'},
									{text: 'Extra Small', value: 'xsmall'}
								]
							},

							// Button Style
							{
								type: 'listbox',
								name: 'btnStyle',
								label: 'Button Style',
								'values': [
									{text: 'Default', value: 'default'},
									{text: 'Round', value: 'round'},
									{text: 'Square', value: 'square'}
								]
							},

							// Button Outlined
							{
								type: 'listbox',
								name: 'btnOutlined',
								label: 'Outlined Button',
								'values': [
									{text: 'Yes', value: 'yes'},
									{text: 'No', value: 'no'}
								]
							},

							// Button Link Target
							{
								type: 'listbox',
								name: 'btnLinkTarget',
								label: 'Button: Link Target',
								'values': [
									{text: 'Self', value: 'self'},
									{text: 'Blank', value: 'blank'}
								]
							},

							// Button Rel
							{
								type: 'listbox',
								name: 'btnRel',
								label: 'Button: Rel',
								'values': [
									{text: 'None', value: ''},
									{text: 'Nofollow', value: 'nofollow'}
								]
							},

							// Button Left Icon
							{
								type: 'textbox',
								name: 'btnLeftIcon',
								label: 'Button: Left Icon (FontAwesome Class Name)',
								value: ''
							},

							// Button Right Icon
							{
								type: 'textbox',
								name: 'btnRightIcon',
								label: 'Button: Right Icon (FontAwesome Class Name)',
								value: ''
							} ],
							onsubmit: function( e ) {
								editor.insertContent( '[button btn_url="' + e.data.btnUrl + '" btn_color="' + e.data.btnColor + '" btn_size="' + e.data.btnSize + '" btn_style="' + e.data.btnStyle + '" btn_outlined="' + e.data.btnOutlined + '" link_target="' + e.data.btnLinkTarget + '" link_rel="' + e.data.btnRel + '" icon_left="' + e.data.btnLeftIcon + '" icon_right="' + e.data.btnRightIcon + '"]' + e.data.btnText + '[/button]' );
							}
						});
					}
				}, // End Button

				/* Code */
				{
					text: 'Code',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Shortcodes - Insert Code',
							body: [

							// Code Type
							{
								type: 'listbox',
								name: 'codeInline',
								label: 'Inline',
								'values': [
									{text: 'True', value: 'true'},
									{text: 'False', value: 'false'}
								]
							},

							// Code Scrollable
							{
								type: 'listbox',
								name: 'codeScrollable',
								label: 'Scrollable (Not usable with inline="true")',
								'values': [
									{text: 'True', value: 'true'},
									{text: 'False', value: 'false'}
								]
							},

							// Code Content
							{
								type: 'textbox',
								name: 'codeContent',
								label: 'Content',
								value: 'Content',
								multiline: true,
								minWidth: 300,
								minHeight: 100
							} ],
							onsubmit: function( e ) {
								editor.insertContent( '[code inline="' + e.data.codeInline + '" scrollable="' + e.data.codeScrollable + '"]' + e.data.codeContent + '[/code]' );
							}
						});
					}
				}, // End Code

				/* Dividers */
				{
					text: 'Dividers',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Shortcodes - Insert Divider',
							body: [

							// Divider Style
							{
								type: 'listbox',
								name: 'dividerStyle',
								label: 'Size',
								'values': [
									{text: 'Solid', value: 'solid'},
									{text: 'Dashed', value: 'dashed'},
									{text: 'Dotted', value: 'dotted'},
									{text: 'Double', value: 'double'}
								]
							},

							// Divider Top Margin
							{
								type: 'textbox', 
								name: 'dividerTopMargin', 
								label: 'Top Margin In Pixels',
								value: '20'
							},

							// Divider Bottom Margin
							{
								type: 'textbox', 
								name: 'dividerBottomMargin', 
								label: 'Bottom Margin In Pixels',
								value: '20'
							} ],
							onsubmit: function( e ) {
								editor.insertContent( '[divider style="' + e.data.dividerStyle + '" margin_top="' + e.data.dividerTopMargin + '" margin_bottom="' + e.data.dividerBottomMargin + '"]');
							}
						});
					}
				}, // End divider

				/* Dropcap */
				{
					text: 'Dropcap',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Shortcodes - Insert Dropcap',
							body: [

							// Dropcap Content
							{
								type: 'textbox',
								name: 'dropcapContent',
								label: 'Content',
								value: 'Content',
								multiline: true,
								minWidth: 300,
								minHeight: 100
							} ],
							onsubmit: function( e ) {
								editor.insertContent( '[dropcap]' + e.data.dropcapContent + '[/dropcap]' );
							}
						});
					}
				}, // End Dropcap

				/* Google Map */
				{
					text: 'Google Map',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Shortcodes - Insert Google Map',
							body: [

							// Google Map Title
							{
								type: 'textbox',
								name: 'gmapTitle',
								label: 'Title',
								value: 'Welcome To Las Vegas'
							},

							// Google Map Location
							{
								type: 'textbox',
								name: 'gmapLocation',
								label: 'Location',
								value: 'Las Vegas, Nevada'
							},

							// Google Map Height
							{
								type: 'textbox',
								name: 'gmapHeight',
								label: 'Height',
								value: '300'
							},

							// Google Map Zoom
							{
								type: 'textbox',
								name: 'gmapZoom',
								label: 'Zoom',
								value: '15'
							}

							],
							onsubmit: function( e ) {
								editor.insertContent( '[googlemap title="' + e.data.gmapTitle + '" location="' + e.data.gmapLocation + '" height="' + e.data.gmapHeight + '" zoom="' + e.data.gmapZoom + '"]');
							}
						});
					}
				}, // End GoogleMap

				/** Grid **/
				{
				text: 'Grid',
				menu: [

						/* Row */
						{
							text: 'Row',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Shortcodes - Insert Row',
									body: [

									// Row Content
									{
										type: 'textbox',
										name: 'rowContent',
										label: 'Content',
										value: 'Content',
										multiline: true,
										minWidth: 300,
										minHeight: 100
									} ],
									onsubmit: function( e ) {
										editor.insertContent( '[row]<br />' + e.data.rowContent + '<br />[/row]');
									}
								});
							}
						}, // End Row

						/* Columns */
						{
							text: 'Columns',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Shortcodes - Insert Column',
									body: [

									// Column Size
									{
										type: 'listbox',
										name: 'columnSize',
										label: 'Size',
										'values': [
											{text: '1', value: '1'},
											{text: '2', value: '2'},
											{text: '3', value: '3'},
											{text: '4', value: '4'},
											{text: '5', value: '5'},
											{text: '6', value: '6'},
											{text: '7', value: '7'},
											{text: '8', value: '8'},
											{text: '9', value: '9'},
											{text: '10', value: '10'},
											{text: '11', value: '11'},
											{text: '12', value: '12'}
										]
									},

									// Column Content
									{
										type: 'textbox',
										name: 'columnContent',
										label: 'Content',
										value: 'Content',
										multiline: true,
										minWidth: 300,
										minHeight: 100
									} ],
									onsubmit: function( e ) {
										editor.insertContent( '[column size="' + e.data.columnSize + '"]<br />' + e.data.columnContent + '<br />[/column]');
									}
								});
							}
						}, // End Columns

					]
				}, // End Grid

				/* Heading */
				{
					text: 'Heading',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Shortcodes - Insert Heading',
							body: [

							// Heading Title
							{
								type: 'textbox',
								name: 'headingTitle',
								label: 'Title',
								value: 'This is a heading'
							},

							// Heading Font Size
							{
								type: 'textbox',
								name: 'headingFontSize',
								label: 'Font Size',
								value: ''
							},

							// Heading Color
							{
								type: 'textbox',
								name: 'headingColor',
								label: 'Heading Hex Color',
								value: ''
							},

							// Heading Top Margin
							{
								type: 'textbox',
								name: 'headingMarginTop',
								label: 'Top Margin',
								value: '30'
							},

							// Heading Bottom Margin
							{
								type: 'textbox',
								name: 'headingMarginBottom',
								label: 'Bottom Margin',
								value: '30'
							},

							// Heading Type
							{
								type: 'listbox',
								name: 'headingType',
								label: 'Type',
								'values': [
									{text: 'h1', value: 'h1'},
									{text: 'h2', value: 'h2'},
									{text: 'h3', value: 'h3'},
									{text: 'h4', value: 'h4'},
									{text: 'h5', value: 'h5'},
									{text: 'span', value: 'span'},
									{text: 'div', value: 'div'}
								]
							} ],
							onsubmit: function( e ) {
								editor.insertContent( '[heading title="' + e.data.headingTitle + '" type="' + e.data.headingType + '" font_size="' + e.data.headingFontSize + '" margin_top="' + e.data.headingMarginTop + '" margin_bottom="' + e.data.headingMarginBottom + '" color="' + e.data.headingColor + '"]' );
							}
						});
					}
				}, // End heading

				/* Highlights */
				{
					text: 'Highlights',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Shortcodes - Insert Highlight',
							body: [

							// Highlight Color
							{
								type: 'listbox',
								name: 'highlightColor',
								label: 'Size',
								'values': [
									{text: 'Blue', value: 'blue'},
									{text: 'Green', value: 'green'},
									{text: 'Yellow', value: 'yellow'},
									{text: 'Red', value: 'red'},
									{text: 'Gray', value: 'gray'}
								]
							},

							// Highlight Content
							{
								type: 'textbox', 
								name: 'highlightContent', 
								label: 'Highlighted Text',
								value: 'hey check me out'
							}],
							onsubmit: function( e ) {
								editor.insertContent( '[highlight color="' + e.data.highlightColor + '"]' + e.data.highlightContent + '[/highlight]');
							}
						});
					}
				}, // End highlights

				/** Lightbox **/
				{
				text: 'Lightbox',
				menu: [

						/* Image Lightbox */
						{
							text: 'Image Lightbox',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Shortcodes - Insert Image Lightbox',
									body: [

									// Image Lightbox Title
									{
										type: 'textbox',
										name: 'imgLightboxTitle',
										label: 'Title',
										value: ''
									},

									// Image Lightbox Full Image Url
									{
										type: 'textbox',
										name: 'imgLightboxFullUrl',
										label: 'Full Image URL',
										value: ''
									},

									// Image Lightbox Content
									{
										type: 'textbox',
										name: 'imgLightboxContent',
										label: 'Content',
										value: 'Content',
										multiline: true,
										minWidth: 300,
										minHeight: 100
									} ],
									onsubmit: function( e ) {
										editor.insertContent( '[image_lightbox title="' + e.data.imgLightboxTitle + '" full_img_url="' + e.data.imgLightboxFullUrl + '"]<br />' + e.data.imgLightboxContent + '<br />[/image_lightbox]');
									}
								});
							}
						}, // End Image Lightbox

						/* Video Lightbox */
						{
							text: 'Video Lightbox',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Shortcodes - Insert Video Lightbox',
									body: [

									// Video Lightbox Title
									{
										type: 'textbox',
										name: 'videoLightboxTitle',
										label: 'Title',
										value: ''
									},

									// Video Lightbox Video Url
									{
										type: 'textbox',
										name: 'videoLightboxVideoUrl',
										label: 'Youtube or Vimeo URL',
										value: ''
									},

									// Video Lightbox Content
									{
										type: 'textbox',
										name: 'videoLightboxContent',
										label: 'Content',
										value: 'Content',
										multiline: true,
										minWidth: 300,
										minHeight: 100
									} ],
									onsubmit: function( e ) {
										editor.insertContent( '[video_lightbox title="' + e.data.videoLightboxTitle + '" video_url="' + e.data.videoLightboxVideoUrl + '"]<br />' + e.data.videoLightboxContent + '<br />[/video_lightbox]');
									}
								});
							}
						}, // End Video Lightbox

					]
				}, // End Lightbox

				/** Modal **/
				{
					text: 'Modal',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Shortcodes - Insert Modal',
							body: [

							// Modal Button Text
							{
								type: 'textbox',
								name: 'modalBtnText',
								label: 'Button Text',
								value: 'Launch Modal'
							},

							// Modal Button Color
							{
								type: 'listbox',
								name: 'modalBtnColor',
								label: 'Button Color',
								'values': [
									{text: 'Primary', value: 'primary'},
									{text: 'Blue', value: 'blue'},
									{text: 'Dark Blue', value: 'darkblue'},
									{text: 'Green', value: 'green'},
									{text: 'Red', value: 'red'},
									{text: 'Pink', value: 'pink'},
									{text: 'Yellow', value: 'yellow'},
									{text: 'Brown', value: 'brown'},
									{text: 'Orange', value: 'orange'},
									{text: 'Teal', value: 'teal'},
									{text: 'Violet', value: 'violet'},
									{text: 'Black', value: 'black'}
								]
							},

							// Modal Button Size
							{
								type: 'listbox',
								name: 'modalBtnSize',
								label: 'Button Size',
								'values': [
									{text: 'Large', value: 'large'},
									{text: 'Medium', value: 'medium'},
									{text: 'Small', value: 'small'},
									{text: 'Extra Small', value: 'xsmall'}
								]
							},

							// Modal Button Style
							{
								type: 'listbox',
								name: 'modalBtnStyle',
								label: 'Button Style',
								'values': [
									{text: 'Default', value: 'default'},
									{text: 'Round', value: 'round'},
									{text: 'Square', value: 'square'}
								]
							},

							// Modal Button Outlined
							{
								type: 'listbox',
								name: 'modalBtnOutlined',
								label: 'Outlined Button',
								'values': [
									{text: 'Yes', value: 'yes'},
									{text: 'No', value: 'no'}
								]
							},

							// Modal Title
							{
								type: 'textbox',
								name: 'modalTitle',
								label: 'Modal Title',
								value: 'Title'
							},

							// Modal Size
							{
								type: 'listbox',
								name: 'modalSize',
								label: 'Modal Size',
								'values': [
									{text: 'Large', value: 'large'},
									{text: 'Medium', value: 'medium'},
									{text: 'Small', value: 'small'},
								]
							},

							// Modal Animation
							{
								type: 'listbox',
								name: 'enableModalAnimation',
								label: 'Enable Modal Animation',
								'values': [
									{text: 'Yes', value: 'yes'},
									{text: 'No', value: 'no'}
								]
							},

							// Show Modal Footer
							{
								type: 'listbox',
								name: 'showModalFooter',
								label: 'Show Modal Footer',
								'values': [
									{text: 'Yes', value: 'yes'},
									{text: 'No', value: 'no'}
								]
							},

							// Modal Content
							{
								type: 'textbox',
								name: 'modalContent',
								label: 'Content',
								value: 'Content',
								multiline: true,
								minWidth: 300,
								minHeight: 100
							} ],
							onsubmit: function( e ) {
								editor.insertContent( '[modal btn_text="' + e.data.modalBtnText + '" btn_color="' + e.data.modalBtnColor + '" btn_size="' + e.data.modalBtnSize + '" btn_style="' + e.data.modalBtnStyle + '" btn_outlined="' + e.data.modalBtnOutlined + '" modal_title="' + e.data.modalTitle + '" modal_size="' + e.data.modalSize + '" enable_animation="' + e.data.enableModalAnimation + '" show_modal_footer="' + e.data.showModalFooter + '"]' + e.data.modalContent + '[/modal]');
							}
						});
					}
				}, // End Modal

				/** Skillbar **/
				{
					text: 'Skillbar',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Shortcodes - Insert Skillbar',
							body: [

							// Skillbar Title
							{
								type: 'textbox',
								name: 'skillbarTitle',
								label: 'Title',
								value: 'Title'
							},

							// Skillbar Percentage
							{
								type: 'textbox',
								name: 'skillbarPercentage',
								label: 'Percentage',
								value: '75'
							},

							// Skillbar Color
							{
								type: 'listbox',
								name: 'skillbarColor',
								label: 'Color',
								'values': [
									{text: 'Primary', value: 'primary'},
									{text: 'Blue', value: 'blue'},
									{text: 'Dark Blue', value: 'darkblue'},
									{text: 'Green', value: 'green'},
									{text: 'Red', value: 'red'},
									{text: 'Pink', value: 'pink'},
									{text: 'Yellow', value: 'yellow'},
									{text: 'Brown', value: 'brown'},
									{text: 'Orange', value: 'orange'},
									{text: 'Teal', value: 'teal'},
									{text: 'Violet', value: 'violet'},
									{text: 'Black', value: 'black'}
								]
							},

							// Skillbar Stripes
							{
								type: 'listbox',
								name: 'skillbarEnableStripes',
								label: 'Enable Stripes',
								'values': [
									{text: 'Yes', value: 'yes'},
									{text: 'No', value: 'no'}
								]
							},

							// Skillbar Animation
							{
								type: 'listbox',
								name: 'skillbarEnableAnimation',
								label: 'Enable Animation',
								'values': [
									{text: 'Yes', value: 'yes'},
									{text: 'No', value: 'no'}
								]
							} ],
							onsubmit: function( e ) {
								editor.insertContent( '[skillbar title="' + e.data.skillbarTitle + '" percentage="' + e.data.skillbarPercentage + '" color="' + e.data.skillbarColor + '" enable_stripe="' + e.data.skillbarEnableStripes + '" enable_animation="' + e.data.skillbarEnableAnimation + '"]');
							}
						});
					}
				}, // End Skillbar

				/** Social Icons **/
				{
				text: 'Social Icons',
				menu: [

						/** Social **/
						{
							text: 'Social',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Shortcodes - Insert Social',
									body: [

									// Social Color
									{
										type: 'listbox',
										name: 'socialColor',
										label: 'Icons Color',
										'values': [
											{text: 'Light', value: 'light'},
											{text: 'Dark', value: 'dark'},
											{text: 'Colored', value: 'colored'}
										]
									},

									// Social Size
									{
										type: 'listbox',
										name: 'socialSize',
										label: 'Icon Size',
										'values': [
											{text: 'Default', value: 'default'},
											{text: 'Large', value: 'large'}
										]
									},

									// Social Style
									{
										type: 'listbox',
										name: 'socialStyle',
										label: 'Icon Style',
										'values': [
											{text: 'Default', value: 'default'},
											{text: 'Round', value: 'round'},
											{text: 'Square', value: 'square'}
										]
									} ],
									onsubmit: function( e ) {
										editor.insertContent( '[social color="' + e.data.socialColor + '" size="' + e.data.socialSize + '" style="' + e.data.socialStyle + '"]<br />Content<br />[/social]' );
									}
								});
							}
						}, // End Social

						/* Social Links */
						{
							text: 'Social Links',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Shortcodes - Insert Social Links',
									body: [

									// Social Icons
									{
										type: 'listbox',
										name: 'socialIcon',
										label: 'Icon',
										'values': [
											{text: 'Android', value: 'android'},
											{text: 'Apple', value: 'apple'},
											{text: 'Behance', value: 'behance'},
											{text: 'Bitbucket', value: 'bitbucket'},
											{text: 'Bitcoin', value: 'bitcoin'},
											{text: 'Codepen', value: 'codepen'},
											{text: 'Delicious', value: 'delicious'},
											{text: 'Deviantart', value: 'deviantart'},
											{text: 'Digg', value: 'digg'},
											{text: 'Dribbble', value: 'dribbble'},
											{text: 'Dropbox', value: 'dropbox'},
											{text: 'Facebook', value: 'facebook'},
											{text: 'Flickr', value: 'flickr'},
											{text: 'Foursquare', value: 'foursquare'},
											{text: 'Github', value: 'github'},
											{text: 'Google Plus', value: 'google-plus'},
											{text: 'Instagram', value: 'instagram'},
											{text: 'Jsfiddle', value: 'jsfiddle'},
											{text: 'Lastfm', value: 'lastfm'},
											{text: 'Linkedin', value: 'linkedin'},
											{text: 'Pinterest', value: 'pinterest'},
											{text: 'Reddit', value: 'reddit'},
											{text: 'Rss', value: 'rss'},
											{text: 'Skype', value: 'skype'},
											{text: 'Soundcloud', value: 'soundcloud'},
											{text: 'Spotify', value: 'spotify'},
											{text: 'Stumbleupon', value: 'stumbleupon'},
											{text: 'Tumblr', value: 'tumblr'},
											{text: 'Twitter', value: 'twitter'},
											{text: 'Vimeo', value: 'vimeo'},
											{text: 'VK', value: 'vk'},
											{text: 'Weibo', value: 'weibo'},
											{text: 'Xing', value: 'xing'},
											{text: 'Yelp', value: 'yelp'},
											{text: 'Youtube', value: 'youtube'}
										]
									},

									// Social URL
									{
										type: 'textbox',
										name: 'socialUrl',
										label: 'Link',
										value: ''
									} ],
									onsubmit: function( e ) {
										editor.insertContent( '[social_icon icon="' + e.data.socialIcon + '" url="' + e.data.socialUrl + '"]');
									}
								});
							}
						}, // End Social Links

					]
				}, // End Social Icons

				/* Spacing */
				{
					text: 'Spacing',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Shortcodes - Insert Spacing',
							body: [ {
								type: 'textbox', 
								name: 'spacingSize', 
								label: 'Height In Pixels',
								value: '30'
							} ],
							onsubmit: function( e ) {
								editor.insertContent( '[spacing size="' + e.data.spacingSize + '"]');
							}
						});
					}
				}, // End spacing

				/** Table **/
				{
				text: 'Table',
				menu: [

						/* Table 2 Columns */
						{
							text: '2 Columns',
							onclick: function() {
								editor.insertContent( '<div class="table-responsive"><br /><table class="table table-bordered table-striped" style="width: 100%;"><br /><thead><br /><tr><br /><th>Column 1</th><br /><th>Column 2</th><br /></tr><br /></thead><br /><tbody><br /><tr><br /><td>Table Cell 1</td><br /><td>Table Cell 2</td><br /></tr><br /><tr><br /><td>Table Cell 1</td><br /><td>Table Cell 2</td><br /></tr><br /><tr><br /><td>Table Cell 1</td><br /><td>Table Cell 2</td><br /></tr><br /></tbody><br /></table><br /></div>');
							}
						}, // End Table 2 Columns

						/* Table 3 Columns */
						{
							text: '3 Columns',
							onclick: function() {
								editor.insertContent( '<div class="table-responsive"><br /><table class="table table-bordered table-striped" style="width: 100%;"><br /><thead><br /><tr><br /><th>Column 1</th><br /><th>Column 2</th><br /><th>Column 3</th><br /></tr><br /></thead><br /><tbody><br /><tr><br /><td>Table Cell 1</td><br /><td>Table Cell 2</td><br /><td>Table Cell 3</td><br /></tr><br /><tr><br /><td>Table Cell 1</td><br /><td>Table Cell 2</td><br /><td>Table Cell 3</td><br /></tr><br /><tr><br /><td>Table Cell 1</td><br /><td>Table Cell 2</td><br /><td>Table Cell 3</td><br /></tr><br /></tbody><br /></table><br /></div>');
							}
						}, // End Table 3 Columns

						/* Table 4 Columns */
						{
							text: '4 Columns',
							onclick: function() {
								editor.insertContent( '<div class="table-responsive"><br /><table class="table table-bordered table-striped" style="width: 100%;"><br /><thead><br /><tr><br /><th>Column 1</th><br /><th>Column 2</th><br /><th>Column 3</th><br /><th>Column 4</th><br /></tr><br /></thead><br /><tbody><br /><tr><br /><td>Table Cell 1</td><br /><td>Table Cell 2</td><br /><td>Table Cell 3</td><br /><td>Table Cell 4</td><br /></tr><br /><tr><br /><td>Table Cell 1</td><br /><td>Table Cell 2</td><br /><td>Table Cell 3</td><br /><td>Table Cell 4</td><br /></tr><br /><tr><br /><td>Table Cell 1</td><br /><td>Table Cell 2</td><br /><td>Table Cell 3</td><br /><td>Table Cell 4</td><br /></tr><br /></tbody><br /></table><br /></div>');
							}
						}, // End Table 4 Columns

					]
				}, // End Table

				/** Tabs **/
				{
					text: 'Tabs',
					onclick: function() {
						editor.insertContent( '[tabgroup]<br />[tab title="Tab 1"] Your Content [/tab]<br />[tab title="Tab 2"] Your Content [/tab]<br />[tab title="Tab 3"] Your Content [/tab]<br />[/tabgroup]' );
					}
				}, // End Tabs

				/** Toggle **/
				{
					text: 'Toggle',
					onclick: function() {
						editor.insertContent( '[toggle title="Toggle Title"] Your Content [/toggle]' );
					}
				}, // End Toggle

				/* Testimonial */
				{
					text: 'Testimonial',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Shortcodes - Insert Testimonial',
							body: [

							// Testimonial Author
							{
								type: 'textbox',
								name: 'testimonialAuthor',
								label: 'Author',
								value: 'Author'
							},

							// Testimonial Content
							{
								type: 'textbox',
								name: 'testimonialContent',
								label: 'Content',
								value: 'Content',
								multiline: true,
								minWidth: 300,
								minHeight: 100
							} ],
							onsubmit: function( e ) {
								editor.insertContent( '[testimonial author="' + e.data.testimonialAuthor + '"]' + e.data.testimonialContent + '[/testimonial]');
							}
						});
					}
				}, // End Testimonial

				/** Tooltip **/
				{
					text: 'Tooltip',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Shortcodes - Insert Tooltip',
							body: [

							// Tooltip Title
							{
								type: 'textbox',
								name: 'tooltipTitle',
								label: 'Title',
								value: 'Tooltip Title'
							},

							// Tooltip Trigger
							{
								type: 'listbox',
								name: 'tooltipTrigger',
								label: 'Trigger Type',
								'values': [
									{text: 'Hover', value: 'hover'},
									{text: 'Click', value: 'click'}
								]
							},

							// Tooltip Placement
							{
								type: 'listbox',
								name: 'tooltipPlacement',
								label: 'Placement',
								'values': [
									{text: 'Top', value: 'top'},
									{text: 'Right', value: 'right'},
									{text: 'Bottom', value: 'bottom'},
									{text: 'Left', value: 'left'}
								]
							},

							// Tooltip Content
							{
								type: 'textbox',
								name: 'tooltipContent',
								label: 'Content',
								value: 'Content',
								multiline: true,
								minWidth: 300,
								minHeight: 100
							} ],
							onsubmit: function( e ) {
								editor.insertContent( '[tooltip title="' + e.data.tooltipTitle + '" trigger="' + e.data.tooltipTrigger + '" placement="' + e.data.tooltipPlacement + '"]' + e.data.tooltipContent + '[/tooltip]');
							}
						});
					}
				}, // End Tooltip

				/* Video Embed */
				{
					text: 'Video',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Shortcodes - Insert Video',
							body: [ {
								type: 'textbox', 
								name: 'videoUrl', 
								label: 'Video URL',
								value: ''
							} ],
							onsubmit: function( e ) {
								editor.insertContent( '[video_embed url="' + e.data.videoUrl + '"]');
							}
						});
					}
				}, // End Video Embed

			]
		});
	});
})();