<?php
// Database Migration and Initial Data Seeder for Sigma Height Elevators
$mysqli = new mysqli("127.0.0.1", "root", "", "sigma", 3307);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error . "\n");
}

// 1. Create Sliders Table
$mysqli->query("CREATE TABLE IF NOT EXISTS sliders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    highlight_text VARCHAR(255) DEFAULT '',
    subtitle TEXT,
    badge_text VARCHAR(100) DEFAULT '',
    button_text VARCHAR(100) DEFAULT 'Explore Now',
    button_link VARCHAR(255) DEFAULT 'services',
    image VARCHAR(255) NOT NULL,
    sort_order INT DEFAULT 0,
    is_active TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

// 2. Create Services Table
$mysqli->query("CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL,
    icon_svg TEXT,
    short_desc TEXT,
    full_desc TEXT,
    features TEXT,
    image VARCHAR(255) DEFAULT '',
    button_text VARCHAR(100) DEFAULT 'Get A Quote',
    sort_order INT DEFAULT 0,
    is_active TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

// 3. Create Projects Table
$mysqli->query("CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL,
    category VARCHAR(100) DEFAULT 'Residential',
    location VARCHAR(255) DEFAULT 'Dubai, UAE',
    client_name VARCHAR(255) DEFAULT 'Private Client',
    completion_year VARCHAR(50) DEFAULT '2024',
    description TEXT,
    image VARCHAR(255) NOT NULL,
    gallery TEXT,
    is_featured TINYINT(1) DEFAULT 1,
    sort_order INT DEFAULT 0,
    is_active TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

// 4. Create Reviews Table
$mysqli->query("CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_name VARCHAR(255) NOT NULL,
    client_title VARCHAR(255) DEFAULT 'Property Owner',
    company VARCHAR(255) DEFAULT 'Dubai',
    rating INT DEFAULT 5,
    review_text TEXT NOT NULL,
    client_avatar VARCHAR(255) DEFAULT '',
    sort_order INT DEFAULT 0,
    is_active TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

// 5. Update enquiries table if service column missing
$col_check = $mysqli->query("SHOW COLUMNS FROM enquiries LIKE 'service'");
if ($col_check && $col_check->num_rows == 0) {
    $mysqli->query("ALTER TABLE enquiries ADD COLUMN service VARCHAR(255) AFTER phone");
}
$col_check2 = $mysqli->query("SHOW COLUMNS FROM enquiries LIKE 'status'");
if ($col_check2 && $col_check2->num_rows == 0) {
    $mysqli->query("ALTER TABLE enquiries ADD COLUMN status VARCHAR(50) DEFAULT 'New' AFTER message");
}

echo "Tables ready. Now checking seed data...\n";

// Seed Sliders if empty
$res = $mysqli->query("SELECT COUNT(*) as cnt FROM sliders");
$row = $res->fetch_assoc();
if ($row['cnt'] == 0) {
    $sliders = [
        [
            'title' => 'Luxury Home Elevators for',
            'highlight_text' => 'Modern Living',
            'subtitle' => 'Experience smooth, quiet and stylish home elevators designed to complement villas and premium residences across Dubai.',
            'badge_text' => 'Home Elevators',
            'button_text' => 'Explore Home Elevators',
            'button_link' => 'services',
            'image' => 'assets/images/hero_panoramic.jpg',
            'sort_order' => 1,
            'is_active' => 1
        ],
        [
            'title' => 'Elegant Villa Elevators,',
            'highlight_text' => 'Built Around You',
            'subtitle' => 'Enhance your villa with customized elevator solutions that combine sophisticated design, advanced technology and reliable performance.',
            'badge_text' => 'Villa Elevators',
            'button_text' => 'Discover Villa Elevators',
            'button_link' => 'services',
            'image' => 'assets/images/hero_luxury_home.jpg',
            'sort_order' => 2,
            'is_active' => 1
        ],
        [
            'title' => 'High Performance Elevators for',
            'highlight_text' => 'Commercial Buildings',
            'subtitle' => 'Deliver seamless vertical transportation for offices, hotels and commercial towers with high-efficiency commercial elevator systems.',
            'badge_text' => 'Commercial Elevators',
            'button_text' => 'Explore Commercial Solutions',
            'button_link' => 'services',
            'image' => 'assets/images/hero_commercial.jpg',
            'sort_order' => 3,
            'is_active' => 1
        ]
    ];
    $stmt = $mysqli->prepare("INSERT INTO sliders (title, highlight_text, subtitle, badge_text, button_text, button_link, image, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    foreach ($sliders as $s) {
        $stmt->bind_param("sssssssii", $s['title'], $s['highlight_text'], $s['subtitle'], $s['badge_text'], $s['button_text'], $s['button_link'], $s['image'], $s['sort_order'], $s['is_active']);
        $stmt->execute();
    }
    echo "Sliders seeded.\n";
}

// Seed Services if empty
$res = $mysqli->query("SELECT COUNT(*) as cnt FROM services");
$row = $res->fetch_assoc();
if ($row['cnt'] == 0) {
    $services = [
        [
            'title' => 'Elevator Installation',
            'slug' => 'elevator-installation',
            'icon_svg' => '<polyline points="22 12 18 12 15 21 9 3 6 12 2 12" />',
            'short_desc' => 'Professional elevator installation in Dubai with safe, reliable, and modern lift systems for residential and commercial buildings.',
            'full_desc' => 'Sigma Height Elevators provides turnkey elevator installation engineered to strict UAE Civil Defense and EN81-20:50 European Compliance Standard. We handle every phase: structural site assessment, electrical planning, precision installation, shaft alignment, and official Dubai Municipality commissioning.',
            'features' => "Dubai Civil Defense Approved\nAdvanced Traction & Hydraulic Machines\nComplete Turnkey Project Management\nFull Safety Sensor & Brake Certification",
            'image' => 'assets/images/service_passenger.jpg',
            'button_text' => 'Get A Quote',
            'sort_order' => 1,
            'is_active' => 1
        ],
        [
            'title' => 'Elevator Maintenance & AMC',
            'slug' => 'elevator-maintenance',
            'icon_svg' => '<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z" />',
            'short_desc' => 'Reliable 24/7 elevator maintenance in Dubai ensuring zero downtime, optimal ride comfort, and strict safety compliance.',
            'full_desc' => 'Our Annual Maintenance Contracts (AMC) protect your vertical transportation investment with scheduled monthly inspections, oil and lubrication servicing, wire rope testing, and 24/7 emergency rescue dispatch within 30 minutes in Dubai.',
            'features' => "24/7 Rapid Emergency Response Team\nPreventative Monthly Checkups\nGenuine OEM Spare Parts Guarantee\nCompliant with UAE Safety Norms",
            'image' => 'assets/images/service_platform.jpg',
            'button_text' => 'View AMC Plans',
            'sort_order' => 2,
            'is_active' => 1
        ],
        [
            'title' => 'Elevator Repair & Diagnostics',
            'slug' => 'elevator-repair',
            'icon_svg' => '<circle cx="12" cy="12" r="10" /><line x1="12" y1="8" x2="12" y2="12" /><line x1="12" y1="16" x2="12.01" y2="16" />',
            'short_desc' => 'Fast and professional emergency elevator repair services in Dubai for all lift makes and models.',
            'full_desc' => 'Whether experiencing door malfunctions, controller fault codes, levelling inaccuracy, or unusual vibrations, our licensed engineers arrive equipped with digital diagnostic tools to restore safe operation swiftly.',
            'features' => "Same-Day Emergency Troubleshooting\nMicroprocessor & Variable Frequency Diagnostics\nDirect Replacement of Drive Components\nThorough Safety Recertification Post-Repair",
            'image' => 'assets/images/hero_commercial.jpg',
            'button_text' => 'Emergency Support',
            'sort_order' => 3,
            'is_active' => 1
        ],
        [
            'title' => 'Elevator Modernization',
            'slug' => 'elevator-modernization',
            'icon_svg' => '<polyline points="23 4 23 10 17 10" /><polyline points="1 20 1 14 7 14" /><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15" />',
            'short_desc' => 'Upgrade your aging lift with advanced modern drive controllers, quiet gearless traction, and energy-saving technology.',
            'full_desc' => 'Breathe new life into your existing elevator without replacing the entire shaft. Modernization delivers up to 40% energy reduction, whisper-quiet acceleration, and updated aesthetics matching modern architectural trends.',
            'features' => "VVVF Inverter Drive Upgrades\nRegenerative Energy Braking Systems\nUltra-Smooth Floor Levelling\nModern Touch COP & LOP Control Panels",
            'image' => 'assets/images/service_freight.jpg',
            'button_text' => 'Upgrade Now',
            'sort_order' => 4,
            'is_active' => 1
        ],
        [
            'title' => 'Luxury Home & Villa Elevators',
            'slug' => 'luxury-home-elevators',
            'icon_svg' => '<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" /><polyline points="9 22 9 12 15 12 15 22" />',
            'short_desc' => 'Bespoke residential lifts customized to fit seamlessly into luxury Dubai villas with or without dedicated machine rooms.',
            'full_desc' => 'Designed exclusively for prestigious residences in Palm Jumeirah, Emirates Hills, and Dubai Hills. Our villa lifts feature low pit requirements, minimal headroom, whisper-silent operation, and bespoke interior materials like Italian marble and gold PVD trims.',
            'features' => "No Machine Room Required (MRL)\nPit Depth as low as 150mm\nWhisper-Quiet Italian Hydraulic / Gearless Drive\nSmart Home Automation & Keypad Integration",
            'image' => 'assets/images/service_home.jpg',
            'button_text' => 'Design Your Lift',
            'sort_order' => 5,
            'is_active' => 1
        ],
        [
            'title' => 'Commercial & High-Speed Elevators',
            'slug' => 'commercial-elevators',
            'icon_svg' => '<rect x="4" y="2" width="16" height="20" rx="2" /><line x1="12" y1="18" x2="12" y2="18.01" /><line x1="12" y1="14" x2="12" y2="14.01" /><line x1="12" y1="10" x2="12" y2="10.01" /><line x1="12" y1="6" x2="12" y2="6.01" />',
            'short_desc' => 'High-capacity, high-speed passenger elevators engineered for Dubai towers, corporate headquarters, and commercial centers.',
            'full_desc' => 'Built to handle heavy traffic flow with high-speed travel up to 4.0 m/s. Equipped with destination dispatch intelligence, card-access security integration, and durable architectural stainless-steel finishes.',
            'features' => "Speeds up to 4.0 m/s with Zero Cabin Sway\nSmart Destination Dispatch Control\nAccess Control Integration (RFID / Biometric)\nHeavy-Duty 24/7 Continuous Duty Cycle",
            'image' => 'assets/images/hero_commercial.jpg',
            'button_text' => 'Get Engineering Quote',
            'sort_order' => 6,
            'is_active' => 1
        ],
        [
            'title' => 'Panoramic Glass Elevators',
            'slug' => 'panoramic-glass-elevators',
            'icon_svg' => '<circle cx="12" cy="12" r="10" /><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20" /><path d="M2 12h20" />',
            'short_desc' => 'Breathtaking 360-degree glass lifts creating an architectural masterpiece for luxury villas, hotels, and atrium malls.',
            'full_desc' => 'Combining structural glass engineering with minimalist stainless steel frameworks. Available in curved cylindrical or polygonal shapes, offering unobstructed vistas as you travel between floors.',
            'features' => "Curved or Flat Laminated Safety Glass\nFrameless Architectural Enclosures\nIntegrated Ambient LED Halo Lighting\nIndoor & Outdoor Weatherproof Construction",
            'image' => 'assets/images/service_panoramic.jpg',
            'button_text' => 'Explore Glass Lifts',
            'sort_order' => 7,
            'is_active' => 1
        ],
        [
            'title' => 'Escalators & Moving Walks',
            'slug' => 'escalators-moving-walks',
            'icon_svg' => '<path d="M3 21h4l8-14h6" /><circle cx="6" cy="19" r="1" />',
            'short_desc' => 'Heavy-duty commercial escalators and travelators engineered for shopping malls, airports, and transit hubs across the UAE.',
            'full_desc' => 'Continuous passenger flow engineered with energy-conserving sensors, auto-sleep speed controllers, skirt lighting, and fail-safe multi-braking mechanisms.',
            'features' => "30° and 35° Inclination Configurations\nAutomatic Eco-Standby Energy Sensors\nComb Plate Safety & Step Sag Detection\nIndoor and Semi-Outdoor Weatherproofing",
            'image' => 'assets/images/service_escalators.jpg',
            'button_text' => 'Escalator Solutions',
            'sort_order' => 8,
            'is_active' => 1
        ]
    ];
    $stmt = $mysqli->prepare("INSERT INTO services (title, slug, icon_svg, short_desc, full_desc, features, image, button_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    foreach ($services as $srv) {
        $stmt->bind_param("ssssssssii", $srv['title'], $srv['slug'], $srv['icon_svg'], $srv['short_desc'], $srv['full_desc'], $srv['features'], $srv['image'], $srv['button_text'], $srv['sort_order'], $srv['is_active']);
        $stmt->execute();
    }
    echo "Services seeded.\n";
}

// Seed Projects if empty
$res = $mysqli->query("SELECT COUNT(*) as cnt FROM projects");
$row = $res->fetch_assoc();
if ($row['cnt'] == 0) {
    $projects = [
        [
            'title' => 'Signature Villa Panoramic Lift',
            'slug' => 'signature-villa-panoramic-lift',
            'category' => 'Luxury Villas',
            'location' => 'Palm Jumeirah, Dubai',
            'client_name' => 'Private Residence',
            'completion_year' => '2024',
            'description' => 'A bespoke cylindrical panoramic glass elevator installed inside a multi-tier luxury beachfront mansion on Palm Jumeirah. Includes custom rose-gold PVD steel finishes and Italian marble flooring.',
            'image' => 'assets/images/hero_panoramic.jpg',
            'is_featured' => 1,
            'sort_order' => 1,
            'is_active' => 1
        ],
        [
            'title' => 'Royal Residence Custom MRL Lift',
            'slug' => 'royal-residence-custom-mrl-lift',
            'category' => 'Luxury Villas',
            'location' => 'Emirates Hills, Dubai',
            'client_name' => 'Royal Villa Project',
            'completion_year' => '2024',
            'description' => 'Architectural gearless traction elevator featuring whisper-silent operation, zero machine room requirement, smart touchscreen destination COP, and ultra-smooth start and stop curves.',
            'image' => 'assets/images/hero_luxury_home.jpg',
            'is_featured' => 1,
            'sort_order' => 2,
            'is_active' => 1
        ],
        [
            'title' => 'Corporate Business Tower Elevators',
            'slug' => 'corporate-business-tower-elevators',
            'category' => 'Commercial',
            'location' => 'Business Bay, Dubai',
            'client_name' => 'Apex Tower Holdings',
            'completion_year' => '2023',
            'description' => 'High-speed dual-car passenger elevator installation with destination dispatch control, reaching 3.5 m/s with synchronized access card scanners and energy-efficient regenerative drives.',
            'image' => 'assets/images/hero_commercial.jpg',
            'is_featured' => 1,
            'sort_order' => 3,
            'is_active' => 1
        ],
        [
            'title' => 'Five-Star Hotel Atrium Glass Lifts',
            'slug' => 'five-star-hotel-atrium-glass-lifts',
            'category' => 'Panoramic Glass',
            'location' => 'Downtown Dubai',
            'client_name' => 'Grand Millennium Hotel',
            'completion_year' => '2023',
            'description' => 'Twin panoramic scenic lifts ascending through a 14-story open atrium. Features illuminated glass under-capsules, mirror-finish stainless frames, and whisper quiet travel.',
            'image' => 'assets/images/service_panoramic.jpg',
            'is_featured' => 1,
            'sort_order' => 4,
            'is_active' => 1
        ],
        [
            'title' => 'Retail Mall Heavy Passenger Escalators',
            'slug' => 'retail-mall-heavy-passenger-escalators',
            'category' => 'Escalators',
            'location' => 'Al Barsha, Dubai',
            'client_name' => 'Al Barsha Mall Group',
            'completion_year' => '2023',
            'description' => 'Four pairs of heavy continuous duty commercial escalators equipped with smart energy-saving standby radar and LED side skirting indicators.',
            'image' => 'assets/images/service_escalators.jpg',
            'is_featured' => 1,
            'sort_order' => 5,
            'is_active' => 1
        ],
        [
            'title' => 'Modern Luxury Penthouse Glass Shaft',
            'slug' => 'modern-luxury-penthouse-glass-shaft',
            'category' => 'Luxury Villas',
            'location' => 'Dubai Marina',
            'client_name' => 'Marina Sky Residence',
            'completion_year' => '2024',
            'description' => 'Custom retrofitted frameless glass lift serving a triplex penthouse, engineered with minimal pit requirements and custom gold titanium interior appointments.',
            'image' => 'assets/images/service_home.jpg',
            'is_featured' => 1,
            'sort_order' => 6,
            'is_active' => 1
        ]
    ];
    $stmt = $mysqli->prepare("INSERT INTO projects (title, slug, category, location, client_name, completion_year, description, image, is_featured, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    foreach ($projects as $p) {
        $stmt->bind_param("ssssssssiii", $p['title'], $p['slug'], $p['category'], $p['location'], $p['client_name'], $p['completion_year'], $p['description'], $p['image'], $p['is_featured'], $p['sort_order'], $p['is_active']);
        $stmt->execute();
    }
    echo "Projects seeded.\n";
}

// Seed Reviews if empty
$res = $mysqli->query("SELECT COUNT(*) as cnt FROM reviews");
$row = $res->fetch_assoc();
if ($row['cnt'] == 0) {
    $reviews = [
        [
            'client_name' => 'Tariq Al Mansoori',
            'client_title' => 'Villa Owner',
            'company' => 'Palm Jumeirah',
            'rating' => 5,
            'review_text' => 'Sigma Height Elevators installed our 3-stop panoramic glass lift in Palm Jumeirah. The high precision engineering, silent hydraulic drive, and impeccable gold finish exceeded all our expectations. Exceptional service!',
            'sort_order' => 1,
            'is_active' => 1
        ],
        [
            'client_name' => 'Sarah Al Hashimi',
            'client_title' => 'Managing Director',
            'company' => 'Hashimi Real Estate, Business Bay',
            'rating' => 5,
            'review_text' => 'Their team modernized two commercial high-speed lifts in our corporate tower. Energy consumption dropped notably, breakdown calls became zero, and our tenants praised the buttery smooth floor leveling.',
            'sort_order' => 2,
            'is_active' => 1
        ],
        [
            'client_name' => 'Marc Van Houten',
            'client_title' => 'Chief Architect',
            'company' => 'Studio Architecture Dubai',
            'rating' => 5,
            'review_text' => 'As an architect, finding an elevator contractor who respects custom cabin drawings and slim pit dimensions is rare. Sigma Height worked closely with our CAD team and delivered a true work of art.',
            'sort_order' => 3,
            'is_active' => 1
        ],
        [
            'client_name' => 'Rashid Al Nuaimi',
            'client_title' => 'Operations Director',
            'company' => 'Nuaimi Hospitality',
            'rating' => 5,
            'review_text' => 'Sigma handles our 24/7 AMC across multiple properties in Dubai. Their technician response time during emergencies is within 25 minutes. Extremely trustworthy elevator partner.',
            'sort_order' => 4,
            'is_active' => 1
        ]
    ];
    $stmt = $mysqli->prepare("INSERT INTO reviews (client_name, client_title, company, rating, review_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?)");
    foreach ($reviews as $rev) {
        $stmt->bind_param("sssisii", $rev['client_name'], $rev['client_title'], $rev['company'], $rev['rating'], $rev['review_text'], $rev['sort_order'], $rev['is_active']);
        $stmt->execute();
    }
    echo "Reviews seeded.\n";
}

// 6. Create SMTP Settings Table
$mysqli->query("CREATE TABLE IF NOT EXISTS smtp_settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    is_enabled TINYINT(1) DEFAULT 1,
    smtp_host VARCHAR(255) DEFAULT 'smtp.hostinger.com',
    smtp_port INT DEFAULT 465,
    smtp_crypto VARCHAR(20) DEFAULT 'ssl',
    smtp_user VARCHAR(255) DEFAULT 'info@sigmaheightelevators.com',
    smtp_pass VARCHAR(255) DEFAULT '07Uis2742*',
    from_email VARCHAR(255) DEFAULT 'info@sigmaheightelevators.com',
    from_name VARCHAR(255) DEFAULT 'Sigma Height Elevators LLC',
    reply_to VARCHAR(255) DEFAULT 'info@sigmaheightelevators.com',
    admin_email VARCHAR(255) DEFAULT 'info@sigmaheightelevators.com',
    send_inquiry_notification TINYINT(1) DEFAULT 1,
    send_customer_confirmation TINYINT(1) DEFAULT 1,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)");

$res = $mysqli->query("SELECT COUNT(*) as cnt FROM smtp_settings");
if ($res) {
    $row = $res->fetch_assoc();
    if ($row['cnt'] == 0) {
        $mysqli->query("INSERT INTO smtp_settings (is_enabled, smtp_host, smtp_port, smtp_crypto, smtp_user, smtp_pass, from_email, from_name, reply_to, admin_email, send_inquiry_notification, send_customer_confirmation)
        VALUES (1, 'smtp.hostinger.com', 465, 'ssl', 'info@sigmaheightelevators.com', '07Uis2742*', 'info@sigmaheightelevators.com', 'Sigma Height Elevators LLC', 'info@sigmaheightelevators.com', 'info@sigmaheightelevators.com', 1, 1)");
    }
}

// 7. Create Admin Users Table
$mysqli->query("CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    name VARCHAR(100) DEFAULT 'Admin Manager',
    email VARCHAR(150) DEFAULT 'info@sigmaheightelevators.com',
    last_login DATETIME NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

$pass_hash = password_hash('5+years.com', PASSWORD_BCRYPT);
$stmt = $mysqli->prepare("INSERT INTO admin_users (username, password_hash, name, email) VALUES ('admin', ?, 'Admin Manager', 'info@sigmaheightelevators.com') ON DUPLICATE KEY UPDATE password_hash = VALUES(password_hash)");
$stmt->bind_param("s", $pass_hash);
$stmt->execute();

echo "Database Migration and Seeding complete!\n";


