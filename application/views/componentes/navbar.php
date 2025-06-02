<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<nav class="navbar pb-4 fs-5 navbar-expand-lg bg-dark bg-gradient border-top border-secondary">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="<?php echo base_url('home'); ?>">TicketZone</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="<?php echo base_url('home'); ?>">Inicio</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Entradas</a>
          <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="<?php echo base_url('productos/entradas'); ?>">Todas las entradas</a></li>
          <?php if($this->session->userdata('role') == 'admin'): ?>
            <li><a class="dropdown-item" href="<?php echo base_url('productos'); ?>">Lista de Entradas</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('productos/create'); ?>">Agregar Entrada</a></li>
            <?php endif; ?>
          </ul>
        </li>
        <?php if($this->session->userdata('role') == 'admin'): ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Listas</a>
          <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="<?php echo base_url('Admin/lista_clientes'); ?>">Lista de clientes</a></li>
          <?php if($this->session->userdata('role') == 'admin'): ?>
            <li><a class="dropdown-item" href="<?php echo base_url('Admin/lista_ventas'); ?>">Lista de ventas</a></li>
            <?php endif; ?>
          </ul>
        </li>
        <?php endif; ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Usuario</a>
          <ul class="dropdown-menu">
            <?php if($this->session->userdata('logged_in')): ?>
            <li><a class="dropdown-item" href="<?php echo base_url('auth/logout'); ?>">Logout</a></li>
            <?php else: ?>
            <li><a class="dropdown-item" href="<?php echo base_url('auth/login_form'); ?>">Login</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('auth/register_form'); ?>">Registro</a></li>
            <?php endif; ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>