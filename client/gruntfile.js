module.exports = function (grunt) {
  grunt.initConfig( {
    concat: {
      options: {
        // define a string to put between each file in the concatenated output
        separator: '\n'
      },
      dist: {
        // the files to concatenate
        src: [



          'src/app/common/resources/module.js',
          'src/app/common/resources/company_profile.js',

          'src/app/dashboard/dashboard.js',
          'src/app/dashboard/dashboard.ctrl.js',

          'src/app/app.js',
          'src/app/app.properties.js',
          'src/app/app.ctrl.js'
        ],
        // the location of the resulting JS file
        dest: 'src/dist/ems-all.js'
      }
    },
    // define source files and their destinations
    uglify: {
      files: {
        src: 'src/dist/ems-all.js',  // source files mask
        dest: 'src/build/',    // destination folder
        expand: true,    // allow dynamic building
        flatten: true,   // remove all unnecessary nesting
        ext: '.min.js'   // replace .js to .min.js
      }
    },
    watch: {
      js: { files: 'src/app/**/*.js', tasks: [ 'concat' ] }
    }
  } );
  // load plugins
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-concat');
// register at least this one task
  grunt.registerTask('default', [ 'concat' ,'uglify']);
}