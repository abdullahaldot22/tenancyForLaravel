# Demo Saas Application

with **Tenancy For Laravel** *(Separate Database for Each Tenant)* & Spatie **Laravel-Permission**.


```bash
git clone [git url]
```
Copy all the code of `.env.example` & pest in newly created `.env` file. 

Now, create a mysql local database named **tenancyforlaravel**. *(Default)*
**Open terminal** in the project directory.
```bash
npm install
```
```bash
composer update
```
If you want, you can generate a new key with 
```bash
php artisan key:generate
```
Run the command for migrate table and seed the database
```bash
php artisan migrate --seed
```
Now, fire up 2 terminal or 2 terminal tab & run each command separately 
```bash
npm run dev
```
```bash
php artisan serve
```
Now, open and search in browser with url
```
http:\\localhost:8000
```
The default created credential for first **Super-admin** *(Landlord)* and all the **Tenants** first **Admin** 
E-mail :
```mail
a@b.com
```
Password :
```text
Pa$$w0rd!
```

