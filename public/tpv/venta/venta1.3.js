/**
 * Valores GLOBALES
 * El contador es igual al TAMAÑO DE LA TABLA
 */
var PRODUCTOSEXISTENCIAS = [{}];
var CONTADOR = 0;
var filasNuevas = [{}];
var REGISTROSENTABLA = [{}];
var filasRegistrosEnTabla = [{}];
//******************************
var CLAVERESULTANTE = [];
var NOTIFICACIONES = [];
var CANTIDADRESULTANTE = [];
//******************************
var CLAVEoSKU = "";

/**
 * Created by Cars on 05/08/2018.
 */
$(document).ready(function () {
    CONTADOR = 0;
    $("#total").val(0);
    $("#clave0").focus();
    $("table > thead > tr > th").css({"border-bottom-width": "1px", "font-size": "2.0625rem"});
    $("ul.nav-tabs li a").css("font-size", "1.75rem");
    $("#productosSinExistencia li").css("font-size", "1.75rem");
    $("table > tbody#buscar > tr > td").css("font-size", "15px");
    $(".btn").css("font-size", "1.75rem");
    $(".well").css("padding", "1px");
    var filaNueva = {idBtnAgregar: "idBtnAgregar0"};
    filasNuevas.push(filaNueva)
    //llenadoTablaBusqueda();
    //Para que funcione con ENTER
    $(document).on('keydown', 'input#clave0', function (ev) {
        if (ev.which === 13) {
            OutFocusClave(productos);
            if ($("#clave0").val() == "") {
                $("#claveInfo0").text("LLENE ESTE CAMPO");
                $("#clave0").focus();
            } else {
                $("#cantidad0").focus()
            }
        }
    });
    //Para que funcione con ENTER
    $(document).on('keydown', 'input#cantidad0', function (ev) {
        if (ev.which === 13) {
            if ($("#cantidad0").val() === "") {
                $("#existencia0").text("LLENE ESTE CAMPO");
                $("#cantidad0").focus();
            } else {
                cantidad();
            }
        }
    });

    //Para que funcione con ENTER recibidoModal
    $(document).on('keydown', 'input#recibidoModal', function (ev) {
        if (ev.which === 13) {
            $("#cobrar").focus();
        }
    });
//Para que el modal se abra con alt+n
    document.addEventListener("keydown", function (e) {
        if (e.altKey && e.which === 78) {
            $('#productosModal').modal('toggle');
        }
    });

    //Para la busqueda en la tabla
    (function ($) {
        $('#filtrar').keyup(function () {
            var rex = new RegExp($(this).val(), 'i');
            $('#buscar tr').hide();
            $('#buscar tr').filter(function () {
                return rex.test($(this).text());
            }).show();
        })

    }(jQuery));
    agregarProductosModal();
    clickModalInfo();
    //Para que haga focus dentro del modal Productos en el input filtrar
    $('#productosModal').on('shown.bs.modal', function () {
        $("#filtrar").focus();
    })
    //Para que haga focus dentro del modal en el input COBRO
    $('#cobroModal').on('shown.bs.modal', function () {
        $("#recibidoModal").focus();
    })
    //Evento para cuando se cierra el modal producto
    $("#productosModal").on("hidden.bs.modal", function () {
        $("#clave0").focus();
    });

    //Evento para cuando se cierra el modal cobro
    $("#cobroModal").on("hidden.bs.modal", function () {
        $("#clave0").focus();
    });
});

/**
 * Busca la clave en un ObjetoJSON(que es el que vamos llenando nosotros) y regresa la cantidad
 * @param claveEntrada
 * @param Obj
 * @returns {Array} Regresa una clave y una cantidad
 */
