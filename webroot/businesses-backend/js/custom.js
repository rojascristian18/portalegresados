/* jshint bitwise:true, browser:true, eqeqeq:true, forin:true, globalstrict:true, indent:4, jquery:true,
   loopfunc:true, maxerr:3, noarg:true, node:true, noempty:true, onevar: true, quotmark:single,
   strict:true, undef:true, white:false */
/* global FB, webroot, fullwebroot */

/*!
 * Books & Bits | Backend
 */

//<![CDATA[
'use strict';

/**
 * jQuery
 */
jQuery(document).ready(function($)
{
	$('.js-query-ver-query').on('click', function(evento)
	{
		evento.preventDefault();
		var $this			= $(this),
			$tr				= $this.parents('tr').first(),
			$extracto		= $tr.find('.extracto'),
			$query			= $tr.find('.query');

		$extracto.hide();
		$query.show();
	});

	/* LOCK SCREEN */
    $('.lockscreen-box .lsb-access').on('click',function()
	{
		$(this).parent('.lockscreen-box').addClass('active').find('input').focus();
		return false;
	});

    $('.lockscreen-box .user_signin').on('click',function()
	{
		$('.sign-in').show();
		$(this).remove();
		$('.user').hide().find('img').attr('src', webroot + 'backend/assets/images/users/no-image.jpg');
		$('.user').show();
		return false;
	});
    /* END LOCK SCREEN */

	/**
	 * Ordenamiento de tablas generico
	 */
	if ( $('.js-generico-contenedor-sort').length ) {
		$('.js-generico-contenedor-sort').sortable(
		{
			axis			: 'y',
			cursor			: 'move',
			helper			: function(e, tr)
			{
				var $originals	= tr.children(),
					$helper		= tr.clone();

				$helper.children().each(function(index)
				{
					$(this).width($originals.eq(index).width());
				});
				return $helper;
			},
			stop			: function(e, ui)
			{
				$('td.js-generico-orden', ui.item.parent()).each(function(i)
				{
					var $this		= $(this);
					$this.find('input').val(i + 1);
					$this.find('span').text(i + 1);
				});

				var $form		= ui.item.parents('form').first();
				$.post($form.attr('action'), $form.serialize());
			}
		}).disableSelection();
	}

	$('.js-generico-handle-sort').on('click', function(evento)
	{
		evento.preventDefault();
	});



	/**
	 * Editor de ayudas
	 */
	if ( $('.js-summernote').length )
	{
		$('.js-summernote').summernote(
		{
			height		: 300,
			focus		: true,
			toolbar		: [
				['style', ['bold', 'italic', 'underline', 'clear']],
				['insert', ['link', 'picture']]
			]
		});
	}


	/**
	 * Select estados
	 */
	if($(".select").length > 0){
        $(".select").selectpicker();

        $(".select").on("change", function(){
            if($(this).val() == "" || null === $(this).val()){
                if(!$(this).attr("multiple"))
                    $(this).val("").find("option").removeAttr("selected").prop("selected",false);
            }else{
                $(this).find("option[value="+$(this).val()+"]").attr("selected",true);
            }
        });
    }

	if ( $('input.icheckbox').length )
	{
		$('input.icheckbox').iCheck(
		{
			checkboxClass	: 'icheckbox_flat-red',
			radioClass		: 'iradio_flat-red',
			increaseArea	: '20%'
		});
	}


	if ( $('.datepicker').length > 0 ) {
		/**
		 * Idioma español datepicker
		 */
		!function(a)
		{
			a.fn.datepicker.dates.es = {
				days			: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
				daysShort		: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
				daysMin			: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
				months			: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
				monthsShort		: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
				today			: 'Hoy',
				clear			: 'Borrar',
				weekStart		: 1,
				format			: 'yyyy-mm-dd'
			}
		}(jQuery);
	}

	/**
	* Verifica contraseñas iguales
	*/
	if ( $('#comprarClaves').length > 0 ) {

		$('#comprarClaves').on('click', function() {

			var idModal =  $(this).parents('.modal').eq(0).attr('id');
			var $invocarModal = $('a[data-target=#'+ idModal +']').find('.glyphicon');

			var $claveNueva = $('input[data-pass=nueva]');
			var $claveNuevaRepetir = $('input[data-pass=repetir_nueva]');

			// Quitar todas las alertas
			$(this).parents('.modal-body').eq(0).find('.alerta').remove();
			$invocarModal.parents('.form-group').find('.mensaje-actualizar-clave').remove();

			if ( $claveNueva.val() == 0 ) {
				$invocarModal.removeClass('glyphicon-ok');
				$invocarModal.addClass('glyphicon-refresh');
				$claveNueva.after('<small class="text-danger alerta">Ingrese su nueva contraseña</small>');
				return;
			}

			if ( $claveNueva.val().length < 6 || $claveNueva.val().length > 15) {
				$invocarModal.removeClass('glyphicon-ok');
				$invocarModal.addClass('glyphicon-refresh');
				$claveNueva.after('<small class="text-danger alerta">La contraseña debe tener entre 6 y 15 carácteres</small>');
				return;
			}

			if ( $claveNuevaRepetir.val() == 0 ) {
				$invocarModal.removeClass('glyphicon-ok');
				$invocarModal.addClass('glyphicon-refresh');
				$claveNuevaRepetir.after('<small class="text-danger alerta">Repita su nueva contraseña</small>');
				return;
			}

			if ( $claveNueva.val() != $claveNuevaRepetir.val() ) {
				$invocarModal.removeClass('glyphicon-ok');
				$invocarModal.addClass('glyphicon-refresh');
				$claveNuevaRepetir.after('<small class="text-danger alerta">Las contraseñas no cinciden</small>');
				return;
			}

			if ( $claveNueva.val() == $claveNuevaRepetir.val() && $claveNueva.val() != 0 && $claveNuevaRepetir.val() != 0 ) {
				
				$invocarModal.removeClass('glyphicon-refresh');
				$invocarModal.addClass('glyphicon-ok');
				$invocarModal.parent().after(' <small class="mensaje-actualizar-clave"> *Debe presionar el botón actualizar para guardar los cambios.</small>');
				$(this).parents('.modal').eq(0).modal('hide');

			}
			
		});
	}

	/*
	* Widgets
	*/
	if($(".owl-carousel").length > 0){
        $(".owl-carousel").owlCarousel({mouseDrag: false, touchDrag: true, slideSpeed: 300, paginationSpeed: 400, singleItem: true, navigation: false,autoPlay: true});
    }

    if($(".datepicker").length > 0){
        $(".datepicker").datepicker({
        	language	: 'es',
        	formato 	: 'yyyy-mm-dd'
        });
    }

    if($(".timepicker24").length > 0) {
        $(".timepicker24").timepicker({minuteStep: 5,showSeconds: true,showMeridian: false});
    }

    if($(".summernote").length > 0){
        $(".summernote").summernote({height: 250,
             codemirror: {
                mode: 'text/html',
                htmlMode: true,
                lineNumbers: true,
                theme: 'default'
              }
        });
        
        /**
        * Quitar opciones del editor
        */ 
    	$(".note-editor").find('.note-style').remove();
        $(".note-editor").find('.note-fontname').remove();
        $(".note-editor").find('.note-color').remove();
        $(".note-editor").find('.note-height').remove();
        $(".note-editor").find('.note-table').remove();
        $(".note-editor").find('.note-insert').remove();
        $(".note-editor").find('.note-view').remove();
        $(".note-editor").find('.note-help').remove();
        $('.note-editor').find('.note-font').remove();
        $(".note-editor").find('.note-para').find('.btn').eq(2).remove();
        
    }

    // Validador del formulario
    if ( $('#EmpleoBusinessesAddForm').length > 0 ) {
    	$("#EmpleoBusinessesAddForm").validate({
            rules: {                                            
                'data[Empleo][titulo]': {
                    required: true,
                    minlength: 10
                },
                'data[Empleo][descripcion]': {
                    required: true,
                    minlength: 50
                },
                'data[Empleo][jornada_laboral_id]': {
                    required: true
                },
                'data[Empleo][contrato_ofrecido_id]': {
                    required: true
                },
                'data[Empleo][vacantes]': {
                    required: true,
                    number: true
                },
                'data[Empleo][anno_experiencia_id]': {
                    required: true
                },
                'data[Empleo][requisitos_minimos]': {
                    required: true
                },
                'data[Empleo][sueldo]': {
                	number: true
                },
                'data[Empleo][fecha_finaliza]': {
                	required: true
                },
                'data[Empleo][hora_finaliza]': {
                	required: true
                },
                'data[Empleo][comuna_id]': {
                    required: true
                }
            },
            messages: {
            	'data[Empleo][titulo]' : {
            		required: 'Ingrese el títlulo del empleo',
            		minlength: 'El título debe contener más de 10 caracteres'
            	},
            	'data[Empleo][descripcion]' : {
            		required: 'Ingrese la descripcion del empleo',
            		minlength: 'El título debe contener más de 50 caracteres'
            	},
            	'data[Empleo][jornada_laboral_id]' : {
            		required: 'Ingrese el títlulo del empleo',
            		minlength: 'El título debe contener más de 10 caracteres'
            	},
            	'data[Empleo][contrato_ofrecido_id]' : {
            		required: 'Seleccione un contrato'
            	},
            	'data[Empleo][vacantes]' : {
            		required: 'Debe ingresar las vacantes al puesto',
            		number: 'Valor no válido'
            	},
            	'data[Empleo][anno_experiencia_id]' : {
            		required: 'Seleccione experiencia  mínima'
            	},
            	'data[Empleo][requisitos_minimos]' : {
            		required: 'Ingrese los requisitos mínimos'
            	},
            	'data[Empleo][sueldo]' : {
            		number: 'Valor no válido'
            	},
            	'data[Empleo][fecha_finaliza]': {
                	required: 'Seleccione fecha'
                },
                'data[Empleo][hora_finaliza]': {
                	required: 'Seleccione hora'
                },
            	'data[Empleo][comuna_id]' : {
            		required: 'Seleccione una comuna'
            	}
            }
        });
    }

    // Spinner
    if( $('.spinner_default').length > 0 ) {
    	$(".spinner_default").spinner()
    	$(".spinner_decimal").spinner({step: 0.01, numberFormat: "n"});
    }


    //Comentarios del sueldo
    if( $('#EmpleoSueldo').length > 0 ) {
    	$('#EmpleoSueldo').on('focusout', function(){

    		if ( $('#EmpleoSueldo').val() > 0 ) {
    			if ( $('#EmpleoSueldo').hasClass('valid') ) {
    				$('#EmpleoComentariosSueldo').parents('.row').eq(0).removeClass('hide')
    			}

    			if ( $('#EmpleoSueldo').hasClass('error') ) {
    				$('#EmpleoComentariosSueldo').parents('.row').eq(0).addClass('hide')
    			}
   
    		}else{
    			$('#EmpleoComentariosSueldo').parents('.row').eq(0).addClass('hide')
    		}
    	});
    }


    // Masked input
    if( $('.money').length > 0 ) {
		$('.money').mask('000.000.000.000.000', {reverse: true});
		$('.money').cleanVal();
    }

    // Quitar botón de submit en imágenes
    if ( $('.kv-fileinput-upload').length > 0 ) {
    	$('.kv-fileinput-upload').remove();
    }
     

	/**
	 * Funcion que permite obtener en formato YYYY-MM-DD una fecha determinada
	 * @param			{Object}			fecha			Fecha que se desea obtener
	 * @returns			{Object}			fecha			Fecha en formato YYYY-MM-DD
	 */
	function obtenerFecha(fecha)
	{
		return fecha.getFullYear() + '-' + (fecha.getMonth() + 1) + '-' + fecha.getDate();
	}

	/**
	 * Buscador de OC - Datepicker rango fechas
	 */
	var $buscador_fecha_inicio		= $('#CompraFechaInicio'),
		$buscador_fecha_fin			= $('#CompraFechaFin');

	if ( $buscador_fecha_inicio.length )
	{
		$buscador_fecha_inicio.datepicker(
		{
			language	: 'es',
			format		: 'yyyy-mm-dd'
		}).on('changeDate', function(data)
		{
			$buscador_fecha_fin.datepicker('setStartDate', data.date);
		});

		$buscador_fecha_fin.datepicker(
		{
			language	: 'es',
			format		: 'yyyy-mm-dd'
		}).on('changeDate', function(data)
		{
			$buscador_fecha_inicio.datepicker('setEndDate', data.date);
		});
	}

	/**
	 * Buscador de OC - Rango de fecha predeterminada
	 */
	$('.js-data-search').on('click', function(evento)
	{
		evento.preventDefault();

		var $this			= $(this),
			tipo			= $this.data('tipo'),
			rango			= $this.data('rango'),
			fecha_inicio	= new Date();

		/**
		 * Limpia las fechas
		 */
		if ( tipo == 'todo' )
		{
			$buscador_fecha_inicio.datepicker('update', '');
			$buscador_fecha_fin.datepicker('update', '');
		}
		else
		{
			var method = {
				dia		: ['setDate', 'getDate'],
				mes		: ['setMonth', 'getMonth'],
				ano		: ['setYear', 'getFullYear']
			};

			/**
			* Calcula la fecha
			*/
			fecha_inicio[method[tipo][0]](fecha_inicio[method[tipo][1]]() - rango);
			$buscador_fecha_inicio.datepicker('setDate', obtenerFecha(fecha_inicio));
			$buscador_fecha_fin.datepicker('setDate', obtenerFecha(new Date));
		}
	});

	/**
	 * Buscador de OC - Rango OC
	 */
	var $slider_oc		= $('#CompraRangoOc');
	if ( $slider_oc.length )
	{
		var minOC		= $slider_oc.data('min-oc'),
			maxOC		= $slider_oc.data('max-oc');

		$slider_oc.ionRangeSlider(
		{
			type				: 'double',
			grid				: true,
			min					: minOC,
			max					: maxOC,
			//from				: minOC,
			//to				: maxOC,
			prettify_separator	: '.',
			force_edges: false,
			prefix				: 'OT ',
			onChange			: function(data)
			{
				$(data.input).attr('disabled', false);
			}
		});

		if ( typeof(filtros) === 'object' && typeof(filtros.filtro) === 'object' && typeof(filtros.filtro.oc_min) !== 'undefined' )
		{
			$slider_oc.data('ionRangeSlider').update(
			{
				from		: parseInt(filtros.filtro.oc_min, 10),
				to			: parseInt(filtros.filtro.oc_max, 10)
			});
			$slider_oc.attr('disabled', false);
		}
	}

	/**
	 * Buscador de OC - Rango Monto
	 */
	var $slider_monto		= $('#CompraRangoMonto');
	if ( $slider_monto.length )
	{
		var minMonto		= $slider_monto.data('min-monto'),
			maxMonto		= $slider_monto.data('max-monto');

		$slider_monto.ionRangeSlider(
		{
			type				: 'double',
			grid				: true,
			min					: minMonto,
			max					: maxMonto,
			//from				: minMonto,
			//to					: maxMonto,
			prettify_separator	: '.',
			prefix				: '$',
			onChange			: function(data)
			{
				$(data.input).attr('disabled', false);
			}
		});

		if ( typeof(filtros) === 'object' && typeof(filtros.filtro) === 'object' && typeof(filtros.filtro.monto_min) !== 'undefined' )
		{
			$slider_monto.data('ionRangeSlider').update(
			{
				from		: parseInt(filtros.filtro.monto_min, 10),
				to			: parseInt(filtros.filtro.monto_max, 10)
			});
			$slider_monto.attr('disabled', false);
		}
	}

	/**
	 * Select estados
	 */
	if ( $('.selectpicker').length )
	{
		$('.selectpicker').selectpicker();
	}


	/**
	 * Limpia filtros
	 */
	$('.js-limpiar-busqueda').on('click', function(evento)
	{
		evento.preventDefault();
		var $this			= $(this),
			tipo			= $this.data('tipo'),
			$input			= $('[data-tipo="' + tipo + '"]').not(this);

		if ( tipo === 'libre' )
		{
			$input.val('');
		}
		if ( tipo === 'fecha' )
		{
			$input.datepicker('update', '').datepicker('clearDates');
		}
		if ( tipo === 'estado' )
		{
			$input.selectpicker('deselectAll');
		}
		if ( tipo === 'oc' || tipo === 'monto' )
		{
			$input.data('ionRangeSlider').reset();
			$input.prop('disabled', true);
		}
	});


	/**
	 * Input autocomplete y codigo usuario
	 */
	var $autocomplete		= $('[name="data[GrupoTarifario][usuario]"]');

	if ( $autocomplete.length )
	{
		/**
		* Limpieza inicial
		*/
		$autocomplete.val('');
	   /**
		* Autocomplete del nombre del usuario
		* Muestra
		* 			nombre
		* 			apellido materno
		* 			apellido paterno
		* 			email
		* 			telefono
		*/
		$autocomplete.typeahead(
		{
			/**
			 * Se obtiene el listado de los usuarios, filtrados el parametro enviado al controlador
			 */
			source					: function(query, process)
			{
				$.ajax(
				{
					type			: 'POST',
					url				: webroot + 'admin/grupo_tarifarios/ajax_usuariosTarifarios',
					dataType		: 'json',
					data			: { query: query },
					success			: process
				});
			},
			minLength				: 1,
			delay					: 200,
			autoSelect				: false,
			showHintOnFocus			: true,
			displayText				: function(item)
			{
				return item.Usuario.nombre_completo;
			}
		});

		/**
		 * Actualiza el codigo del usuario o elimina el usuario
		 * si no corresponde a una opcion del autoselector
		 */
		$autocomplete.on('change blur', function()
		{
			var $this			= $(this),
				current			= $this.typeahead('getActive');

			if ( typeof(current) !== 'undefined' )
			{
				if ( current.Usuario.nombre_completo === $this.val() )
				{
					// Se verifica que el id del usuario que se ingresa, no exita o este ingresado
					if ( ! $('.tabla-usuarios tbody tr[data-usuario_id="' + current.Usuario.id + '"]').length )
					{
						/**
						 * Se arma el arreglo que contiene los datos que se ingresan a la tabla
						 * de usuarios seleccionados
						 */
						var datos		= [
							current.TipoUsuario.nombre,
							current.Usuario.nombre,
							current.Usuario.email,
							current.Usuario.celular,
						];
						var html		= $.map(datos, function(texto)
						{
							return $('<td />', { text: texto });
						});

						/**
						 * Agregamos al primer td, un input type: hidde, el cual
						 * contendra el id del usuario que se selecciona
						 */
						html[0].append($('<input />',
						{
							type	: 'hidden',
							name	: 'data[Usuario][][usuario_id]',
							value	: current.Usuario.id
						}));

						/**
						 * Se agrega como ultimo td, el boton de accion, que permite eliminar el usuarios
						 * selecionado
						 */
						html.push('<td><a href="#" class="btn btn-danger js-elimina-usuario"><span class="fa fa-times"></span></td>');

						/**
						 * Se ingresan los datos del usuario en la tabla de usuarios seleccionados
						 */
						$('.tabla-usuarios tbody').append(
							$('<tr />', { 'data-usuario_id' :  current.Usuario.id }).append(html)
						);
					}
				}
				$this.val('').focus();
			}
		});

		/**
		 * Escucha que permite eliminar un item (usuario seleccionado) de la tabla de usuarios
		 */
		$('.tabla-usuarios tbody').on('click', '.js-elimina-usuario', function(evento)
		{
			evento.preventDefault();
			$(this).parents('tr').first().remove();
		});
	}

   if ( typeof(valores_oc) !== 'undefined' )
   {
        Morris.Line({
         element: 'dashboard-line-2',
         data: valores_oc,
         xkey: 'y',
         ykeys: ['total_compra', 'total_lista', 'total_reserva'],
         labels: ['Compra','Lista', 'Reserva'],
         resize: false,
         lineColors: ['#848484','#FF8000', 'blue'],
		 parseTime: true,
		 preUnits: '$'
       });
   }

	if ( typeof(cantidad_estados) !== 'undefined' )
    {
        Morris.Line({
        element: 'dashboard-line-1',
        data: cantidad_estados,
        xkey: 'y',
        ykeys: ['1', '2', '3', '4', '5'],
        labels: $.map(estados.estados, function(el) { return el }),
        resize: true,
        hideHover: false,
        gridTextSize: '10px',
        lineColors: ['#FF8000', '#B64645', '#8A0808', '#95B75D', '#848484'],
        gridLineColor: '#E5E5E5',
		 parseTime: true
        });
    }
});
//]]>
