# docker-htaccess-phpApache-MySql

# Description
A simple online course website. Include an Index section(presentation, author, contact/mail). An Authentication section, a Lesson section, a Q&A section, an Account section. As well a Back-end section allow the admin to moderate any question, comment, or review.

## Signup
> A mail is sent for the student to activate an account validation’s link

## Q&A 
> Questions can be answer by any students, a mailing system notify all participants if any new answer

## Account
> Each member own his account, where he can modify his credentials, add a profile picture and consult any notification’s messages

# Technologie
Wrote in PHP (OOP), the code follow the MVC structure, easily scalable and DRY as a central library is available to all modules. The App load using a .htaccess and a Bootstrap class loader. The design is responsive using SASS to optimise the implementation of the CSS. Some Javascript also complete various effects.

# Technical description
The project looks like simple but behind the scene it implements a lots of good practices. It has been built from scratch, 100% OOP, as it depends of almost no dependencies all features as been implemented manually (csrf token, session’s management, cache system, logging system, etc.). Also as mush as possible some design patterns are implemented like Dependencies injection,  Observables, Factory, Strategy.

![Minion](https://octodex.github.com/images/minion.png)
