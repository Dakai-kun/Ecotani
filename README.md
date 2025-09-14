# Ecotani 🌱

Ecotani adalah aplikasi berbasis **Laravel** (backend API) dan **React + Vite** (frontend) untuk mendukung ekosistem pertanian ramah lingkungan.

---

## 🚀 Fitur Utama
- Autentikasi pengguna (login, register, logout)  
- Manajemen produk & kategori (plastik, logam, organik, elektronik, kertas, kaca, tekstil, baterai)  
- Rekomendasi produk dengan bantuan AI  
- Chatbot AI berbasis React (Zanu AI Assistant)  

---

## 📦 Persyaratan

Sebelum menjalankan proyek ini, pastikan sudah terpasang di komputer kamu:

- [PHP 8.1+](https://www.php.net/)  
- [Composer](https://getcomposer.org/)  
- [Node.js 18+ & npm/yarn](https://nodejs.org/)  
- Database (MySQL/PostgreSQL)  
- Git  

---

## ⚙️ Instalasi

1. Clone repository
   git clone https://github.com/Dakai-kun/Ecotani.git
   cd Ecotani
   
2. Install dependensi Laravel
    composer install

3. Install dependensi React (Vite)
    cd frontend   # jika folder React ada di "frontend"
    npm install
   
4. Salin file .env
    cp .env.example .env

5. Generate application key
    php artisan key:generate

🛠️ Konfigurasi
1. Buka file .env dan sesuaikan:
    APP_NAME=Ecotani
    APP_ENV=local
    APP_KEY=base64:xxxx
    APP_URL=http://127.0.0.1:8000
    
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=ecotani
    DB_USERNAME=root
    DB_PASSWORD=

2. Atur konfigurasi API (jika menggunakan AI, GROQ, atau OpenAI):
    GROQ_API_KEY=your_api_key_here

▶️ Menjalankan Aplikasi
1. Jalankan backend (Laravel):
    php artisan serve
    Akan berjalan di: http://127.0.0.1:8000

2. Jalankan frontend (React + Vite):
    npm run dev
    Akan berjalan di: http://localhost:5173

🗄️ Migrasi Database & Seeder
1. Untuk membuat tabel database:
    php artisan migrate

2. Untuk isi data awal:
    php artisan db:seed

3. Jika perlu reset:
    php artisan migrate:fresh --seed

✅ Testing
    php artisan test






z
