//create module
const app = angular.module('App', []);

//create controller
app.controller('StaffController', function($scope, $http) {
    const apiGetStaffs = `http://127.0.0.1:8000/api/staffs/`

    $http(
        {
            method: 'GET',
            url: apiGetStaffs
        }
    ).then((res) => {
        $scope.staffs = res.data; 
    })

    $scope.showModal = (event, staff) => {
        $scope.title = (event == 0) ? 'Create' : 'Edit';
        $scope.action = (event == 0) ? 0 : 1;
        $scope._id = (staff) ? staff.id : '';

        if(event == 0) {
            $scope.staff = null;
        } else {
            const apiGetStaff = `http://127.0.0.1:8000/api/staffs/${staff.id}`

            $http(
                {
                    method: 'GET',
                    url: apiGetStaff
                }
            ).then((res) => {
                $scope.staff = res.data; 
            })
        }

        $('#handleStaff').modal('show');
    }

    $scope.save = () => {
        if ($scope.action == 0) { 
            $http({
                method: 'POST',
                url: `http://127.0.0.1:8000/api/staffs`,
                data: $scope.staff,
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
                url: "http://127.0.0.1:8000/api/staffs/" + $scope._id,
                data: $scope.staff,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        }
    }

    $scope.delete = (staff) => {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://127.0.0.1:8000/api/staffs/" + staff.id
            }).then(function(response) {
                $scope.message = response.data;
                location.reload();
            });
        }
    }
})