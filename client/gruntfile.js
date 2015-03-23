module.exports = function (grunt) {
    grunt.initConfig({
        concat: {
            options: {
                // define a string to put between each file in the concatenated output
                separator: '\n'
            },
            dist: {
                // the files to concatenate
                src: [


                    'src/app/modules/common/resources/module.js',
                    'src/app/modules/common/resources/employee.js',

                    /*load EmployeeModule*/
                    'src/app/modules/employee/module.js',
                    'src/app/modules/employee/controllers/**/*.js',

                    /* load dashboard module*/
                    'src/app/modules/dashboard/module.js',
                    'src/app/modules/dashboard/controllers/**/*.js',


                    /*config*/
                    'src/app/config/app.properties.js',
                    /* app module */
                    'src/app/app.js',
                    'src/app/controllers/app.ctrl.js'


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
            js: {files: 'src/app/**/*.js', tasks: ['concat']}
        }
        //,
        //copy: {
        //    files: {
        //        cwd: 'src/app/modules',  // set working folder / root to copy
        //        src: '/**/*.html',           // copy all files and subfolders
        //        dest: 'src/app/tpl',    // destination folder
        //        expand: true           // required when using cwd
        //    }
        //}
    });
    // load plugins
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-concat');
    /*grunt.loadNpmTasks('grunt-contrib-copy');*/
// register at least this one task
    grunt.registerTask('default', ['concat', 'uglify'/*,'copy'*/]);
}