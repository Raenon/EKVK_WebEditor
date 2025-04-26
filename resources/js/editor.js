/**
 * This configuration was generated using the CKEditor 5 Builder. You can modify it anytime using this link:
 * https://ckeditor.com/ckeditor-5/builder/#installation/NoNgNARATAdArDADBSBGRAWOBmHcRRwCcGq6RI2IBRqUIRA7IyFrfVEQByJSNQoIAUwB2KRGGCowEidPkBdSACNsQjFyEAzCAqA=
 */

const {
	ClassicEditor,
	Autoformat,
	AutoImage,
	Autosave,
	BlockQuote,
	Bold,
	CKBox,
	CKBoxImageEdit,
	CloudServices,
	Essentials,
	Heading,
	ImageBlock,
	ImageCaption,
	ImageInline,
	ImageInsert,
	ImageInsertViaUrl,
	ImageResize,
	ImageStyle,
	ImageTextAlternative,
	ImageToolbar,
	ImageUpload,
	Indent,
	IndentBlock,
	Italic,
	Link,
	LinkImage,
	List,
	ListProperties,
	MediaEmbed,
	Paragraph,
	PasteFromOffice,
	PictureEditing,
	PlainTableOutput,
	Table,
	TableCaption,
	TableCellProperties,
	TableColumnResize,
	TableLayout,
	TableProperties,
	TableToolbar,
	TextTransformation,
	Title,
	TodoList,
	Underline,
	WordCount
} = window.CKEDITOR;
const { ExportPdf, ExportWord, ImportWord, MultiLevelList } = window.CKEDITOR_PREMIUM_FEATURES;

const LICENSE_KEY =
	'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3NDY0ODk1OTksImp0aSI6IjUxOTVjODAyLTRhNTEtNGFhOS1iODVmLTJkZDY3NTM3NzZhYiIsInVzYWdlRW5kcG9pbnQiOiJodHRwczovL3Byb3h5LWV2ZW50LmNrZWRpdG9yLmNvbSIsImRpc3RyaWJ1dGlvbkNoYW5uZWwiOlsiY2xvdWQiLCJkcnVwYWwiLCJzaCJdLCJ3aGl0ZUxhYmVsIjp0cnVlLCJsaWNlbnNlVHlwZSI6InRyaWFsIiwiZmVhdHVyZXMiOlsiKiJdLCJ2YyI6ImExYmNkYjU0In0.YtPHXw7BDVG32MEQsFAAQ6V_3HqRW5WzzsbnxtqQ1EHiXNbAE8sOQ2YoNWFtBdZh_pddrZFSnPu-oimAN4WJXw';

const CLOUD_SERVICES_TOKEN_URL =
	'https://czz92e97r5k5.cke-cs.com/token/dev/57d41538d8a19726dc21c9282b816eab6a74c57acece6356ddc10f07f680?limit=10';

