# Employee Management System
<p> Axis is a employee management system created specifically for companies to systematically organize employee structure coupled with features that enables you to see their credentials and punctuality. This website is suitable for start-ups and business firms that is in need of intelligible monitoring tool that is easy to handle and utilize.
</p>

## Usage
### Functions

<p> It has two sides employee and admin side. </p>

**Employee** has:
- Attendance module
	- Attendance
        - Entry time and Entry location
        - Exit time and Exit location
	- List of attendance 
- Leaves
	- Apply for leaves
	- Review leave status
    - list of leaves
- View List of Holiday 
- Profile
    - View profile 
	- Edit profile information
	- Change password 

**Admin** has:
- Dashboard
    - Monitor attendance
        - Present, absent, on leave, total employee
- Employee module
    - View, Edit, and Delete employee
- Add employee
- Employee attendance
- Employees leave request
    - view, edit(approved or decline) and delete
- Holidays
    - View, Edit, and Delete
- System Management
    - Position
         - View, Edit, and Delete
    - Department
        - View, Edit, and Delete
    - Role
        - View, Edit, and Delete


## Themes, plugins, packages used for developement
Following are the assets used for this project
-	[AdminLTE](https://github.com/jeroennoten/Laravel-AdminLTE) a bootstrap and jquery based admin dashboard theme with integration in Laravel
    - Tempus Dominus for Bootstrap 4 
    - DataRangePicker   for date pickers
    - DataTables   for responsive table
- [Chart.js](https://www.chartjs.org/) Simple yet flexible JavaScript charting for designers & developers
- [Nominatim](https://nominatim.org/) an open source geocoding API.
    - https://nominatim.openstreetmap.org


### Installation instruction
  
* git clone https://github.com/lim-crypto/Employee-management-system.git 
* composer install
* create database and named it employee_management_system
* create .env file  
* copy the .env.example and paste to .env
* php artisan key:generate
* php artisan migrate --seed
* php artisan storage:link 
* php artisan serve

### credentials:
* email : admin@gmail.com 
password :  admin 
* email : user@gmail.com 
password  :  user 
      
   


## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.
