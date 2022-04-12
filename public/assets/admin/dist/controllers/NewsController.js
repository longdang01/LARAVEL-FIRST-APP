//create module
const app = angular.module('App', []);

//create controller
app.controller('NewsController', function($scope, $http) {
    const apiGetNewss = `http://127.0.0.1:8000/api/newss/`

    $http(
        {
            method: 'GET',
            url: apiGetNewss
        }
    ).then((res) => {
        $scope.newss = res.data; 
    })

    $scope.showModal = (event, news) => {
        $scope.title = (event == 0) ? 'Create' : 'Edit';
        $scope.action = (event == 0) ? 0 : 1;
        $scope._id = (news) ? news.id_new : '';

        if(event == 0) {
            $scope.news = null;
        } else {
            const apiGetNews = `http://127.0.0.1:8000/api/newss/${news.id_new}`

            $http(
                {
                    method: 'GET',
                    url: apiGetNews
                }
            ).then((res) => {
                $scope.news = res.data; 
            })
        }

        $('#handleNews').modal('show');
    }

    $scope.save = () => {
        if ($scope.action == 0) { 
            console.log($scope.news);

            $http({
                method: 'POST',
                url: `http://127.0.0.1:8000/api/newss`,
                data: $scope.news,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();
            });
        } else { 
            // console.log($scope._id);
            console.log($scope.news);
            $http({
                method: "PUT",
                url: "http://127.0.0.1:8000/api/newss/" + $scope._id,
                data: $scope.news,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        }
    }

    $scope.delete = (news) => {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://127.0.0.1:8000/api/newss/" + news.id_new
            }).then(function(response) {
                $scope.message = response.data;
                location.reload();
            });
        }
    }
})