const editorConfig = {
	toolbar: {
		items: [
			'importWord',
			'exportWord',
			'exportPdf',
			'|',
			'heading',
			'|',
			'bold',
			'italic',
			'underline',
			'|',
			'link',
			'insertImage',
			'insertImageViaUrl',
			'ckbox',
			'mediaEmbed',
			'insertTable',
			'insertTableLayout',
			'blockQuote',
			'|',
			'bulletedList',
			'numberedList',
			'multiLevelList',
			'todoList',
			'outdent',
			'indent'
		],
		shouldNotGroupWhenFull: false
	},
	plugins: [
		Autoformat,
		AutoImage,
		Autosave,
		BlockQuote,
		Bold,
		CKBox,
		CKBoxImageEdit,
		CloudServices,
		Essentials,
		ExportPdf,
		ExportWord,
		Heading,
		ImageBlock,
		ImageCaption,
		ImageInline,
		ImageInsert,
		ImageInsertViaUrl,
		ImageResize,
		ImageStyle,
		ImageTextAlternative,
		ImageToolbar,
		ImageUpload,
		ImportWord,
		Indent,
		IndentBlock,
		Italic,
		Link,
		LinkImage,
		List,
		ListProperties,
		MediaEmbed,
		MultiLevelList,
		Paragraph,
		PasteFromOffice,
		PictureEditing,
		PlainTableOutput,
		Table,
		TableCaption,
		TableCellProperties,
		TableColumnResize,
		TableLayout,
		TableProperties,
		TableToolbar,
		TextTransformation,
		Title,
		TodoList,
		Underline,
		WordCount
	],
	cloudServices: {
		tokenUrl: CLOUD_SERVICES_TOKEN_URL
	},
	exportPdf: {
		stylesheets: [
			/* This path should point to the content stylesheets on your assets server. */
			/* See: https://ckeditor.com/docs/ckeditor5/latest/features/converters/export-pdf.html */
			'./style.css',
			/* Export PDF needs access to stylesheets that style the content. */
			'https://cdn.ckeditor.com/ckeditor5/45.0.0/ckeditor5.css',
			'https://cdn.ckeditor.com/ckeditor5-premium-features/45.0.0/ckeditor5-premium-features.css'
		],
		fileName: 'export-pdf-demo.pdf',
		converterOptions: {
			format: 'Tabloid',
			margin_top: '20mm',
			margin_bottom: '20mm',
			margin_right: '24mm',
			margin_left: '24mm',
			page_orientation: 'portrait'
		}
	},
	exportWord: {
		stylesheets: [
			/* This path should point to the content stylesheets on your assets server. */
			/* See: https://ckeditor.com/docs/ckeditor5/latest/features/converters/export-word.html */
			'./style.css',
			/* Export Word needs access to stylesheets that style the content. */
			'https://cdn.ckeditor.com/ckeditor5/45.0.0/ckeditor5.css',
			'https://cdn.ckeditor.com/ckeditor5-premium-features/45.0.0/ckeditor5-premium-features.css'
		],
		fileName: 'export-word-demo.docx',
		converterOptions: {
			document: {
				orientation: 'portrait',
				size: 'Tabloid',
				margins: {
					top: '20mm',
					bottom: '20mm',
					right: '24mm',
					left: '24mm'
				}
			}
		}
	},
	heading: {
		options: [
			{
				model: 'paragraph',
				title: 'Paragraph',
				class: 'ck-heading_paragraph'
			},
			{
				model: 'heading1',
				view: 'h1',
				title: 'Heading 1',
				class: 'ck-heading_heading1'
			},
			{
				model: 'heading2',
				view: 'h2',
				title: 'Heading 2',
				class: 'ck-heading_heading2'
			},
			{
				model: 'heading3',
				view: 'h3',
				title: 'Heading 3',
				class: 'ck-heading_heading3'
			},
			{
				model: 'heading4',
				view: 'h4',
				title: 'Heading 4',
				class: 'ck-heading_heading4'
			},
			{
				model: 'heading5',
				view: 'h5',
				title: 'Heading 5',
				class: 'ck-heading_heading5'
			},
			{
				model: 'heading6',
				view: 'h6',
				title: 'Heading 6',
				class: 'ck-heading_heading6'
			}
		]
	},
	image: {
		toolbar: [
			'toggleImageCaption',
			'imageTextAlternative',
			'|',
			'imageStyle:inline',
			'imageStyle:wrapText',
			'imageStyle:breakText',
			'|',
			'resizeImage',
			'|',
			'ckboxImageEdit'
		]
	},
	initialData:
		'',
	licenseKey: LICENSE_KEY,
	link: {
		addTargetToExternalLinks: true,
		defaultProtocol: 'https://',
		decorators: {
			toggleDownloadable: {
				mode: 'manual',
				label: 'Downloadable',
				attributes: {
					download: 'file'
				}
			}
		}
	},
	list: {
		properties: {
			styles: true,
			startIndex: true,
			reversed: true
		}
	},
	menuBar: {
		isVisible: true
	},
	placeholder: 'Type or paste your content here!',
	table: {
		contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells', 'tableProperties', 'tableCellProperties']
	}
};

configUpdateAlert(editorConfig);

ClassicEditor.create(document.querySelector('#editor'), editorConfig).then(editor => {
	const wordCount = editor.plugins.get('WordCount');
	document.querySelector('#editor-word-count').appendChild(wordCount.wordCountContainer);

	document.querySelector('#editor-menu-bar').appendChild(editor.ui.view.menuBarView.element);

	return editor;
});

/**
 * This function exists to remind you to update the config needed for premium features.
 * The function can be safely removed. Make sure to also remove call to this function when doing so.
 */
function configUpdateAlert(config) {
	if (configUpdateAlert.configUpdateAlertShown) {
		return;
	}

	const isModifiedByUser = (currentValue, forbiddenValue) => {
		if (currentValue === forbiddenValue) {
			return false;
		}

		if (currentValue === undefined) {
			return false;
		}

		return true;
	};

	const valuesToUpdate = [];

	configUpdateAlert.configUpdateAlertShown = true;

	if (!isModifiedByUser(config.licenseKey, '<YOUR_LICENSE_KEY>')) {
		valuesToUpdate.push('LICENSE_KEY');
	}

	if (!isModifiedByUser(config.cloudServices?.tokenUrl, '<YOUR_CLOUD_SERVICES_TOKEN_URL>')) {
		valuesToUpdate.push('CLOUD_SERVICES_TOKEN_URL');
	}

	if (valuesToUpdate.length) {
		window.alert(
			[
				'Please update the following values in your editor config',
				'to receive full access to Premium Features:',
				'',
				...valuesToUpdate.map(value => ` - ${value}`)
			].join('\n')
		);
	}
}