### Project's Team Qua Mon
Name: Building a system to purchase  the following C2C Model
<!-- Phân quyền trên role seller và buyer -->
//GRANT TO seller
user: seller
password: seller

//COMANDS

GRANT ALL PRIVILEGES ON projectfinal.carts TO 'seller'@'localhost';

GRANT ALL PRIVILEGES ON projectfinal.images TO 'seller'@'localhost';

GRANT ALL PRIVILEGES ON projectfinal.messages TO 'seller'@'localhost';

GRANT SELECT, UPDATE ON projectfinal.notifications TO 'seller'@'localhost';

GRANT SELECT, UPDATE ON projectfinal.orders TO 'seller'@'localhost';

GRANT SELECT, UPDATE ON projectfinal.order_details TO 'seller'@'localhost';

GRANT ALL PRIVILEGES ON projectfinal.products TO 'seller'@'localhost';

GRANT ALL PRIVILEGES ON projectfinal.registration_products TO 'seller'@'localhost';

GRANT SELECT, INSERT ON projectfinal.reviews TO 'seller'@'localhost';

GRANT SELECT, INSERT, UPDATE ON projectfinal.signup TO 'seller'@'localhost';

GRANT SELECT, INSERT, UPDATE ON projectfinal.users TO 'seller'@'localhost';

GRANT ALL PRIVILEGES ON projectfinal.video_products TO 'seller'@'localhost';

GRANT SELECT, INSERT, DELETE ON projectfinal.whistlists TO 'seller'@'localhost';



user: seller
password: seller

//COMANDS

GRANT ALL PRIVILEGES ON projectfinal.carts TO 'seller'@'localhost';

GRANT SELECT ON projectfinal.images TO 'buyer'@'localhost';

GRANT ALL PRIVILEGES ON projectfinal.messages TO 'buyer'@'localhost';

GRANT SELECT, UPDATE ON projectfinal.notifications TO 'buyer'@'localhost';

GRANT SELECT, UPDATE ON projectfinal.orders TO 'buyer'@'localhost';

GRANT SELECT, UPDATE ON projectfinal.order_details TO 'buyer'@'localhost';

GRANT SELECT ON projectfinal.products TO 'buyer'@'localhost';

GRANT SELECT, INSERT ON projectfinal.reviews TO 'buyer'@'localhost';

GRANT SELECT, INSERT, UPDATE ON projectfinal.signup TO 'buyer'@'localhost';

GRANT SELECT, INSERT, UPDATE ON projectfinal.users TO 'buyer'@'localhost';

GRANT SELECT ON projectfinal.video_products TO 'buyer'@'localhost';

GRANT SELECT, INSERT, DELETE ON projectfinal.whistlists TO 'buyer'@'localhost';


<!-- Sau khi thiết lập các quyền như trên, bạn cần thực hiện câu lệnh FLUSH PRIVILEGES để MySQL cập nhật quyền mới -->


//TRIGGER

<!-- Tự động thêm dữ liệu cột email và number_phone từ bảng signup -> user -->

CREATE TRIGGER `before_signup_insert` BEFORE INSERT ON `signup`
 FOR EACH ROW BEGIN
    DECLARE new_user_id INT;

    -- Kiểm tra xem user_name và email đã tồn tại trong bảng users chưa
    IF NOT EXISTS (SELECT 1 FROM users WHERE user_name = NEW.user_name AND email = NEW.email) THEN
        -- Chèn dữ liệu vào bảng users mà không có user_id
        INSERT INTO users (user_name, number_phone, email)
        VALUES (NEW.user_name, NEW.number_phone, NEW.email);

        -- Lấy user_id tự động tăng từ bảng users
        SET new_user_id = LAST_INSERT_ID();

        -- Gán user_id vào NEW.user_id (cột user_id trong bảng signup)
        SET NEW.user_id = new_user_id;
    ELSE
        -- Nếu người dùng đã tồn tại, chỉ lấy user_id từ bảng users
        SET new_user_id = (SELECT user_id FROM users WHERE user_name = NEW.user_name AND email = NEW.email);
        SET NEW.user_id = new_user_id;
    END IF;
END