function encontrarObjetoEnJson(claveEntrada, Obj) {
    var resultante = [];
    var cantidad = "";
    var claveSalida = "";
    var skuSalida = "";
    var unidadM = "";
    var claveSku = validacionClaveSku(claveEntrada);
    if (claveSku == "clave") {
        for (var prop in Obj) {
            if (Obj[prop]['clave'] === claveEntrada) { //Este es solo para encontrar la clave en el json
                cantidad = Obj[prop]['existencia'];
                claveSalida = Obj[prop]['clave'];
                skuSalida = Obj[prop]['sku'];
                unidadM = Obj[prop]['unidadMedida'];
            }
        }
        resultante[0] = [claveSalida, cantidad, skuSalida, unidadM];
        CLAVEoSKU = "clave"
    }
    if (claveSku == "sku") {
        for (var prop in Obj) {
            if (Obj[prop]['sku'] === claveEntrada) { //Este es solo para encontrar la clave en el json
                cantidad = Obj[prop]['existencia'];
                claveSalida = Obj[prop]['clave'];
                skuSalida = Obj[prop]['sku'];
                unidadM = Obj[prop]['unidadMedida'];
            }
        }
        resultante[0] = [claveSalida, cantidad, skuSalida, unidadM];
        CLAVEoSKU = "sku"
    }
    if (claveSku == "skuYclave") {
        for (var prop in Obj) {
            if (Obj[prop]['sku'] === claveEntrada) { //Este es solo para encontrar la clave en el json
                cantidad = Obj[prop]['existencia'];
                claveSalida = Obj[prop]['clave'];
                skuSalida = Obj[prop]['sku'];
                unidadM = Obj[prop]['unidadMedida'];
            }
        }

        resultante[0] = [claveSalida, cantidad, skuSalida, unidadM];
        CLAVEoSKU = "sku"
        //if (resultante[0][0] === ""){
        if (resultante[0][0] === "") {
            for (var prop in Obj) {
                if (Obj[prop]['clave'] === claveEntrada) { //Este es solo para encontrar la clave en el json
                    cantidad = Obj[prop]['existencia'];
                    claveSalida = Obj[prop]['clave'];
                    skuSalida = Obj[prop]['sku'];
                    unidadM = Obj[prop]['unidadMedida'];
                }
            }
            resultante[0] = [claveSalida, cantidad, skuSalida, unidadM];
            CLAVEoSKU = "clave"
        }
    }
    return resultante;    //Retorna el valor de la cantidad
}

/**
 * Busca la clave en un Objeto-Arreglo(producto que es el original) y regresa la cantidad original
 * @param clave
 * @param productos
 * @returns {Array} Regresa una clave y una cantidad
 */
function encontrarProductosPorClave(clave, productos) {
    var resultante = [];
    var cantidad = "";
    var claveSalida = "";
    var skuSalida = "";
    var unidadM = "";
    var claveSku = validacionClaveSku(clave);
    if (claveSku === "clave") {
        $.each(productos, function (i, item) {
            if (item.clave === clave) {
                cantidad = productos[i].existencia; //Este siempre va a retornar el valor de origen
                claveSalida = productos[i].clave;
                skuSalida = productos[i].sku;
                unidadM = productos[i].unidadMedida;
            }
        })
        resultante[0] = [claveSalida, cantidad, skuSalida, unidadM];
        CLAVEoSKU = "clave"
    }
    if (claveSku === "sku") {
        $.each(productos, function (i, item) {
            if (item.sku === clave) {
                cantidad = productos[i].existencia; //Este siempre va a retornar el valor de origen
                claveSalida = productos[i].clave;
                skuSalida = productos[i].sku;
                unidadM = productos[i].unidadMedida;
            }
        });
        resultante[0] = [claveSalida, cantidad, skuSalida, unidadM];
        CLAVEoSKU = "sku"
    }
    if (claveSku === "skuYclave") {
        $.each(productos, function (i, item) {
            if (item.sku === clave) {
                cantidad = productos[i].existencia; //Este siempre va a retornar el valor de origen
                claveSalida = productos[i].clave;
                skuSalida = productos[i].sku;
                unidadM = productos[i].unidadMedida;
            }
        })
        resultante[0] = [claveSalida, cantidad, skuSalida, unidadM];
        CLAVEoSKU = "sku";
        if (resultante[0][0] === "") {
            $.each(productos, function (i, item) {
                if (item.clave === clave) {
                    cantidad = productos[i].existencia; //Este siempre va a retornar el valor de origen
                    claveSalida = productos[i].clave;
                    skuSalida = productos[i].sku;
                    unidadM = productos[i].unidadMedida;
                }
            });
            resultante[0] = [claveSalida, cantidad, skuSalida, unidadM];
            CLAVEoSKU = "clave"
        }
    }
    return resultante;
}
/**
 * * Primero verifica que el productosExistencias sea mayor a 1
 * Busca un producto en el ObjetoJSON(productosExistencias llenado por nosotros) si no lo encuentra lo busca
 * lo busca en Objeto-Arrego(producto que es el original)
 * @param productos
 * @param productosExistencias
 * @param clave
 * @returns {Array} Regresa una clave y una cantidad
 */
