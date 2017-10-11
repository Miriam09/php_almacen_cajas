<?php

// include_once "../MODELO/Estanteria.php";
include_once "ConexionBD.php";
include "../EXCEPCIONES/ExcepcionCodigoCaja.php";
include "../EXCEPCIONES/ExcepcionEstanteria.php";

class Operaciones {

    //Metodo para añadir estanterias a la base de datos
    public static function addEstanteria($_ObjEstanteria) {
        //si lo pongo fuera es que cada vez que intente hacer un objeto de la clase operaciones va a incluir todos.
        //ahi es donde de los errores de duplicados.
        //No se necesita el include porqe el objeto al pasarlo en addEstanteria pasa el tipo de objeto?????
        global $conexion;
        $MATERIAL = $_ObjEstanteria->getMaterial();
        $NUMLEJAS = $_ObjEstanteria->getNumLejas();
        $PASILLO = $_ObjEstanteria->getPasillo();
        $NUMESTANTERIA = $_ObjEstanteria->getNumEstanteria();

            $sql = "INSERT INTO ESTANTERIA (NUMERO_LEJAS, MATERIAL, PASILLO, NUMERO_ESTANTERIA)VALUES('$NUMLEJAS','$MATERIAL','$PASILLO','$NUMESTANTERIA')";
            if ($conexion->query($sql) === true) {
//            echo "Introducido correctamente";
                return true;
            } else {
                return false;
            }
        
       }
  
    
public static function mostrarEstanteriasPosicion($_pasillo, $numero){
     global $conexion;
        $instruccion = "SELECT * FROM ESTANTERIA where PASILLO = '$_pasillo' AND NUMERO_ESTANTERIA = $numero";
        $consulta = $conexion->query($instruccion)
                 or die("Instruccion no válida");

        //sacamos los resultados
        if ($consulta) {
             $nfilas = mysqli_num_rows($consulta);

            if ($nfilas > 0) {
                $fila = $consulta->fetch_array();
                if ($fila) {
                    $mensaje = $_pasillo . "-" . $numero;
                    throw new ExcepcionEstanteria($mensaje, 1);
                } else{
                    return false;
                }
                
            } else {
                return false;
            }
        }
}
//Muestra las estanterias 
    public static function mostrarEstanterias() {
        global $conexion;
        $arrayMostrar = array();
        $instruccion = "SELECT * FROM ESTANTERIA";
        $consulta = $conexion->query($instruccion)
                or die("Instruccion no válida");

        //sacamos los resultados
        if ($consulta) {
            $nfilas = mysqli_num_rows($consulta);

            if ($nfilas > 0) {

                $fila = $consulta->fetch_array();
                while ($fila) {
                    $Cod = $fila['CODIGO_ESTANTERIA'];
                    $material = $fila['MATERIAL'];
                    $pasillo = $fila['PASILLO'];
                    $num_estanteria = $fila['NUMERO_ESTANTERIA'];
                    $lejas = $fila['NUMERO_LEJAS'];
                    $lejas_ocupadas = $fila['NUMERO_LEJAS_OCUPADAS'];

                    $ObjEstanteria = new Estanteria($material, $lejas, $pasillo, $num_estanteria);
                    $ObjEstanteria->setLejasOcupadas($lejas_ocupadas);
                    $ObjEstanteria->setCodEstanteria($Cod);

                    $arrayMostrar[] = $ObjEstanteria;
                    $fila = $consulta->fetch_array();
                }
                return $arrayMostrar;
            } else {
                echo "No hay datos";
            }
            $conexion->close();
        }
    }

