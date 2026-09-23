-- Sigma Height Elevators Complete Database Export
-- Generated at: 2026-09-23 13:19:18
-- Host: 127.0.0.1 | Database: sigma

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = '+00:00';

-- --------------------------------------------------------
-- Table structure for `about_cms`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `about_cms`;
CREATE TABLE `about_cms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `badge` varchar(100) DEFAULT 'About Sigma Height',
  `title` varchar(255) NOT NULL,
  `subtitle` text DEFAULT NULL,
  `story` text DEFAULT NULL,
  `mission` text DEFAULT NULL,
  `vision` text DEFAULT NULL,
  `experience_years` varchar(50) DEFAULT '15+',
  `elevators_installed` varchar(50) DEFAULT '500+',
  `client_satisfaction` varchar(50) DEFAULT '99.9%',
  `image` varchar(255) DEFAULT 'assets/images/hero_luxury_home.jpg',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `about_cms`

INSERT INTO `about_cms` (`id`, `badge`, `title`, `subtitle`, `story`, `mission`, `vision`, `experience_years`, `elevators_installed`, `client_satisfaction`, `image`, `updated_at`) VALUES ('1', 'Precision Engineered • Dubai Certified', 'Pioneering Luxury & Commercial Vertical Mobility Across the UAE', 'Sigma Height Elevators L.L.C is Dubai’s premier elevator engineering firm, providing turnkey design, precision installation, and comprehensive 24/7 maintenance.', 'Founded with a commitment to uncompromising engineering rigor and Swiss-high precision, Sigma Height Elevators L.L.C has established itself as an industry leader throughout the United Arab Emirates.\r\n\r\nFrom ultra-luxury custom panoramic glass lifts for private villas on Palm Jumeirah and Emirates Hills, to heavy continuous-duty commercial elevators in high-rise Dubai towers, our certified engineers deliver systems that harmonize architectural beauty with world-class safety standards (European EN-81 and Dubai Civil Defense certified).', 'To deliver safe, ultra-smooth, energy-efficient, and aesthetically magnificent vertical mobility solutions that enhance luxury properties and urban landmarks across Dubai.', 'To be the most trusted and innovative elevator engineering company in the Middle East, recognized for technological excellence, aesthetic craftsmanship, and zero-breakdown reliability.', '5+ Years', '500+ Lifts', '99.9%', 'assets/images/about_elevator.jpg', '2026-09-23 15:22:39');

-- --------------------------------------------------------
-- Table structure for `admin_users`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `name` varchar(100) DEFAULT 'Admin Manager',
  `email` varchar(150) DEFAULT 'info@sigmaheightelevators.com',
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `admin_users`

INSERT INTO `admin_users` (`id`, `username`, `password_hash`, `name`, `email`, `last_login`, `created_at`) VALUES ('1', 'admin', '$2y$10$nYZag4FgktrPP7/DWib52O6Uw/tvrpxYw/K3hRFe/VfUfJjabI4bq', 'Admin Manager', 'info@sigmaheightelevators.com', '2026-09-23 13:02:19', '2026-09-23 16:26:06');

-- --------------------------------------------------------
-- Table structure for `contact_cms`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `contact_cms`;
CREATE TABLE `contact_cms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(255) DEFAULT 'Connect With Our Dubai Engineering Team',
  `subheading` text DEFAULT NULL,
  `address` varchar(255) DEFAULT 'Office 402, Al Quoz Industrial Area 3, Sheikh Zayed Road, Dubai, UAE',
  `phone` varchar(100) DEFAULT '+971 4 288 9120',
  `emergency_phone` varchar(100) DEFAULT '+971 50 892 4118',
  `email` varchar(100) DEFAULT 'info@sigmaheightelevators.com',
  `working_hours` varchar(100) DEFAULT 'Mon - Sat: 8:00 AM - 7:00 PM (24/7 Emergency Dispatch)',
  `map_iframe` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `contact_cms`