function buscarExistencias(productos, productosExistencias, clave) {
    var resultante = [];
    if (productosExistencias.length > 1) {
        resultante = encontrarObjetoEnJson(clave, productosExistencias)
        if (resultante[0][0] === "") {
            resultante = encontrarProductosPorClave(clave, productos);
        }
    } else {
        resultante = encontrarProductosPorClave(clave, productos);
    }
    return resultante;
}

function buscarDescripcionTipoVentaPrecioClave(clave, productos) {
    var skuClave = validacionClaveSku(clave);
    var resultante = [];
    if (skuClave === "clave") {
        $.each(productos, function (i, item) {
            if (item.clave === clave) {
                resultante[0] = item.descripcion;
                resultante[1] = "Menudeo";
                resultante[2] = item.precioRetail;
                resultante[3] = item.existencia;
            }
        });
    }
    if (skuClave === "sku") {
        $.each(productos, function (i, item) {
            if (item.sku === clave) {
                resultante[0] = item.descripcion;
                resultante[1] = "Menudeo";
                resultante[2] = item.precioRetail;
                resultante[3] = item.existencia;
            }
        });
    }

    if (skuClave === "skuYclave") {
        $.each(productos, function (i, item) {
            if (item.sku === clave) {
                resultante[0] = item.descripcion;
                resultante[1] = "Menudeo";
                resultante[2] = item.precioRetail;
                resultante[3] = item.existencia;
            }
        });
        if (resultante.length === 0) {
            $.each(productos, function (i, item) {
                if (item.clave === clave) {
                    resultante[0] = item.descripcion;
                    resultante[1] = "Menudeo";
                    resultante[2] = item.precioRetail;
                    resultante[3] = item.existencia;
                }
            });
        }
    }
    return resultante
}
/**
 * Esta funcion lo unico que devuelve es un String con el valor de "valor" "sku" o "skuYclave"
 * para poder saber donde voy a tener que hacer la busqueda, si en valor o sku
 * @param claveSku
 * @returns {string}
 */
function validacionClaveSku(claveSku) {
    var tamString = claveSku.length;
    var claveSkuNumero;
    var resultante = "";
    claveSkuNumero = parseInt(claveSku);

    if (typeof (claveSku) === "string" && Number.isNaN(claveSkuNumero)) {
        //buscar en clave por que es puro texto
        resultante = "clave";
        return resultante
    } else if (typeof (claveSkuNumero) === "number") {
        if (tamString >= 6) {
            //buscar en sku
            resultante = "sku";
            return resultante
        }
        if (tamString < 6) {
            //primero buscar en sku y despues en clave
            resultante = "skuYclave";
            return resultante
        }
    }
}
/**
 * Primero hace la busqueda la funcion de existencias y si no lo encuentra lo resta de productos
 * @param clave
 * @param productos
 * @param productosExistencias
 * @param cantidadARestar
 * @returns {*}
 */
