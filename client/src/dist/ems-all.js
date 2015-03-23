/**
 * Created by fonpah on 20.03.2015.
 */
(function () {
    "use strict";

    angular.module('ems.common.resources', [
        'restangular',
        'ems.appProperties'
    ]);
})();
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
/**
 * Created by fonpah on 20.03.2015.
 */
(function () {
    "use strict";
    angular.module('ems.dashboard', [
        'ui.bootstrap',
        'ui.router'
    ])
        .config([
            '$stateProvider',
            '$urlRouterProvider',
            function ($stateProvider, $urlRouterProvider) {

                $stateProvider
                    .state('dashboard', {
                        name: 'dashboard',
                        url: '/',
                        resolve: {
                            /*companyProfile: ['CompanyProfileResourceFactory', function (CompanyProfileResourceFactory) {
                                return CompanyProfileResourceFactory.getCompanyProfile().$promise;
                            }]*/
                        },
                        templateUrl:'app/modules/dashboard/tpl/index.html',
                        controller: 'DashboardController'
                    });
            }
        ])

})();
/**
 * Created by fonpah on 20.03.2015.
 */
(function () {
    "use strict";
    angular.module('ems.dashboard')
        .controller('DashboardController', dashboardController);

    dashboardController.$inject = ['$scope'];

    function dashboardController($scope) {
    }
})();
(function(){
  'use strict';


  /**
   * @ngdoc service
   * @name ems.appProperties
   * @description Specific module to store all necessary app properties
   *
   *
   */

  angular
    .module('ems.appProperties', [])

  /**
   * @ngdoc service
   * @name ems.appProperties.RESOURCE_BASE_URL
   * @description A module constant which holds base url to communicate with rest api.
   * **/

    .constant('RESOURCE_BASE_URL', '/api/:verb/:id/:specificVerb')

  /**
   * @ngdoc service
   * @name ems.appProperties.DUMMY_RESOURCE_BASE_URL
   * @description A module constant which holds base url to the data mockups.
   **/

    .constant('DUMMY_RESOURCE_BASE_URL', '/dummy/:verb/:id/:specificVerb')

})();
(function () {
    'use strict';


    angular
        .module('ems', [
            'ui.router',
            'ngStorage',
            'restangular',
            'angular-loading-bar',
            'ems.appProperties',
            'ems.dashboard',
            'ems.employee'
        ])

        .config(['$logProvider', '$urlRouterProvider','RestangularProvider', function ($logProvider, $urlRouterProvider,RestangularProvider) {
            $logProvider.debugEnabled(true);
            RestangularProvider.setBaseUrl('/api/v1');
            RestangularProvider.setDefaultRequestParams({ apiKey: '4f847ad3e4b08a2eed5f3b54' });
            /* if no routes match... fallback to root (dashboard) */
            $urlRouterProvider.otherwise('/');
        }]);

})();
(function(){
  'use strict';

  angular
    .module('ems')

  /**
   * @ngdoc function
   * @name ems.AppCtrl
   * @requires $scope
   * @requires $rootScope
   * @requires $localStorage
   * @description Application main controller who saves session informations in local
   *              storage and navigate between page sections.
   **/

    .controller('AppCtrl', AppCtrl)

  AppCtrl.$inject = ['$scope', '$rootScope', '$localStorage'];

  /**
   * @ngDoc function
   * @private
   * @constructor
   * @name reportsShowModalCtrl
   * @param {$scope} references to controllers scope
   * @param {$rootScope} references to the application root scope
   * @param {$localStorage} references to the $localStorage service to interact with localStorage api of the browser
   * @description Function to initialize the application main controller.
   */

  function AppCtrl($scope, $rootScope, $localStorage){
    $scope.appData = $localStorage.$default({
      toggle:          false,
      isAuthenticated: true,
      state:           'dashboard',
      userName:        'Anonymous'
    });

    $scope.toggleSidebar = toggleSidebar;
    $scope.logout = logout;

    $rootScope.$on('$stateChangeSuccess', onStateChangedSuccessful);

    function toggleSidebar(){
      $scope.appData.toggle = !$scope.appData.toggle;
    }

    function logout(){
      alert("logout");
    }

    function onStateChangedSuccessful(event, toState, toParams, fromState, fromParams){
      //$scope.appData.state = toState.name;
      //$scope.title = toState.data.title;
    }
  }
})();