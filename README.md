![img.png](img.png)
## About Airsoft Information Map

Airsoft information map was developed during Kea Datamatiker semester 5 exam, by Marco Vang Pedersen.

A system that provides information about all Airsoft fields in Denmark, their location, rules, play times and prices.

A Player can:
- See all game fields in Denmark represented
- Get an overview of game days
- Gain easy access to rules 
- See an estimated number of participants
- Mark themselves as attending on chosen game days

A field owner can: 
- See an overview of the participating players for game days
- Easily change game days, times, prices etc.
- Gather usefull data about players and their tendencies.

An Admin can: 
- Do everything mentioned above, and more
- Add a new role! 

### Getting started.

These are the directions to making this project work on your own computer.

To work on the sample code, you need to clone the projects repository to your local computer, if you havent, do  that first.
https://github.com/MarcoPedersen/aim

1. Install PHP. see https://www.php.net/manual/en/install.windows.php for more details and instructions.
2. install Composer. see https://getcomposer.org/doc/00-intro.md for details and instructions.
3. Create an .env file for your configurations. Copy contents from .env.example file and configure.
4. Run migrations `php artisan migrate`
5. Run seeders  `php artisan db:seed`
6. Start application `php artisan serve`
7. Open http://127.0.0.1:8000 in a web browser.
