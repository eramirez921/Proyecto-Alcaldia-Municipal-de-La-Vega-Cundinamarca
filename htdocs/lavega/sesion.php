<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>La Vega - Cundinamarca</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
		<!-- limpiar la caja de texto para la búsqueda -->
		<script type="text/javascript">
			function clearText(field){
			
			    if (field.defaultValue == field.value) field.value = '';
			    else if (field.value == '') field.value = field.defaultValue;
			
			}
		</script>
		<!-- enlazar la hoja de estilos ddsmoothmenu.css -->
		<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
		<!-- enlazar a javascript jquery -->
		<script src="https://code.jquery.com/jquery-1.8.2.min.js"></script>
		<script src="https://code.jquery.com/ui/1.8.2/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.8.2/themes/smoothness/jquery-ui.css" />
		<script type="text/javascript" src="js/validacionespagina.js"></script>
		<style>
			.TipDeValidacion { border: 1px solid transparent; padding: 0.3em; }
		</style>
		<script type="text/javascript" src="js/ddsmoothmenu.js"></script>
		<script type="text/javascript">
			ddsmoothmenu.init({
				mainmenuid: "templatemo_menu", //menu DIV id
				orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
				classname: 'ddsmoothmenu', //class added to menu's outer DIV
				//customtheme: ["#1c5a80", "#18374a"],
				contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
			})
			
		</script>
		<script>
			$(function() {
			  
			// Betsy
			var dialog, form,
			    expresionRegularEmail = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
			 expresionRegularUsuario = /^[a-z]([0-9a-z_\s])+$/i,
			 expresionRegularPassword = /^([0-9a-zA-Z])+$/,
			    obj_name = $( "#minombre" ),
			    obj_email = $( "#miemail" ),
			    obj_palindromo = $( "#mipalindromo" ),
			    todosLosCampos = $( [] ).add( obj_name ).add( obj_email ).add( obj_palindromo ),
			    tips = $( ".TipDeValidacion" );
			
			// Eliana
			  function actualizarTip( t ) {
			    tips.text( t ).addClass( "ui-state-highlight" );
			  }
			
			
			// Eliana
			  function verificarLongitudCampo( o, n, min, max ) {
			    if ( o.val().length > max || o.val().length < min ) {
			      o.addClass( "ui-state-error" );
			      actualizarTip( "Longitud de " + n + " debe estar entre " + min + " y " + max + "." );
			      return false;
			    } else {
			      return true;
			    }
			  }
			
			//Betsy
			function verificarCampoUsandoRegExp( o, regexp, n ) {
			    if ( !( regexp.test( o.val() ) ) ) {
			      o.addClass( "ui-state-error" );
			      actualizarTip( n );
			      return false;
			    }
			 else {
			      return true;
			    }
			  }
			
			//Betsy
			function verificarPalindromo(o){
			var resultadoValidacion = validateForm(o.val());
			if(resultadoValidacion == 'OK'){
				return true;
			}
			else {
				o.addClass( "ui-state-error" );
				actualizarTip( resultadoValidacion );
				return false;
			}
			}
			
			
			//Eliana
			function LimpiarCampos(){
			obj_name.val('');
			obj_email.val('');
			obj_palindromo.val('');
			actualizarTip("Todos los campos son obligatorios.");
			}
			
			
			//Milena
			function adicionarUsuario() {
			    var esValido = true;
			    todosLosCampos.removeClass( "ui-state-error" );
			
			    esValido = esValido && verificarLongitudCampo( obj_name, "Nombre", 3, 16 );
			    esValido = esValido && verificarLongitudCampo( obj_email, "email", 6, 80 );
			    esValido = esValido && verificarLongitudCampo( obj_palindromo, "palindromo", 2, 99 );
			
			    esValido = esValido && verificarCampoUsandoRegExp( obj_name, expresionRegularUsuario, "Usuario debe comenzar con una letra y puede contener los siguientes caracteres: a-z, 0-9, _ , espacio." );
			    esValido = esValido && verificarCampoUsandoRegExp( obj_email, expresionRegularEmail, "ejemplo: mi@mail.com" );
			    esValido = esValido && verificarPalindromo(obj_palindromo);
			
			    if ( esValido ) {
			      alert("Libro de visitas firmado ok");
			      $( this ).dialog( "close" );
			LimpiarCampos();
			    }
			    return esValido;
			  }
			
			//Milena
			$( "#cuadroDeDialogo" ).dialog({
			    
			 autoOpen: false, // Impedir que se abra automaticamente al recargar la página
			    resizable: false, // Impedir que el cuadro de dialogo se pueda re-ajustar manualmente
			 height:290, // Altura del cuadro de dialogo
			    width: 350, // Ancho del cuadro de dialogo
			 modal: true, // muestra el background oscuro cuando el cuadro de dialogo esta abierto
			    buttons: {
			      "Guardar": adicionarUsuario/*function() {
			        alert("Libro de visitas firmado ok");
			        $( this ).dialog( "close" );
			      }*/,
			      "Cerrar": function() {
			LimpiarCampos();
			        $( this ).dialog( "close" );
			      }
			    }
			  });
			
			
			//Eliana
			  $( "a#libroDeVisitas" ).click(function() {
			LimpiarCampos();// Eliana
			    $('html, body').animate({scrollTop:1000}, 'slow');// Mover la vista de usuario cerca al punto donde hizo click ("libro de visitas"). Betsy Rico
			 $( "#cuadroDeDialogo" ).dialog( "open" ); // Abrir el cuadro de dialogo. // Milena
			 
			  });
			});
		</script>
	</head>
	<body>
		<div id="templatemo_wrapper">
			<div id="templatemo_header">
				<div id="site_title" style="float: left;">
					<h1>
						<a href="index.php">La Vega - Cundinamarca</a>
					</h1>
				</div>
				<div class="cleaner"></div>
			</div>
			<!-- end of header -->
			<div id="templatemo_menu" class="ddsmoothmenu" style="margin-top:-9%; margin-left: 19%">
				<!-- menu superior -->
				<ul>
					<li>
						<a href="#" class="selected">Secretar&iacute;as</a> <!-- opcion menu para Secretarias -->
						<ul>
							<li><a href="http://lavega-cundinamarca.gov.co/Proyectos/Paginas/Conozca-Mas-Proyectos.aspx">Desarrollo Social</a></li>
							<li><a href="http://lavega-cundinamarca.gov.co/Proyectos/Paginas/Conozca-Mas-Proyectos.aspx">Productividad y Competitividad</a></li>
							<li><a href="http://lavega-cundinamarca.gov.co/Proyectos/Paginas/Conozca-Mas-Proyectos.aspx">Planeaci&oacute;n</a></li>
						</ul>
					</li>
					<li>
						<a href="#">Servicios</a> <!-- opcion menu para Servicios -->
						<ul>
							<li><a href="http://lavega-cundinamarca.gov.co/Ciudadanos/Paginas/Pagos-en-Linea.aspx">Pagos en Linea</a></li>
							<li><a href="http://lavega-cundinamarca.gov.co/Ciudadanos/Paginas/SUIT.aspx">Liquidaci&oacute;n de Impuestos</a></li>
							<li><a href="http://lavega-cundinamarca.gov.co/Ciudadanos/Paginas/Caracterizacion-de-Usuarios.aspx">Caracterizaci&oacute;n de Usuarios</a></li>
						</ul>
					</li>
					<li>
						<a href="#">Gobierno</a> <!-- opcion menu para Gobierno -->
						<ul>
							<li><a href="http://lavega-cundinamarca.gov.co/NuestraAlcaldia/Paginas/Mision-y-Vision.aspx">Misi&oacute;n y Visi&oacute;n</a></li>
							<li><a href="http://lavega-cundinamarca.gov.co/NuestraAlcaldia/Paginas/Organigrama.aspx">Organigrama</a></li>
							<li><a href="http://lavega-cundinamarca.gov.co/NuestraAlcaldia/Paginas/Directorio-de-Agremiaciones.aspx#">Directorio</a></li>
						</ul>
					</li>
					<li>
						<a href="#">Educación</a> <!-- opcion menu para educacion -->
						<ul>
							<li><a href="http://www.lavega-cundinamarca.gov.co/Transparencia/Paginas/Estudios-Investigaciones-y-otras-Publicaciones.aspx">Pulicaciones</a></li>
							<li><a href="http://lavega-cundinamarca.gov.co/Ciudadanos/PortaldeNinos/Paginas/default.aspx#pan1">Portal de Niños</a></li>
						</ul>
					</li>
					<li>
						<a href="#">Visitantes</a> <!-- opcion menu para Visitantes -->
						<ul>
							<li><a href="http://lavega-cundinamarca.gov.co/MiMunicipio/Paginas/Sitios-de-Inter%C3%A9s.aspx">Arte y Cultura</a></li>
							<li><a href="http://lavega-cundinamarca.gov.co/NuestraAlcaldia/Paginas/Directorio-de-Agremiaciones.aspx">Deporte y recreaci&oacute;n</a></li>
							<li><a href="http://www.lavega-cundinamarca.gov.co/MiMunicipio/Paginas/Directorio-Turistico.aspx">Destinos Tur&iacute;sticos</a></li>
						</ul>
					</li>
					<li>
						<a href="http://lavega-cundinamarca.gov.co/Ciudadanos/Paginas/Peticiones-Quejas-Reclamos-y-Denuncias.aspx">PQRD</a>
					</li>
					<li style="margin-left: 2%; background:no-repeat;">
						<a href="sesion.php" style="width:auto">Contáctenos</a>
					</li>
				</ul>
				<br style="clear: left" />
			</div>
			<!-- end of templatemo_menu -->
			
			<!-- Milena -->
			<div id="dvRegistro" style="background-color:#FFFFFF">
				<fieldset>
					<form action="scripts_php/verificar.php" method="POST">
						<table>
							<tr>
								<td>
									<label for="txt_login_lbl" style="color:#000000;">Login</label>
								</td>
								<td>
									<input type="text" name="txt_login" id="txt_login_lbl" required />
								</td>
							</tr>
							<tr>
								<td>
									<label for="txt_password_lbl" style="color:#000000">Password</label>
								</td>
								<td>
									<input type="password" name="txt_password" id="txt_password_lbl" required />
								</td>
							</tr>
							<tr>
								<td colspan=2>
									<input type="submit" value="Ingresar" />
								</td>
							</tr>
						</table>
					</form>
				</fieldset>
			</div>
			
			
			<div id="templatemo_main">
				<div class="col one_third">
					<h2>Novedades</h2>
					<p><em>Noticia #1.</em> Invitamos a toda la comunidad Veguna a disfrutar del partido por eliminatorias al mundial Rusia 2018, Colombia vs Paraguay</p>
					<p>Noticia #2. Fortalecimiento de la estrategia de inclusi&oacute;n social <a rel="nofollow" href="http://lavega-cundinamarca.gov.co/NuestraAlcaldia/SaladePrensa/Paginas/fortalecimiento-de-las-estrategias-de-inclusi%C3%B3n-social-.aspx" target="_blank">URL</a> para fotos. Más Información aquí.</p>
					<p>XXXI CONCURSO NACIONAL DE BANDAS MUSICALES <a rel="nofollow" href="http://lavega-cundinamarca.gov.co/NuestraAlcaldia/SaladePrensa/Paginas/Programaci%C3%B3n-de-Nuestro-XXXI-Concurso-Nacional-de-Bandas-Musicales.aspx" target="_blank">URL</a></p>
					<a href="#" class="more">Ver Más</a>
				</div>
				<div class="col one_third">
					<h2>Calendario de Eventos</h2>
					<p>Listado de eventos.</p>
					<ul class="templatemo_list">
						<li><a href="http://lavega-cundinamarca.gov.co/NuestraAlcaldia/SaladePrensa/Paginas/%E2%80%9C5-FERIA-DEL-SABER-CAMPESINO%E2%80%9D-MUNICIPIO-DE-LA-VEGA%E2%80%93-CUNDINAMARCA.aspx">5 ta FERIA DEL SABER CAMPESINO</a></li>
						<li><a href="http://www.lavega-cundinamarca.gov.co/NuestraAlcaldia/SaladePrensa/Paginas/Celebraci%C3%B3n-d%C3%ADa-de-la-VIRGEN-DEL-CARMEN.aspx">Celebraci&oacute;n Virgen del Carmen</a></li>
						<li><a href="http://www.lavega-cundinamarca.gov.co/MiMunicipio/Paginas/Fiestas-y-Celebraciones.aspx">Fiesta Virgen del Carmen</a></li>
					</ul>
					<a href="http://lavega-cundinamarca.gov.co/MiMunicipio/Paginas/Calendario-de-Eventos.aspx?IE=31" class="more">Más</a>
					<br />
					<form name="frmSuscribir" method="post" onsubmit="alert('El suscriptor es: ' + document.getElementById('emailsuscriptor').value);">
						<br />
						Sucribete. Introduce tu email: <br />
						<input type="email" id="emailsuscriptor" name="suscriptor" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
						<input type="submit" value="Enviar">
					</form>
				</div>
				<div class="col one_third last_box">
					<h2>Contacto con el alcalde</h2>
					<img src="http://lavega-cundinamarca.gov.co/NuestraAlcaldia/Dependencias/Funcionarios/Luis%20Edilberto%20Chaves%20Alvarado.jpg" alt="Image 01" class="image_frame" style="width: 25%; height: 25%; margin-left: 35%;" />
					<p style="text-align: -webkit-center;"><em style="font-style: normal;">Luis Edilberto Chaves Alvarado</em></p>
					<p style="text-align: -webkit-center;"><em style="font-style: normal;">alcaldia@lavega-cundinamarca.gov.co</em></p>
					<p style="text-align: -webkit-center;"><em style="font-style: normal;">Tel&eacute;fono: 3102036677</em></p>
					<p style="text-align: -webkit-center;"><em style="font-style: normal;">Posesi&oacute;n: 01/01/2016</em></p>
					<a href="#" class="more">Más</a>	
				</div>
				<div class="cleaner"></div>
			</div>
			
			<!-- Eliana -->
			<div id="templatemo_bottom">
				<div class="col one_fourth">
					<h5>Acerca de</h5>
					<ul class="footer_link">
						<li><a href="#">lavega-cundinamarca.gov.co</a></li>
						<li><a href="#">Accesibilidad</a></li>
						<li><a href="#">Premios</a></li>
						<li><a href="#">Privacidad y Seguridad</a></li>
						<li><a href="#">Mapa</a></li>
					</ul>
				</div>
				<div class="col one_fourth">
					<h5>Alertas</h5>
					<ul class="footer_link">
						<li><a href="#">Ciudadanos</a>  <a href="#"></a></li>
						<li><a href="#">Clima</a>  <a href="#"></a></li>
						<li><a href="#">Tráfico</a>  <a href="#"></a></li>
						<li><a href="#">Status</a>  <a href="#"></a></li>
						<li><a href="#">Premios</a>  <a href="#"> </a></li>
					</ul>
				</div>
				<div class="col one_fourth">
					<h5>Soporte</h5>
					<ul class="footer_link">
						<li><a href="#emailsuscriptor">Contactenos</a></li>
						<li><a href="#">Diseño web</a></li>
						<li><a href="#">Feedback</a></li>
						<li><a href="#">Reportar un link</a></li>
						<li><a href="#" id="libroDeVisitas">Libro de visitas</a></li>
					</ul>
				</div>
				<div class="col one_fourth last_box">
					<h5>Siguenos</h5>
					<ul class="footer_link">
						<li><a href="https://www.facebook.com/MunicipioLaVegaCundinamarca/" class="facebook social">Facebook</a></li>
						<li><a href="#" class="linkedin social">Linkedin</a></li>
						<li><a href="https://twitter.com/AlcaldiaLaVegaC" class="myspace social">Twiter</a></li>
						<li><a href="https://www.youtube.com/watch?v=bjRrLK7ntRc" class="youtube social">Youtube</a></li>
						<li><a href="#" class="vimeo social">Vimeo</a></li>
					</ul>
				</div>
				<div class="cleaner"></div>
			</div>
			<div id="templatemo_footer">
				© 2017 lavega-cundinamarca.gov.co. Carrera 3 No 19-71, Parque Principal, Codigo Postal: 253610. (+57) 1 8458765
			</div>
		</div>
		
		
		<!-- Betsy  -->
		<div id="cuadroDeDialogo" title="Ingresar los datos">
			<p class="TipDeValidacion">Todos los campos son obligatorios.</p>
			<form>
				<fieldset>
					<table>
						<tr>
							<td>
								<label for="minombre">Nombre</label>
							</td>
							<td>
								<input type="text" name="tnombre" id="minombre" placeholder="Ingrese Nombre">
							</td>
						</tr>
						<tr>
							<td>
								<label for="miemail">Email</label>
							</td>
							<td>
								<input type="text" name="temail" id="miemail" placeholder="Ingrese email">
							</td>
						</tr>
						<tr>
							<td>
								<label for="mipalindromo">Palindromo</label>
							</td>
							<td>
								<input type="text" name="tpalindromo" id="mipalindromo" placeholder="Ingrese Palindromo">
							</td>
						</tr>
					</table>
					<!-- Allow form submission with keyboard without duplicating the dialog button -->
					<input type="submit" tabindex="-1" style="position:absolute;display:none;">
				</fieldset>
			</form>
		</div>
	</body>
</html>
