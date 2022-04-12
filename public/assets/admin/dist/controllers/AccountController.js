//create module
const app = angular.module('App', []);

//create controller
app.controller('AccountController', function($scope, $http) {
    const apiGetAccounts = `http://127.0.0.1:8000/api/accounts/`

    $http(
        {
            method: 'GET',
            url: apiGetAccounts
        }
    ).then((res) => {
        $scope.accounts = res.data; 
    })

    $scope.showModal = (event, account) => {
        $scope.title = (event == 0) ? 'Create' : 'Edit';
        $scope.action = (event == 0) ? 0 : 1;
        $scope._id = (account) ? account.id : '';

        if(event == 0) {
            $scope.account = null;
        } else {
            const apiGetAccount = `http://127.0.0.1:8000/api/accounts/${account.id}`

            $http(
                {
                    method: 'GET',
                    url: apiGetAccount
                }
            ).then((res) => {
                $scope.account = res.data; 
            })
        }

        $('#handleAccount').modal('show');
    }

    $scope.save = () => {
        if ($scope.action == 0) { 
            $http({
                method: 'POST',
                url: `http://127.0.0.1:8000/api/accounts`,
                data: $scope.account,
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
                url: "http://127.0.0.1:8000/api/accounts/" + $scope._id,
                data: $scope.account,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        }
    }

    $scope.delete = (account) => {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://127.0.0.1:8000/api/accounts/" + account.id
            }).then(function(response) {
                $scope.message = response.data;
                location.reload();
            });
        }
    }
})