//create module
const app = angular.module('App', ['angularUtils.directives.dirPagination']);

//create controller
app.controller('ProductController', function($scope, $http) {
    
    const apiGetProducts = `http://127.0.0.1:8000/api/products/`
    $scope.keySearch = "";
    $scope.currentPage = 1;
    $scope.pageSize = 10;

    $http(
        {
            method: 'GET',
            url: apiGetProducts
        }
    ).then((res) => {
        $scope.products = res.data[0]; 
        $scope.categories = res.data[1]; 
        $scope.suppliers = res.data[2]; 
    })

    $scope.showModal = (event, product) => {
        $scope.title = (event == 0) ? 'Create' : 'Edit';
        $scope.action = (event == 0) ? 0 : 1;
        $scope._id = (product) ? product.id : '';

        if(event == 0) {
            $scope.product = null;
        } else {
            const apiGetProduct = `http://127.0.0.1:8000/api/products/${product.id}`

            $http(
                {
                    method: 'GET',
                    url: apiGetProduct
                }
            ).then((res) => {
                $scope.product = res.data; 
            })
        }

        $('#handleProduct').modal('show');
    }

    $scope.save = () => {
        if ($scope.action == 0) { 
            console.log($scope.product);
            $http({
                method: 'POST',
                url: `http://127.0.0.1:8000/api/products`,
                data: $scope.product,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();
            });
        } else { 
            $http({
                method: "PUT",
                url: "http://127.0.0.1:8000/api/products/" + $scope._id,
                data: $scope.product,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        }
    }

    $scope.delete = (product) => {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://127.0.0.1:8000/api/products/" + product.id
            }).then(function(response) {
                $scope.message = response.data;
                location.reload();
            });
        }
    }
})