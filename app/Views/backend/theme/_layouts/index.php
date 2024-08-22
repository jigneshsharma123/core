

<div class="right_col" role="main" style="min-height: 387px;">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><?php echo $page_title; ?></h3>
      </div>

      <div class="title_right" style="display:none;">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input class="form-control" placeholder="Search for..." type="text">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
          <?php return view($inner_view); ?>
    </div>

  </div>
</div>