function resultadoParcial(clave, productos, productosExistencias, cantidadARestar) {
    var resultante = [];
    var totalParcial = buscarExistencias(productos, productosExistencias, clave);
    var sku = totalParcial[0][2];
    var resultado = totalParcial[0][1] - cantidadARestar;
    var filaExistencia = {clave: totalParcial[0][0], existencia: resultado, sku: sku};
    var claveR = clave.toString();
    PRODUCTOSEXISTENCIAS.push(filaExistencia)
    resultante[0] = [claveR, resultado.toString()]
    return resultante;
}

/**
 * Hace acciones cuando se hace el Out focus en clave
 * @param productos
 * @constructor
 */
function OutFocusClave(productos) {
    for (var i = 1; i <= CONTADOR; i++) {
        $("#btnEliminar" + i).prop("disabled", true);
    }

    var claveProducto = $("#clave0").val();
    var descripcionTVPrecio = buscarDescripcionTipoVentaPrecioClave(claveProducto, productos);
    var cantidadParcial = buscarExistencias(productos, PRODUCTOSEXISTENCIAS, claveProducto);
    $("#existencia0").text(cantidadParcial[0][1]);
    $("#descripcion0").val(descripcionTVPrecio[0]);
    $("#tipoVenta0").val(descripcionTVPrecio[1]);
    $("#precio0").val(descripcionTVPrecio[2]);
    $("#unidadMedida0").val(cantidadParcial[0][3]);
    if (cantidadParcial[0][1] == "") {
        setTimeout(function () {
            $('input[id="clave0"]').focus()
        }, 3);
        $("#claveInfo0").text("CLAVE NO EXISTE")
    } else {
        $("#claveInfo0").text("")
        $("#clave0").prop("disabled", true);
    }
}

function limpiarCampos() {
    $("#clave0").val("");
    $("#cantidad0").val("");
    $("#descripcion0").val("");
    $("#tipoVenta0").val("");
    $("#precio0").val("");
    $("#cantidad0").val("");
    $("#importe0").val("");
    $("#existencia0").text("");
    $("#btnAgregar0").prop("disabled", true);
    $("#clave0").prop("disabled", false);
    $("#clave0").focus();
}

/**
 * Aumenta el indice de todos los valores de la linea, claveInfo, clave, cantidad, descripcion,
 * tipo de venta, precio, importe, btnAgregar y btnEliminar
 * Inserta una nueva linea.
 *
 */
