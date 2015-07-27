<?php echo $template; ?>
<div class="col-lg-12">
  <div class="col-lg-2">
  </div>
  <div class="col-lg-8 well">
    <div class="page-header" style="border: 1px solid #0077b3;" >
    <h1> <small>Delete Book [ <?php echo $data->title; ?> ] ?</small></h1>
    </div>
    <form action="/api/deleteBook/<?php echo $data->id?>" method="post" role="form">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="submit" class="btn btn-danger" value="Yes" />
            <a href="/" class="btn btn-default">No</a>
    </form>
  </div>
  <div class="col-lg-2">
  </div>
</div>
