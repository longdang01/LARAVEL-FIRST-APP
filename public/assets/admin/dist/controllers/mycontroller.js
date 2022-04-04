//create module
const app = angular.module('App', []);

//create controller
app.controller('MyController', function($scope) {
    $scope.title = 'List student';
    $scope.students = JSON.parse('[{"_id": 1, "name": "Long"},{"_id": 2, "name":"Kien"}]');
})