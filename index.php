<!doctype html>
<html>
<head>
<meta charset="UTF-8"> 
<title>Angular Demo</title>  
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-messages/1.4.8/angular-messages.min.js"></script> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="/angularjs_insert_update_delete-2-with Province -2/styles.css">
  <link rel="stylesheet" href="/angularjs_insert_update_delete-2-with Province -2/Styles1.css">

</head>  
<body ng-app="sa_app"> 


<div class="container">
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#addInfo"> ADD INFORMATION </a></li>
    <li><a data-toggle="tab" href="#listPage"> LISTING PAGE </a></li>
</ul>
<div id="background" ng-controller="controller" ng-init="show_data()">
  <div class="tab-content" id="Rectangle1" >
    <div id="addInfo" class="tab-pane fade in active">
       
        <form name="formValidation" id="rForm">
            <div class="form-group">
                <label>NAME<span style="color: red">*</span></label>
                <input type="text" name="name" ng-model="name" class="form-control" ng-minlength="2" required>
                    <div ng-messages="formValidation.name.$error">
                         <div ng-message="required"><span style="color: red">Name must be required.</span></div>
                    </div>
                    <p ng-show="formValidation.name.$error.minlength"><span style="color: red">Name should have at least 2 characters.</span></p>
            </div>

            <div ng-init="load_province()" class="form-group">
                <label for="province">PROVINCE<span style="color: red">*</span></label><br/>
                <select name="province" ng-model="province">
                    <option value="">Select Province</option>
                    <option ng-repeat="province in provinces" value="{{province.id}}">{{province.pro_name}}</option>
                </select>
            </div>
            <div class="form-group row">
                <div class="col-xs-6">
                    <label>TELEPHONE<span style="color: red">*</span></label>
                    <input type="text" name="telephone" ng-model="telephone" class="form-control" pattern="\d{3}[\-]\d{3}[\-]\d{4}">
                    <span style="color:Red" ng-show="formValidation.telephone.$error.pattern">Telephone should like "123-456-7890."</span>
                </div>
                <div class="col-xs-6">
                    <label>POSTAL CODE<span style="color: red">*</span></label>
                    <input type="text" name="postal_code" ng-model="postal_code" class="form-control" pattern="[A-Za-z][0-9][A-Za-z] [0-9][A-Za-z][0-9]" ng-minlength="7"/>
                    <span style="color:Red" ng-show="formValidation.postal_code.$error.minlength">Postal code should be atlest 7 Character"</span>
                    <span style="color:Red" ng-show="formValidation.postal_code.$error.pattern">Postal code should be "A1B 3C4"</span>
                </div>
            </div>
            
            <div class="form-group">
                <label>Salary</label>
                <input type="text" name="salary" ng-model="salary" class="form-control" required ng-minlength="2" >
                <span style="color:Red" ng-show="formValidation.salary.$error.minlength">Salary should be like "40,000.00 / 4000/ 4000.00" format.</span>
            </div>
            <div>
                <input type="hidden" ng-model="id">
                <input type="submit" name="insert" class="btn btn-primary" ng-click="insert()" value="{{btnName}}">
            </div>
        </form>
    </div>

    <div id="listPage" class="tab-pane fade">
      <div class="col-md-14">
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Province</th>
                    <th>Telephone</th>
                    <th>Postal Code</th>
                    <th>Salary</th>
                </tr>
                <tr dir-paginate="x in names |itemsPerPage:10">
                    <td>{{x.name}}</td>
                    <td>{{x.pro_name}}</td>
                    <td>{{x.telephone}}</td>
                    <td>{{x.postal_code}}</td>
                    <td>{{x.salary}}</td>
                    
                </tr>
				<dir-pagination-controls
       max-size="5"
       direction-links="true"
       boundary-links="true" >
    </dir-pagination-controls>
            </table>
        </div>
    </div>
  </div>
</div>  
</div>
<script src="/angularjs_insert_update_delete/js/pagination.js"></script>

<script>  
var app = angular.module("sa_app", ['angularUtils.directives.dirPagination', 'ngMessages']);
app.controller("controller", function($scope, $http) {

    $scope.load_province = function(){
            $http.get("load_province.php")
            .success(function(data){
                $scope.provinces = data;
            });
        }

    $scope.btnName = "Insert";
    $scope.insert = function() {
        if ($scope.name == null) {
            alert("Enter Your Name");
        }else if($scope.province == null){
            alert("Select Province");
        }else if ($scope.telephone == null) {
            alert("Enter Your Telephone Number");
        } else if ($scope.postal_code == null) {
            alert("Enter Your Postal Code");
        }else if ($scope.salary == null){
            alert("Enter Salary");
        } else {
            $http.post(
                "insert.php", {
                    'name': $scope.name,
                    'province': $scope.province,
                    'telephone': $scope.telephone,
                    'postal_code': $scope.postal_code,
                    'salary': $scope.salary,
                    'btnName': $scope.btnName,
                    'id': $scope.id
                }
            ).success(function(data) {
                alert(data);
                $scope.name = null;
                $scope.province = "";
                $scope.telephone = null;
                $scope.postal_code = null;
                $scope.salary = null;
                $scope.btnName = "Insert";
                $scope.show_data();
            });
        }
    }
    $scope.show_data = function() {
        $http.get("display.php")
            .success(function(data) {
                $scope.names = data;
            });
    }
    // $scope.update_data = function(name, telephone, postal_code, salary ) {
    //     $scope.name = name;
    //     $scope.telephone = telephone;
    //     $scope.postal_code = postal_code;
    //     $scope.salary = salary;
    //     $scope.btnName = "Update";
    // }
    // $scope.delete_data = function(id) {
    //     if (confirm("Are you sure you want to delete?")) {
    //         $http.post("delete.php", {
    //                 'id': id
    //             })
    //             .success(function(data) {
    //                 alert(data);
    //                 $scope.show_data();
    //             });
    //     } else {
    //         return false;
    //     }
    // }
});
</script>  
</body>  
</html>  
 