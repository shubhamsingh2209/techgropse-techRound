###################
What is CodeIgniter
###################

CodeIgniter is an Application Development Framework - a toolkit - for people
who build web sites using PHP. Its goal is to enable you to develop projects
much faster than you could if you were writing code from scratch, by providing
a rich set of libraries for commonly needed tasks, as well as a simple
interface and logical structure to access these libraries. CodeIgniter lets
you creatively focus on your project by minimizing the amount of code needed
for a given task.

###################
# Question 1).
Please create a table for category , sub category and child category then fetch all parent categories from the database and put child categories inside its parent category ?
###################

RequestUrl: /category/getcategory

  - It will list down all the category with their sub-category and child category if exists
  - TABLE USED: Category

###################
# Question 2).
Create a Form for user details with image upload and save record in database with image 
###################

RequestUrl: /profiledetail/showDetailpage

  - It will open a form for user details
  - Fields : Name, email, address, city ,image select
  - TABLE USED: User
  - Assests path : assets/images/

################### 
# Question 3).
Create a product table with attributes , specification and features  ? 
-> Write a query or code to get product details with specification attributes and features
-> Write a code or query for filter product
###################

RequestUrl: /product/getProduct

  - It will list down all the product list.
  - TABLE USED: product , product_data
  - Filter : a) productid = {product table id}
             b) category = {category table id}
             c) published 
 









