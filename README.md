# backend-course-project-rokussadee

## Context
This project was made in the context of a backend development course at the Erasmushogeschool Brussels in 2022.
The aim was to create an administrative tool that allows the creation of forms, questions and sessions that can be shared using a public link created by the administrator (e.g. a psychologist) that can be completed by a recipient (e.g. a patient). Forms and questions have a many-to-many relationship, meaning that the forms can share the same questions. Each question belongs to a category, and each time a form is completed and submitted, a form-result is created and returned back to the administrator that created / shared the form in question.

## Usage
Set up a local mysql database and add an .env file, such as the example shown in [.env.example](https://github.com/EHB-MCT/backend-course-project-rokussadee/blob/master/feedback-tool/.env.example).
Ideally, you should set up a mailing service to test the mail functionalities.
After cloning the repository run the following commands (make sure you are on the 'feedback-tool' directory):

```bash
npm install
composer install
php artisan migrate:refresh
php artisan db:seed
php artisan serve
```

To access admin features, login with following credentials:
```bash
admin@ehb.be 
admin 
```

## Acknowledgements:
- [MailController](https://www.itsolutionstuff.com/post/laravel-9-mail-laravel-9-send-email-tutorialexample.html)
- [jQuery autosearch](https://www.tutsmake.com/laravel-8-autocomplete-search-from-database-tutorial/)
- [Str::slug automated string creation](https://www.mywebtuts.com/blog/how-to-use-str-slug-helper-function-in-laravel)

