<?php echo $template; ?>

  <div class="col-lg-12">
   <div class="col-lg-2">
   </div>
   <div class="col-lg-8">
     <h1>BookStore</h1>
     <a href="/showform" class="btn btn-success">Create Book</a>
     <hr>
     <table class="table table-striped table-bordered table-hover">
         <thead>
         <tr class="bg-info">
             <th>Id</th>
             <th>ISBN</th>
             <th>Title</th>
             <th>Author</th>
             <th>Publisher</th>
             <th>Thumbs</th>
             <th colspan="3">Actions</th>
         </tr>
         </thead>
         <tbody>


          <?php foreach ($results as $res) {
              ?>
                  <tr>
                    <td><?php echo $res->id; ?></td>
                    <td><?php echo $res->isbn; ?></td>
                    <td><?php echo $res->title; ?></td>
                    <td><?php echo $res->author; ?></td>
                    <td><?php echo $res->publisher; ?></td>
                    <td><?php echo $res->image; ?></td>
                    <td><a href="/showUpdateForm/<?php echo $res->id; ?>" class="btn btn-success">Update Book</a></td>
                    <td><a href="/showDeleteForm/<?php echo $res->id; ?>" class="btn btn-danger">Delete Book</a></td>
                  </tr>

              <?php
          }
          ?>

        </tbody>

     </table>

   </div>
   <div class="col-lg-2">
   </div>

 </div>
