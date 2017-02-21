module.exports = function(grunt) {

    grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		wiredep: {
			task: {
				ignorePath: '../../../public/',
				src: ['application/views/_partial/header.php']
			}
		},
		bower_concat: {
			all: {
				mainFiles: {
					'bootstrap-table': [ "src/bootstrap-table.js", "src/bootstrap-table.css", "dist/extensions/export/bootstrap-table-export.js", "dist/extensions/mobile/bootstrap-table-mobile.js"]
				},
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
			targetdistbootswatch: {
				options: {
					srcPrefix: 'public/bower_components/bootswatch',
					destPrefix: 'public/dist/bootswatch'
				},
				files: {
					'cerulean/bootstrap.min.css': 'cerulean/bootstrap.min.css',
					'cosmo/bootstrap.min.css': 'cosmo/bootstrap.min.css',
					'cyborg/bootstrap.min.css': 'cyborg/bootstrap.min.css',
					'darkly/bootstrap.min.css': 'darkly/bootstrap.min.css',
					'flatly/bootstrap.min.css': 'flatly/bootstrap.min.css',
					'journal/bootstrap.min.css': 'journal/bootstrap.min.css',
					'paper/bootstrap.min.css': 'paper/bootstrap.min.css',
					'readable/bootstrap.min.css': 'readable/bootstrap.min.css',
					'sandstone/bootstrap.min.css': 'sandstone/bootstrap.min.css',
					'slate/bootstrap.min.css': 'slate/bootstrap.min.css',
					'spacelab/bootstrap.min.css': 'spacelab/bootstrap.min.css',
					'superhero/bootstrap.min.css': 'superhero/bootstrap.min.css',
					'united/bootstrap.min.css': 'united/bootstrap.min.css',
					'yeti/bootstrap.min.css': 'yeti/bootstrap.min.css',
					'fonts': 'fonts'
				}
			},
			bootstrapcore: {
				options: {
					srcPrefix: 'public/bower_components/bootstrap/dist',
					destPrefix: 'public/dist'

				},
				files: {
					'bootstrap.min.css': 'css/bootstrap.min.css',
					'bootstrap.min.js': 'js/bootstrap.min.js'
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
					'tmp/<%= pkg.name %>.js': ['tmp/neptune_bower.js', 'public/js/jquery*', 'public/js/*.js']
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
			css_login: {
				options: {
					scriptTemplate: '<rel type="text/css" src="{{ path }}"></rel>',
					openTag: '<!-- start css template tags -->',
					closeTag: '<!-- end css template tags -->',
                    ignorePath: '../../public/'
				},
				src: ['public/css/login.css', 'public/dist/bootstrap.min.css'],
				dest: 'application/views/login.php'
			},
			css_header: {
				options: {
					scriptTemplate: '<rel type="text/css" src="{{ path }}"></rel>',
					openTag: '<!-- start css template tags -->',
					closeTag: '<!-- end css template tags -->',
					ignorePath: '../../../public/'
				},
				src: ['public/css/*.css', '!public/css/login.css'],
				dest: 'application/views/_partial/header.php',
			},
			mincss_header: {
				options: {
					scriptTemplate: '<rel type="text/css" src="{{ path }}"></rel>',
					openTag: '<!-- start mincss template tags -->',
					closeTag: '<!-- end mincss template tags -->',
					ignorePath: '../../../public/'
				},
				src: ['public/dist/*.css', '!public/dist/login.css'],
				dest: 'application/views/_partial/header.php',
			},
			js: {
				options: {
					scriptTemplate: '<script type="text/javascript" src="{{ path }}"></script>',
					openTag: '<!-- start js template tags -->',
					closeTag: '<!-- end js template tags -->',
					ignorePath: '../../../public/'
				},
				src: ['public/js/jquery*', 'public/js/*.js'],
				dest: 'application/views/_partial/header.php'
			},
			minjs: {
				options: {
					scriptTemplate: '<script type="text/javascript" src="{{ path }}"></script>',
					openTag: '<!-- start minjs template tags -->',
					closeTag: '<!-- end minjs template tags -->',
					ignorePath: '../../../public/'
				},
				src: ['public/dist/*min.js'],
				dest: 'application/views/_partial/header.php'
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
					src: ['application/views/_partial/header.php', 'application/views/login.php']
				}
			}
		}
    });

	require('load-grunt-tasks')(grunt);

	grunt.registerTask('default', ['wiredep', 'bower_concat', 'bowercopy', 'concat', 'uglify', 'cssmin', 'tags', 'cachebreaker']);

};