function agregar() {
    for (var i = 1; i <= CONTADOR; i++) {
        $("#btnEliminar" + i).prop("disabled", false);
    }
    //Buscar el producto
    var claveProducto = $("#clave0").val();
    var cantidadParaResta = $("#cantidad0").val();
    var descripcionDeProducto = $("#descripcion0").val();
    var precioProducto = $("#precio0").val();
    var importeProducto = $("#importe0").val();
    var unidadMedida = $("#unidadMedida0").val();
    resultadoParcial(claveProducto, productos, PRODUCTOSEXISTENCIAS, cantidadParaResta)
    var contadorParaCobrar = sessionStorage.getItem("contador");
    if (contadorParaCobrar !== null) {
        CONTADOR = parseInt(contadorParaCobrar) + 1;
        //sessionStorage.setItem("contador", null);
        sessionStorage.clear();
    } else {
        CONTADOR = CONTADOR + 1;
    }
    $("#cuerpoVenta").append('<tr id="lineaVenta' + CONTADOR + '"><td>' +
        '<input style="height: 50px; width: 130px; font-size: 30px; font-weight: bold" type="text" class="form-control" name="clave" id="clave' + CONTADOR + '">' +
        '<small id="claveInfo' + CONTADOR + '" class="form-text text-danger"></small></td><td>' +
        '<input style="height: 50px; width: 100px; font-size: 30px; font-weight: bold" type="text" type="text" class="form-control" name="cantidad" id="cantidad' + CONTADOR + '">' +
        '<small id="existencia' + CONTADOR + '" class="form-text text-danger"></small></td><td>' +
        '<input style="height: 50px; width: 100px; font-size: 30px; font-weight: bold" type="text" type="text" class="form-control" name="cantidadE" id="cantidadE' + CONTADOR + '" disabled></td><td>' +
        '<input style="height: 50px; width: 260px; font-size: 30px; font-weight: bold" type="text" class="form-control" name="descripcion" id="descripcion' + CONTADOR + '" disabled></td><td>' +
        '<input style="height: 50px; width: 250px; font-size: 30px; font-weight: bold" type="text" class="form-control" name="tipoVenta" id="tipoVenta' + CONTADOR + '" disabled></td> <td>' +
        '<input style="height: 50px; width: 100px; font-size: 30px; font-weight: bold" type="text" class="form-control" name="precio" id="precio' + CONTADOR + '" disabled></td><td>' +
        '<input style="height: 50px; width: 100px; font-size: 30px; font-weight: bold" type="text" class="form-control" name="importe" id="importe' + CONTADOR + '" disabled></td><td>' +
        '<button style="font-size: 1.75rem" class="btn btn-danger" id="btnEliminar' + CONTADOR + '" onclick="eliminar(this, productos);">Eliminar</button></td></tr>');
    //Aqui ya se pone el valor en el cuadro Grande
    $("#clave" + CONTADOR).val($("#clave0").val());
    $("#cantidad" + CONTADOR).val($("#cantidad0").val());
    $("#cantidadE" + CONTADOR).val($("#cantidadE0").val());
    $("#descripcion" + CONTADOR).val($("#descripcion0").val());
    $("#tipoVenta" + CONTADOR).val($("#tipoVenta0").val());
    $("#precio" + CONTADOR).val($("#precio0").val());
    $("#importe" + CONTADOR).val($("#importe0").val());
    $("#clave" + CONTADOR).prop("disabled", true);
    $("#cantidad" + CONTADOR).prop("disabled", true);
    //hay que poner la funcion la cual dice si es clave, sku o clsveYsku
    var claveSku = validacionClaveSku(claveProducto);
    //La cantidadE aun no lleva nada, solo se puso para que cuando se haga la version grande ya este aqui
    filasRegistrosEnTabla = {
        clave: claveProducto,
        cantidad: cantidadParaResta,
        unidadMed: unidadMedida,
        cantidadE: "",
        descripcion: descripcionDeProducto,
        tipoDeVenta: "menudeo",
        precio: precioProducto,
        importe: importeProducto,
        sku: claveProducto,
        claveoSku: CLAVEoSKU,
        indice: CONTADOR
    };

    REGISTROSENTABLA.push(filasRegistrosEnTabla);
    limpiarCampos();
}

function eliminar(objetoBtnEliminar, productos) {
    var id = objetoBtnEliminar.id;
    var indice = id.match(/(\d+)/g);
    var clave = $("#clave" + indice).val();
    var cantidad = $("#cantidad" + indice).val();
    //Para recorrer el JSON se utiliza esta funcion buscarExistencias pero aparte de buscar en PRODUCTOSEXISTENCIAS, busca en
    //los productos por si no esta en el JSON
    var resultadoParcial = buscarExistencias(productos, PRODUCTOSEXISTENCIAS, clave);
    if (parseInt(cantidad) <= parseInt(resultadoParcial[0][1])) {
        var resultado = parseInt(cantidad) + parseInt(resultadoParcial[0][1]);
    } else {
        var resultado = resultadoParcial[0][1];
    }

    var filaExistencia = {clave: resultadoParcial[0][0], existencia: resultado, sku: resultadoParcial[0][2]};
    PRODUCTOSEXISTENCIAS.push(filaExistencia)
    $("#clave0").focus();
    restarTotal(indice);
    $("#" + objetoBtnEliminar.id).closest('tr').remove();
    //CONTADOR = CONTADOR - 1;
    eliminarRegistroDeJSON(indice)
}

