/**
 * Created by fonpah on 22.03.2015.
 */
(function(){
    "use strict";
    angular.module('ems.common.resources')
        .factory('EmployeeResourceFactory', employeeResourceFactory);

    employeeResourceFactory.$inject = ['Restangular', 'RESOURCE_BASE_URL'];

    function employeeResourceFactory (Restangular, RESOURCE_BASE_URL){
        return {
            getEmployees:Restangular.all('employees').getList()
        };
    }
})();