INSERT INTO `contact_cms` (`id`, `heading`, `subheading`, `address`, `phone`, `emergency_phone`, `email`, `working_hours`, `map_iframe`, `updated_at`) VALUES ('1', 'Connect With Our Dubai Engineering Team', 'Whether planning a bespoke residential elevator, upgrading an Annual Maintenance Contract, or requiring 24/7 emergency repair in Dubai, our licensed engineers are ready to assist you.', 'Flat No. 325, Abdul Razak Al zarouni Building(Bldg No. 326), Damascus Street, Al Qusais Industrial Area 2, Dubai, UAE', '+048858454', '052-6405622', 'info@sigmaheightelevators.com', 'Mon - Sat: 8:00 AM - 7:00 PM (24/7 Emergency Standby)', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3607.7335463633776!2d55.38284137444449!3d25.27954732836204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5d4e49e0588d%3A0x7b09691be44b0d24!2sSIGMA%20HEIGHT%20ELEVATORS%20LLC!5e0!3m2!1sen!2sin!4v1790062253852!5m2!1sen!2sin', '2026-09-23 15:25:40');

-- --------------------------------------------------------
-- Table structure for `enquiries`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `enquiries`;
CREATE TABLE `enquiries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `service` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `status` varchar(50) DEFAULT 'New',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `enquiries`

INSERT INTO `enquiries` (`id`, `name`, `email`, `phone`, `service`, `message`, `status`, `created_at`) VALUES ('5', 'jhon', 'rajeswari.rathi1707@gmail.com', '1233', 'Home Elevators', 'test', 'New', '2026-09-22 13:22:51');

-- --------------------------------------------------------
-- Table structure for `projects`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category` varchar(100) DEFAULT 'Residential',
  `location` varchar(255) DEFAULT 'Dubai, UAE',
  `client_name` varchar(255) DEFAULT 'Private Client',
  `completion_year` varchar(50) DEFAULT '2024',
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `gallery` text DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT 1,
  `sort_order` int(11) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `projects`

INSERT INTO `projects` (`id`, `title`, `slug`, `category`, `location`, `client_name`, `completion_year`, `description`, `image`, `gallery`, `is_featured`, `sort_order`, `is_active`, `created_at`) VALUES ('3', 'Corporate Business Tower Elevators', 'corporate-business-tower-elevators', 'Commercial', 'Business Bay, Dubai', 'Apex Tower Holdings', '2023', 'High-speed dual-car passenger elevator installation with destination dispatch control, reaching 3.5 m/s with synchronized access card scanners and energy-efficient regenerative drives.', 'assets/images/hero_commercial.jpg', NULL, '1', '3', '1', '2026-09-18 14:41:56');
INSERT INTO `projects` (`id`, `title`, `slug`, `category`, `location`, `client_name`, `completion_year`, `description`, `image`, `gallery`, `is_featured`, `sort_order`, `is_active`, `created_at`) VALUES ('4', 'Five-Star Hotel Atrium Glass Lifts', 'five-star-hotel-atrium-glass-lifts', 'Panoramic Glass', 'Downtown Dubai', 'Grand Millennium Hotel', '2023', 'Twin panoramic scenic lifts ascending through a 14-story open atrium. Features illuminated glass under-capsules, mirror-finish stainless frames, and whisper quiet travel.', 'assets/images/service_panoramic.jpg', NULL, '1', '4', '1', '2026-09-18 14:41:56');
INSERT INTO `projects` (`id`, `title`, `slug`, `category`, `location`, `client_name`, `completion_year`, `description`, `image`, `gallery`, `is_featured`, `sort_order`, `is_active`, `created_at`) VALUES ('5', 'Retail Mall Heavy Passenger Escalators', 'retail-mall-heavy-passenger-escalators', 'Escalators', 'Al Barsha, Dubai', 'Al Barsha Mall Group', '2023', 'Four pairs of heavy continuous duty commercial escalators equipped with smart energy-saving standby radar and LED side skirting indicators.', 'assets/images/service_escalators.jpg', NULL, '1', '5', '1', '2026-09-18 14:41:56');
INSERT INTO `projects` (`id`, `title`, `slug`, `category`, `location`, `client_name`, `completion_year`, `description`, `image`, `gallery`, `is_featured`, `sort_order`, `is_active`, `created_at`) VALUES ('6', 'Modern Luxury Penthouse Glass Shaft', 'modern-luxury-penthouse-glass-shaft', 'Luxury Villas', 'Dubai Marina', 'Marina Sky Residence', '2024', 'Custom retrofitted frameless glass lift serving a triplex penthouse, engineered with minimal pit requirements and custom gold titanium interior appointments.', 'assets/images/service_home.jpg', NULL, '1', '6', '1', '2026-09-18 14:41:56');

-- --------------------------------------------------------
-- Table structure for `reviews`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) NOT NULL,
  `client_title` varchar(255) DEFAULT 'Property Owner',
  `company` varchar(255) DEFAULT 'Dubai',
  `rating` int(11) DEFAULT 5,
  `review_text` text NOT NULL,
  `client_avatar` varchar(255) DEFAULT '',
  `sort_order` int(11) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `reviews`

