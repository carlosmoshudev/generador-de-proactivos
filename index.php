<?php //-Conexión a BBDD
    $servername     = "db5000415145.hosting-data.io";
    $database       = "dbs396883";
    $username       = "dbu23466";
    $password       = "Grande2019!";
    $consultaMinisterio     = "SELECT * FROM Ministerios";
    $consultaOrganismo      = "SELECT * FROM Organismos";
    $consultaProblema       = "SELECT * FROM Problemas";
    $consultaResolución     = "SELECT * FROM Resoluciones";
    $connection = mysqli_connect($servername,$username,$password,$database);
?>
<!DOCTYPE HTML>
<HTML lang="es">
	<HEAD>
		<TITLE>
			G.E.N.I.O
		</TITLE>
		<META charset="utf-8" />
		<META http-equiv="Content-Type" content="text/html; ISO-8859-1" />
		<META name="DC.Language" scheme="RFC1766" content="Spanish" />
		<META name="author" content="Carlos Soto Pedreira" />
		<META name="robots" content="noindex" />
		<META name="Reply-to" content="carlos@carlosmoshu.com" />
		<LINK rev="Made" href="mailto:carlos@carlosmoshu.com" />
		<META name="Description" content="Aplicacion web de prueba." />
		<META name="Keywords" content="webapp,cora,cgp" />
		<META name="Resource-type" content="Archive" />
        <META name="DateCreated" content="Fri, 1 May 2020 00:00:00 GMT+1" />
        <LINK rel="stylesheet" type="text/css" href="http://proactivos.brimstone.es/css/proactivo.css" media="all" />
        <LINK rel="stylesheet" type="text/css" href="http://proactivos.brimstone.es/css/retro.css" media="all" />
        <!-- GOOGLE FONTs -->
        <LINK href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet" />
        <!-- FONT AWESOME -->
        <LINK rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
        <!-- ANIMATE CSS -->
        <LINK rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" />
	</HEAD>
	<BODY>
        <INPUT type="Button" class="retro-button yellow-button" value="Volver a Wiki CORA">
		<DIV class="container">
			<H1 class="logo">Generador de <SPAN>proactivos</SPAN></H1>
            <DIV class="generator-wrapper animated bounceInUp">
                <DIV class="generator-form">
                    <H2>Formulario:</H2>
                    <FORM action="">
				        <P>
                            <LABEL for="Mnemonico">Mnemónico</LABEL> 
                            <INPUT type="text" name="Mnemonico" class="textbox" />
                        </P>
                        <P>
                            <LABEL for="Ministerio">Ministerio</LABEL>
                            <SELECT name="Ministerio" class="dropdown">
                            <?php
                                $query = $connection -> query ($consultaMinisterio);
                                while ($valores = mysqli_fetch_array($query)) {
                                echo '<option value="'.$valores[id_ministerio].'">'.$valores[ministerio].'</option>';
                                }
                            ?>
                            </SELECT>
                        </P>
                        <P>
                            <LABEL for="Organismo">Organismo</LABEL>
                            <SELECT name="Organismo" class="dropdown">
                            <?php
                                $query = $connection -> query ($consultaOrganismo);
                                while ($valores = mysqli_fetch_array($query)) {
                                echo '<option value="'.$valores[id_organismo].'">'.$valores[organismo].'</option>';
                                }
                            ?>
                            </SELECT>
                        </P>
				        <P>
                            <LABEL  for="Sede">Sede</LABEL> 
                            <INPUT type="text" name="Sede" class="textbox" />
                        </P>
				        <P>
                            <LABEL for="EasyVista">EasyVista</LABEL> 
                            <INPUT type="text" name="EasyVista" class="textbox" />
                        </P>
                        <P> 
                            <LABEL for="Contacto">Contacto Base de datos</LABEL>
                            <INPUT type="text" name="Contacto" class="textbox" />
                            <BUTTON class="button click" name="BuscarContacto" value="Buscar Contacto">Autocompletar Contacto</BUTTON>
                        </P>
                        <P> 
                            <LABEL for="Servicio">Servicios afectados</LABEL> 
                            <INPUT type="radio" class="radio exclude" name="Servicio" id="Voz" value ="Voz" />Voz
                            <INPUT type="radio" class="radio exclude" name="Servicio" id="Datos" value ="Datos" />Datos
                        </P>
                        <P>
                            <label for="Problema">Descripción del problema</label>
                            <SELECT name="Problema" class="dropdownLong">
                            <?php
                                $query = $connection -> query ($consultaProblema);
                                while ($valores = mysqli_fetch_array($query)) {
                                echo '<option value="'.$valores[id_problema].'">'.$valores[problema].'</option>';
                                }
                            ?>
                            </SELECT>
                        </P>
                        <P> 
                            <label for="Criticidad">Criticidad</label>
                            <SELECT name="Criticidad" class="dropdown">
                            <OPTION value=0>Leve</OPTION>
                            <OPTION value=1>Media</OPTION>
                            <OPTION value=2>Grave</OPTION>
                            <OPTION value=3>Crítica</OPTION>
                            </SELECT>
                            <INPUT type="checkbox" class="checkbox exclude" name="Incomunicacion" value="Incomunicacion" />¿Hay incomunicación?
                        </P>
                        <P> 
                            <label for="Resolucion">Estimación de resolución</label>
                            <SELECT name="Resolucion" class="dropdownLong">
                            <?php
                                $query = $connection -> query ($consultaResolución);
                                while ($valores = mysqli_fetch_array($query)) {
                                echo '<option value="'.$valores[id_resolucion].'">'.$valores[resolucion].'</option>';
                                }
                            ?>
                            </SELECT>
                        </P>
                        <P>
                            <label for="Beneficiario">Beneficiario</label> 
                            <INPUT type="text" name="Beneficiario" class="textbox" />
                            <BUTTON class="button click" name="BuscarBeneficiario" value="Buscar Beneficiario">Autocompletar Beneficiario</BUTTON>
                        </P>
                        <P>
                            <label for="block">Acciones</label>
                            <BUTTON class="button click" name="GenerarProactivo" value="Generar Proactivo">Generar Proactivo</BUTTON>  
                            <BUTTON class="button click" name="NuevoProactivo" value="Nuevo Proactivo">Nuevo formulario</BUTTON>
                        </P>
			        </FORM>
                </DIV>
                <DIV class="generator-result">
				    <H2>Resultados:</H2>
				    <P class="result">
				    </P>
                </DIV>
            </DIV>
        </DIV>
	</BODY>
</HTML>