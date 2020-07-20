Creating One Class For All DB Entities
===================================

This repository stores code according to the specified topic. The code for creating db and connecting to the database, as well as other CRUD functions are left to the reader's taste.

The basic concept
------------

### Assume there are
- DB named "Store"
- db Table "Users".
- Inside this table you have user_id, username and email fields.
- db Table "Products".
- Inside this table you have product_id, product_name and cost fields.

### You want to
- create an object that contains all CRUD methods that extends all other objects.
- create an object with a method that reads fields in the database table for the corresponding object (class "User" or class "Product")

### The solution can be observed in the files.

I hope I have explained everything in an accessible way. If you have any questions, write in a personal and i will try to answer =)
