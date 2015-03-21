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