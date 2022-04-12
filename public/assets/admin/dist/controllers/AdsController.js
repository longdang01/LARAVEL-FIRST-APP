//create module
const app = angular.module('App', []);

//create controller
app.controller('AdsController', function($scope, $http) {
    const apiGetAdss = `http://127.0.0.1:8000/api/adss/`

    $http(
        {
            method: 'GET',
            url: apiGetAdss
        }
    ).then((res) => {
        $scope.adss = res.data; 
    })

    $scope.showModal = (event, ads) => {
        $scope.title = (event == 0) ? 'Create' : 'Edit';
        $scope.action = (event == 0) ? 0 : 1;
        $scope._id = (ads) ? ads.id : '';

        if(event == 0) {
            $scope.ads = null;
        } else {
            const apiGetAds = `http://127.0.0.1:8000/api/adss/${ads.id}`

            $http(
                {
                    method: 'GET',
                    url: apiGetAds
                }
            ).then((res) => {
                $scope.ads = res.data; 
            })
        }

        $('#handleAds').modal('show');
    }

    $scope.save = () => {
        if ($scope.action == 0) { 
            $http({
                method: 'POST',
                url: `http://127.0.0.1:8000/api/adss`,
                data: $scope.ads,
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
                url: "http://127.0.0.1:8000/api/adss/" + $scope._id,
                data: $scope.ads,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        }
    }

    $scope.delete = (ads) => {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://127.0.0.1:8000/api/adss/" + ads.id
            }).then(function(response) {
                $scope.message = response.data;
                location.reload();
            });
        }
    }
})