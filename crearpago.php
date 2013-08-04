<?php 
	//echo "crear pago";
	
	ini_set( 'include_path' , 'libraries/' );
	require_once( 'libraries/nusoap/nusoap.php');
	//echo "aca";
	
	$client = new nusoap_client('http://www.zonapagos.com/ws_inicio_pagov2/service.asmx?wsdl' , 'wsdl');

	//print_r( $client );
    $params = array (
			    		        'id_tienda' => $_POST['id_tienda'] , 
                                'clave' => ''
			    		        'total_con_iva' => $_POST['total_con_iva'] ,
			    		        'valor_iva' => $_POST['valor_iva'],
			    		        'id_pago' => $_POST['id_pago'],
			    		        'descripcion_pago' => $_POST['descripcion_pago'],
                                'email' => $_POST['email'],
                                'id_cliente' => '9862871',
                                'nombre_cliente' => $_POST['nombre_cliente'],
                                'apellido_cliente' => $_POST['apellido_cliente'],
                                'telefono_cliente' => $_POST['telefono_cliente'],
                                'info_opcional1' => 'info1',
                                'info_opcional2' => 'info2',
                                'info_opcional3' => 'info3',
                                'codigo_servicio_principal' => '1234',
                                'lista_codigos_servicio_multicredito'=> null,
                                'lista_nit_codigos_servicio_multicredito' => null ,
                                'lista_valores_con_iva' => null ,
                                'lista_valores_iva' => null ,
                                'total_codigos_servicio' => 0


    			) ;
    $result = $client->call('inicio_pagoV2', $params  ) ;
    //print_r( $result );
    
   header( 'Location: http://www.zonapagos.com/t_pruebacons/pago.asp?estado_pago=iniciar_pago&identificador=' . $result['inicio_pagoV2Result'] );
?>
