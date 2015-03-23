/**
 * Created by fonpah on 22.03.2015.
 */
(function () {
    "use strict";
    angular.module('ems.employee')
        .controller('CreateEmployeeController', ['$scope', 'Restangular', function ($scope, Restangular) {
           console.log( Restangular.one('employees/new').get());
        }
        ]);
})();