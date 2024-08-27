# Blog Application

This is a simple blog application built with Laravel. The project is designed to support both APIs and Blade views by using the Repository pattern for better separation of concerns and maintainability.

## Features

- User authentication (registration, login, etc.)
- Blog post creation, editing, and deletion
- Commenting on posts
- Email notifications for post authors when new comments are made
- RESTful API for posts, comments, and users

## Project Structure

The project follows a clean architecture by using the **Repository Pattern**. This allows the application to switch between Blade views and API responses with minimal code changes.

### Key Components

1. **Repositories**: The repositories handle all the data interactions with the models. They act as a layer between the controller and the models, making the code more modular and easier to maintain.

2. **Controllers**: The controllers use the repositories to perform operations and return responses either as Blade views or JSON data for APIs.

3. **Notifications**: Email notifications are sent to post authors when new comments are made on their posts.

4. **Global Scopes**: Global scopes are used to filter queries automatically, such as only fetching published posts.

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/abdelhamed19/blog.git
    cd blog
    ```

2. Install dependencies:

    ```bash
    composer install
    npm install
    ```

3. Copy the `.env.example` file to `.env` and configure your environment variables:

    ```bash
    cp .env.example .env
    ```

    Configure your database connection, mail server settings, etc., in the `.env` file.

4. Generate an application key:

    ```bash
    php artisan key:generate
    ```

5. Run database migrations:

    ```bash
    php artisan migrate
    ```

6. Seed the database (optional):

    ```bash
    php artisan db:seed
    ```

7. Run the application:

    ```bash
    php artisan serve
    ```

## Usage

The project can be accessed via both web and API routes.

### API Endpoints

The API can be accessed via `http://localhost:8000/api`. Example endpoints include:

- `POST /api/posts` - Create a new post
- `GET /api/posts` - Retrieve all posts
- `POST /api/comments` - Add a comment to a post

### Example API Request

To create a new post via the API, send a `POST` request to `http://localhost:8000/api/posts` with the following payload:

### EndPoints in Postman

https://documenter.getpostman.com/view/31513137/2sAXjGcDg3

```json
{
    "title": "My New Post",
    "content": "This is the content of the post",
    "user_id": 1
}
