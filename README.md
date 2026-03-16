# Journal App

Journal App is a simple productivity web application built with PHP using a custom MVC architecture.
The goal of the project is to help users organize their daily life by combining a diary, journal reflections, and a todo list in one place.

## Features

* Daily session system to organize entries by date
* Write personal diary entries
* Add journal reflections
* Create and manage a daily todo list
* Mark tasks as completed
* Task priority selection (High, Normal, Low)
* Simple and clean interface

## Tech Stack

* **Backend:** PHP
* **Database:** MySQL
* **Frontend:** HTML, CSS
* **Architecture:** Custom MVC pattern

## Project Architecture

The application follows a basic MVC structure:

* **Models**

  * Handle database queries and data management.

* **Controllers**

  * Contain the application logic and connect models with views.

* **Views**

  * Responsible for displaying the user interface.

Example structure:

App/
├── controllers/
├── models/
└── views/

## How the Application Works

1. The user creates or opens a daily session.
2. Within the session, the user can:

   * Write a diary entry for the day.
   * Add journal reflections.
   * Create and manage a todo list.
3. Tasks can be marked as completed and will appear crossed out in the interface.

## Learning Goals

This project was built to practice and understand:

* PHP backend development
* MVC architecture
* Routing systems
* Controller logic
* Database interaction
* Building a small productivity application from scratch

## Possible Future Improvements

* User authentication system
* AJAX-based todo updates (without page reload)
* Filtering tasks by priority
* UI/UX improvements
* Productivity statistics and tracking
* Mobile-friendly design

## Author

Developed as a learning project while studying backend development with PHP.
