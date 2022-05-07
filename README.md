# phpApache-MySql-docker/swarm-css/sass

# Description
An online course website. 
The Front-end render: the Index module, the Authentification module, the Course module, the Q&A Module(via a Chat), the User Account module. 
The Back-end allow the administrator to moderate any input from the client (questions, comments, or reviews).

## Authentification
> The Activation of the client account is based on email validation (using Sendgrid).

## Course
> Display the lessons. 

## Q&A 
> A Chat is implemented, allowing the Instructor or other users to answer questions, the mailing implementation will notify users for follow-ups based on the response from others.

## User Account
> Each member own his account, credentials and reviews can be modify, A profile picture can be add. 

# Technologies
- PHP (OOP)
- MySQL
- Apache
- Sendgrid
- Docker-Swarm

# Key issues
- The application is design as a framework
- The code follow the MVC structure
- Easily scalable and DRY as a central library is available to all modules(index, authentification, account, etc)
- Deployed using a Digital Ocean droplet

# Technical description
The project may looks like simple but behind the scene its implementation follow good practices. It has been built from scratch, 100% OOP. With the aim of depending at least dependencies, so most of the features as been implemented (csrf token, session’s management, cache system, logging system, etc.).

# Downsides
No testing implementation. The User’s profile picture is store on the server which will lead to problems at scale time(if scale time). This is an old school style website PHP-Apache-Mysql-javascript, but sill it works very-well.

