# User Management System

A simple _User Management System_ built with _Laravel 12_, featuring:

-   🔐 Authentication with Laravel Breeze
-   📝 Posts CRUD operations (Create, Read, Update, Delete)
-   👤 Each post is linked to its creator
-   🗑️ Soft deletes with restore option
-   📄 Pagination support
-   ⚡ API endpoints secured with Sanctum (tokens-based authentication)

## Features

-   Register & login system (Breeze UI)
-   Only authenticated users can create, edit, or delete posts
-   Posts belong to users and display creator info
-   Restore deleted posts easily
-   API:
    -   GET /api/posts – Paginated list of posts with user info
    -   GET /api/posts/{id} – Single post with creator info
    -   POST /api/posts – Create a new post (authenticated)

## Installation

1. Clone the repo
   bash
   git clone https://github.com/SohaTalaat/User-Management-System.git
   cd your-repo