INSERT INTO `reviews` (`id`, `client_name`, `client_title`, `company`, `rating`, `review_text`, `client_avatar`, `sort_order`, `is_active`, `created_at`) VALUES ('1', 'Tariq Al Mansoori', 'Villa Owner', 'Palm Jumeirah', '5', 'Sigma Height Elevators installed our 3-stop panoramic glass lift in Palm Jumeirah. The high precision, silent hydraulic drive, and impeccable gold finish exceeded all our expectations. Exceptional service!', '', '1', '1', '2026-09-18 14:41:56');
INSERT INTO `reviews` (`id`, `client_name`, `client_title`, `company`, `rating`, `review_text`, `client_avatar`, `sort_order`, `is_active`, `created_at`) VALUES ('3', 'Marc Van Houten', 'Chief Architect', 'Studio Architecture Dubai', '5', 'As an architect, finding an elevator contractor who respects custom cabin drawings and slim pit dimensions is rare. Sigma Height worked closely with our CAD team and delivered a true work of art.', '', '3', '1', '2026-09-18 14:41:56');
INSERT INTO `reviews` (`id`, `client_name`, `client_title`, `company`, `rating`, `review_text`, `client_avatar`, `sort_order`, `is_active`, `created_at`) VALUES ('4', 'Rashid Al Nuaimi', 'Operations Director', 'Nuaimi Hospitality', '5', 'Sigma handles our 24/7 AMC across multiple properties in Dubai. Their technician response time during emergencies is within 25 minutes. Extremely trustworthy elevator partner.', '', '4', '1', '2026-09-18 14:41:56');

-- --------------------------------------------------------
-- Table structure for `services`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `icon_svg` text DEFAULT NULL,
  `short_desc` text DEFAULT NULL,
  `full_desc` text DEFAULT NULL,
  `features` text DEFAULT NULL,
  `image` varchar(255) DEFAULT '',
  `button_text` varchar(100) DEFAULT 'Get A Quote',
  `sort_order` int(11) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `services`

