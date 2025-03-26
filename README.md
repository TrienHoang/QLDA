# Hướng Dẫn Chạy Dự Án Laravel

## 1. **Clone Project**
```bash
git clone https://github.com/TrienHoang/QLDA
```

## 2. **Cài đặt PHP Library**
```bash
# Tạo thư mục vendor
composer update
```

## 3. **Cài đặt JS Library**
```bash
# Tạo thư mục node_modules
npm i
```

## 4. **Tạo file .env**
```bash
# Copy file mẫu
copy .env.example
tạo và paste vào .env

# Cấu hình file .env theo dự án
```

## 5. **Tạo Database**
```bash
php artisan migrate
```

## 6. **Tạo Dữ Liệu Giả (Fake Data)**
```bash
php artisan db:seed
```

## 7. **Tạo App Key**
```bash
php artisan key:generate
```

## 8. **Chạy Dự Án**
```bash
# Chạy frontend
npm run dev

# Chạy backend
php artisan serve

# Hoặc dùng composer (nếu có cấu hình)
composer run dev
```

# Hướng Dẫn Tạo Feature Branch Trong Dev

## 1. **Kiểm tra nhánh hiện tại**
```bash
git branch
```
- Xem đang ở nhánh nào (thường là `main` hoặc `dev`).

## 2. **Chuyển sang nhánh `dev`**
```bash
git checkout dev
```
- Đảm bảo đang làm việc trên nhánh `dev`.

## 3. **Tạo Feature Branch**
```bash
git checkout -b feature/<ten-task>
```
- Ví dụ:
```bash
git checkout -b feature/add-product-page
```
- **`feature/`** là tiền tố để nhận biết đây là nhánh tính năng.
- **`add-product-page`** là tên cụ thể của tính năng.

## 4. **Làm việc trên Feature Branch**
- Viết code, sửa đổi file cần thiết.

## 5. **Commit thay đổi**
```bash
git add .
git commit -m "<Mo ta ngan gon ve thay doi>"
```
- Ví dụ:
```bash
git commit -m "Thêm giao diện trang sản phẩm"
```

## 6. **Push nhánh lên GitHub**
```bash
git push -u origin feature/<ten-task>
```
- Ví dụ:
```bash
git push -u origin feature/add-product-page
```

## 7. **Tạo Pull Request (PR)**
- Lên GitHub → Chọn nhánh vừa push → **Create Pull Request**.
- Nhờ team review, sau đó merge vào **dev**.

## 8. **Xóa nhánh sau khi merge (nếu muốn)**
```bash
git branch -d feature/<ten-task>
```
- Ví dụ:
```bash
git branch -d feature/add-product-page
```

---