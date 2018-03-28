<?php require ("../Modelo/conn.php");
          
  $consulta = "SELECT * FROM menu_left order by _order asc";
  $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");   
  
  ?>
<div data-active-color="black" data-background-color="white" data-image="app-assets/img/sidebar-bg/01.jpg" class="app-sidebar">
        <!-- main menu header-->
        <!-- Sidebar Header starts-->
        <div class="sidebar-header">
          <div class="logo clearfix"><a href="index.html" class="logo-text float-left">
              <div class="logo-img"><img src="app-assets/img/logo-dark.png"/></div><span class="text align-middle">nina</span></a>
              <a title="Check" id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block">
                <i data-toggle="expanded" class="ft-toggle-left toggle-icon"></i></a>
                <a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none">
                  <i class="ft-x"></i>
                </a>
            </div>
        </div>
        <!-- Sidebar Header Ends-->
        <!-- / main menu header-->
        <!-- main menu content-->
        <div class="sidebar-content">
          <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
              <?php                            
              while ($columna = mysqli_fetch_array( $resultado)){ 
                if ($columna['icon_down'] != 1) { ?>
                   <li class=" nav-item"><a href="<?php echo $columna['link'] ?>"><i class="<?php echo $columna['icon_view'] ?>"></i  ><span data-i18n="" class="menu-title"><?php echo $columna['name'] ?></span></a>
                   </li>  
                  <?php }else{?>
<li class="has-sub nav-item"><a href="#"><i class="<?php echo $columna['icon_view'] ?>"></i><span data-i18n="" class="menu-title"><?php echo $columna['name'] ?></span></a>
                 <ul class="menu-content">
                  <?php 
$result = mysqli_query( $conexion, "SELECT * FROM unfolds_table" ) or die ( "Algo ha ido mal en la consulta a la base de datos");
                       while ($col = mysqli_fetch_array( $result )){    
                    if ($columna['id_menu'] == $col['unfolds']) {?>
                    <li>
                      <a href="<?php echo $col['link_u']; ?>" class="menu-item"><?php echo $col['subname']; ?> </a>
                    </li>
                  <?php }} ?>
                </ul>
              </li>
                <?php }} ?>
            </ul>
          </div>
        </div>
        <!-- main menu content-->
        <div class="sidebar-background"></div>
        <!-- main menu footer-->
        <!-- include includes/menu-footer-->
        <!-- main menu footer-->
      </div>