    //Metodo que me añade una caja depnediendo del tipo de caja que se le pase,
    //y pasandole un objeto ocupacion con los datos del formulario (Codigo estanteria y leja) para saber en que estanteria y leja se encuentra.
    //Actualiza la tabla estanteria sumandole una a las lejas ocupadas.
    //Inserte en ocupacion lejas una fila con el codigo de la caja, la leja, el codigo de la caja y el tipo
    public static function addCaja($ObjCaja, $ObjOcupacion) {
        $ALTURA = $ObjCaja->getAltura();
        $ANCHURA = $ObjCaja->getAnchura();
        $PROFUNDIDAD = $ObjCaja->getProfundidad();
        $COLOR = $ObjCaja->getColor();
        $COD_ESTANTERIA = $ObjOcupacion->getEstanteria();
        $NUM_LEJA = $ObjOcupacion->getLeja();
        $FECHA_ENTRADA = date("Y-m-d");

        global $conexion;

        $tipo = get_class($ObjCaja);
        $conexion->autocommit(false);
        $Hecho = true;
        switch ($tipo) {
            case "CajaSorpresa":
                $CONTENIDO = $ObjCaja->getContenido();
                $sql = "INSERT INTO CAJASORPRESA (ALTURA, ANCHURA, PROFUNDIDAD, CONTENIDO, COLOR, FECHA_ENTRADA) VALUES('$ALTURA','$ANCHURA','$PROFUNDIDAD','$CONTENIDO','$COLOR','$FECHA_ENTRADA')";
                break;
            case "CajaNegra":
                $PLACA = $ObjCaja->getPlaca();
                $sql = "INSERT INTO CAJANEGRA (ALTURA, ANCHURA, PROFUNDIDAD, PLACA, COLOR, FECHA_ENTRADA) VALUES('$ALTURA','$ANCHURA','$PROFUNDIDAD','$PLACA','$COLOR','$FECHA_ENTRADA')";
                break;
            case "CajaFuerte":
                $CLAVE = $ObjCaja->getClaveDesbloqueo();
                $sql = "INSERT INTO CAJAFUERTE (ALTURA, ANCHURA, PROFUNDIDAD, CLAVE_DESBLOQUEO, COLOR, FECHA_ENTRADA) VALUES('$ALTURA','$ANCHURA','$PROFUNDIDAD','$CLAVE','$COLOR','$FECHA_ENTRADA')";
                break;
        }
        if ($conexion->query($sql) === true) {
            echo "Introducido correctamente";
            $caja_id = $conexion->insert_id;
        } else {
            $Hecho = false;
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
//       
        $sqlUpdate = "UPDATE ESTANTERIA SET NUMERO_LEJAS_OCUPADAS=(NUMERO_LEJAS_OCUPADAS+1) WHERE CODIGO_ESTANTERIA = $COD_ESTANTERIA";
        if ($conexion->query($sqlUpdate) === true) {
            echo "Introducido correctamente";
        } else {
            $Hecho = false;
            echo "Error: " . $sqlUpdate . "<br>" . $conexion->error;
        }

        $sqlINSERT = "INSERT INTO OCUPACION_LEJAS (COD_ESTANTERIA, LEJA, CAJA, TIPO)VALUES('$COD_ESTANTERIA','$NUM_LEJA','$caja_id','$tipo' )";
        if ($conexion->query($sqlINSERT) === true) {
            $ObjOcupacion->setCaja($caja_id);
            $ObjOcupacion->setTipo($tipo);
            echo "Introducido correctamente";
        } else {
            $Hecho = false;
            echo "Error: " . $sqlINSERT . "<br>" . $conexion->error;
        }

        if ($Hecho == true) {
            $conexion->commit();
            return true;
            //echo "Cambios realizados correctamente";
            //header('Location:../VISTA/FormularioCaja.php');
        } else {
            $conexion->rollback();
            return false;
            // echo "No se han podido realizar los cambios";
        }

        $conexion->autocommit(true);
        $conexion->close();
    }

//devuelve un array con las estanterias que tiene alguna leja libre para mostrarlo en el formularioCajas en el select de las estanterias.
    public static function mostrarEstanteriasLibres() {
        global $conexion;
        $arrayMostrar = array();
        $instruccion = "SELECT * FROM ESTANTERIA WHERE (NUMERO_LEJAS - NUMERO_LEJAS_OCUPADAS)>0";
        $consulta = $conexion->query($instruccion)
                or die("Instruccion no válida");

        //sacamos los resultados
        if ($consulta) {
            $nfilas = mysqli_num_rows($consulta);
            if ($nfilas > 0) {
                $fila = $consulta->fetch_array();
                while ($fila) {
                    $Cod = $fila['CODIGO_ESTANTERIA'];
                    $material = $fila['MATERIAL'];
                    $pasillo = $fila['PASILLO'];
                    $num_estanteria = $fila['NUMERO_ESTANTERIA'];
                    $lejas = $fila['NUMERO_LEJAS'];
                    $lejas_ocupadas = $fila['NUMERO_LEJAS_OCUPADAS'];

                    $ObjEstanteria = new Estanteria($material, $lejas, $pasillo, $num_estanteria);
                    $ObjEstanteria->setLejasOcupadas($lejas_ocupadas);
                    $ObjEstanteria->setCodEstanteria($Cod);

                    $arrayMostrar[] = $ObjEstanteria;
                    $fila = $consulta->fetch_array();
                }
                return $arrayMostrar;
            } else {
                echo "No hay datos";
            }
            $conexion->close();
        }
    }

    //Devuelve un array con todas las lejas ocupadas y la caja que la ocupa de la tabla Ocupacion_Lejas.
    //Si no hay una estanteria en la tabla con ese codigo tambien lo devuelve.
    public static function LejasOcupadas($_CodEstanteria) {
        global $conexion;

        $instruccion = "SELECT LEJA FROM OCUPACION_LEJAS WHERE COD_ESTANTERIA = $_CodEstanteria";
        $consulta = $conexion->query($instruccion)
                or die("Instrucción no válida");
        $ocupadas = array();
        if ($consulta) {
            $nfilas = mysqli_num_rows($consulta);
            if ($nfilas > 0) {
                $fila = $consulta->fetch_array();
                while ($fila) {
                    // $leja=$fila['LEJA'];
                    $leja = $fila['LEJA'];
                    //guarda en ocupadas el valor de leja
                    $ocupadas[] = $leja;
                    $fila = $consulta->fetch_array();
                }
                return $ocupadas;
            } else {
                return $ocupadas;
            }
            $conexion->close();
        }
    }

    //Devuelve el numero total del lejas de la estanteria que coincida con el codigo que se le pasa.
    public static function LejasTotales($_CodEstanteria) {
        global $conexion;

        $sql = "SELECT NUMERO_LEJAS FROM ESTANTERIA WHERE CODIGO_ESTANTERIA = $_CodEstanteria";
        $consulta = $conexion->query($sql)
                or die("Instrucción no válida");

        if ($consulta) {
            $nfilas = mysqli_num_rows($consulta);
            if ($nfilas > 0) {
                $fila = $consulta->fetch_array();

                $lejas = $fila['NUMERO_LEJAS'];
                return $lejas;
            }
            $conexion->close();
        }
    }

    //Calcula que lejas estan libres y cuales ocupadas.
    //Llama a la function LejasOcupadas, pasandole el codigo de la estanteria, y guardando el resultado en el array ocupadas.
    //Llama al metodo LejasTotales, pasandole el codigo de la estanteria y guardando el resultado en lejasTotales.
    //Llama al metodo LejasLibres, pasandole el codigo de la estanteria y guardadno el resultado en lejasLibres.
    public static function LejasLibresEstanteria($Cod_Estanteria) {
        $ocupadas = Operaciones::LejasOcupadas($Cod_Estanteria);
        //print_r($ocupadas);
        $lejasTotales = Operaciones::LejasTotales($Cod_Estanteria);

        // print_r($lejasLibres);
        $libres = array();

        for ($i = 1; $i <= $lejasTotales; $i++) {
            $libres[$i] = $i;
        }

        //Si las lejas libres son igual a las lejas totales, quiere deicr que la estanteria esta vacia. por lo que guarda en el array libres
        //todos los indices de lejas totales. --> lejastotales = 6 > libres=[1][2][3][4][5][6]
        //si no son iguales es que alguna leja esta ocupada, el procedimiento es igual que el anterior, pero cuando pasa por la posicion de ocupadas que 
        //contiene algun valor, Coloca una F en la posicion correspondiente indicado que esa posicion esta ocupada. (Uso la F para poder distintiguir
        ////de forma facil cual esta ocupada y cual no, comparando luego que si contiene un numero esta libre.
        //ocupadas[2][5] -> libres[1][F}[3][4][F]
        for ($i = 0; $i < count($ocupadas); $i++) {
            $libres[$ocupadas[$i]] = "F";
        }


        return $libres;
    }

//Metodo para mostrar las cajas, devuelve un array con las cajas del tipo que se le pasa.
    public static function mostrarCajas($CAJA) {
        global $conexion;
        $arrayCaja = array();
        $instruccion = "SELECT * FROM $CAJA";
        $consulta = $conexion->query($instruccion)
                or die("Instruccion no válida");

        //sacamos los resultados
        if ($consulta) {
            $nfilas = mysqli_num_rows($consulta);
            if ($nfilas > 0) {
                $fila = $consulta->fetch_array();
                while ($fila) {
                    $altura = $fila['ALTURA'];
                    $anchura = $fila['ANCHURA'];
                    $profundidad = $fila['PROFUNDIDAD'];
                    $color = $fila['COLOR'];
                    $fecha_entrada = $fila['FECHA_ENTRADA'];
                    switch ($CAJA) {
                        case "CAJA_SORPRESA":
                            $cod = $fila['CODIGO'];
                            $contenido = $fila['CONTENIDO'];
                            $ObjCajaSorpresa = new CajaSorpresa($altura, $anchura, $profundidad, $contenido, $color);
                            $ObjCajaSorpresa->setCodigo($cod);
                            $ObjCajaSorpresa->setFechaEntrada($fecha_entrada);
                            $arrayCaja[] = $ObjCajaSorpresa;
                            $fila = $consulta->fetch_array();
                            break;
                        case "CAJA_NEGRA":
                            $cod = $fila['CODIGO'];
                            $placa = $fila['PLACA'];
                            $ObjCajaNegra = new CajaNegra($altura, $anchura, $profundidad, $placa, $color);
                            $ObjCajaNegra->setCodigo($cod);
                            $ObjCajaNegra->setFechaEntrada($fecha_entrada);
                            $arrayCaja[] = $ObjCajaNegra;
                            $fila = $consulta->fetch_array();
                            break;
                        case "CAJA_FUERTE":
                            $cod = $fila['CODIGO'];
                            $clave = $fila['CLAVE_DESBLOQUEO'];
                            $ObjCajaFuerte = new CajaFuerte($altura, $anchura, $profundidad, $clave, $color);
                            $ObjCajaFuerte->setCodigo($cod);
                            $ObjCajaFuerte->setFechaEntrada($fecha_entrada);
                            $arrayCaja[] = $ObjCajaFuerte;
                            $fila = $consulta->fetch_array();
                            break;
                    }
                }
                return $arrayCaja;
            } else {
                echo "No hay datos";
            }
            $conexion->close();
        }
    }

//Ordenamos las estanterias por pasillo y numero para luego mostrarlas en el inventario.
    //Devolvemos el array de las estanterias ya ordenadas
    public static function ordenarEstanteriasCajas() {
        global $conexion;
        $instruccion = "SELECT * FROM ESTANTERIA WHERE NUMERO_LEJAS_OCUPADAS > 0 order by PASILLO, NUMERO_ESTANTERIA ";
        $consulta = $conexion->query($instruccion)
                or die("Instruccion no válida");

        //sacamos los resultados
        if ($consulta) {
            $nfilas = mysqli_num_rows($consulta);
            if ($nfilas > 0) {
                $fila = $consulta->fetch_array();
                while ($fila) {
                    $Cod = $fila['CODIGO_ESTANTERIA'];
                    $material = $fila['MATERIAL'];
                    $pasillo = $fila['PASILLO'];
                    $num_estanteria = $fila['NUMERO_ESTANTERIA'];
                    $lejas = $fila['NUMERO_LEJAS'];
                    $lejas_ocupadas = $fila['NUMERO_LEJAS_OCUPADAS'];

                    $ObjEstanteria = new Estanteria($material, $lejas, $pasillo, $num_estanteria);
                    $ObjEstanteria->setLejasOcupadas($lejas_ocupadas);
                    $ObjEstanteria->setCodEstanteria($Cod);

                    $ArrayEstanteria[] = $ObjEstanteria;
                    $fila = $consulta->fetch_array();
                }

                return $ArrayEstanteria;
            } else {
                echo "No hay datos";
            }
        }
    }

    //Devuelve un array con objetos ocupacion, un objeto por leja ocupada.
    //Sacamos el codigo de la estanteria del objeto que recive.
    //sacamos los datos de la tabla ocupacion que coincidan con el codigo de la estanteria, y lo ordenamos por leja.
    public static function OcupacionCajas($ESTANTERIA) {
        global $conexion;
        $arrayOcupacion = array();
        $CODIGOE = $ESTANTERIA->getCodEstanteria();
        $sqlOcupacion = "SELECT * FROM OCUPACION_LEJAS WHERE COD_ESTANTERIA = $CODIGOE order by LEJA";
        $consultaO = $conexion->query($sqlOcupacion)
                or die("Instruccion no válida " . $sqlOcupacion);
        if ($consultaO) {
            $nfilas = mysqli_num_rows($consultaO);
            if ($nfilas > 0) {
                $fila = $consultaO->fetch_array();
                while ($fila) {
                    $estanteria = $fila['COD_ESTANTERIA'];
                    $leja = $fila['LEJA'];
                    $caja = $fila['CAJA'];
                    $tipo = $fila['TIPO'];
                    $ObjOcupacion = new Ocupacion($estanteria, $leja);
                    $ObjOcupacion->setCaja($caja);
                    $ObjOcupacion->setTipo($tipo);
                    $arrayOcupacion[] = $ObjOcupacion;
                    //print_r($arrayOcupacion);
                    $fila = $consultaO->fetch_array();
                }
            }
            //print_r($arrayOcupacion);
            return $arrayOcupacion;
        }
    }

//Añadimos las cajas a un array que sera el array de la clase EstanteriaCajas.
//Recive un objeto estanteria.
    //LLama a la funcion OcupacionCajas pasandole el objeto esanteria que recive en su llamada y lo guarda en el array $ocupacion, que sera un array de objetos ocupacion

    public static function añadirCajasEstanteria($estanteria) {
        $ocupacion = Operaciones::OcupacionCajas($estanteria);
        //sacamos los resultados
        $Estanteria = array();
        //Hacemos un foreach de ocupacion para sacar en cada vuelta el tipo de caja, la leja en la que se encuentra y su codigo.
        foreach ($ocupacion as $leja) {
            $tipo = $leja->getTipo();
            //dependiendo del tipo de la caja:
            //guarda en el array Estanteria y la posicion correspondiente dependiendo del valor de la leja sacado del objeto ocupacion
            // el resultado de añadircajaestanteria, pasandole el tipo de la caja y el codigo de la caja.
            //Asi las cajas van ordenadas por numero de leja.
            $Estanteria[$leja->getLeja()] = Operaciones::añadirCajaEstanteria($tipo, $leja->getCaja());
        }

        //Crea un objeto estanteria cajas pasandole los valores del objeto estanteria que este metodo recibe en su llamada y ademas añadiendo el aaray 
        //Estanteria creado con las cajas.
        $EstanCajas = new EstanteriaCajas($estanteria->getMaterial(), $estanteria->getNumLejas(), $estanteria->getPasillo(), $estanteria->getNumEstanteria(), $Estanteria);
        $EstanCajas->setCodEstanteria($estanteria->getCodEstanteria());
        $EstanCajas->setLejasOcupadas($estanteria->getLejasOcupadas());
//        //print_r($EstanCajas);
        return $EstanCajas;
    }

//Metodo que recibe el tipo de la caja y el codigo de la caja, con el que hacemos una cosnulta de caja, 
//dependiendo del tipo y que el codigo coincida con el codigo de caja pasado en la llamada.
//Hace un switch dependiendo del tipo que sea, crea el objeto de la caja y lo devuelve.
//Hay un return y una comprobacion de que haya filas en cada switch 
    public static function añadirCajaEstanteria($tipo, $codigoCaja) {
        global $conexion;
        $sqlCajas = "SELECT * FROM $tipo WHERE CODIGO = $codigoCaja";
        $consultaC = $conexion->query($sqlCajas)
                or die("Instruccion no válida " . $sqlCajas);
        if ($consultaC) {
            $nfilas = mysqli_num_rows($consultaC);

            $fila = $consultaC->fetch_array();
            while ($fila) {
                switch ($tipo) {
                    case 'CajaSorpresa':
                        if ($nfilas > 0) {
                            $altura = $fila['ALTURA'];
                            $anchura = $fila['ANCHURA'];
                            $profundidad = $fila['PROFUNDIDAD'];
                            $color = $fila['COLOR'];
                            $fecha_entrada = $fila['FECHA_ENTRADA'];
                            $cod = $fila['CODIGO'];
                            $contenido = $fila['CONTENIDO'];
                            $ObjCajaSorpresa = new CajaSorpresa($altura, $anchura, $profundidad, $contenido, $color);
                            $ObjCajaSorpresa->setCodigo($cod);
                            $ObjCajaSorpresa->setFechaEntrada($fecha_entrada);
                            $fila = $consultaC->fetch_array();
                            return $ObjCajaSorpresa;
                        }

                        break;

                    case 'CajaNegra':
                        if ($nfilas > 0) {
                            $altura = $fila['ALTURA'];
                            $anchura = $fila['ANCHURA'];
                            $profundidad = $fila['PROFUNDIDAD'];
                            $color = $fila['COLOR'];
                            $fecha_entrada = $fila['FECHA_ENTRADA'];
                            $cod = $fila['CODIGO'];
                            $placa = $fila['PLACA'];
                            $ObjCajaNegra = new CajaNegra($altura, $anchura, $profundidad, $placa, $color);
                            $ObjCajaNegra->setCodigo($cod);
                            $ObjCajaNegra->setFechaEntrada($fecha_entrada);
                            $fila = $consultaC->fetch_array();
                            return $ObjCajaNegra;
                        }

                        break;
                    case 'CajaFuerte':
                        if ($nfilas > 0) {
                            $altura = $fila['ALTURA'];
                            $anchura = $fila['ANCHURA'];
                            $profundidad = $fila['PROFUNDIDAD'];
                            $color = $fila['COLOR'];
                            $fecha_entrada = $fila['FECHA_ENTRADA'];
                            $cod = $fila['CODIGO'];
                            $clave = $fila['CLAVE_DESBLOQUEO'];
                            $ObjCajaFuerte = new CajaFuerte($altura, $anchura, $profundidad, $clave, $color);
                            $ObjCajaFuerte->setCodigo($cod);
                            $ObjCajaFuerte->setFechaEntrada($fecha_entrada);
                            $fila = $consultaC->fetch_array();
                            return $ObjCajaFuerte;
                        }
                        break;
                }
            }
        }
    }

//Metodo que crea el objeto inventario y lo devuelve, es el que sera llamado en el controlador de la vista inventario.
//Llama al metodo ordenarEstanteriasCajas para recibir el array con als estanterias y lo guarda en el array estanteriaC
//Creamos el array que contendra todo el inventario.
//Hacemos un foreach de estanteriaC guardando en el array del inventario el resultado de la llamada a añadirCajasEstanteria
//pasandole el objeto estanteria del foreach.
//en cada vuelta manda uno los metodos anteriores encadenados se encargan de usar el objeto.
//creamos un nuevo inventario pasandole como parametro al constructor el array creado y devolvemos el inventario
    public static function nuevoInventario() {

        $estanteriaC = Operaciones::ordenarEstanteriasCajas();
        $ESTINV = array();
        //$i = 0;
        foreach ($estanteriaC as $estanteria) {
            $ESTINV[] = Operaciones::añadirCajasEstanteria($estanteria);
        }
        $inventario = new Inventario($ESTINV);
//print_r($ESTINV);
        return $inventario;
    }

    public static function comprobarSacarCaja($codigo, $tipo) {
        global $conexion;
        switch ($tipo) {
            case "CajaSorpresa":
                $sql = "SELECT * FROM OCUPACION_LEJAS WHERE CAJA= $codigo AND TIPO='CajaSorpresa'";
                break;
            case "CajaNegra":
                $sql = "SELECT * FROM OCUPACION_LEJAS WHERE CAJA= $codigo AND TIPO='CajaNegra'";
                break;
            case "CajaFuerte":
                $sql = "SELECT * FROM OCUPACION_LEJAS WHERE CAJA= $codigo AND TIPO='CajaFuerte'";
                break;
        }

        $consulta = $conexion->query($sql)
                or die("Instrucción no válida " . $sql);
        if ($consulta) {
            
        }
    }

    public function codigoCajas($tipo) {
        global $conexion;
        $sqlCajas = "SELECT * FROM $tipo";
        $consultaC = $conexion->query($sqlCajas)
                or die("Instruccion no válida " . $sqlCajas);
        if ($consultaC) {
            $fila = $consultaC->fetch_array();
            while ($fila) {
                $altura = $fila['ALTURA'];
                $anchura = $fila['ANCHURA'];
                $profundidad = $fila['PROFUNDIDAD'];
                $color = $fila['COLOR'];
                $fecha_entrada = $fila['FECHA_ENTRADA'];
                switch ($tipo) {
                    case "CajaSorpresa":
                        $cod = $fila['CODIGO'];
                        $contenido = $fila['CONTENIDO'];
                        $ObjCajaSorpresa = new CajaSorpresa($altura, $anchura, $profundidad, $contenido, $color);
                        $ObjCajaSorpresa->setCodigo($cod);
                        $ObjCajaSorpresa->setFechaEntrada($fecha_entrada);
                        $arrayCaja[] = $ObjCajaSorpresa;
                        $fila = $consultaC->fetch_array();
                        break;
                    case "CajaNegra":
                        $cod = $fila['CODIGO'];
                        $placa = $fila['PLACA'];
                        $ObjCajaNegra = new CajaNegra($altura, $anchura, $profundidad, $placa, $color);
                        $ObjCajaNegra->setCodigo($cod);
                        $ObjCajaNegra->setFechaEntrada($fecha_entrada);
                        $arrayCaja[] = $ObjCajaNegra;
                        $fila = $consultaC->fetch_array();
                        break;
                    case "CajaFuerte":
                        $cod = $fila['CODIGO'];
                        $clave = $fila['CLAVE_DESBLOQUEO'];
                        $ObjCajaFuerte = new CajaFuerte($altura, $anchura, $profundidad, $clave, $color);
                        $ObjCajaFuerte->setCodigo($cod);
                        $ObjCajaFuerte->setFechaEntrada($fecha_entrada);
                        $arrayCaja[] = $ObjCajaFuerte;
                        $fila = $consultaC->fetch_array();
                        break;
                }
            }
            return $arrayCaja;
        } else {
            echo "No hay datos";
        }
    }

    public static function backupCajas($tipoCaja, $codigo) {
        global $conexion;
        switch ($tipoCaja) {
            case "CajaSorpresa":
                $sqlOcupacion = "SELECT * FROM OCUPACION_LEJAS WHERE CAJA= $codigo AND TIPO='CajaSorpresa'";
                break;
            case "CajaNegra":
                $sqlOcupacion = "SELECT * FROM OCUPACION_LEJAS WHERE CAJA= $codigo AND TIPO='CajaNegra'";
                break;
            case "CajaFuerte":
                $sqlOcupacion = "SELECT * FROM OCUPACION_LEJAS WHERE CAJA= $codigo AND TIPO='CajaFuerte'";
                break;
        }
//        $sqlOcupacion = "SELECT * FROM OCUPACION_LEJAS WHERE TIPO= $tipoCaja AND CAJA=$codigo" ;

        $consulta = $conexion->query($sqlOcupacion);
        if ($consulta) {
            $fila = $consulta->fetch_array();
            if ($fila) {
                $Estanteria = $fila['COD_ESTANTERIA'];
                $leja = $fila['LEJA'];
                $TipoCaja = $fila['TIPO'];
                $ObjOcupacion = new Ocupacion($Estanteria, $leja);
                $ObjOcupacion->setCaja($codigo);
                $ObjOcupacion->setTipo($TipoCaja);
                return $ObjOcupacion;
            } else {
                throw new ExcepcionCodigoCaja($tipoCaja, 1);
            }
        } else {
            throw new ExcepcionCodigoCaja($tipoCaja, 1);
        }
    }

    public static function sacarCaja($codigo, $tipo) {
        global $conexion;
        $sql = "DELETE FROM $tipo WHERE CODIGO=$codigo";
        $consulta = $conexion->query($sql);
        if ($consulta) {
            //echo "La caja ha salido con éxito";

            return true;
        } else {
            // echo "Error al sacar la caja";
            return false;
        }
    }

    public static function codigoCajasBackUp($tipo) {
        switch ($tipo) {
            case "CajaSorpresa":
                $nombreTabla = "BackupSorpresa";
                break;
            case "CajaNegra":
                $nombreTabla = "BackupNegra";
                break;
            case "CajaFuerte":
                $nombreTabla = "BackupFuerte";
                break;
        }
        global $conexion;

        $sql = "SELECT * FROM $nombreTabla";
        $consulta = $conexion->query($sql)
                or die("Instruccion no válida " . $sql);
        if ($consulta) {
            $fila = $consulta->fetch_array();
            while ($fila) {
                $altura = $fila['ALTURA'];
                $anchura = $fila['ANCHURA'];
                $profundidad = $fila['PROFUNDIDAD'];
                $color = $fila['COLOR'];
                $fecha_entrada = $fila['FECHA_ENTRADA'];
                $cod = $fila['CODIGO'];
                $fecha_salida = $fila['FECHA_SALIDA'];
                $estanteria = $fila['ESTANTERIA'];
                $leja = $fila['LEJA'];
                switch ($tipo) {
                    case "CajaSorpresa":
                        $contenido = $fila['CONTENIDO'];
                        $ObjCajaSorpresa = new CajaSorpresa($altura, $anchura, $profundidad, $contenido, $color);
                        $ObjCajaSorpresa->setCodigo($cod);
                        $ObjCajaSorpresa->setFechaEntrada($fecha_entrada);
                        $ObjBackupSorpresa = new BackupSorpresa($ObjCajaSorpresa, $estanteria, $leja);
                        $ObjBackupSorpresa->setFecha_salida($fecha_salida);
                        $arrayCaja[] = $ObjBackupSorpresa;
                        $fila = $consulta->fetch_array();
                        break;
                    case "CajaNegra":
                        $placa = $fila['PLACA'];
                        $ObjCajaNegra = new CajaNegra($altura, $anchura, $profundidad, $placa, $color);
                        $ObjCajaNegra->setCodigo($cod);
                        $ObjCajaNegra->setFechaEntrada($fecha_entrada);
                        $ObjBackupNegra = new BackupNegra($ObjCajaNegra, $estanteria, $leja);
                        $ObjBackupNegra->setFecha_salida($fecha_salida);
                        $arrayCaja[] = $ObjBackupNegra;
                        $fila = $consulta->fetch_array();
                        break;
                    case "CajaFuerte":
                        $clave = $fila['CLAVE_DESBLOQUEO'];
                        $ObjCajaFuerte = new CajaFuerte($altura, $anchura, $profundidad, $clave, $color);
                        $ObjCajaFuerte->setCodigo($cod);
                        $ObjCajaFuerte->setFechaEntrada($fecha_entrada);
                        $ObjBackupFuerte = new BackupFuerte($ObjCajaFuerte, $estanteria, $leja);
                        $ObjBackupFuerte->setFecha_salida($fecha_salida);
                        $arrayCaja[] = $ObjBackupFuerte;
                        $fila = $consulta->fetch_array();
                        break;
                }
            }
            return $arrayCaja;
        } else {
            echo "No hay datos";
        }
    }

    public static function DevolverbackupCajas($codigo, $tipo) {
        switch ($tipo) {
            case "CajaSorpresa":
                $nombreTabla = "BackupSorpresa";
                break;
            case "CajaNegra":
                $nombreTabla = "BackupNegra";
                break;
            case "CajaFuerte":
                $nombreTabla = "BackupFuerte";
                break;
        }
        global $conexion;

        $sql = "SELECT * FROM $nombreTabla where CODIGO=$codigo";
        $consulta = $conexion->query($sql)
                or die("Instruccion no válida " . $sql);
        if ($consulta) {
            $fila = $consulta->fetch_array();
            while ($fila) {
                $altura = $fila['ALTURA'];
                $anchura = $fila['ANCHURA'];
                $profundidad = $fila['PROFUNDIDAD'];
                $color = $fila['COLOR'];
                $fecha_entrada = $fila['FECHA_ENTRADA'];
                $cod = $fila['CODIGO'];
                $fecha_salida = $fila['FECHA_SALIDA'];
                $estanteria = $fila['ESTANTERIA'];
                $leja = $fila['LEJA'];
                switch ($tipo) {
                    case "CajaSorpresa":
                        $contenido = $fila['CONTENIDO'];
                        $ObjCajaSorpresa = new CajaSorpresa($altura, $anchura, $profundidad, $contenido, $color);
                        $ObjCajaSorpresa->setCodigo($cod);
                        $ObjCajaSorpresa->setFechaEntrada($fecha_entrada);
                        $ObjBackupSorpresa = new BackupSorpresa($ObjCajaSorpresa, $estanteria, $leja);
                        $ObjBackupSorpresa->setFecha_salida($fecha_salida);
                        $Caja = $ObjBackupSorpresa;
                        $fila = $consulta->fetch_array();
                        break;
                    case "CajaNegra":
                        $placa = $fila['PLACA'];
                        $ObjCajaNegra = new CajaNegra($altura, $anchura, $profundidad, $placa, $color);
                        $ObjCajaNegra->setCodigo($cod);
                        $ObjCajaNegra->setFechaEntrada($fecha_entrada);
                        $ObjBackupNegra = new BackupNegra($ObjCajaNegra, $estanteria, $leja);
                        $ObjBackupNegra->setFecha_salida($fecha_salida);
                        $Caja = $ObjBackupNegra;
                        $fila = $consulta->fetch_array();
                        break;
                    case "CajaFuerte":
                        $clave = $fila['CLAVE_DESBLOQUEO'];
                        $ObjCajaFuerte = new CajaFuerte($altura, $anchura, $profundidad, $clave, $color);
                        $ObjCajaFuerte->setCodigo($cod);
                        $ObjCajaFuerte->setFechaEntrada($fecha_entrada);
                        $ObjBackupFuerte = new BackupFuerte($ObjCajaFuerte, $estanteria, $leja);
                        $ObjBackupFuerte->setFecha_salida($fecha_salida);
                        $Caja = $ObjBackupFuerte;
                        $fila = $consulta->fetch_array();
                        break;
                }
            }
            return $Caja;
        } else {
            echo "No hay datos";
        }
    }

    public static function addCajaDevolucion($ObjCaja, $ObjOcupacion) {
        $ALTURA = $ObjCaja->getAltura();
        $ANCHURA = $ObjCaja->getAnchura();
        $PROFUNDIDAD = $ObjCaja->getProfundidad();
        $COLOR = $ObjCaja->getColor();
        $CODIGO = $ObjCaja->getCodigo();
        $COD_ESTANTERIA = $ObjOcupacion->getEstanteria();
        $NUM_LEJA = $ObjOcupacion->getLeja();
        $FECHA_ENTRADA = date("Y-m-d");

        global $conexion;

        $tipo = get_class($ObjCaja);
        $conexion->autocommit(false);
        $Hecho = true;
        switch ($tipo) {
            case "CajaSorpresa":
                $CONTENIDO = $ObjCaja->getContenido();
                $NOMBREBACKUP = "BackupSorpresa";
                $sqlTRIGGERBorrar = "DROP TRIGGER IF EXISTS backupsorpresa_before_delete";
                $conexion->query($sqlTRIGGERBorrar)
                        or die("Instruccion no válida " . $sqlTRIGGERBorrar);
                $sqlTRIGGER = "CREATE TRIGGER backupsorpresa_before_delete BEFORE DELETE ON BackupSorpresa FOR EACH ROW BEGIN
            UPDATE ESTANTERIA SET NUMERO_LEJAS_OCUPADAS=(NUMERO_LEJAS_OCUPADAS+1) WHERE CODIGO_ESTANTERIA = $COD_ESTANTERIA;
            INSERT INTO OCUPACION_LEJAS (COD_ESTANTERIA, LEJA, CAJA, TIPO)VALUES($COD_ESTANTERIA,$NUM_LEJA,$CODIGO,'$tipo');
            INSERT INTO CAJASORPRESA (CODIGO, ALTURA, ANCHURA, PROFUNDIDAD, CONTENIDO, COLOR, FECHA_ENTRADA) VALUES($CODIGO,$ALTURA,$ANCHURA,$PROFUNDIDAD,'$CONTENIDO','$COLOR','$FECHA_ENTRADA');
         END";
                $conexion->query($sqlTRIGGER)
                        or die("Instruccion no válida " . $sqlTRIGGER);


                $sql = "DELETE FROM $NOMBREBACKUP WHERE CODIGO=$CODIGO";

                break;
            case "CajaNegra":
                $NOMBREBACKUP = "BackupSorpresa";
                $PLACA = $ObjCaja->getPlaca();
                $sqlTRIGGERBorrar = "DROP TRIGGER IF EXISTS backupnegra_before_delete";
                $conexion->query($sqlTRIGGERBorrar)
                        or die("Instruccion no válida " . $sqlTRIGGERBorrar);
                $sqlTRIGGER = "CREATE TRIGGER backupnegra_before_delete BEFORE DELETE ON BackupNegra FOR EACH ROW BEGIN
            UPDATE ESTANTERIA SET NUMERO_LEJAS_OCUPADAS=(NUMERO_LEJAS_OCUPADAS+1) WHERE CODIGO_ESTANTERIA = $COD_ESTANTERIA;
            INSERT INTO OCUPACION_LEJAS (COD_ESTANTERIA, LEJA, CAJA, TIPO)VALUES($COD_ESTANTERIA,$NUM_LEJA,$CODIGO,'$tipo');
            INSERT INTO CAJANEGRA (CODIGO, ALTURA, ANCHURA, PROFUNDIDAD, PLACA, COLOR, FECHA_ENTRADA) VALUES($CODIGO,$ALTURA,$ANCHURA,$PROFUNDIDAD,'$PLACA','$COLOR','$FECHA_ENTRADA');
         END";
                $conexion->query($sqlTRIGGER)
                        or die("Instruccion no válida " . $sqlTRIGGER);


                $sql = "DELETE FROM $NOMBREBACKUP WHERE CODIGO=$CODIGO";


                break;
            case "CajaFuerte":
                $NOMBREBACKUP = "BackupFuerte";
                $CLAVE = $ObjCaja->getClaveDesbloqueo();
                $sqlTRIGGERBorrar = "DROP TRIGGER IF EXISTS backupfuerte_before_delete";
                $conexion->query($sqlTRIGGERBorrar)
                        or die("Instruccion no válida " . $sqlTRIGGERBorrar);
                $sqlTRIGGER = "CREATE TRIGGER backupfuerte_before_delete BEFORE DELETE ON BackupFuerte FOR EACH ROW BEGIN
            UPDATE ESTANTERIA SET NUMERO_LEJAS_OCUPADAS=(NUMERO_LEJAS_OCUPADAS+1) WHERE CODIGO_ESTANTERIA = $COD_ESTANTERIA;
            INSERT INTO OCUPACION_LEJAS (COD_ESTANTERIA, LEJA, CAJA, TIPO)VALUES($COD_ESTANTERIA,$NUM_LEJA,$CODIGO,'$tipo');
            INSERT INTO CAJAFUERTE (CODIGO, ALTURA, ANCHURA, PROFUNDIDAD, CLAVE_DESBLOQUEO, COLOR, FECHA_ENTRADA) VALUES($CODIGO,$ALTURA,$ANCHURA,$PROFUNDIDAD,'$CLAVE','$COLOR','$FECHA_ENTRADA');
         END";
                $conexion->query($sqlTRIGGER)
                        or die("Instruccion no válida " . $sqlTRIGGER);


                $sql = "DELETE FROM $NOMBREBACKUP WHERE CODIGO=$CODIGO";
        }
        if ($sqlTRIGGER) {
            if ($conexion->query($sql) === true) {
                //echo "Introducido correctamente";
//            $caja_id = $conexion->insert_id;
            } else {
                $Hecho = false;
                echo "Error: " . $sql . "<br>" . $conexion->error;
            }
        }
//       

        if ($Hecho == true) {
            $conexion->commit();
            // echo "Cambios realizados correctamente";
            // header('Location:../VISTA/FormularioDevolverCaja.php');
            return true;
        } else {
            $conexion->rollback();
            print_r("Error: " . $sql . "<br>" . $conexion->error);
            return false;
            //echo "No se han podido realizar los cambios";
        }

        $conexion->autocommit(true);
        $conexion->close();
    }

    function crearHash($password, $digito = 7) {
        $set_salt = './1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $salt = sprintf('$2a$%02d$', $digito);
        for ($i = 0; $i < 22; $i++) {
            $salt .= $set_salt[mt_rand(0, 22)];
        }
        return crypt($password, $salt);
    }

    function addUser($usuario, $pass) {
        $password = Operaciones::crearHash($pass);

        global $conexion;
        $sql = "INSERT INTO USERS VALUES('$usuario','$password')";
        $conexion->query($sql)
                or die("Instruccion no válida " . $sql);
    }

    function comprobarUser($ObjUser) {
        $User = $ObjUser->getUser();
        $Pass = $ObjUser->getPass();

        global $conexion;
        $sql = "SELECT * FROM USERS WHERE USUARIO='$User'";
        $consulta = $conexion->query($sql)
                or die("Instruccion no válida " . $sql);
        if ($consulta) {
            $fila = $consulta->fetch_array();
            if ($fila) {

                $passwordBD = $fila['PASSWORD'];
            } else {
                echo "Usuario no válido";
                return false;
            }
        }
        $Password = crypt($Pass, $passwordBD);
        if ($Password == $passwordBD) {
            //echo 'Es igual';
            return true;
        } else {
            return false;
        }
    }

}
