# Adda Jaipur - Hackathon Submission Documentation

---

## 1. Introduction

### Overview

*Adda Jaipur* is a clothing e-commerce progressive web application designed to simplify online shopping experiences for both users and administrators. Inspired by platforms like Flipkart, Adda Jaipur provides a sleek, efficient, and user-friendly interface with essential e-commerce functionalities tailored for dynamic content and robust order management.

### Objective and Scope

The platform caters to both end-users and administrators, enabling seamless shopping and efficient management of product inventory, sales, and analytics. Built using modern web technologies, Adda Jaipur ensures a secure and scalable system.

### Tech Stack

- **Backend:** Laravel (Version X.X)
- **Frontend:** Bootstrap, jQuery
- **Database:** MySQL
- **Third-Party Libraries:**
  - Socialite (Google Authentication)
  - Razorpay (Payment Gateway)

---

## 2. Features

### User Features

1. **Add to Cart:** Users can add multiple products to their cart for easy checkout.
2. **Wishlist:** Save favorite items for future purchases.
3. **Dynamic Pages:** Experience dynamic and responsive content tailored to user preferences.
4. **Order Management:** View order details and status.
5. **Payment Gateway:** Secure and fast payments powered by Razorpay.
6. **Google Authentication:** Quick and safe login using Google accounts.
7. **Product Ratings:** Provide feedback and ratings on purchased products.

### Admin Features

1. **Dynamic Content Updates:** Manage and update content like banners, product details, and categories in real-time.
2. **CRUD Operations:** Perform Create, Read, Update, and Delete operations on products.
3. **Size and Color-wise Stock Management:** Track inventory based on product size and color variants.
4. **Analytics Dashboard:** Gain insights into sales performance and user activity through comprehensive analytics.

---

## 3. Database Schema

### Tables Overview

#### User Tables

- `user`: Stores user information, including Google authentication details.
- `cart`: Tracks products added to a user's cart.
- `wishlist`: Maintains a list of products saved by the user.
- `address`: Stores user addresses for delivery.

#### Product Tables

- `product`: Main product details.
- `category`: Product categories.
- `sub_category`: Subcategories under each category.
- `product_img`: Stores product images.
- `color`: Available colors for products.

#### Order Tables

- `order`: Order information, including user ID, payment status, and delivery address.
- `order_items`: Detailed breakdown of items in an order.
- `payment`: Payment information linked to Razorpay.

#### Other Tables

- `rating`: User feedback and product ratings.
- `dynamic_content`: Manages "About Us," "Contact Us," and "Home" sections dynamically.
- `city` and `state`: Location-based tables for address management.

### Relationships

- **One-to-Many:** A product can belong to multiple subcategories.
- **Many-to-Many:** Users can have multiple items in their wishlist or cart.
- **One-to-One:** Payment is linked to a specific order.

---

## 4. Technical Implementation

### Authentication Flow (Google Auth)

1. Implemented using Laravel Socialite.
2. Users can log in with their Google accounts.
3. User data is securely fetched and stored in the database.

### Payment Gateway Integration

1. Integrated Razorpay for seamless transactions.
2. Payments are linked to orders via the `payment` table.
3. Users can view payment status in their order history.

### Dynamic Content Management

1. Admins can update content like "About Us," "Contact Us," and homepage banners via dynamic content tables.
2. Updates reflect instantly on the user-facing interface.

---

## 5. Third-Party Libraries

### Socialite

- **Purpose:** Simplifies Google Authentication.
- **Integration:** Laravel Socialite package.

### Razorpay

- **Purpose:** Secure and scalable payment gateway.
- **Integration:** Razorpay APIs for payment processing.

---

## 6. User Workflows

### Login Process

1. User clicks on "Login with Google."
2. Redirected to Google authentication page.
3. Upon successful login, user details are stored, and access is granted.

### Adding to Cart and Placing an Order

1. Users browse products and add desired items to their cart.
2. On the checkout page, users select an address and make a payment.
3. Upon payment confirmation, the order is processed and stored.

### Product Rating System

1. After receiving an order, users can provide ratings and feedback.
2. Ratings are stored in the `rating` table and reflected on the product page.

---

## 7. Admin Workflows

### Managing Products and Stock

1. Admins can add, edit, or delete products via the admin panel.
2. Inventory can be managed size-wise and color-wise for each product.

### Viewing Analytics Dashboard

1. Admins access sales and user activity data on the dashboard.
2. Data is visualized to help track performance and trends.

### Updating Dynamic Content

1. Admins modify content in the dynamic tables.
2. Updates appear instantly on the corresponding user-facing sections.

---

## 8. Conclusion

### Highlights and Unique Selling Points

1. Simplified login process using Google Auth.
2. Secure payment processing with Razorpay.
3. Dynamic content management for flexible updates.
4. Comprehensive analytics dashboard for administrators.
5. User-friendly features like wishlist and product ratings.

### Future Scope

1. Integration of AI for personalized recommendations.
2. Advanced analytics for predictive sales trends.
3. Support for multiple languages and currencies.

---

## Acknowledgments

### Project Creators:

- **Leader:** Shreyansh Ranpariya  
- **Team Members:** Harpalsinh Sindhav, Monil Bhuva
