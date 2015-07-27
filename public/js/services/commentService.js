
angular.module('commentService', [])
.factory('Comment', function($http) {

        return {
              // get all the comments
              get : function() {
                  return $http.get('/api/comments.json');
              },
              // save a comment (pass in comment data)
              save : function(commentData,id) {
                  $http({
                        url: 'php/updateJson.php', // undefined
                        data: {
                          id:id,
                          author:commentData.author,
                          text:commentData.text
                        },
                        method: "POST"
                      }).success(function(data) {
                        console.log("Success: data", data);
                      }).error(function(data) {
                        console.log("Error: data");
                  });
              },
              // destroy a comment
              destroy : function(id) {
                  return $http.delete('/api/comments.json' + id);
              }
        }
    });
