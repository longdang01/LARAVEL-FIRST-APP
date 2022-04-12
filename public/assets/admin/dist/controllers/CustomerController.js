//create module
const app = angular.module('App', []);

//create controller
app.controller('CustomerController', function($scope, $http) {
    const apiGetCustomers = `http://127.0.0.1:8000/api/customers/`

    $http(
        {
            method: 'GET',
            url: apiGetCustomers
        }
    ).then((res) => {
        $scope.customers = res.data; 
    })

    $scope.showModal = (event, customer) => {
        $scope.title = (event == 0) ? 'Create' : 'Edit';
        $scope.action = (event == 0) ? 0 : 1;
        $scope._id = (customer) ? customer.id : '';

        if(event == 0) {
            $scope.customer = null;
        } else {
            const apiGetCustomer = `http://127.0.0.1:8000/api/customers/${customer.id}`

            $http(
                {
                    method: 'GET',
                    url: apiGetCustomer
                }
            ).then((res) => {
                $scope.customer = res.data; 
            })
        }

        $('#handleCustomer').modal('show');
    }

    $scope.save = () => {
        if ($scope.action == 0) { 
            $http({
                method: 'POST',
                url: `http://127.0.0.1:8000/api/customers`,
                data: $scope.customer,
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
                url: "http://127.0.0.1:8000/api/customers/" + $scope._id,
                data: $scope.customer,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        }
    }

    $scope.delete = (customer) => {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://127.0.0.1:8000/api/customers/" + customer.id
            }).then(function(response) {
                $scope.message = response.data;
                location.reload();
            });
        }
    }
})