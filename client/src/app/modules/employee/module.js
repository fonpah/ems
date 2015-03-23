/**
 * Created by fonpah on 22.03.2015.
 */
(function () {
    "use strict";
    angular.module('ems.employee', [
        'ui.router',
        'ui.bootstrap',
        'restangular'
    ])
        .config([
            '$stateProvider',
            '$urlRouterProvider',
             function ($stateProvider, $urlRouterProvider) {
                 $urlRouterProvider.when('/employees', '/employees/list');
                 $urlRouterProvider.when('/employees/', '/employees/list');
                 $stateProvider
                     .state('employee',{
                         name: 'employee',
                         url: '/employees',
                         templateUrl:'app/modules/employee/tpl/index.html'
                     })
                     .state('employee.list',{
                         parent:'employee',
                         url: '/list',
                         templateUrl:'app/modules/employee/tpl/list.html',
                         controller: 'EmployeeController'
                     })
                     .state('employee.create',{
                         parent:'employee',
                         url:'/create',
                         templateUrl:'app/modules/employee/tpl/create.html',
                         data:{
                             title:'Create Employee'
                         },
                         controller:'CreateEmployeeController'
                     });
            }
        ]);
})();