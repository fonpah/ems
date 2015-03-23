/**
 * Created by fonpah on 22.03.2015.
 */
(function () {
    "use strict";
    angular.module('ems.employee')
        .controller('EmployeeController', employeeCtrl);

    employeeCtrl.$inject = ['$scope','Restangular'];

    function employeeCtrl($scope,Restangular) {
        $scope.employees = Restangular.all('employees').getList();
    }
})();