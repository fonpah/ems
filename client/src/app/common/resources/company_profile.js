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