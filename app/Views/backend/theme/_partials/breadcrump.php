<ol class="breadcrumb">
    <li>
        <i class="fa fa-dashboard"></i>  <a href="<?=base_url()?>admin">Dashboard</a>
    </li>
    <? if (isset($breadcrumps)) { ?>
      <? foreach($breadcrumps as $breadcrump) { ?>
        <li class="active">
          <? if ($breadcrump['url'] == "#" or $breadcrump['url'] == 'javascript:void(0)') { ?>
          <a href="<?=$breadcrump['url']?>"><?=$breadcrump['title']?></a>
          <? } else { ?>
          <a href="<?=base_url()?>admin/<?=$breadcrump['url']?>"><?=$breadcrump['title']?></a>
          <? } ?>
        </li>
      <? } ?>
    <? } ?>
</ol>

