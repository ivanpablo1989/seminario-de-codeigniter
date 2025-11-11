-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2025 at 12:08 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mi_base`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `usuario_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(27, 2),
(21, 11),
(22, 11),
(23, 11),
(24, 11),
(25, 11),
(26, 11),
(28, 11);

-- --------------------------------------------------------

--
-- Table structure for table `espectaculos`
--

CREATE TABLE `espectaculos` (
  `id_espectaculo` int(11) NOT NULL,
  `nombre` varchar(51) NOT NULL,
  `descripcion` varchar(51) NOT NULL,
  `disponibles` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `direccion` varchar(51) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `imagen` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `espectaculos`
--

INSERT INTO `espectaculos` (`id_espectaculo`, `nombre`, `descripcion`, `disponibles`, `precio`, `direccion`, `fecha`, `hora`, `imagen`) VALUES
(1, 'paula gomez castilla', 'la mas loca', 2289, 0.00, '29 de septiembre 895', '2025-09-27', '18:30:00', '5bd55adf385e96fd58c069f5b90ed566.png'),
(2, 'la penelopr', 'La Reina del Sur', 449, 0.00, 'Bolonia 5480', '2025-08-02', '02:00:00', 'bb.jpg'),
(3, 'Nicki Nicole', 'La Nena de Argentina', 44, 7778.00, 'Napoles 897', '2025-08-20', '13:00:00', 'cc.jpg'),
(4, 'Duki', 'El Maravilloso', 664, 258.00, 'Francia 875', '2025-09-27', '13:00:00', 'dd.jpg'),
(5, 'ee', 'rr', 55553, 0.04, '', '2025-08-30', '00:16:00', ''),
(7, 'ee', '55', 55555, 0.04, 'oo', '2025-08-30', '00:26:00', 'c4b110eac4a7fc70b368475753b21d7d.png'),
(8, 'ee', 'ttt', 55555, 0.04, '', '2025-08-30', '00:29:00', '78eaf1d6d39e58cf7e7b24bd9dea8a0c.png');

-- --------------------------------------------------------

--
-- Table structure for table `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `espectaculo_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_reserva` date NOT NULL,
  `monto_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `usuario_id`, `espectaculo_id`, `cantidad`, `fecha_reserva`, `monto_total`) VALUES
(4, 1, 1, 3, '2025-07-31', 265364),
(5, 1, 1, 5, '2025-08-01', 442273),
(6, 1, 2, 4, '2025-08-01', 49822),
(7, 1, 1, 2, '2025-08-01', 176909),
(8, 1, 1, 3, '2025-08-01', 265364),
(9, 1, 1, 1, '2025-08-08', 88455),
(10, 1, 1, 2, '2025-08-12', 176909),
(11, 1, 4, 1, '2025-08-16', 258),
(12, 1, 1, 2, '2025-08-19', 176909),
(13, 1, 1, 2, '2025-08-19', 176909),
(14, 1, 1, 2, '2025-08-19', 176909),
(15, 1, 1, 2, '2025-08-19', 176909),
(16, 1, 3, 3, '2025-08-19', 23334),
(17, 1, 3, 1, '2025-08-19', 7778),
(18, 1, 1, 4, '2025-08-19', 353818),
(19, 4, 3, 3, '2025-08-19', 23334),
(20, 11, 1, 3, '2025-08-20', 265364),
(21, 11, 3, 2, '2025-08-20', 15556),
(22, 11, 1, 3, '2025-08-20', 265364),
(23, 11, 3, 1, '2025-08-20', 7778),
(24, 11, 3, 1, '2025-08-20', 7778),
(25, 11, 1, 4, '2025-08-20', 353818),
(26, 11, 1, 3, '2025-08-21', 265364),
(27, 11, 4, 2, '2025-08-21', 516),
(28, 2, 1, 1, '2025-08-28', 88455),
(29, 11, 5, 2, '2025-08-30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(51) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre`) VALUES
(1, 'administrador'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `nombre_usuario` varchar(51) NOT NULL,
  `palabra_clave` varchar(51) NOT NULL,
  `nombre` varchar(51) NOT NULL,
  `apellido` varchar(51) NOT NULL,
  `dni` int(11) NOT NULL,
  `telefono` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `rol_id`, `nombre_usuario`, `palabra_clave`, `nombre`, `apellido`, `dni`, `telefono`) VALUES
(1, 1, 'ivaninfonet@gmail.com', '1234', 'ivan', 'tolaba', 34571058, '11-2310-6932'),
(2, 2, 'ivaninfosur@gmail.com', '1234', 'pablo', 'flores', 12618422, '11-4156-3813'),
(3, 2, 'ivaninfoeste@gmail.com', '1234', 'estiven', 'flores', 42589521, '11-4082-6777'),
(4, 1, 'ivaninfoeste2@gmail.com', '1234', 'luciana', 'perez', 38978563, '11-4082-6777'),
(11, 1, 'ivaninfonorte@gmail.com', '1234', 'jorge', 'cirio', 11122224, '11-4448-6474'),
(12, 1, 'aaggttt@gmail.com', '1234', 'jorge', 'cirio', 584444, '11-4448-6474'),
(13, 1, 'alguien@hotmail.com', '1234', 'luciana', 'perez', 12348, '01140826777');

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `espectaculo_id` int(11) NOT NULL,
  `fecha_venta` date NOT NULL,
  `monto_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ventas`
--

INSERT INTO `ventas` (`id_venta`, `usuario_id`, `espectaculo_id`, `fecha_venta`, `monto_total`) VALUES
(1, 1, 2, '2025-07-31', 12455.41),
(2, 1, 1, '2025-07-31', 176909.12),
(3, 1, 1, '2025-07-31', 265363.68),
(4, 1, 1, '2025-08-01', 442272.80),
(5, 1, 2, '2025-08-01', 49821.64),
(6, 1, 1, '2025-08-01', 176909.12),
(21, 11, 1, '2025-08-20', 265363.68),
(22, 11, 3, '2025-08-20', 7778.00),
(23, 11, 3, '2025-08-20', 7778.00),
(24, 11, 1, '2025-08-20', 353818.24),
(25, 11, 1, '2025-08-21', 265363.68),
(26, 11, 4, '2025-08-21', 516.00),
(27, 2, 1, '2025-08-28', 88454.56),
(28, 11, 5, '2025-08-30', 0.08);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `usuario` (`usuario_id`);

--
-- Indexes for table `espectaculos`
--
ALTER TABLE `espectaculos`
  ADD PRIMARY KEY (`id_espectaculo`);

--
-- Indexes for table `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `espectaculos` (`espectaculo_id`),
  ADD KEY `usuarios` (`usuario_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `rol` (`rol_id`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `espectaculo` (`espectaculo_id`),
  ADD KEY `reserva` (`usuario_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `espectaculos`
--
ALTER TABLE `espectaculos`
  MODIFY `id_espectaculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`);

--
-- Constraints for table `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `espectaculos` FOREIGN KEY (`espectaculo_id`) REFERENCES `espectaculos` (`id_espectaculo`),
  ADD CONSTRAINT `usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `rol` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id_rol`);

--
-- Constraints for table `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `espectaculo` FOREIGN KEY (`espectaculo_id`) REFERENCES `espectaculos` (`id_espectaculo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
