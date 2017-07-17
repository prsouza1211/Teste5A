CREATE DATABASE IF NOT EXISTS `teste` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `teste`;

CREATE TABLE `tb_status` (
  `id_status` int(10) UNSIGNED NOT NULL,
  `nm_status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `nm_status`) VALUES
(1, 'Pendente'),
(2, 'Em Desenvolvimento'),
(3, 'Em teste'),
(4, 'Concluido');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);
  

CREATE TABLE `tb_atividade` (
  `id_atividade` int(10) UNSIGNED NOT NULL,
  `id_status` int(10) UNSIGNED NOT NULL,
  `nm_atividade` varchar(255) NOT NULL,
  `ds_atividade` text NOT NULL,
  `dt_inicio` date NOT NULL,
  `dt_fim` date DEFAULT NULL,
  `situacao` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `tb_atividade`
  ADD PRIMARY KEY (`id_atividade`),
  ADD KEY `tb_atividade_FKIndex1` (`id_status`);
  
ALTER TABLE `tb_atividade`
  ADD CONSTRAINT `fk_id_status` FOREIGN KEY (`id_status`) REFERENCES `tb_status` (`id_status`);