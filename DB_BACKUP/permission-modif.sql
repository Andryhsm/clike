-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 07 Août 2018 à 07:35
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `clickee`
--

-- --------------------------------------------------------

--
-- Structure de la table `permission`
--

DROP TABLE IF EXISTS `permission`;
CREATE TABLE `permission` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `module_name` varchar(191) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `route` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `permission`
--

INSERT INTO `permission` (`permission_id`, `module_name`, `parent_id`, `route`) VALUES
(1, 'Dashboard', NULL, 'dashboard,profile'),
(3, 'Content', NULL, NULL),
(4, 'Account', NULL, NULL),
(5, 'Communications', NULL, NULL),
(6, 'Statistics', NULL, NULL),
(7, 'Sales', NULL, NULL),
(10, 'Category Manager', 40, 'category,save_category,update_category,edit_category,delete_category'),
(11, 'Brand Manager', 40, 'brand.index,brand.create,brand.edit'),
(12, 'Attribute', 40, 'attribute,create_attribute,edit_attribute'),
(13, 'Attribute Set', 40, 'attribute_set,create_attribute_set,edit_attribute_set'),
(15, 'Page Manager', 3, 'page.index,page.create,page.edit'),
(16, 'Email/SMS Template', 39, 'email-template.index,email-template.create,email-template.edit'),
(18, 'Slider Manager', 3, 'banner.index,banner.create,banner.edit,slider'),
(19, 'Customer', 4, 'customer.index,customer.create,customer.edit'),
(20, 'Merchant', 4, 'store.index,store.create,store.edit'),
(21, 'Admin system', 4, 'administrator,add_administrator,edit_administrator'),
(22, 'Role manager', 4, 'role.index,role.create,role.edit'),
(25, 'Radio', 5, 'radio.index,radio.create,radio.edit'),
(26, 'Sales', 6, 'product_billed'),
(27, 'Finance', 6, NULL),
(29, 'Ongoing', 45, 'orders,orders_detail'),
(30, 'Completed', 45, 'orders,orders_detail'),
(31, 'Special Ask', 45, 'orders'),
(32, 'Status Manager', 7, 'order-status.index,order-status.create,order-status.edit'),
(33, 'Blog Management', NULL, NULL),
(34, 'Blog Category', 33, 'blog-category.index,blog-category.create,blog-category.edit'),
(35, 'Blog Post', 33, 'blog.index,blog.create,blog.edit'),
(36, 'FAQ Manager', 3, 'faq.index,faq.create,faq.edit'),
(39, 'System', NULL, ''),
(40, 'Catalogue', NULL, NULL),
(42, 'Products On Home', 3, 'special-product.index,special-product.create,special-product.edit'),
(43, 'Epartner Image', 39, 'epartner.index,epartner.create,epartner.edit'),
(44, 'Meta & OG', 39, 'setting_list,update_setting'),
(45, 'All orders', 7, NULL),
(46, 'Brand Tag', 40, 'brand_tag,brand_save_tag_french'),
(47, 'Accounting', 40, 'accounting_table,accounting_table_reset'),
(48, 'Instagram Manager', 3, 'instagram.index,instagram.create,instagram.edit');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`permission_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `permission`
--
ALTER TABLE `permission`
  MODIFY `permission_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
