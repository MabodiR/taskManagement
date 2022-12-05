<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Task Management

This is a task Management app that allows supervisors to create task for their subordinates and vise versa, subordinates get a mail notification each time a new task is assigned to them, supervisor and subordinates are allowed to manage their task, edit and delete. Supervisor and subordinates have the capabilities to comment on each task and update its status whether complete or still in progress. Each time a user comment on a task, assignor of the task get a mail notification about the comment.

## Features

- **[Registration]**
- **[Login]**
- **[Create Task]**
- **[Edit Task]**
- **[Delete Task]**

- **[Assign Task]**
- **[Re-Assign task]**

- **[Add Project]**
- 
- **[Mail Notification]**


## Instalation Instruction

Requires PHP  >=8.0 
Requires MySQL  8
Requires Apache 

## Steps

- **Run Composer install**
- **Run cp .env.example .env**
- **Run php artisan key:generate**
- **Run php artisan migrate**
- **Run php artisan db:seed**
- **Run php artisan serve**

##.env


## Users

'email' => 'subordinate1@calidad.co.za',
'role' => 'subordinate'
'password' => 'password'

'email' => 'supervisor@calidad.co.za',
'role' => 'supervisor'
'password' => 'password'


