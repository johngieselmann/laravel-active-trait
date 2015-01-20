# laravel-active-trait
A trait for Laravel to only pull "active" rows. When the trait is applied to
a model, the queries will, by default, only find rows for that model where
the active column has a value of 1.

# Requirements

- PHP 5.4+
- Laravel 4+

# Getting Started

Copy the `src` files into your project. You can either put them in an auto-load
location like `app/models` or you can place them wherever and load them in your
`composer.json` file. The choice is yours.

Assuming the files are loaded into the app properly, it's real easy to implement
the trait in your model. Let's pretend  you have a `User` model that has an
`active` row in the database.

```
<?php

class User extends Eloquent
{
    // use the active trait for this model
    use ActiveTrait;

    ...

}
```

I know what you're thinking, "What if I want inactive rows as well?" Well,
that is easy too. You just need to call the `withInactive()` method in your
query builder. Let's pretend you need to get all active an inactive users from
your base controller...

```
<?php

class BaseController extends Controller
{

    ...

    /**
     * Get all users regardless of active state.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getAllUsers()
    {
        return $this->withInactive()->get();
    }

}
```
