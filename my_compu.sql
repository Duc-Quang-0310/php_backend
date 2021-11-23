create schema orders;
USE orders;

CREATE TABLE employee
(
	employee_id INT AUTO_INCREMENT NOT NULL,
    employee_image TEXT NOT NULL ,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phonenumber VARCHAR(255) NOT NULL,
    create_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    update_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (employee_id)
);

CREATE TABLE orders
(
	order_id INT NOT NULL AUTO_INCREMENT,
    client_image TEXT NOT NULL ,
    client_name VARCHAR(255) NOT NULL,
    employee_ID INT NOT NULL,
    status VARCHAR(255) NOT NULL,
    finish_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    address VARCHAR(255) NOT NULL,
    PRIMARY KEY (order_id),
    FOREIGN KEY (employee_ID) REFERENCES employee(employee_id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE products
(
	product_id INT NOT NULL AUTO_INCREMENT,
    product_name VARCHAR(255) NOT NULL,
    product_image TEXT NOT NULL,
    product_price VARCHAR(255) NOT NULL,
    PRIMARY KEY (product_id)
);

CREATE TABLE orders_products
(
	id INT NOT NULL AUTO_INCREMENT ,
	orders_product_id INT NOT NULL ,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (orders_product_id) REFERENCES orders(order_id) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON UPDATE CASCADE ON DELETE CASCADE
);

-- EMPLOYEE_IMAGE "https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466316/ProductImage/Employee_fhpocs.png"
-- USER_IMAGE "https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466308/ProductImage/User_oudhn7.png"

INSERT INTO employee VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466316/ProductImage/Employee_fhpocs.png", "ducquang", "$2y$10$po3THD5XrHhRW9fkdK6oa.ouz7OrIjfZWgd06YnL5LnlhImnlto/y", "Nguyễn Đức Quang", "example@gmail.com", "0964849119", DEFAULT, NULL);
INSERT INTO employee VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466316/ProductImage/Employee_fhpocs.png", "tunglam", "$2y$10$D1LcMmah2kZ6BaDu8UEjxuQMjMkj4YmiUwE5JhyFDs6u/XU6O5Uoe", "Nguyễn Tùng Lâm", "example1@gmail.com", "0964848231", DEFAULT, NULL);
INSERT INTO employee VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466316/ProductImage/Employee_fhpocs.png", "chihieu", "$2y$10$Kope.PXWFtp50j4IDlL4ZuKjnncyXXMLq4ehmhMlOsf0veD/CJE1a", "Nguyễn Chí Hiếu", "example2@gmail.com", "0965549219", DEFAULT, NULL);
INSERT INTO employee VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466316/ProductImage/Employee_fhpocs.png", "dacnong", "$2y$10$6PkWUHaYn80iZ.TA5Rvtd.hM5QH8bq5KWH3xmA5yKlg5UnDO79XSS", "Nguyễn Đắc Nông", "example3@gmail.com", "0964812345", DEFAULT, NULL);
INSERT INTO employee VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466316/ProductImage/Employee_fhpocs.png", "lamdong", "$2y$10$ebnnx/Y2mTPuxELfLk88uOeq29T1KNhFFygFIADtKmEBmT8VVS07u", "Nguyễn Lâm Đồng", "example4@gmail.com", "0964535119", DEFAULT, NULL);

-- 
INSERT INTO orders VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466308/ProductImage/User_oudhn7.png","Giàng Hải Bằng", 1 ,"done",DEFAULT, "326, Ấp Huệ Huỳnh, Xã 9, Quận Linh Bồ ,Bắc Kạn");
INSERT INTO orders VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466308/ProductImage/User_oudhn7.png","Lò Thụy Du", 2 ,"done", DEFAULT , "0 Phố Chương Di Quyết, Xã Mâu Nguyệt Phi, Quận Mạc, Đà Nẵng");
INSERT INTO orders VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466308/ProductImage/User_oudhn7.png","Đào Phúc Hòa", 3 ,"done", DEFAULT ,"3 Phố Ngô, Xã 1, Huyện Thúy Hiếu, Bến Tre");
INSERT INTO orders VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466308/ProductImage/User_oudhn7.png","Tống Quốc Huy", 4 ,"done", DEFAULT ,"51 Phố Chử Phụng Duy, Phường Ân, Quận Vi, Bà Rịa - Vũng Tàu");
INSERT INTO orders VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466308/ProductImage/User_oudhn7.png","Đồng Thành Long", 5 ,"done", DEFAULT ,"682 Phố Đoàn Khánh Cần, Phường Quảng, Huyện 02 ,Đà Nẵng");
-- 
INSERT INTO orders VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466308/ProductImage/User_oudhn7.png","Mầu Thanh Phong", 1 ,"done",DEFAULT, "063 Phố Hàng Dung Trân, Thôn Phó Thụy, Huyện Sơn, Hồ Chí Minh");
INSERT INTO orders VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466308/ProductImage/User_oudhn7.png","Lê Việt Sơn", 2 ,"done", DEFAULT , "47, Ấp 4, Xã Ngân Hoàn Khánh, Quận Quỳnh, Nam Định");
INSERT INTO orders VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466308/ProductImage/User_oudhn7.png","Hứa Anh Thái", 3 ,"done", DEFAULT ,"569, Ấp Lò Bình Phụng, Xã Tân Ánh, Huyện Trúc Khương, Quảng Nam");
INSERT INTO orders VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466308/ProductImage/User_oudhn7.png","Phạm Thế Bình", 4 ,"done", DEFAULT ,"513 Phố Du, Phường Nhạn, Huyện Biện, Hải Dương");
INSERT INTO orders VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466308/ProductImage/User_oudhn7.png","Mâu Thái Dương", 5 ,"done", DEFAULT ,"16 Phố Ninh Vân Việt, Xã 53, Quận Cương, Thái Bình");
-- 
INSERT INTO orders VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466308/ProductImage/User_oudhn7.png","Hạ Sỹ Hoàng", 1 ,"done",DEFAULT, "03 Phố Giáp Lệ Thắm, Xã Triệu Uyên Vân, Huyện 8, Hà Nội");
INSERT INTO orders VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466308/ProductImage/User_oudhn7.png","Ấu Hoàng Long", 2 ,"done", DEFAULT , "457, Thôn 1, Xã Thống Đổng, Quận Chấn Tạ, Phú Thọ");
INSERT INTO orders VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466308/ProductImage/User_oudhn7.png","Ngũ Thanh Phi", 3 ,"done", DEFAULT ,"9 Phố Đoàn Phong Loan, Thôn Thạc Vy, Huyện Lâm Thanh, Hà Nội");
INSERT INTO orders VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466308/ProductImage/User_oudhn7.png","Đương Hồng Quý", 1 ,"done", DEFAULT ,"042 Phố Phí Cường Uyên, Xã Bảo Đặng, Huyện Pháp Bạch, Hà Nội");
INSERT INTO orders VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466308/ProductImage/User_oudhn7.png","Cáp Anh Duy", 1 ,"done", DEFAULT ,"682 Phố Đoàn Khánh Cần, Phường Quảng, Huyện 02 ,Đà Nẵng");
-- 
INSERT INTO orders VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466308/ProductImage/User_oudhn7.png","Châu Huy Hà", 2 ,"done",DEFAULT, "33, Thôn Thống Lã, Xã 81, Huyện Khưu Tuệ Di, Tuyên Quang");
INSERT INTO orders VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466308/ProductImage/User_oudhn7.png","Quảng Phú Hiệp", 2 ,"done", DEFAULT , "90 Phố Mẫn Vỹ Chinh, Phường 2, Huyện Trác Thư, Hải Phòng");
INSERT INTO orders VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466308/ProductImage/User_oudhn7.png","Quảng Phú Hiệp", 3 ,"done", DEFAULT ,"5094 Phố Cấn Định Cát, Phường Cảnh Thảo, Quận 30, Đồng Nai");
INSERT INTO orders VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466308/ProductImage/User_oudhn7.png","Bạch Quang Lâm", 4 ,"done", DEFAULT ,"88 Phố Giáp, Phường Bạc Thông Mẫn, Huyện 1, Hà Tĩnh");
INSERT INTO orders VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466308/ProductImage/User_oudhn7.png","Đồng Thành Long", 1 ,"done", DEFAULT ,"67 Phố Trình Du Võ, Xã Tòng Tú Tuệ, Quận Thủy, Hưng Yên");
-- 
INSERT INTO orders VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466308/ProductImage/User_oudhn7.png","Châu Huy Hà", 4 ,"pending",DEFAULT, "4346 Phố Đặng Xuân Thiện, Xã Tú Quản, Quận Ánh Phụng Hào, Hồ Chí Minh");
INSERT INTO orders VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466308/ProductImage/User_oudhn7.png","Ngọ Hoàng Khải", 5 ,"pending", DEFAULT , "4191, Thôn Cầm Lộc, Xã 9, Quận Ca Thuận Giao, Sơn La");
INSERT INTO orders VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466308/ProductImage/User_oudhn7.png","Bạch Quang Lâm", 2 ,"cancel", DEFAULT ,"412, Thôn 15, Xã Xuân Thục, Quận Từ Thiều, Đắk Nông");
INSERT INTO orders VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466308/ProductImage/User_oudhn7.png","Lăng Hùng Sơn", 1 ,"pending",DEFAULT, "2 Phố Chử, Phường 6, Huyện Khổng Như Cầm, Hưng Yên");
INSERT INTO orders VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466308/ProductImage/User_oudhn7.png","Ân Minh Tiến", 3 ,"pending", DEFAULT , "56 Phố Chu Cầm Cẩn, Ấp Vương Khoa, Huyện Lâm Khê, Quảng Nam");
INSERT INTO orders VALUES (DEFAULT,"https://res.cloudinary.com/dsykf3mo9/image/upload/v1637466308/ProductImage/User_oudhn7.png","Cấn Quốc Trường", 4 ,"cancel", DEFAULT ,"5084 Phố Cấn Định Cát, Phường Cảnh Thảo, Quận 30, Đồng Nai");
--
INSERT INTO products VALUES (DEFAULT, "Acer Predator Helios 300", "https://res.cloudinary.com/dsykf3mo9/image/upload/v1619887564/ProductImage/helios300-2020-01_lc7u7j.jpg", "38.980.000");
INSERT INTO products VALUES (DEFAULT, "Predator Triton 500 SE", "https://res.cloudinary.com/dsykf3mo9/image/upload/v1619887390/ProductImage/triton500-01_ltb19k.jpg", "35.990.000");
INSERT INTO products VALUES (DEFAULT, "Dell Gaming G7 15 7500", "https://res.cloudinary.com/dsykf3mo9/image/upload/v1619887223/ProductImage/g77500-01_spzpj3.png", "44.990.000");
INSERT INTO products VALUES (DEFAULT, "ASUS ROG Zephyrus G15 GA503", "https://res.cloudinary.com/dsykf3mo9/image/upload/v1619886991/ProductImage/g503-1_w5izva.png", "27.990.000");
INSERT INTO products VALUES (DEFAULT, "ASUS ROG Zephyrus Duo 15", "https://res.cloudinary.com/dsykf3mo9/image/upload/v1619886851/ProductImage/zephyrus-duo-15-se-gx551-1_sn6goi.png", "120.000.000");
INSERT INTO products VALUES (DEFAULT, "MSI Stealth GS66", "https://res.cloudinary.com/dsykf3mo9/image/upload/v1619886503/ProductImage/msi-gs66-01_s7uehl.jpg", "45.000.000");
INSERT INTO products VALUES (DEFAULT, "MSI GE66 Raider", "https://res.cloudinary.com/dsykf3mo9/image/upload/v1619887564/ProductImage/helios300-2020-01_lc7u7j.jpg","51.000.000");
INSERT INTO products VALUES (DEFAULT, "MSI Gaming GT76 Titan", "https://res.cloudinary.com/dsykf3mo9/image/upload/v1619887564/ProductImage/helios300-2020-01_lc7u7j.jpg","113.000.000");
INSERT INTO products VALUES (DEFAULT, "Alienware M17 R2", "https://res.cloudinary.com/dsykf3mo9/image/upload/v1619836124/ProductImage/m17r2dark-01_pmbbx1.png", "42.499.000");
INSERT INTO products VALUES (DEFAULT, "MSI Bravo 17", "https://res.cloudinary.com/dsykf3mo9/image/upload/v1619836173/ProductImage/bravo17-01_fxrmwh.png", "24.390.000");

--
INSERT INTO orders_products VALUES (DEFAULT, 1, 1, 1);
INSERT INTO orders_products VALUES (DEFAULT, 2, 2, 1);
INSERT INTO orders_products VALUES (DEFAULT, 3, 3, 1);
INSERT INTO orders_products VALUES (DEFAULT, 4, 4, 1);
INSERT INTO orders_products VALUES (DEFAULT, 5, 5, 1);
INSERT INTO orders_products VALUES (DEFAULT, 6, 6, 1);
INSERT INTO orders_products VALUES (DEFAULT, 7, 7, 1);
INSERT INTO orders_products VALUES (DEFAULT, 8, 8, 1);
INSERT INTO orders_products VALUES (DEFAULT, 9, 9, 1);
INSERT INTO orders_products VALUES (DEFAULT, 10, 10, 1);
INSERT INTO orders_products VALUES (DEFAULT, 11, 1, 1);
INSERT INTO orders_products VALUES (DEFAULT, 12, 2, 1);
INSERT INTO orders_products VALUES (DEFAULT, 13, 3, 1);
INSERT INTO orders_products VALUES (DEFAULT, 14, 4, 1);
--
INSERT INTO orders_products VALUES (DEFAULT, 15, 5, 1);
INSERT INTO orders_products VALUES (DEFAULT, 16, 6, 1);
INSERT INTO orders_products VALUES (DEFAULT, 17, 7, 1);
INSERT INTO orders_products VALUES (DEFAULT, 18, 8, 1);
INSERT INTO orders_products VALUES (DEFAULT, 19, 9, 1);
INSERT INTO orders_products VALUES (DEFAULT, 20, 10, 1);
INSERT INTO orders_products VALUES (DEFAULT, 21, 1, 1);
INSERT INTO orders_products VALUES (DEFAULT, 22, 2, 1);
INSERT INTO orders_products VALUES (DEFAULT, 23, 1, 1);
INSERT INTO orders_products VALUES (DEFAULT, 24, 2, 1);
INSERT INTO orders_products VALUES (DEFAULT, 25, 3, 1);
INSERT INTO orders_products VALUES (DEFAULT, 26, 4, 1);