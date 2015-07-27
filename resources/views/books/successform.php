<?php echo $template; ?>
<div class="row col-lg-12">
  <div class="col-lg-2">
  </div>
  <div class="col-lg-8 well">
    <form action="/" method="post" role="form" >
      <h4>Result</h4>
      <p> <?php echo $data; ?> </p>
      <input type="submit" value="Return home" class="btn btn-primary" />
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    </form>
  </div>
  <div class="col-lg-2">
  </div>
</div>
