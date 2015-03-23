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