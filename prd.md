# Product Requirements Document (PRD)

## Project Name: Araia Property Apartment Rental & Sales
**Company**: CV Pintu Langit Araia  
**Platform**: Web Application (Laravel, Tailwind CSS, Blade)

---

## 1. Product Overview
Araia Property is a web-based platform designed to facilitate apartment rentals and sales. It allows prospective tenants and buyers to browse premium apartment units (specifically around Mall Lagoon Avenue, Bekasi), view unit details, and submit booking or reservation requests. Property owners can also submit inquiries to sell or lease out their units through the platform.

---

## 2. Key Features & User Flows

### A. Guest / Public Features
1. **Homepage**
   - Displays featured apartment units, promotional banners, and high-level features.
   - Provides search/filter access to the property catalog.
2. **Property Catalog (`/properti`)**
   - Displays all available apartment units.
   - Filtering options (e.g., by status, type).
3. **Property Detail Page (`/properti/{id}`)**
   - Displays comprehensive details: price per month, number of bedrooms/bathrooms, facilities, description, and high-quality image gallery.
   - Interactive WhatsApp inquiry button.
   - "Book Now" and "Reserve Now" buttons (redirect to login/registration if unauthorized).
4. **Leasing / Selling Submission Forms (`/leasing`, `/selling`)**
   - Public forms allowing property owners to input details (name, email, phone number, property address, and description) to lease or sell their units through CV Pintu Langit Araia.
5. **Contact Page (`/contact`)**
   - Displays company address, interactive WhatsApp admin links, and a standard contact inquiry form.
6. **Multi-language Localization**
   - Fast toggle between English (`en`) and Indonesian (`id`) versions via the language selector.

### B. User Authentication & Profile Management
1. **User Authentication**
   - Secure registration, login, and logout.
   - Email verification system for new accounts.
   - Password reset via email.
2. **Profile Management (`/profile`)**
   - Update user profile details (Name, Email, Phone Number).
   - Change account password.
   - Request account deletion.

### C. Booking & Reservation System (Authenticated Users Only)
1. **Booking Unit (`/booking`)**
   - Users can request to book a unit.
   - Requires setting start date and duration.
2. **Reservation Unit (`/reservasi`)**
   - Users can place a temporary hold/reservation on a unit.
3. **User Dashboard (`/dashboard`)**
   - Authenticated users can view the status of their current and past booking requests and reservations.

---

## 3. Tech Stack
- **Backend Framework**: Laravel 11
- **Frontend Templates**: Blade & Tailwind CSS
- **Database**: MySQL (for production/development), SQLite (for automated testing)
- **Local Server Port**: `8000` (defaults for `php artisan serve`)

---

## 4. Testing Scope & Focus Areas
For automated testing via TestSprite, prioritize verifying:
1. **Localization flow**: Verifying that switching languages via `/lang/{locale}` translates page titles, menus, and forms correctly.
2. **Form submissions**: Verify validation and success handling on Leasing, Selling, and Contact forms.
3. **Auth Guards**: Verify that `/booking` and `/reservasi` forms are restricted to authenticated users.
4. **Profile management**: Verify password update and profile information change.