function eliminarRegistroDeJSON(indice) {
    for (var prop in REGISTROSENTABLA) {
        if (REGISTROSENTABLA[prop]['indice'] == indice) {
            REGISTROSENTABLA[prop]['clave'] = "eliminado"
            REGISTROSENTABLA[prop]['cantidad'] = "eliminado"
            REGISTROSENTABLA[prop]['indice'] = "eliminado"
        }
    }
}

function cantidad() {
    var cantidad = $("#cantidad0").val();
    var precio = $("#precio0").val();
    var resultado = "";
    var existencia = $("#existencia0").text();
    if (parseInt(cantidad) <= 0) {
        $("#cantidad0").focus()
        alert("La cantidad Mayor a Cero")
        $("#importe0").val(0);
    } else {
        if (parseInt(cantidad) > parseInt(existencia)) {
            $("#cantidad0").focus()
            alert("La cantidad debe de ser menor o igual a la existencia")
            $("#importe0").val(0);
            resultado = 0;
        } else {
            $("#btnAgregar0").prop("disabled", false);
            resultado = cantidad * precio;
            $("#btnAgregar0").focus();
            $("#importe0").val(resultado);
        }
    }
    total();
}

/*function llenadoTablaBusqueda() {
 $.each(productos, function (i, item) {
 })
 }*/

/**
 * Agrega todos los productos a la tabla del modal
 */
function agregarProductosModal() {
    $.each(productos, function (i, item) {
        $("#buscar").append("<tr><td>" + productos[i].idProducto + "</td><td>" + productos[i].clave + "</td><td>" + productos[i].sku + "</td><td>" + productos[i].descripcion + "</td><td>" + productos[i].costo + "</td></tr>");
    })
}
/**
 * Obtiene la clave del modal para ponerla en el input de venta
 */
function clickModalInfo() {
    $("#buscar tr td").click(function () {
        var clave = $(this).parents("tr").find("td").eq(1).html();
        $('#productosModal').modal('toggle');
        $("#clave0").val(clave);
        //$("#clave0").focus();
        setTimeout(function () {
            $('input[id="clave0"]').focus()
        }, 3);
        //alert(clave);
    })
}
/**
 * Pone el total de la venta
 */
function total() {
    var importe = $("#importe0").val();
    var total = $("#total").val();
    total = parseInt(total) + parseInt(importe);
    $("#total").val(total);
}
/**
 * Resta el total de la venta
 * @param indice
 */
function restarTotal(indice) {
    var total = $("#total").val() - $("#importe" + indice).val()
    $("#total").val(total);
}
/**
 * Hace el cobro
 */
function cobrar() {
    if (parseInt($("#recibidoModal").val()) < parseInt($("#totalModal").val()) || $("#recibidoModal").val() == "") {
        alert("El valor Recibido no puede ser menor al Total o nulo")
        $("#recibidoModal").val("");
        $("#cambioModal").val("");
        $("#recibidoModal").focus();
    } else {
        var cambio = $("#recibidoModal").val() - $("#totalModal").val();
        $("#cambioModal").val(cambio);
    }
}

/**
 * Hace el cobro
 */
