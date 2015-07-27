<?php echo $template; ?>
<div class="row col-lg-12">
  <div class="col-lg-2">
  </div>
  <div class="col-lg-8 well">
    <form action="/api/updateBook/<?php echo $data->id;?>" method="post" role="form" >
        <div class="form-group">
            <label for="first_name">ISBN</label>
            <input type="text" class="form-control" name="u-form-isbn" value="<?php echo $data->isbn;?>" />
        </div>
        <div class="form-group">
            <label for="last_name">Book Title</label><br/>
            <input type="text" class="form-control" name="u-form-title" value="<?php echo $data->title;?>" />
        </div>
        <div class="form-group">
            <label for="first_name">Author</label>
            <input type="text" class="form-control" name="u-form-author" value="<?php echo $data->author;?>" />
        </div>
        <div class="form-group">
            <label for="last_name">Publisher</label><br />
            <input type="text" class="form-control" name="u-form-publisher" value="<?php echo $data->publisher;?>" />
        </div>
        <div class="form-group">
            <label for="last_name">Image</label><br />
            <input type="text" class="form-control" name="u-form-image" value="<?php echo $data->image;?>" />
        </div>
       <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="submit" value="Update" class="btn btn-primary" />
        <a href="/" class="btn btn-link">Cancel</a>
    </form>
  </div>
  <div class="col-lg-2">
  </div>
</div>
