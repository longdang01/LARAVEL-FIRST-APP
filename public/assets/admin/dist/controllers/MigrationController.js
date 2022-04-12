//create module
const app = angular.module('App', []);

//create controller
app.controller('MigrationController', function($scope, $http) {
    const apiGetMigrations = `http://127.0.0.1:8000/api/migrations/`

    $http(
        {
            method: 'GET',
            url: apiGetMigrations
        }
    ).then((res) => {
        $scope.migrations = res.data; 
    })

    $scope.showModal = (event, migration) => {
        $scope.title = (event == 0) ? 'Create' : 'Edit';
        $scope.action = (event == 0) ? 0 : 1;
        $scope._id = (migration) ? migration.id : '';

        if(event == 0) {
            $scope.migration = null;
        } else {
            const apiGetMigration = `http://127.0.0.1:8000/api/migrations/${migration.id}`

            $http(
                {
                    method: 'GET',
                    url: apiGetMigration
                }
            ).then((res) => {
                $scope.migration = res.data; 
            })
        }

        $('#handleMigration').modal('show');
    }

    $scope.save = () => {
        if ($scope.action == 0) { 
            $http({
                method: 'POST',
                url: `http://127.0.0.1:8000/api/migrations`,
                data: $scope.migration,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();
            });
        } else { 
            console.log($scope._id);
            $http({
                method: "PUT",
                url: "http://127.0.0.1:8000/api/migrations/" + $scope._id,
                data: $scope.migration,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        }
    }

    $scope.delete = (migration) => {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://127.0.0.1:8000/api/migrations/" + migration.id
            }).then(function(response) {
                $scope.message = response.data;
                location.reload();
            });
        }
    }
})