//create module
const app = angular.module('App', []);

//create controller
app.controller('CategoryController', function($scope, $http) {
    const apiGetCategories = `http://127.0.0.1:8000/api/categories/`

    $http(
        {
            method: 'GET',
            url: apiGetCategories
        }
    ).then((res) => {
        $scope.categories = res.data; 
    })

    $scope.showModal = (event, category) => {
        $scope.title = (event == 0) ? 'Create' : 'Edit';
        $scope.action = (event == 0) ? 0 : 1;
        $scope._id = (category) ? category.id : '';

        if(event == 0) {
            $scope.category = null;
        } else {
            const apiGetCategory = `http://127.0.0.1:8000/api/categories/${category.id}`

            $http(
                {
                    method: 'GET',
                    url: apiGetCategory
                }
            ).then((res) => {
                $scope.category = res.data; 
            })
        }

        $('#handleCategory').modal('show');
    }

    $scope.save = () => {
        if ($scope.action == 0) { 
            $http({
                method: 'POST',
                url: `http://127.0.0.1:8000/api/categories`,
                data: $scope.category,
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
                url: "http://127.0.0.1:8000/api/categories/" + $scope._id,
                data: $scope.category,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        }
    }

    $scope.delete = (category) => {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://127.0.0.1:8000/api/categories/" + category.id
            }).then(function(response) {
                $scope.message = response.data;
                location.reload();
            });
        }
    }
})