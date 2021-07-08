# docker-htaccess-phpApache-MySql

# Description
A simple online course website. Include an Index section(presentation, author, contact/mail). An Authentification section, a Lesson section, a Q&A section, a User Account section. As well a Back-end allow the admin to moderate any question, comment, or review.

## Signup
> An email is sent for the student to activate an account validation’s link

## Course
> Only one course, as soon as a lesson is finish the next one won't be available before 96 hours(specific to the aim of this course). The student can review the course at the end of each chapter, the review can be edited at anytime in the User Account

## Q&A 
> Questions can be answer by any students, a mailing system notify all participants if any new answer

## User Account
> Each member own his account, where he can modify his credentials, modify his review, add a profile picture and consult any notification’s messages. 

# Technologie
Wrote in PHP (OOP), the code follow the MVC structure, easily scalable and DRY as a central library is available to all modules. The App load using a .htaccess and a Bootstrap class loader. The design is responsive using SASS to optimise the implementation of the CSS. Some Javascript also complete various effects.

# Technical description
The project looks like simple but behind the scene it implements a lots of good practices. It has been built from scratch, 100% OOP, as it depends of almost no dependencies all features as been implemented manually (csrf token, session’s management, cache system, logging system, etc.). Also as mush as possible some design patterns are implemented like Dependencies injection,  Observables, Factory, Strategy.

# Downsides
No testing implementation, as PHP was just a language I used during studies I did not learn about PHP testing library. The User’s profile pictures are store on the server which will be a problem at scale time(if scale time). This is a old school style website PHP-Apache-Mysql-javascript.

![Minion](https://octodex.github.com/images/minion.png)
