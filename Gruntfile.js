module.exports = function(grunt) {

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		wiredep: {
			task: {
				ignorePath: '../../../public/',
				src: ['application/views/_partial/header_css_js.php']
			}
		},
		bower_concat: {
			all: {
				dest: {
					'js': 'tmp/neptune_bower.js',
					'css': 'tmp/neptune_bower.css'
				}
			}
		},
		bowercopy: {
			options: {
				report: false
			},
			login: {
				options: {
					srcPrefix: 'public/css',
					destPrefix: 'public/dist'

				},
				files: {
					'login.css': 'login.css'
				}
			}
		},
		cssmin: {
			target: {
				files: {
					'public/dist/<%= pkg.name %>.min.css': ['tmp/neptune_bower.css', 'public/css/*.css', '!public/css/login.css']
				}
			}
		},
		concat: {
			js: {
				options: {
					separator: ';'
				},
				files: {
					'tmp/<%= pkg.name %>.js': ['tmp/neptune_bower.js', 'public/js/*.js']
				}
			}
		},
		uglify: {
			options: {
				banner: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n'
			},
			dist: {
				files: {
					'public/dist/<%= pkg.name %>.min.js': ['tmp/<%= pkg.name %>.js']
				}
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
				src: ['public/css/*.css', '!public/css/login.css'],
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
			},
			login_css: {
				options: {
					scriptTemplate: '<rel type="text/css" src="{{ path }}"></rel>',
					openTag: '<!-- neptune:css -->',
					closeTag: '<!-- endneptune -->',
					ignorePath: '../../public'
				},
				src: ['public/dist/login.css'],
				dest: 'application/views/login.php'
			},
			mincss: {
				options: {
					scriptTemplate: '<rel type="text/css" src="{{ path }}"></rel>',
					openTag: '<!-- start mincss template tags -->',
					closeTag: '<!-- end mincss template tags -->',
					ignorePath: '../../../public'
				},
				src: ['public/dist/*.css', '!public/dist/login.css'],
				dest: 'application/views/_partial/header_css_js.php'
			},
			minjs: {
				options: {
					scriptTemplate: '<script type="text/javascript" src="{{ path }}"></script>',
					openTag: '<!-- start minjs template tags -->',
					closeTag: '<!-- end minjs template tags -->',
					ignorePath: '../../../public'
				},
				src: ['public/dist/*.js'],
				dest: 'application/views/_partial/header_css_js.php'
			}
		},
		cachebreaker: {
			dev: {
				options: {
					match: [ {
						'neptune.min.js': 'public/dist/neptune.min.js',
						'neptune.min.css': 'public/dist/neptune.min.css'
					} ],
					replacement: 'md5'
				},
				files: {
					src: ['application/views/_partial/header_css_js.php', 'application/views/login.php']
				}
			}
		}
	});

	require('load-grunt-tasks')(grunt);

	grunt.registerTask('bowerupdate', ['wiredep', 'tags:css', 'tags:js']);
	grunt.registerTask('minify', ['bower_concat', 'cssmin', 'concat', 'uglify', 'tags:mincss', 'tags:minjs', 'cachebreaker']);
	grunt.registerTask('login', ['bowercopy', 'tags:login_css']);

	grunt.registerTask('default',['bowerupdate', 'minify', 'login']);

};