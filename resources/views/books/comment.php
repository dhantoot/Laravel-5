<script src="lib/angular.js"></script>
<script src="js/controllers/mainCtrl.js"></script> <!-- load our controller -->
<script src="js/services/commentService.js"></script> <!-- load our service -->
<script src="js/app.js"></script> <!-- load our application -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<body class="container" ng-app="commentApp" ng-controller="mainController"> <div class="col-md-8 col-md-offset-2">

    <!-- PAGE TITLE =============================================== -->
    <div class="page-header">
        <h2>Laravel and Angular Single Page Application</h2>
        <h4>Commenting System</h4>
    </div>
    <!-- NEW COMMENT FORM =============================================== -->
    <form ng-submit="submitComment()"> <!-- ng-submit will disable the default form action and use our function -->

        <!-- AUTHOR -->
        <div class="form-group">
            <input type="text" class="form-control input-sm" name="author" ng-model="commentData.author" placeholder="Name">
        </div>
          <div class="input-group">
            <input type="text" class="form-control" name="comment" ng-model="commentData.text" placeholder="Say what you have to say">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-default">post comment</button>
            </span>
          </div><!-- /input-group -->
    </form>

    <!-- LOADING ICON =============================================== -->
    <!-- show loading icon if the loading variable is set to true -->
    <p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>
    <hr>
    <!-- THE COMMENTS =============================================== -->
    <!-- hide these comments if the loading variable is true -->
    <div class="comment" ng-hide="loading" ng-repeat="comment in comments" style="text-indent: 10px; color:rgb(153, 153, 156);margin-bottom: 6px; border: 1px solid rgb(194, 233, 252);border-radius: 10px 10px 10px 10px; background: rgb(250, 252, 253);">
        <h4>{{ comment.author }} : {{ comment.text }} </h4>
        <a href="#" class="btn" ng-click="editComment(comment.id)" class="text-muted">Edit</a>
        <a href="#" class="btn" ng-click="deleteComment(comment.id)" class="text-muted">Delete</a>
   </div>

</div>
</body>
