<?php
/**
 * Created by PhpStorm.
 * User: sttingles
 * Date: 25/10/17
 * Time: 15:21
 */
?>
<div class="nav-side-menu">
  <div class="brand">Imobiliária</div>
  <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  <div class="menu-list">
    <ul id="menu-content" class="menu-content collapse out">
      <li <?php if($page=='dashboard'): ?>class="active"<?php endif;?> >
        <a href="/admin/">
          <i class="fa fa-dashboard fa-lg"></i> Dashboard
        </a>
      </li>
      <li <?php if($page=='properties'): ?>class="active"<?php endif;?> >
        <a href="/admin/properties">
          <i class="fa fa-home fa-lg"></i> Imóveis
        </a>
      </li>
      <li <?php if($page=='clients'): ?>class="active"<?php endif;?> >
        <a href="/admin/clients">
          <i class="fa fa-user fa-lg"></i> Clientes
        </a>
      </li>
      <li <?php if($page=='interested'): ?>class="active"<?php endif;?> >
        <a href="/admin/interested">
          <i class="fa fa-money fa-lg"></i> interessados
        </a>
      </li>
    </ul>
  </div>
</div>
