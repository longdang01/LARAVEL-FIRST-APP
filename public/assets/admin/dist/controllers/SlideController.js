//create module
const app = angular.module('App', []);

//create controller
app.controller('SlideController', function($scope, $http) {
    const apiGetSlides = `http://127.0.0.1:8000/api/slides/`

    $http(
        {
            method: 'GET',
            url: apiGetSlides
        }
    ).then((res) => {
        $scope.slides = res.data; 
    })

    $scope.showModal = (event, slide) => {
        $scope.title = (event == 0) ? 'Create' : 'Edit';
        $scope.action = (event == 0) ? 0 : 1;
        $scope._id = (slide) ? slide.id_slide : '';

        if(event == 0) {
            $scope.slide = null;
        } else {
            const apiGetSlide = `http://127.0.0.1:8000/api/slides/${slide.id_slide}`

            $http(
                {
                    method: 'GET',
                    url: apiGetSlide
                }
            ).then((res) => {
                $scope.slide = res.data; 
            })
        }

        $('#handleSlide').modal('show');
    }

    $scope.save = () => {
        if ($scope.action == 0) { 
            $http({
                method: 'POST',
                url: `http://127.0.0.1:8000/api/slides`,
                data: $scope.slide,
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
                url: "http://127.0.0.1:8000/api/slides/" + $scope._id,
                data: $scope.slide,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        }
    }

    $scope.delete = (slide) => {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://127.0.0.1:8000/api/slides/" + slide.id_slide
            }).then(function(response) {
                $scope.message = response.data;
                location.reload();
            });
        }
    }
})