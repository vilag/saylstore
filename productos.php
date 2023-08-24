<?php
require 'header.php';
?>

<script src="js/jquery/jquery-2.2.4.min.js"></script>


	
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140" style="margin-top: 100px;">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<label style="display: none;" id="idcategoria_get"><?php echo $_GET['idcategoria']; ?></label>
				<label style="display: none;" id="idmarca_get"><?php echo $_GET['idmarca']; ?></label>
				<label style="display: none;" id="idcolor_get"><?php echo $_GET['idcolor']; ?></label>
				<label style="display: none;" id="precio_get"><?php echo $_GET['precio']; ?></label>
				<label style="display: none;" id="orden_get"><?php echo $_GET['orden']; ?></label>
				<div class="flex-w flex-l-m filter-tope-group m-tb-10" id="box_categorias">
					<!-- <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter="*">
						Todos los productos
					</button> -->

					<!-- <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
						Women
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".men">
						Men
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".bag">
						Bag
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".shoes">
						Shoes
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".watches">
						Watches
					</button> -->
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
					</div>	
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Ordenar por
							</div>

							<ul>
								<!-- <li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Default
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Popularity
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Average rating
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Newness
									</a>
								</li> -->

								<li class="p-b-6">
									<a id="orden1" href="" class="filter-link stext-106 trans-04 filter-link-active" onclick="listar_orden1();">
										Más relevantes
									</a>
								</li>

								<li class="p-b-6">
									<a id="orden2" href="" class="filter-link stext-106 trans-04" onclick="listar_orden2();">
										Menor Precio
									</a>
								</li>

								<li class="p-b-6">
									<a id="orden3" href="" class="filter-link stext-106 trans-04" onclick="listar_orden3();">
										Mayor Precio
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Precio
							</div>

							<ul>
								<li class="p-b-6">
									<a id="precio1" href="" class="filter-link stext-106 trans-04 filter-link-active" onclick="listar_precio1();">
										Todos
									</a>
								</li>

								<li class="p-b-6">
									<a id="precio2" href="" class="filter-link stext-106 trans-04" onclick="listar_precio2();">
										$0.00 - $100.00
									</a>
								</li>

								<li class="p-b-6">
									<a id="precio3" href="" class="filter-link stext-106 trans-04" onclick="listar_precio3();">
										$100.00 - $500.00
									</a>
								</li>

								<li class="p-b-6">
									<a id="precio4" href="" class="filter-link stext-106 trans-04" onclick="listar_precio4();">
										$500.00 - $1000.00
									</a>
								</li>

								<li class="p-b-6">
									<a id="precio5" href="" class="filter-link stext-106 trans-04" onclick="listar_precio5();">
										$1000.00 - $2000.00
									</a>
								</li>

								<li class="p-b-6">
									<a id="precio6" href="" class="filter-link stext-106 trans-04" onclick="listar_precio6();">
										$2000.00+
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col3 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Color
							</div>

							<ul id="listar_colores">
								
							</ul>
						</div>

						<div class="filter-col4 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Marca
							</div>

							<div class="flex-w p-t-4 m-r--5" id="box_marcas">
								

							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row " id="box_prod_tot">
				
			</div>

			<!-- Load more -->
			<!-- <div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div> -->
		</div>
	</div>
		
<script type="text/javascript" src="scripts/productos.js?v=<?php echo(rand()); ?>"></script>
<script src="js/jquery/jquery-2.2.4.min.js"></script>

<?php
require 'footer.php';
?>
	