function cobrarEimprimir() {
    if (parseInt($("#recibidoModal").val()) < parseInt($("#totalModal").val()) || $("#recibidoModal").val() == "") {
        alert("El valor Recibido no puede ser menor al Total o nulo")
        $("#recibidoModal").val("");
        $("#cambioModal").val("");
        $("#recibidoModal").focus();
    } else {
        var cambio = $("#recibidoModal").val() - $("#totalModal").val();
        $("#cambioModal").val(cambio);
        var clave = [];
        var cantidad = [];
        var sku = [];

        for (var i in PRODUCTOSEXISTENCIAS) {
            clave[i] = PRODUCTOSEXISTENCIAS[i]['clave'];
            cantidad[i] = PRODUCTOSEXISTENCIAS[i]['existencia'];
            sku[i] = PRODUCTOSEXISTENCIAS[i]['sku'];
        }

        var request = {
            clave: clave,
            cantidad: cantidad,
            sku: sku

        };
        actualizarExistencias(request);
        console.log(productos);
        var tamPDF = PRODUCTOSEXISTENCIAS.length - 1;
        pdf(tamPDF);

    }
}
/**
 *El primer For lo que hace es que quita los que traen la palabra eliminados del json, o que son nulos
 *Aqui se implemento Jquery Deferred que es una implementacion customizada de las promesas
 *Y es que lo que pasa es que esta funcion regresa un ajax para posteriormente utilizarlo. En si lo que se utiliza son
 * las arreglos que retorna, pero como se utiliza un for para ir accesando a ellos y la funcion ajax es asincronica
 * se debe de utilizar de esta manera
 * @param jsonProductos
 * @returns {*|{url, dataSrc}}
 */
function verificacionDeProductos(jsonProductos) {
    var clave = [];
    var cantidad = [];
    var sku = [];
    var claveoSku = [];

    for (var prop in jsonProductos) {
        if (jsonProductos[prop]['clave'] != "eliminado" && jsonProductos[prop]['clave'] != null) {
            clave[prop] = jsonProductos[prop]['clave'];
            cantidad[prop] = jsonProductos[prop]['cantidad'];
            sku[prop] = jsonProductos[prop]['sku'];
            claveoSku[prop] = jsonProductos[prop]['claveoSku'];
            CONTADOR = jsonProductos[prop]['indice'];
            sessionStorage.setItem("contador", CONTADOR);
        }
    }
    var request = {
        clave: clave,
        cantidad: cantidad,
        sku: sku,
        claveoSku: claveoSku
    };
    return $.ajax({
        type: "POST",
        data: JSON.stringify(request),
        contentType: "application/json",
        url: "/postVenta",
        success: function (data) {
            for (var i = 0; i < data.claveResultante.length; i++) {
                CLAVERESULTANTE[i] = data.claveResultante[i];
                NOTIFICACIONES[i] = data.notificaciones[i];
                CANTIDADRESULTANTE[i] = data.cantidadResultante[i];
            }
        },
        error: function (e) {
        }
    })
}

function verificadorExistencias() {
    return $.ajax({
        type: "POST",
        //data: JSON.stringify(request),
        contentType: "application/json",
        url: "/postVentaActualizada",
        success: function (data) {
        },
        error: function (e) {
        }
    })
}
/**
 * Funcion que que verifica si en el arreglo que viene del ajax que se llama notificacion tre faltantes
 * Si trae la palabra faltantes, entonces quiere decir que existe algun registro el cual cambio su existencia y ahora
 * ya no alcansa y debe de ser modificado
 * @param claveResultante
 * @param notificaciones
 * @param cantidadResultante
 * @returns {Array}
 */
function validacionModalCobro(claveResultante, notificaciones, cantidadResultante) {
    var valores = [];
    for (var i = 0; i < notificaciones.length; i++) {
        if (notificaciones[i] == "FALTANTES") {
            valores.push(claveResultante[i]);
            valores.push(cantidadResultante[i])
        }
    }
    return valores
}

