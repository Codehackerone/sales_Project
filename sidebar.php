<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="adminhome.php">
      <i class="fas fa-table"></i>
    <div class="sidebar-brand-text mx-3">Sales</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item '<?php if($home==1){?>' active '<?php } ?>'">
    <a class="nav-link" href="adminhome.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Report</span></a>
  </li>


  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item '<?php if($home==2){?>' active '<?php } ?>'">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-users"></i>
      <span>Master Tables</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Choose:</h6>
        <?php $id2="customer"?>
        <form id="<?=$id2?>" action="tableshow.php" method="post"><input type="hidden" name="what" value="<?=$id2?>">
          <a class="collapse-item" onclick="myChoose('<?=$id2?>')">Customer</a></form>
          <?php $id2="item"?>
          <form id="<?=$id2?>" action="tableshow.php" method="post"><input type="hidden" name="what" value="<?=$id2?>">
            <a class="collapse-item" onclick="myChoose('<?=$id2?>')">Item</a></form>
            <?php $id2="supplier"?>
            <form id="<?=$id2?>" action="tableshow.php" method="post"><input type="hidden" name="what" value="<?=$id2?>">
              <a class="collapse-item" onclick="myChoose('<?=$id2?>')">Supplier</a></form>
      </div>
    </div>
  </li>
  <li class="nav-item '<?php if($home==3){?>' active '<?php } ?>'">
    <?php $id2="stock"?>
    <form id="<?=$id2?>" action="tableshow.php" method="post"><a class="nav-link"  onclick="myChoose('<?=$id2?>')">
      <input type="hidden" name="what" value="<?=$id2?>">
      <i class="fas fa-fw fa-cubes"></i>
      <span>Stock</span></a></form>
  </li>
  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item '<?php if($home==4){?>' active '<?php } ?>'">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-rupee-sign"></i>
      <span>Purchase/Transaction</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Purchase or Transact:</h6>
        <?php $id2="purchase"?>
        <form id="<?=$id2?>" action="tableshow.php" method="post"><input type="hidden" name="what" value="<?=$id2?>">
          <a class="collapse-item" onclick="myChoose('<?=$id2?>')">Purchase</a></form>
          <?php $id2="tran"?>
          <form id="<?=$id2?>" action="tableshow.php" method="post"><input type="hidden" name="what" value="<?=$id2?>">
            <a class="collapse-item" onclick="myChoose('<?=$id2?>')">Transaction</a></form>
      </div>
    </div>
  </li>
  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item '<?php if($home==5){?>' active '<?php } ?>'">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-mail-bulk"></i>
      <span>Messages</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Messages:</h6>
        <?php $mes="Send" ?><form action="message.php" method="post" id="<?=$mes?>">
          <input type="hidden" value="<?=$mes?>" name="message">
        <a class="collapse-item" onclick="myChoose('<?=$mes?>')">Send Message</a></form>
        <?php $mes="Received" ?><form action="message.php" method="post" id="<?=$mes?>">
          <input type="hidden" value="<?=$mes?>" name="message">
        <a class="collapse-item" onclick="myChoose('<?=$mes?>')">Received Message</a></form>
        <?php $mes="Sent" ?><form action="message.php" method="post" id="<?=$mes?>">
          <input type="hidden" value="<?=$mes?>" name="message">
        <a class="collapse-item" onclick="myChoose('<?=$mes?>')">Sent Message</a></form>
      </div>
    </div>
  </li>

  <!-- Nav Item - Charts -->
  <li class="nav-item '<?php if($home==6){?>' active '<?php } ?>'">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseemp" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-user"></i>
      <span>Employee</span>
    </a>
    <div id="collapseemp" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Manage:</h6>
        <a class="collapse-item" href="">Assign Task</a>
        <a class="collapse-item" href="">Manage Employees</a>
      </div>
    </div>
  </li>


  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>

<script>
function myChoose(link)
{
  document.getElementById(link).submit();
}
</script>
