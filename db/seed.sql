CREATE TABLE IF NOT EXISTS records (
  id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(100),
  phone VARCHAR(20),
  reference VARCHAR(20),
  branch VARCHAR(50)
);

INSERT INTO records (full_name, phone, reference, branch) VALUES
('Adaeze Okonkwo', '08031234567', 'REF-A1B2C3', 'Lagos'),
('Emeka Nwosu', '08147891234', 'REF-D4E5F6', 'Abuja'),
('Fatima Bello', '07065432198', 'REF-G7H8I9', 'Kano'),
('Chukwudi Eze', '08023456789', 'REF-J1K2L3', 'Port Harcourt'),
('Ngozi Obi', '08112345678', 'REF-M4N5O6', 'Enugu'),
('Taiwo Adeyemi', '07034567890', 'REF-P7Q8R9', 'Ibadan'),
('Uche Okafor', '08156789012', 'REF-S1T2U3', 'Benin City'),
('Amina Yusuf', '08067890123', 'REF-V4W5X6', 'Kaduna'),
('Biodun Olatunji', '07045678901', 'REF-Y7Z8A9', 'Abeokuta'),
('Chidinma Ike', '08178901234', 'REF-B1C2D3', 'Owerri'),
('Rotimi Adeleke', '08089012345', 'REF-E4F5G6', 'Ilorin'),
('Zainab Musa', '07056789012', 'REF-H7I8J9', 'Maiduguri'),
('Ikenna Obiora', '08190123456', 'REF-K1L2M3', 'Onitsha'),
('Sade Coker', '08001234567', 'REF-N4O5P6', 'Lagos'),
('Tunde Bakare', '07012345678', 'REF-Q7R8S9', 'Akure'),
('Halima Abdullahi', '08123456789', 'REF-T1U2V3', 'Sokoto'),
('Obinna Chukwu', '08034567890', 'REF-W4X5Y6', 'Umuahia'),
('Kemi Adewale', '07045678901', 'REF-Z7A8B9', 'Osogbo'),
('Nnamdi Obi', '08145678901', 'REF-C1D2E3', 'Awka'),
('Blessing Eze', '08056789012', 'REF-F4G5H6', 'Calabar');
