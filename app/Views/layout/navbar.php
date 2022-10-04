<body>
  <?php 
    $estadoLog = false;
    if (isset($session)) 
    {
      if($session->has('isLoggedIn'))
      {
        if($session->isLoggedIn)
        {
          $estadoLog = true;
        }
      }
    }
  ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo "jaja salu2"; ?>">Estadisticas</a>
          </li>
          <?php
          if ($estadoLog) 
          { ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Gestion Usuario
            </a>

            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="https://google.cl">Crear Usuario</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('Usuario/crearUsuarioAjax'); ?>">Crear Usuario Ajax</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>

          </li>
          <?php 
          }
          ?>
        </ul>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <?php 
              if ($estadoLog) 
              {
                    ?>
                    <span class="navbar-text">Bienvenid@ <?php echo $session->nombres; ?>     </span>
                    <a class="btn btn-success" type="submit" href="<?php echo base_url('Usuario/logout'); ?>">Logout</a>
                    <?php 
              }
              else
              {
                ?>
                <a class="btn btn-success" type="submit" href="<?php echo base_url('Usuario/login'); ?>">Login</a>
                <?php 
              }
            ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br>