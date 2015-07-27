'use strict';

angular.module('mainCtrl', [])
    .controller('mainController', function($scope, $http, Comment) {
        $scope.commentData = {};
        $scope.loading = true;

        function showcomments(){
          Comment.get().success(function(data) {
              $scope.comments = data;
              $scope.loading = false;
              $scope.le = data.length;
          });
          $scope.commentData = {};
        }
        showcomments();

        //========================================================== save to json file ========================================+>
        $scope.submitComment = function(UserService) {
          $scope.loading = true;
          Comment.save($scope.commentData,$scope.le);
          showcomments();
        };

        //========================================================== delete values from json file ===============================+>
        $scope.deleteComment = function(id) {
        $scope.loading = true;

        // use the function we created in our service
        Comment.destroy(id)
            .success(function(data) {

                Comment.get()
                    .success(function(getData) {
                        $scope.comments = getData;
                        $scope.loading = false;
                    });

            });
       };
    });
