'use strict';
module.exports = function (grunt){

    require('load-grunt-tasks')(grunt);


   //loading grunt tasks
  
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-compass');

    grunt.loadNpmTasks('grunt-bower-task');
    grunt.loadNpmTasks('grunt-rsync');


 //grunt options
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
           //package options

        compass: {
          dev: {
              options: {
                  sassDir: 'assets/style/sass',
                  cssDir: 'assets/style/css',
                  fontsDir: 'assets/fonts',
                  javascriptsDir: 'assets/js',
                  imagesDir: 'assets/img',
                  force:true,
                  relativeAssets: true,
              }
            }
        },
  
    watch: {
      options: {
              livereload: {
                  port: 6000
              },
              spawn: false
            },
          scripts: {
              files: ['assets/script/**/*.js'],
              //tasks: ['jshint', 'concat']
            },
            compass: {
              files: ['assets/style/sass/{,*/}*.{scss,sass}'],
              tasks: ['compass:dev']
            },
            
        },
    rsync: {
        options: {
            args: ["--verbose"],
            exclude: [".git*","*.scss","node_modules",".bowerrc", "bower.json", "livereload.js", "Gruntfile.js", ".sass-cache", 'src', 'Main', 'bootstrap/grunt','bootstrap/js','bootstrap/less','bootstrap/fonts' ,'pro', 'build', 'sass','package.js', 'LICENSE' ,'package.json', 'Designs'],
            recursive: true
        },
        dist: {
            options: {
                src: "./",
                dest: "../802_Video_Production"
            }
        },
        stage: {
            options: {
                src: "../802_Video_Production",
                dest: "/var/www/site",
                host: "user@staging-host",
                // delete: true // Careful this option could cause data loss, read the docs!
            }
        },
        prod: {
            options: {
                src: "../802_Video_Production",
                dest: "/var/www/site",
                host: "user@live-host",
                //delete: true // Careful this option could cause data loss, read the docs!
            }
        }
    }
  });



    //register tasks here


    grunt.registerTask('go', ['watch', 'compass:dev' ]);



    grunt.registerTask('pro', 'rsync');


}