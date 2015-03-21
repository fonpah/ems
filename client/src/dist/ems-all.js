/**
 * Created by fonpah on 20.03.2015.
 */
(function () {
    "use strict";

    angular.module('ems.common.resources', [
        'ngResource',
        'ems.appProperties'
    ]);
})();
/**
 * Created by fonpah on 20.03.2015.
 */
(function(){
    "use strict";
    angular.module('ems.common.resources')
        .factory('CompanyProfileResourceFactory', CompanyProfileResourceFactory);

    CompanyProfileResourceFactory.$inject = ['$resource', 'RESOURCE_BASE_URL'];
    function CompanyProfileResourceFactory ($resource, RESOURCE_BASE_URL){
        return $resource(RESOURCE_BASE_URL,{},{
            getCompanyProfile: {method:"GET",params:{verb:"company-profile.json"}, isArray:false}
        });
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
                            companyProfile: ['CompanyProfileResourceFactory', function (CompanyProfileResourceFactory) {
                                return CompanyProfileResourceFactory.getCompanyProfile().$promise;
                            }]
                        },
                        controller: 'DashboardController'
                    });
            }
        ])

})();
/**
 * Created by fonpah on 20.03.2015.
 */
(function(){
    "use strict";
    angular.module('ems.dashboard')
        .controller('DashboardController', dashboardController);
    dashboardController.$inject = ['$scope', 'companyProfile'];
    function dashboardController($scope, companyProfile){
        console.log(companyProfile);
    }
})();
(function () {
    'use strict';


    angular
        .module('ems', [
            'ui.router',
            'ngStorage',
            'ems.appProperties',
            'ems.common.resources',
            'ems.dashboard'
        ])

        .config(['$logProvider', '$urlRouterProvider', function ($logProvider, $urlRouterProvider) {
            $logProvider.debugEnabled(true);
            /* if no routes match... fallback to root (dashboard) */
            $urlRouterProvider.otherwise('/');
        }]);

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