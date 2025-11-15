# Balaji Hotel And Lodge - Website

Yeh ek PHP-based hotel booking website hai jo XAMPP environment mein run hota hai.

## Project Overview

Yeh project **Balaji Hotel And Lodge Chimur** ke liye banaya gaya hai. Ismein yeh features hain:

-   Room booking system
-   Gallery section
-   Blog section
-   Contact form
-   Admin panel (admin users ke liye)
-   Dynamic content management

## Requirements

1. **XAMPP** (PHP 7.4+ aur MySQL ke saath)
2. **Web Browser** (Chrome, Firefox, Edge, etc.)

## Installation Steps (Setup)

### Step 1: XAMPP Start Karein

1. XAMPP Control Panel kholen
2. **Apache** aur **MySQL** services ko **Start** karein
    - Apache: Web server ke liye
    - MySQL: Database ke liye

### Step 2: Database Setup

1. Browser mein jayein: `http://localhost/balajihotelandlodge/install.php`
2. Install script automatically:

    - Database `balaji_hotel` create karega
    - Saare tables banayega
    - Demo data (rooms, gallery, blog posts) add karega
    - Admin user create karega

3. Agar sab kuch sahi hai, to aapko message dikhega:
    ```
    Install complete. Default admin: admin / admin123
    ```

### Step 3: Website Access Karein

Browser mein jayein:

```
http://localhost/balajihotelandlodge/
```

ya

```
http://localhost/balajihotelandlodge/index.php
```

## Default Credentials

**Admin Login:**

-   Username: `admin`
-   Password: `admin123`

_(Note: Admin panel ka URL project mein define nahi hai, lekin admin_users table mein admin user create hota hai)_

## Project Structure

```
balajihotelandlodge/
├── index.php              # Main homepage
├── about.php              # About page
├── room.php               # Room details page
├── gallery.php            # Gallery page
├── blog.php               # Blog page
├── contact.php            # Contact page
├── book_room.php          # Room booking page
├── install.php            # Database installer (pehli baar run karein)
├── migrate.php            # Database migration script
├── include/               # PHP includes
│   ├── db.php            # Database connection
│   ├── functions.php      # Helper functions
│   ├── header.php         # Header section
│   ├── footer.php         # Footer section
│   └── ...
├── database/
│   └── schema.sql         # Database schema
├── css/                   # Stylesheets
├── js/                    # JavaScript files
├── images/                # Static images
└── uploads/               # User uploaded files
```

## Database Configuration

Database settings `include/db.php` file mein hain:

```php
DB_HOST = '127.0.0.1'
DB_NAME = 'balaji_hotel'
DB_USER = 'root'
DB_PASS = ''  // XAMPP default (empty password)
```

Agar aapka MySQL password different hai, to `include/db.php` aur `install.php` dono files mein update karein.

## Common Issues & Solutions

### Issue 1: Database Connection Error

**Solution:**

-   MySQL service XAMPP mein start hai ya nahi check karein
-   `install.php` pehle run karein

### Issue 2: Page Not Found (404)

**Solution:**

-   Apache service start karein
-   URL check karein: `http://localhost/balajihotelandlodge/`

### Issue 3: Images Load Nahi Ho Rahi

**Solution:**

-   `images/` folder check karein
-   File paths correct hain ya nahi verify karein

### Issue 4: Permission Denied (Uploads)

**Solution:**

-   `uploads/` folder ka permission check karein
-   Windows mein usually issue nahi hota, lekin agar ho to folder ko write permission dein

## Development Notes

-   PHP version: 7.4+ recommended
-   Database: MySQL 5.7+ ya MariaDB
-   Frontend: Bootstrap 4, jQuery, custom CSS
-   Image uploads: Max 2MB per file

## Important Files

-   `install.php` - Pehli baar database setup ke liye
-   `include/db.php` - Database connection settings
-   `database/schema.sql` - Complete database structure
-   `index.php` - Main entry point

## Next Steps After Installation

1. Admin panel setup (agar admin panel files hain to)
2. Site settings update karein (contact info, etc.)
3. Rooms, gallery, aur blog content customize karein
4. Booking inquiries check karein

---

**Note:** Production mein deploy karne se pehle:

-   Admin password change karein
-   Database credentials secure rakhein
-   Error reporting disable karein
-   Security best practices follow karein