INSERT INTO `services` (`id`, `title`, `slug`, `icon_svg`, `short_desc`, `full_desc`, `features`, `image`, `button_text`, `sort_order`, `is_active`, `created_at`) VALUES ('1', 'Elevator Installation', 'elevator-installation', '<polyline points=\"22 12 18 12 15 21 9 3 6 12 2 12\" />', 'Professional elevator installation in Dubai with safe, reliable, and modern lift systems for residential and commercial buildings.', 'Sigma Height Elevators provides turnkey elevator installation engineered to strict UAE Civil Defense and European safety standards (EN 81). We handle every phase: structural site assessment, electrical planning, precision installation, shaft alignment, and official Dubai Municipality commissioning.', 'Dubai Civil Defense Approved\nAdvanced Traction & Hydraulic Machines\nComplete Turnkey Project Management\nFull Safety Sensor & Brake Certification', 'assets/images/service_passenger.jpg', 'Get A Quote', '1', '1', '2026-09-18 14:41:56');
INSERT INTO `services` (`id`, `title`, `slug`, `icon_svg`, `short_desc`, `full_desc`, `features`, `image`, `button_text`, `sort_order`, `is_active`, `created_at`) VALUES ('2', 'Elevator Maintenance & AMC', 'elevator-maintenance', '<path d=\"M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z\" />', 'Reliable 24/7 elevator maintenance in Dubai ensuring zero downtime, optimal ride comfort, and strict safety compliance.', 'Our Annual Maintenance Contracts (AMC) protect your vertical transportation investment with scheduled monthly inspections, oil and lubrication servicing, wire rope testing, and 24/7 emergency rescue dispatch within 30 minutes in Dubai.', '24/7 Rapid Emergency Response Team\nPreventative Monthly Checkups\nGenuine OEM Spare Parts Guarantee\nCompliant with UAE Safety Norms', 'assets/images/service_platform.jpg', 'View AMC Plans', '2', '1', '2026-09-18 14:41:56');
INSERT INTO `services` (`id`, `title`, `slug`, `icon_svg`, `short_desc`, `full_desc`, `features`, `image`, `button_text`, `sort_order`, `is_active`, `created_at`) VALUES ('3', 'Elevator Repair & Diagnostics', 'elevator-repair', '<circle cx=\"12\" cy=\"12\" r=\"10\" /><line x1=\"12\" y1=\"8\" x2=\"12\" y2=\"12\" /><line x1=\"12\" y1=\"16\" x2=\"12.01\" y2=\"16\" />', 'Fast and professional emergency elevator repair services in Dubai for all lift makes and models.', 'Whether experiencing door malfunctions, controller fault codes, levelling inaccuracy, or unusual vibrations, our licensed engineers arrive equipped with digital diagnostic tools to restore safe operation swiftly.', 'Same-Day Emergency Troubleshooting\nMicroprocessor & Variable Frequency Diagnostics\nDirect Replacement of Drive Components\nThorough Safety Recertification Post-Repair', 'assets/images/hero_commercial.jpg', 'Emergency Support', '3', '1', '2026-09-18 14:41:56');
INSERT INTO `services` (`id`, `title`, `slug`, `icon_svg`, `short_desc`, `full_desc`, `features`, `image`, `button_text`, `sort_order`, `is_active`, `created_at`) VALUES ('4', 'Elevator Modernization', 'elevator-modernization', '<polyline points=\"23 4 23 10 17 10\" /><polyline points=\"1 20 1 14 7 14\" /><path d=\"M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15\" />', 'Upgrade your aging lift with advanced modern drive controllers, quiet gearless traction, and energy-saving technology.', 'Breathe new life into your existing elevator without replacing the entire shaft. Modernization delivers up to 40% energy reduction, whisper-quiet acceleration, and updated aesthetics matching modern architectural trends.', 'VVVF Inverter Drive Upgrades\nRegenerative Energy Braking Systems\nUltra-Smooth Floor Levelling\nModern Touch COP & LOP Control Panels', 'assets/images/service_freight.jpg', 'Upgrade Now', '4', '1', '2026-09-18 14:41:56');
INSERT INTO `services` (`id`, `title`, `slug`, `icon_svg`, `short_desc`, `full_desc`, `features`, `image`, `button_text`, `sort_order`, `is_active`, `created_at`) VALUES ('5', 'Luxury Home & Villa Elevators', 'luxury-home-elevators', '<path d=\"M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z\" /><polyline points=\"9 22 9 12 15 12 15 22\" />', 'Bespoke residential lifts customized to fit seamlessly into luxury Dubai villas with or without dedicated machine rooms.', 'Designed exclusively for prestigious residences in Palm Jumeirah, Emirates Hills, and Dubai Hills. Our villa lifts feature low pit requirements, minimal headroom, whisper-silent operation, and bespoke interior materials like Italian marble and gold PVD trims.', 'No Machine Room Required (MRL)\nPit Depth as low as 150mm\nWhisper-Quiet Italian Hydraulic / Gearless Drive\nSmart Home Automation & Keypad Integration', 'assets/images/service_home.jpg', 'Design Your Lift', '5', '1', '2026-09-18 14:41:56');
INSERT INTO `services` (`id`, `title`, `slug`, `icon_svg`, `short_desc`, `full_desc`, `features`, `image`, `button_text`, `sort_order`, `is_active`, `created_at`) VALUES ('6', 'Commercial & High-Speed Elevators', 'commercial-elevators', '<rect x=\"4\" y=\"2\" width=\"16\" height=\"20\" rx=\"2\" /><line x1=\"12\" y1=\"18\" x2=\"12\" y2=\"18.01\" /><line x1=\"12\" y1=\"14\" x2=\"12\" y2=\"14.01\" /><line x1=\"12\" y1=\"10\" x2=\"12\" y2=\"10.01\" /><line x1=\"12\" y1=\"6\" x2=\"12\" y2=\"6.01\" />', 'High-capacity, high-speed passenger elevators engineered for Dubai towers, corporate headquarters, and commercial centers.', 'Built to handle heavy traffic flow with high-speed travel up to 4.0 m/s. Equipped with destination dispatch intelligence, card-access security integration, and durable architectural stainless-steel finishes.', 'Speeds up to 4.0 m/s with Zero Cabin Sway\nSmart Destination Dispatch Control\nAccess Control Integration (RFID / Biometric)\nHeavy-Duty 24/7 Continuous Duty Cycle', 'assets/images/hero_commercial.jpg', 'Get Engineering Quote', '6', '1', '2026-09-18 14:41:56');
INSERT INTO `services` (`id`, `title`, `slug`, `icon_svg`, `short_desc`, `full_desc`, `features`, `image`, `button_text`, `sort_order`, `is_active`, `created_at`) VALUES ('7', 'Panoramic Glass Elevators', 'panoramic-glass-elevators', '<circle cx=\"12\" cy=\"12\" r=\"10\" /><path d=\"M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20\" /><path d=\"M2 12h20\" />', 'Breathtaking 360-degree glass lifts creating an architectural masterpiece for luxury villas, hotels, and atrium malls.', 'Combining structural glass engineering with minimalist stainless steel frameworks. Available in curved cylindrical or polygonal shapes, offering unobstructed vistas as you travel between floors.', 'Curved or Flat Laminated Safety Glass\nFrameless Architectural Enclosures\nIntegrated Ambient LED Halo Lighting\nIndoor & Outdoor Weatherproof Construction', 'assets/images/service_panoramic.jpg', 'Explore Glass Lifts', '7', '1', '2026-09-18 14:41:56');
INSERT INTO `services` (`id`, `title`, `slug`, `icon_svg`, `short_desc`, `full_desc`, `features`, `image`, `button_text`, `sort_order`, `is_active`, `created_at`) VALUES ('8', 'Escalators & Moving Walks', 'escalators-moving-walks', '<path d=\"M3 21h4l8-14h6\" /><circle cx=\"6\" cy=\"19\" r=\"1\" />', 'Heavy-duty commercial escalators and travelators engineered for shopping malls, airports, and transit hubs across the UAE.', 'Continuous passenger flow engineered with energy-conserving sensors, auto-sleep speed controllers, skirt lighting, and fail-safe multi-braking mechanisms.', '30° and 35° Inclination Configurations\nAutomatic Eco-Standby Energy Sensors\nComb Plate Safety & Step Sag Detection\nIndoor and Semi-Outdoor Weatherproofing', 'assets/images/service_escalators.jpg', 'Escalator Solutions', '8', '1', '2026-09-18 14:41:56');

