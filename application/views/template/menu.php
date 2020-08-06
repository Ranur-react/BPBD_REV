  <ul class="sidebar-menu" data-widget="tree">
         <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Cari...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
          </span>
        </div>
      </form>
		<li class="header">MENU</li>
        <li>
		<?php $h=$this->session->userdata('userhakakses');?>
		  	<?php if ($h=='Admin'){?>
            <a href="<?php echo base_url().'index.php/template'?>"><i class="menu-icon fa fa-tachometer"></i><span class="menu-text"> BERANDA </span></a><b class="arrow"></b></li>
          </a>
          </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-th"></i> <span>MASTER</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>            </span>          </a>
          <ul class="treeview-menu">
		  	<li class="active"><a href="<?php echo site_url('trc/index')?>"><i class="fa fa-circle-o text-blue"></i> <span>Data TRC</span></a></li>
            <li class="active"><a href="<?php echo site_url('regutrc/index')?>"><i class="fa fa-circle-o text-green"></i> <span>Data Regu TRC</span></a></li>
            <li class="active"><a href="<?php echo site_url('kecamatan/index')?>"><i class="fa fa-circle-o text-orange"></i> <span>Data Kecamatan</span></a></li>
			      <li class="active"><a href="<?php echo site_url('nagari/index')?>"><i class="fa fa-circle-o text-navy"></i> <span>Data Nagari</span></a></li>
			      <li class="active"><a href="<?php echo site_url('korong/index')?>"><i class="fa fa-circle-o text-red"></i> <span>Data Korong</span></a></li>
			      <li class="active"><a href="<?php echo site_url('jenisbencana/index')?>"><i class="fa fa-circle-o text-white"></i> <span>Jenis Bencana</span></a></li>
			      <li class="active"><a href="<?php echo site_url('korban/index')?>"><i class="fa fa-circle-o text-white"></i> <span>Korban</span></a></li>
			      <li class="active"><a href="<?php echo site_url('user/index')?>"><i class="fa fa-circle-o text-white"></i> <span>User</span></a></li>
          </ul>
        </li>
		<li class="active treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i> <span>TRANSAKSI</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>            </span>          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo site_url('daerahrawan/index')?>"><i class="fa fa-circle-o text-yellow"></i> <span>Daerah Rawan</span></a></li>
            <li class="active"><a href="<?php echo site_url('kasusbencana/index')?>"><i class="fa fa-circle-o text-purple"></i> <span>Kasus Bencana</span></a></li>
			<li class="active"><a href="<?php echo site_url('kejadianharian/index')?>"><i class="fa fa-circle-o text-purple"></i> <span>Kejadian Harian dan Penanggulangan</span></a></li>
						</a></li>
        </li>
		</ul>
		<li class="active treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>LAPORAN</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>            </span>          </a>
          <ul class="treeview-menu">
			<li class="active"><a href="<?php echo site_url('laporan/daerahrawan')?>"><i class="fa fa-circle-o text-blue"></i> <span>Laporan. Daerah Rawan</span></a></li>
			<li class="active"><a href="<?php echo site_url('laporan/kasusbencana')?>"><i class="fa fa-circle-o text-green"></i> <span>Lap. Kasus Bencana Berdasarkan Korban</span></a></li>
			<li class="active"><a href="<?php echo site_url('laporan/kasusbencanarusak')?>"><i class="fa fa-circle-o text-orange"></i> <span>Lap. Kasus Bencana Berdasarkan Kerusakan</span></a></li>
			<li class="active"><a href="<?php echo site_url('laporan/kejadianharian')?>"><i class="fa fa-circle-o text-navy"></i> <span>Laporan. Kejadian Harian</span></a></li>
			   	</a></li>
        </li>
		</ul>
		<li class="header">MENU</li>
        <li>
		<?php $h=$this->session->userdata('userhakakses');?>
		<?php } else if($h=='pimpinan'){?>
		 <a href="<?php echo base_url().'index.php/template'?>"><i class="menu-icon fa fa-tachometer"></i><span class="menu-text"> BERANDA </span></a><b class="arrow"></b></li>
          </a>
          </li>
          <li class="active treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>LAPORAN</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>            </span>          </a>
          <ul class="treeview-menu">
			<li class="active"><a href="<?php echo site_url('laporan/daerahrawan')?>"><i class="fa fa-circle-o text-blue"></i> <span>Laporan. Daerah Rawan</span></a></li>
			<li class="active"><a href="<?php echo site_url('laporan/kasusbencana')?>"><i class="fa fa-circle-o text-green"></i> <span>Lap. Kasus Bencana Berdasarkan Korban</span></a></li>
			<li class="active"><a href="<?php echo site_url('laporan/kasusbencanarusak')?>"><i class="fa fa-circle-o text-orange"></i> <span>Lap. Kasus Bencana Berdasarkan Kerusakan</span></a></li>
			<li class="active"><a href="<?php echo site_url('laporan/kejadianharian')?>"><i class="fa fa-circle-o text-navy"></i> <span>Laporan. Kejadian Harian</span></a></li>
			   	</a></li>
        </li>
		</ul>
    <?php $h=$this->session->userdata('userhakakses');?>
		<?php } else if($h=='pusdalops'){?>
		<li class="header">MENU</li>
        <li>
		 <a href="<?php echo base_url().'index.php/template'?>"><i class="menu-icon fa fa-tachometer"></i><span class="menu-text"> BERANDA </span></a><b class="arrow"></b></li>
          </a>
          </li>
          <ul class="treeview-menu">
		  	<li class="active"><a href="<?php echo site_url('trc/index')?>"><i class="fa fa-circle-o text-blue"></i> <span>Data TRC</span></a></li>
            <li class="active"><a href="<?php echo site_url('regutrc/index')?>"><i class="fa fa-circle-o text-green"></i> <span>Data Regu TRC</span></a></li>
            <li class="active"><a href="<?php echo site_url('kecamatan/index')?>"><i class="fa fa-circle-o text-orange"></i> <span>Data Kecamatan</span></a></li>
			      <li class="active"><a href="<?php echo site_url('nagari/index')?>"><i class="fa fa-circle-o text-navy"></i> <span>Data Nagari</span></a></li>
			      <li class="active"><a href="<?php echo site_url('korong/index')?>"><i class="fa fa-circle-o text-red"></i> <span>Data Korong</span></a></li>
			      <li class="active"><a href="<?php echo site_url('jenisbencana/index')?>"><i class="fa fa-circle-o text-white"></i> <span>Jenis Bencana</span></a></li>
			    </ul>
        </li>
        <li class="header">MENU</li>
        <li>
		<?php $h=$this->session->userdata('userhakakses');?>
		<?php } else if($h=='trc'){?>
		 <a href="<?php echo base_url().'index.php/template'?>"><i class="menu-icon fa fa-tachometer"></i><span class="menu-text"> BERANDA </span></a><b class="arrow"></b></li>
          </a>
          </li>
          <ul class="treeview-menu">
		  	<li class="active"><a href="<?php echo site_url('korban/index')?>"><i class="fa fa-circle-o text-white"></i> <span>Korban</span></a></li>
			  </ul>
        </li>
		<li class="active treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i> <span>TRANSAKSI</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>            </span>          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo site_url('kasusbencana/index')?>"><i class="fa fa-circle-o text-purple"></i> <span>Kasus Bencana</span></a></li>
			<li class="active"><a href="<?php echo site_url('kejadianharian/index')?>"><i class="fa fa-circle-o text-purple"></i> <span>Kejadian Harian dan Penanggulangan</span></a></li>
						</a></li>
        </li>
		</ul>
			<?php } ?>
			
			
			
     
		  
		  
		  
		  
		  
		  
		  
		  
           