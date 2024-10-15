<?php include_once 'config.php';
class Model {
    protected $db;

    public function __construct() {





      try {
     
        $this->db = new PDO("mysql:host=".MYSQL_HOST.";charset=utf8", MYSQL_USER, MYSQL_PASS);
        $this->_deploy();
    } catch (PDOException $e) {
        die("Error de conexión: ");
    }

    }

    private function _deploy() {

      $this->db->exec("CREATE DATABASE IF NOT EXISTS " . MYSQL_DB);
      $this->db->exec("USE " . MYSQL_DB);

        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if(count($tables) == 0) {
            $sql =<<<END


            -- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `ID_articulo` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `valor` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `ID_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`ID_articulo`, `nombre`, `valor`, `descripcion`, `ID_categoria`) VALUES
(2, 'Remera gris', 15000, 'Remera color gris manga larga  ', 1),
(3, 'Buzo negro largo', 30000, 'Buzo color negro oversize hombre-mujer', 4),
(4, 'Pantalon rojo', 20000, 'Pantalon largo color rojo con detalles azules', 2),
(5, 'Campera con capucha', 40000, 'Campera tipo rompevientos con capucha para invierno', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `ID_categoria` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `temporada` varchar(40) NOT NULL,
  `marca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID_categoria`, `nombre`, `genero`, `temporada`, `marca`) VALUES
(1, 'Remera', 'Masculino', 'Verano', 'Nike'),
(2, 'Pantalon', 'Femenino', 'Invierno', 'Adidas'),
(3, 'Campera', 'Masculino', 'Invierno', 'Puma'),
(4, 'Buzo', 'Masculino', 'Invierno', 'Nike');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_usuario` int(11) NOT NULL,
  `nombreUsuario` varchar(200) NOT NULL,
  `contraseña` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_usuario`, `nombreUsuario`, `contraseña`) VALUES
(1, 'webadmin', '$2y$10$7NwzlSp0YB06/KYhmeV1zeNyqJiB8RCAd7zmnRTvlaOTHsZgJ64YK');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`ID_articulo`),
  ADD KEY `ID_categoria` (`ID_categoria`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_categoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `ID_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`ID_categoria`) REFERENCES `categoria` (`ID_categoria`) ON UPDATE CASCADE;
COMMIT;

END;
$this->db->query($sql);
  }








    }
}

?>