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