# CarField
CarField is a full-stack web application where users can explore car information, compare cars, and interact with a community through posts and comments. The platform supports user authentication, role-based access (Admin & User), and dynamic content management.
This project demonstrates practical use of PHP, MySQL, JavaScript, and front-end fundamentals to build a real-world CRUD-based web system.

![Alt Text](https://github.com/Yousef-8/CarField/blob/70f8c6e1513717fc078d79ac745d154e9bbab893/cars2.jpg) 
![Alt Text](https://github.com/Yousef-8/CarField/blob/70f8c6e1513717fc078d79ac745d154e9bbab893/admin-panel.jpg)





##  Features

### **User**

- View car information and compare different cars
- Register and log in
- Create posts related to cars
- View others posts and comments
- Comment on other users’ posts
- Delete own comments
- Update profile picture
- Change account password

### **Admin**

- Add and remove cars from the system
- Add and remove featured posts
- Delete user posts
- Remove users from the platform


## Tech Stack

### **Backend**
- PHP

### **Database**
- MySQL
  
 ### **Database Tool**
 - MySQL Workbench 

### **Frontend**
- HTML
- CSS
- JavaScript

### **Environment**
- Local PHP & MySQL setup



## Installation & Setup

**1. Requirements**
- PHP (8.x recommended)
- MySQL
- MySQL Workbench (for database management)

**2️. Download the Project**
Clone the repository:
```bash
git clone https://github.com/Yousef-8/CarField.git
```
**3️. Create the Database**

-Open MySQL Workbench

-Create a new database:

CREATE DATABASE carfield_database;


-Open the db.sql file

-Execute the script to create tables

**4️. Configure Database Connection**

Rename config/db_example.php to config/db.php

Update credentials in the code:
```bash
$host = "localhost";
$user = "";        // your Database username
$password = "";        // your Database password
$database = "carfield_database";
```


**5️. Run the Application**

Right click on anywhere in the code and select PHP Server: Serve project


Then open your browser and search:

http://localhost:3000/home.php




## Author
Yousef

