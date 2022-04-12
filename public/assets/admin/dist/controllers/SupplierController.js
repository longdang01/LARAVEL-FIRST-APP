//create module
const app = angular.module('App', []);

//create controller
app.controller('SupplierController', function($scope, $http) {
    const apiGetSuppliers = `http://127.0.0.1:8000/api/suppliers/`

    $http(
        {
            method: 'GET',
            url: apiGetSuppliers
        }
    ).then((res) => {
        $scope.suppliers = res.data; 
    })

    $scope.showModal = (event, supplier) => {
        $scope.title = (event == 0) ? 'Create' : 'Edit';
        $scope.action = (event == 0) ? 0 : 1;
        $scope._id = (supplier) ? supplier.id : '';

        if(event == 0) {
            $scope.supplier = null;
        } else {
            const apiGetSupplier = `http://127.0.0.1:8000/api/suppliers/${supplier.id}`

            $http(
                {
                    method: 'GET',
                    url: apiGetSupplier
                }
            ).then((res) => {
                $scope.supplier = res.data; 
            })
        }

        $('#handleSupplier').modal('show');
    }

    $scope.save = () => {
        if ($scope.action == 0) { 
            $http({
                method: 'POST',
                url: `http://127.0.0.1:8000/api/suppliers`,
                data: $scope.supplier,
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
                url: "http://127.0.0.1:8000/api/suppliers/" + $scope._id,
                data: $scope.supplier,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        }
    }

    $scope.delete = (supplier) => {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://127.0.0.1:8000/api/suppliers/" + supplier.id
            }).then(function(response) {
                $scope.message = response.data;
                location.reload();
            });
        }
    }
})