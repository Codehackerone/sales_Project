<?php include_once('bootstrap.php');?>
<head><script src="https://kit.fontawesome.com/a81368914c.js"></script>
<nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-4 navbar-center">
      <li class="nav-item ">
        <center><a class="nav-link navhead '<?php if($home==0){ ?>' active1 '<?php }?>'" href="/sales1/homepage4.php"><i class="fas fa-home"></i><br>&nbsp;Home</center>
          <?php if($home==0){?><span class="sr-only">(current)</span><?php } ?></a>
      </li>
      <li class="nav-item dropdown">
          <center><a class="nav-link  navhead dropdown-toggle '<?php if($home==1){ ?>' active1 '<?php }?>'" href="#" id="navbarDropdownMenuLink1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-users"></i><br>&nbsp;Customers

        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
          <a class="dropdown-item" href="/sales1/customer/add.php">Add&nbsp;<i class="fas fa-user-plus icon2"></i></a>
          <a class="dropdown-item" href="/sales1/customer/update1.php">Edit&nbsp;<i class="fas fa-user-edit icon2"></i></a>
          <a class="dropdown-item" href="/sales1/customer/search.php">Search&nbsp;<i class="fas fa-search icon2"></i></a>
          <a class="dropdown-item" href="/sales1/customer/listall.php">View All&nbsp;<i class="fas fa-list-alt icon2"></i></a>
        </div>  </center>
      </li>
      <li class="nav-item dropdown"><center>
        <a class="nav-link  navhead dropdown-toggle '<?php if($home==2){ ?>' active1 '<?php }?>'" href="#" id="navbarDropdownMenuLink2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fab fa-stack-overflow"></i><br>&nbsp; Items
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
          <a class="dropdown-item" href="/sales1/item/add.php">&nbsp;<i class="fas fa-plus icon2"></i>Add</a>
          <a class="dropdown-item" href="/sales1/item/update1.php">Update&nbsp;<i class="fas fa-user-edit icon2"></i></a></a>
          <a class="dropdown-item" href="/sales1/item/search.php">Search&nbsp;<i class="fas fa-search icon2"></i></a></a>
          <a class="dropdown-item" href="/sales1/item/listall.php">View All&nbsp;<i class="fas fa-list-alt icon2"></i></a>
        </div></center>
      </li>
      <li class="nav-item dropdown"><center>
        <a class="nav-link navhead dropdown-toggle '<?php if($home==3){ ?>' active1 '<?php }?>'" href="#" id="navbarDropdownMenuLink3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-people-carry"></i><br>&nbsp;Suppliers
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink3">
          <a class="dropdown-item" href="/sales1/supplier/add.php">&nbsp;<i class="fas fa-user-plus icon2"></i>Add</a>
          <a class="dropdown-item" href="/sales1/supplier/update1.php">Update&nbsp;<i class="fas fa-user-edit icon2"></i></a></a>
          <a class="dropdown-item" href="/sales1/supplier/search.php">Search&nbsp;<i class="fas fa-search icon2"></i></a></a>
          <a class="dropdown-item" href="/sales1/supplier/listall.php">Viewall&nbsp;<i class="fas fa-list-alt icon2"></i></a>
        </div></center>
      </li>
      <li class="nav-item"><center>
       <a class="nav-link navhead '<?php if($home==6){ ?>' active1 '<?php }?>'" href="/sales1/stock.php"><i class="fas fa-cubes"></i><br>&nbsp;Stock</a></center>
     </li>
      <li class="nav-item dropdown"><center>
        <a class="nav-link  navhead dropdown-toggle '<?php if($home==5){ ?>' active1 '<?php }?>'" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-cart-plus"></i><br>&nbsp;Purchase
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/sales1/purchase/add.php">New <br>Purchase&nbsp;<i class="fas fa-plus icon2"></i></a>
          <a class="dropdown-item" href="/sales1/purchase/search.php">Search&nbsp;<i class="fas fa-search icon2"></i></a></a>
          <a class="dropdown-item" href="/sales1/purchase/listall.php">View all&nbsp;<i class="fas fa-list-alt icon2"></i></a>
        </div></center>
      </li>
      <li class="nav-item dropdown "><center>
        <a class="nav-link  navhead dropdown-toggle '<?php if($home==4){ ?>' active1 '<?php }?>'" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-rupee-sign"></i><br>&nbsp;Transaction
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/sales1/transaction/add.php">New Transaction&nbsp;<i class="fas fa-plus icon2"></i></a>
          <a class="dropdown-item" href="/sales1/transaction/search.php">Search&nbsp;<i class="fas fa-search icon2"></i></a></a>
          <a class="dropdown-item" href="/sales1/transaction/listall.php">View all&nbsp;<i class="fas fa-list-alt icon2"></i></a>
        </div></center>
      </li>
      <li class="nav-item"><center>
       <a class="nav-link navhead" href="/sales1/logout.php"><i class="fas fa-sign-out-alt"></i><br>&nbsp;Logout</a></center>
     </li>
    </ul>
  </div>
</nav>
<style>
.icon2{
  float:right !important;
}
.navbar{
  z-index:10000!important;
}
.nav-item:hover{
  box-shadow: cyan 0px 2px,0px 2px;
}
.navbar{
  background-color: #000 !important;
  color:#fff !important;
}
.navhead{
  color: #fff !important;
}
.navhead:hover{
  color:cyan !important;
}
.active1{
  color:cyan !important;
}
.navbar-nav.navbar-center {
    position:relative;
    left: 50%;
    transform: translatex(-50%);
}
.dropdown-item:hover{
  color:cyan;
}
*{
  font-family: 'Poppins';
}
</style>
