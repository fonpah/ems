(function () {
    'use strict';


    angular
        .module('ems', [
            'ui.router',
            'ngStorage',
            'ems.appProperties',
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
   * @name pqTimes.appProperties.RESOURCE_BASE_URL
   * @description A module constant which holds base url to communicate with rest api.
   * **/

    .constant('RESOURCE_BASE_URL', '/ems.api.dev/:verb/:id/:specificVerb')

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

    $rootScope.$on('$stateChangeSuccess', onStateChangedSuccesful);

    function toggleSidebar(){
      $scope.appData.toggle = !$scope.appData.toggle;
    }

    function logout(){
      alert("logout");
    }

    function onStateChangedSuccesful(event, toState, toParams, fromState, fromParams){
      $scope.appData.state = toState.name;
      $scope.title = toState.data.title;
    }
  }
})();