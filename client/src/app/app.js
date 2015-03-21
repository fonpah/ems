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