function btnCobro() {
    if ($("#total").val() == 0) {
        alert("No hay ningun producto")
    } else {
        $("#recibidoModal").val("");
        $("#cambioModal").val("");
        verificacionDeProductos(REGISTROSENTABLA).done(function (result) {
            CANTIDADRESULTANTE[0] = result.cantidadResultante[0];
            CLAVERESULTANTE[0] = result.claveResultante[0];
            var cobroValido = validacionModalCobro(CLAVERESULTANTE, NOTIFICACIONES, CANTIDADRESULTANTE);
            $("#productosSinExistencia").children("li").remove();
            if (cobroValido.length > 0) {
                var cl = "";
                var ex = "";
                for (var i = 0; i < cobroValido.length; i++) {
                    if (typeof (cobroValido[i]) === "string") {
                        cl = cobroValido[i]
                        $("#productosSinExistencia").append("<li><h2>La clave: " + cobroValido[i] + "</h2></li>")
                    } else {
                        ex = cobroValido[i];
                        $("#productosSinExistencia").append("<li><h2>cuenta con " + cobroValido[i] + " existencias</h2></li>")
                    }
                    if (cl != "" && ex != "") {
                        var filaExistencia = {clave: cl, existencia: ex};
                        PRODUCTOSEXISTENCIAS.push(filaExistencia);
                        cl = "";
                        ex = "";
                    }

                }
                $('#cobroDenegadoModal').modal('show');
            } else {
                $('#cobroModal').modal('show');
                $("#totalModal").val($("#total").val());
                $("#recibidoModal").focus();
            }
        });
        verificadorExistencias().done(function (productosActualizados) {
            productos = productosActualizados;
        })
    }
}

function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toString();
    letras = " 1234567890abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";//Se define todo el abecedario que se quiere que se muestre.
    especiales = [8, 37, 39, 46, 6, 13]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        alert('Tecla no aceptada');
        return false;
    }
}

//Se utiliza para que el campo de texto solo acepte numeros
function SoloNumeros(evt) {
    if (window.event) {//asignamos el valor de la tecla a keynum
        keynum = evt.keyCode; //IE
    }
    else {
        keynum = evt.which; //FF
    }
    //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
    if ((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6) {
        return true;
    }
    else {
        return false;
    }
}

function pdf(tamPDF) {
    var tamPDFTotal = 88;
    if (tamPDF > 4) {
        for (var i = 4; i <= tamPDF; i++) {
            tamPDFTotal = tamPDFTotal + 15;
        }
    }
    var doc = new jsPDF('p', 'mm', [tamPDFTotal, 88]);
    margen = parseInt(7);
    altura = parseInt(10);
    separacion = "===============================================";
    doc.setFontSize(8);
    InsertarPDF(doc, "Producto", 'normal', 0, 'N');
    InsertarPDF(doc, "cantidad", 'normal', 0, 'N');
    InsertarPDF(doc, "Total", 'normal', 70, '');
    for (var i = 1; i < REGISTROSENTABLA.length; i++) {
        InsertarPDF(doc, separacion, 'normal', 0, 'N');
        InsertarPDF(doc, REGISTROSENTABLA[i].descripcion, 'normal', 0, 'N');
        InsertarPDF(doc, REGISTROSENTABLA[i].cantidad + " " + REGISTROSENTABLA[i].unidadMed, 'normal', 0, 'N');
        InsertarPDF(doc, REGISTROSENTABLA[i].precio + " Precio/Uni", 'normal', 20, '');
        InsertarPDF(doc, REGISTROSENTABLA[i].importe, 'normal', 70, '');
        InsertarPDF(doc, separacion, 'normal', 0, 'N');
    }

    //Esto hace que se ponga en una pagina nueva
    var string = doc.output('datauristring');
    var win = window.open();
    win.document.write('<iframe width="100%" height="100%" src="' + string + '" frameborder="0"></iframe>');
}

/*********************************************************************************************************
 *                FUNCION PARA INSERTAR TEXTO EN PDF
 *********************************************************************************************************/
function InsertarPDF(doc, text, tipoletra, posicion, linea) {
    if (linea == 'N') {
        altura = parseInt(altura) + parseInt(4)
    }
    doc.setFontType(tipoletra);
    doc.text(parseInt(margen) + parseInt(posicion), altura, text)
}

function actualizarExistencias(existenciaActualizada) {
    var clave = existenciaActualizada['clave'];
    var cantidad = existenciaActualizada['cantidad']

    var request = {
        clave: clave,
        cantidad: cantidad
    };
    return $.ajax({
        type: "POST",
        data: JSON.stringify(request),
        contentType: "application/json",
        url: "/actualizacionExistencias",
        success: function (data) {

        },
        error: function (e) {
        }
    })
}