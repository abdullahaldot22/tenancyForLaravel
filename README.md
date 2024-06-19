# Demo Saas Application
<br>

with **Tenancy For Laravel** *(Separate Database for Each Tenant)* & Spatie **Laravel-Permission**.
<br>
<br>
<br>

Clone the git repo to deploy at your localhost 
```shell
git clone https://github.com/abdullahaldot22/tenancyForLaravel.git
```
Copy all the code of `.env.example` & pest in newly created `.env` file. 

Now, create a mysql local database named **tenancyforlaravel**. *(Default)* <br><br/>
**Open terminal** in the project directory.
```shell
npm install
```
```shell
composer update
```
<br>

If you want, you can generate a new key with 
```shell
php artisan key:generate
```
<br>

Run the command for migrate table and seed the database
```shell
php artisan migrate --seed
```
<br>

Now, fire up 2 terminal window or 2 terminal tab & run each command separately 
```shell
npm run dev
```
```shell
php artisan serve
```
<br>

Now, open and search in browser with url
```url
http:\\localhost:8000
```
<br>

The default created credential for first **Super-admin** *(Landlord)* and all the **Tenant's** first **Admin** <br>
E-mail :
```mail
a@b.com
```
Password :
```string
Pa$$w0rd!
```
After **reset**, the tenants user (admin) password will be set:
```string
123456
```
<br>

> [!NOTE]
> If you want to create new landlord, you have to go through registration. & For tenant you have to create it through landlord by default there wont be any tenant available.

