# Funkblog

Requires PHP 7.4, 

### Installation instructions

* Clone repository (if using GitHub CLI): `gh repo clone nycofox/funkblog`, or similar command for other CLI/GUI.
  
* CD into the repository folder and run `composer install` to install dependencies.

* Run `npm install & npm run dev`

* Setup web server, pointing to `/public`

* Generate a key `php artisan key:generate`

* Edit the `.env` configuration file.

* Run migrations `php artisan migrate`

* Go to the website, and click on **Register**, fill in your name and email, and choose a secure password.
  The first user that registers will automatically be assigned the **admin**-role.
  
### Create new admins

* Currently the admin role will be assigned through the CLI

* For a new user, run the following

  * `php artisan tinker`
    
  * `$user = User::factory()->create(['name' => 'User Name', 'email' => 'user@host.com'])`
    
  * `$user->assignRole('admin')`
    
  * `exit`
    
  The new user can now log in (use the "Forgot Password" link to set a new password).

* For existing users:

  * `php artisan tinker`
    
  * `$user = User::whereEmail('user@host.com')->first()`

  * `$user->assignRole('admin')`

  * `exit`

(Replace "User name" and "user@host.com" with appropriate values.)

### Future considerations

* Optimize SQL, especially n+1 issues for ratings. Redis can also be used for this.

* Enable caching for high-volume delivery.

* Enable queue worker to offload tasks like sending emails.

* Admins should be able to post without approval steps.

* Allow for richer media posts (images/videos).

* Flash messages when operations are successful or needs attention.

* Implement feature and unit tests.

* Voting can be enabled for guests, using cookies to prevent double voting.

* Redis can be used for ratings instead of SQL.

* Navbar can be improved for guests.

* Users should be able to filter and sort posts based on ratings, author, popularity or age of post.

* More comments and documentation
