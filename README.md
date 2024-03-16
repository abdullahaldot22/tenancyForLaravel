# Demo Saas Application
<br>
with **Tenancy For Laravel** *(Separate Database for Each Tenant)* & Spatie **Laravel-Permission**.
<br>
<br>
<br>

Clone the git to deploy at your localhost 
```bash
git clone https://github.com/abdullahaldot22/tenancyForLaravel.git
```
Copy all the code of `.env.example` & pest in newly created `.env` file. 

Now, create a mysql local database named **tenancyforlaravel**. *(Default)* <br><br/>
**Open terminal** in the project directory.
```bash
npm install
```
```bash
composer update
```
<br>

If you want, you can generate a new key with 
```bash
php artisan key:generate
```
<br>

Run the command for migrate table and seed the database
```bash
php artisan migrate --seed
```
<br>

Now, fire up 2 terminal or 2 terminal tab & run each command separately 
```bash
npm run dev
```
```bash
php artisan serve
```
<br>

Now, open and search in browser with url
```
http:\\localhost:8000
```
<br>

The default created credential for first **Super-admin** *(Landlord)* and all the **Tenants** first **Admin** <br>
E-mail :
```mail
a@b.com
```
Password :
```text
Pa$$w0rd!
```
After reset, the tenants user (admin) password will be set:
```number
123456
```
<br><br>

If you want to create new landlord, you have to go through registration. & For tenant you have to create it through landlord by default there wont be any tenant available.

