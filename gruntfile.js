module.exports = function(grunt) {
grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

      concat: {   
        dist: {
            src: [
                'assets-src/js/libs/*.js', // All JS in the libs folder
                'assets-src/js/main.js'  // This specific file
            ],
            dest: 'assets-src/js/build/build.js',
        }
      },

      uglify: {
        build: {
            src: 'assets-src/js/build/build.js',
            dest: 'assets/js/build.min.js'
        }
      },

      imagemin: {
        dynamic: {
            files: [{
                expand: true,
                cwd: 'assets-src/img',
                src: ['**/*.{png,jpg,gif,jpeg}'],
                dest: 'assets/img/'
            }]
        }
      },

      cssmin: {
        dist: {
          options: {
             banner: '/*! MyLib.js 1.0.0 | Sam Vipond (@Sammy_Potato) | MIT Licensed */'
          },
          files: {
             'assets/css/style.min.css': ['assets-src/css/**/*.css']
          }
        }
      },

      watch: {
        css: {
          // triggers a soft CSS only refresh
          files: ['assets-src/**/*.css'],
          tasks: ['cssmin'],
          spawn: false,
          options: { livereload: false }
        },
        mincss: {
          // triggers a soft CSS only refresh
          files: ['assets/**/*.css'],
          spawn: false,
          options: { livereload: true }
        },
        js_output: {
          // triggers a soft JS only refresh
          files: 'assets-src/**/*.js',
          tasks: ['concat', 'uglify'],
          spawn: false,
          options: { livereload: true }
        },
        php:  {
          files: ['**/*.php'],
          options: { livereload: true }
        }
      }
    });

// Where we tell Grunt we plan to use this plug-in.
grunt.loadNpmTasks('grunt-contrib-watch');
grunt.loadNpmTasks('grunt-contrib-concat');
grunt.loadNpmTasks('grunt-contrib-uglify');
grunt.loadNpmTasks('grunt-contrib-imagemin');
grunt.loadNpmTasks('grunt-contrib-cssmin');

// Where we tell Grunt what to do when we type "grunt" into the terminal.
grunt.registerTask('default', ['watch']);
grunt.registerTask('build', ['concat', 'uglify', 'cssmin', 'imagemin']);
};

