<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title> Logistics Center - Freshly Cosmetics </title>
		<link rel="stylesheet" href="assets/css/sidebar_style.css">
    	 <!-- Boxicons CDN Link -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="icon" href="assets/img/favicon.png" type="image/gif">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
   	</head>
<body>
	<div class="sidebar">
		<div class="logo-details">
      		<img src="assets/img/logo-freshly-white.png" style="width:50%;" class="icon"/>
        		<i class='bx bx-menu' id="btn" ></i>
    	</div>
    	<ul class="nav-list">
      		<li>
          		<i class='bx bx-search' ></i>
         		<input type="text" placeholder="Buscar...">
         		<span class="tooltip">Buscar</span>
      		</li>
      		<li>
        		<a href="#">
              		<i class='bx bx-grid-alt'></i>
              		<span class="links_name">Inicio</span>
       			</a>
         		<span class="tooltip">Inicio</span>
      		</li>
      		<li>
               <a href="http://localhost/logistics_center/">
               		<i class='bx bx-cart-alt' ></i>
                 	<span class="links_name">Pedidos</span>
               </a>
               <span class="tooltip">Pedidos</span>
     		</li>
      		<li>
               <a href="#">
                 	<i class='bx bx-user' ></i>
                 	<span class="links_name">Clientes</span>
               </a>
               <span class="tooltip">Clientes</span>
             </li>
             <li>
               <a href="#">
                 	<i class='bx bx-package' ></i>
                 	<span class="links_name">Productos</span>
               </a>
               <span class="tooltip">Productos</span>
             </li>
             <li>
               <a href="#">
                	<i class='bx bx-chat' ></i>
                	<span class="links_name">Chat</span>
               </a>
               <span class="tooltip">Chat</span>
             </li>
             <li>
               <a href="#">
                 	<i class='bx bx-file-blank'></i>
                 	<span class="links_name">Facturas</span>
               </a>
               <span class="tooltip">Facturas</span>
             </li>
             <li>
               <a href="#">
                     <i class='bx bx-cog' ></i>
                     <span class="links_name">Opciones</span>
               </a>
               <span class="tooltip">Opciones</span>
             </li>
             <li class="profile">
                 <div class="profile-details">
                  	<img src="assets/img/profile.jpg" alt="profileImg">
                   	<div class="name_job">
                     	<div class="name"><?php echo utf8_encode('Alícia Audí')?></div>
                     	<div class="job">Developer Specialist</div>
                   	</div>
                 </div>
                 <i class='bx bx-log-out' id="log_out" ></i>
     		</li>
    	</ul>
  	</div>
  
  <script src="assets/js/sidebar_script.js"></script>

</body>
</html>
