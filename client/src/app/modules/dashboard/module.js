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
                        templateUrl:'app/dashboard/tpl/index.html',
                        controller: 'DashboardController'
                    });
            }
        ])

})();