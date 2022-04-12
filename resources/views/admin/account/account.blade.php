<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Management Account</title>
        
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link href="/assets/admin/dist/libs/fontawesome/css/all.min.css">
        <link href="/assets/admin/dist/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="/assets/admin/dist/css/styles.css" rel="stylesheet" />
    </head>
    <body ng-app="App" ng-controller="AccountController" class="sb-nav-fixed">
        <div>
            <div class="container">
                <div class="d-flex align-items-center justify-content-between py-3">
                    <h3 style="font-size: 1.4rem; font-weight: 600">Account Management API</h3>
                    <button class="btn btn-success" ng-click="showModal(0, account)">Create</button>
                </div>
                <div>
                    <table style="font-size: .9rem;" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Image</th>
                                <th>Delet</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="account in accounts">
                                <td>@{{ $index+1 }}</td>
                                <td>@{{ account.full_name}}</td>
                                <td>@{{ account.users_name}}</td>
                                <td>@{{ account.email}}</td>
                                <td>@{{ account.password}}</td>
                                <td>@{{ account.phone}}</td>
                                <td>@{{ account.address}}</td>
                                <td><img ng-if="account.image" ng-src="/upload/sanpham/@{{account.image}}" style='width:100px'></td>
                                <td>@{{ account.Delet}}</td>
                                <td><a href="" ng-click="showModal(1, account)" class="btn btn-info">Edit</a></td>
                                <td><a href="" class="btn btn-danger" ng-click="delete(account)">Delete</a></td>
                            </tr>
                        </tbody>
                    </table>
                    

                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="handleAccount">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">@{{ title }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" ng-model="account.full_name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" ng-model="account.users_name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" ng-model="account.email" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="text" ng-model="account.password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" ng-model="account.phone" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" ng-model="account.address" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" ng-model="account.image" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Delet</label>
                                    <input type="text" ng-model="account.Delet" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" ng-click="save();">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <script src="/assets/admin/dist/libs/jquery/jquery-3.6.0.min.js"></script>
        <script src="/assets/admin/dist/libs/bootstrap/js/popper.min.js"></script>
        <script src="/assets/admin/dist/libs/bootstrap/js/bootstrap.min.js"></script>
        <script src="/assets/admin/dist/libs/angularjs/angularjs.min.js"></script>
        <script src="/assets/admin/dist/js/app.js"></script>
        <script src="/assets/admin/dist/controllers/AccountController.js"></script>
    </body>
</html>
