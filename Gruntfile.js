module.exports = function(grunt) {

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		wiredep: {
			task: {
				ignorePath: '../../../public',
				src: ['application/views/_partial/header_css_js.php']
			}
		},
		tags: {
			css: {
				options: {
					scriptTemplate: '<rel type="text/css" src="{{ path }}"></rel>',
					openTag: '<!-- neptune:css -->',
					closeTag: '<!-- endneptune:css -->',
					ignorePath: '../../../public'
				},
				src: ['public/css/*.css'],
				dest: 'application/views/_partial/header_css_js.php',
			},
			js: {
				options: {
					scriptTemplate: '<script type="text/javascript" src="{{ path }}"></script>',
					openTag: '<!-- neptune:js -->',
					closeTag: '<!-- endneptune:js -->',
					ignorePath: '../../../public'
				},
				src: ['public/js/*.js'],
				dest: 'application/views/_partial/header_css_js.php'
			}
		}
	});

	require('load-grunt-tasks')(grunt);

	grunt.registerTask('default' , ['wiredep', 'tags:css', 'tags:js'] );

};