module.exports = function(grunt) {

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		watch: {
			sass: {
				files: ["**/*.scss"],
				tasks: ['sass']
			}
		},
		sass:{
			dist: {
				options: {
					style: 'expanded'
				},
				files: {
					'assets/styles/css/bootstrap.css': 'assets/styles/scss/bootstrap/bootstrap.scss',
					'assets/styles/css/custom.css': 'assets/styles/scss/custom.scss'
				}
			}
		},
		bowercopy: {
			bootstrap: {
				files: {
					'assets/scripts/vendor/bootstrap.js': 'bootstrap-sass/dist/js/bootstrap.min.js',
					'assets/styles/scss/bootstrap/': 'bootstrap-sass/lib/',
					'assets/styles/fonts/': 'bootstrap-sass/fonts/'
				}
			}
		}

	});

	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-bowercopy');

	grunt.registerTask('init', [ 'bowercopy', 'sass' ]);
	grunt.registerTask('default', ['sass']);
};