-- --------------------------------------------------------
-- Table structure for `sliders`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE `sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `highlight_text` varchar(255) DEFAULT '',
  `subtitle` text DEFAULT NULL,
  `badge_text` varchar(100) DEFAULT '',
  `button_text` varchar(100) DEFAULT 'Explore Now',
  `button_link` varchar(255) DEFAULT 'services',
  `image` varchar(255) NOT NULL,
  `sort_order` int(11) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `sliders`

INSERT INTO `sliders` (`id`, `title`, `highlight_text`, `subtitle`, `badge_text`, `button_text`, `button_link`, `image`, `sort_order`, `is_active`, `created_at`) VALUES ('1', 'Luxury Home Elevators for', 'Modern Living', 'Experience smooth, quiet and stylish home elevators designed to complement villas and premium residences across Dubai.', 'Home Elevators', 'Explore Home Elevators', 'services', 'assets/images/hero_panoramic.jpg', '1', '1', '2026-09-18 14:41:56');
INSERT INTO `sliders` (`id`, `title`, `highlight_text`, `subtitle`, `badge_text`, `button_text`, `button_link`, `image`, `sort_order`, `is_active`, `created_at`) VALUES ('2', 'Elegant Villa Elevators,', 'Built Around You', 'Enhance your villa with customized elevator solutions that combine sophisticated design, advanced technology and reliable performance.', 'Villa Elevators', 'Discover Villa Elevators', 'services', 'assets/images/hero_luxury_home.jpg', '2', '1', '2026-09-18 14:41:56');
INSERT INTO `sliders` (`id`, `title`, `highlight_text`, `subtitle`, `badge_text`, `button_text`, `button_link`, `image`, `sort_order`, `is_active`, `created_at`) VALUES ('3', 'High Performance Elevators for', 'Commercial Buildings', 'Deliver seamless vertical transportation for offices, hotels and commercial towers with high-efficiency commercial elevator systems.', 'Commercial Elevators', 'Explore Commercial Solutions', 'services', 'assets/images/hero_commercial.jpg', '3', '1', '2026-09-18 14:41:56');

-- --------------------------------------------------------
-- Table structure for `smtp_settings`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `smtp_settings`;
CREATE TABLE `smtp_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) DEFAULT 0,
  `smtp_host` varchar(255) DEFAULT 'smtp.gmail.com',
  `smtp_port` int(11) DEFAULT 587,
  `smtp_crypto` varchar(20) DEFAULT 'tls',
  `smtp_user` varchar(255) DEFAULT '',
  `smtp_pass` varchar(255) DEFAULT '',
  `from_email` varchar(255) DEFAULT 'sales@sigmaheightelevators.com',
  `from_name` varchar(255) DEFAULT 'Sigma Height Elevators LLC',
  `reply_to` varchar(255) DEFAULT 'sales@sigmaheightelevators.com',
  `admin_email` varchar(255) DEFAULT 'sales@sigmaheightelevators.com',
  `send_inquiry_notification` tinyint(1) DEFAULT 1,
  `send_customer_confirmation` tinyint(1) DEFAULT 1,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `smtp_settings`

INSERT INTO `smtp_settings` (`id`, `is_enabled`, `smtp_host`, `smtp_port`, `smtp_crypto`, `smtp_user`, `smtp_pass`, `from_email`, `from_name`, `reply_to`, `admin_email`, `send_inquiry_notification`, `send_customer_confirmation`, `updated_at`) VALUES ('1', '1', 'smtp.hostinger.com', '465', 'ssl', 'info@sigmaheightelevators.com', '07Uis2742*', 'info@sigmaheightelevators.com', 'Sigma Height Elevators LLC', 'info@sigmaheightelevators.com', 'info@sigmaheightelevators.com', '1', '1', '2026-09-23 16:09:08');

SET FOREIGN_KEY_CHECKS=1;
COMMIT;
