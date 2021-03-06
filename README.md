# StackBoard
IT forum with Laravel where there is two type of user (Admin & Normal). Both can create threads and respond to them.

The normal user can edit or delete his own threads (and can delete his replies).

The admin can create categories and tags for threads and moderate all threads, replies and users.

Authentication is handled with JetStream. Using Blade and it's UI kit, icons and TailWindCSS for styling.

# UML Diagrams
(Class, Use Case, Activity, Sequence)

<img src="https://user-images.githubusercontent.com/9354045/125312389-21cbc280-e32c-11eb-8d5d-5a43c23787e4.png" width="44%"></img>
<img src="https://user-images.githubusercontent.com/9354045/125312397-22fcef80-e32c-11eb-8c0e-9adc66442cc4.png" width="21.8%"></img>
<img src="https://user-images.githubusercontent.com/9354045/125312398-23958600-e32c-11eb-8609-1b789d92435c.png" width="15%"></img>
<img src="https://user-images.githubusercontent.com/9354045/125312399-242e1c80-e32c-11eb-82d9-9aed13163af9.png" width="14.4%"></img>


# Setup
1) Install dependencies and packages
```bash
composer install
```

```bash
npm install
```

2) Copy or rename .env.example into .env.

3) Create an empty database and type it's credentials into your .env file.

4) Generate an APP_KEY:
```bash
php artisan key:generate
```

5) Migrate and seed the database:
```bash
php artisan migrate --seed
```

6) Run Laravel's Local Development Server:
```bash
php artisan serve
```

7) To login as admin and moderate:
email: admin@email.com
password: admin123**

- To login as a normal user, register or connect with:
email: johndoe@email.com
password: johndoe
