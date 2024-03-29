<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>AngularJs</title>

        <link href="/assets/admin/dist/libs/fontawesome/css/all.min.css">
        <link href="/assets/admin/dist/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="/assets/admin/dist/css/styles.css" rel="stylesheet" />
    </head>
    <body ng-app="App" ng-controller="MyController" class="sb-nav-fixed">
        <div>
            <div class="container">
                <h1>@{{ title }}</h1>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Ser</th>
                            <th>ID</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="student in students">
                            <td>@{{ $index + 1 }}</td>
                            <td>@{{ student._id }}</td>
                            <td>@{{ student.name }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <script src="/assets/admin/dist/libs/bootstrap/js/popper.min.js"></script>
        <script src="/assets/admin/dist/libs/bootstrap/js/bootstrap.min.js"></script>
        <script src="/assets/admin/dist/libs/angularjs/angularjs.min.js"></script>
        <script src="/assets/admin/dist/js/app.js"></script>
    
        <script src="/assets/admin/dist/controllers/MyController.js"></script>
    </body>
</html>
