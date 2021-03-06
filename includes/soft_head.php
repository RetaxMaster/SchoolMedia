<!-------------------------------------------- HEADER -------------------------------------------->
<header class="headerPrincipal">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6"></div>
			<div class="col-lg-6">
				<div class="conteInfoHeader">
					<div class="contNotifica">
						<?php if (false) {
							echo '			<a href=""><div class="notifica">0</div></a>';
						} ?>
						<i class="fa fa-bullhorn"></i>
					</div>
					<div class="nomUser">
						<h4><?php echo $UserProfile[4] . " " . $UserProfile[5]; ?></h4>
					</div>
					<div class="contAvatar">
						<img src="<?php
									// echo IMG_USERS_DIR.'/';
									if (isset($UserProfile[3]) && trim($UserProfile[3]) != '') {
										echo $UserProfile[3];
									} else {
										switch ($UserProfile[15]) {
											case 'M':
												echo 'avatarm.jpg';
												break;
											case 'F':
												echo 'avatarf.jpg';
												break;
										}
									} ?>">
					</div>
					<div class="contIconos">
						<a href="<?php echo BASE_INSTALL_DIR . '/config_conf.php?wph=0&Lang=' . $Lang; ?>"><i class="fa fa-cogs"></i></a>
						<a href="<?php echo BASE_INSTALL_DIR . "/?exitSess=$iUID"; ?>"><i class="fa fa-plug"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

<div class="modal-loading" id="modal">
	<div class="modal-main">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-1 close-modal"></div>
			<div class="col-lg-6 col-md-6 col-sm-10 col-xs-12 close-modal">
				<div class="modal-card" id="loading">
					<div class="preloader"></div>
					<span class="tag">Cargando...</span>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-1 close-modal"></div>
		</div>
	</div>
</div>