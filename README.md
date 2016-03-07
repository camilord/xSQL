xSQL
====

Usage Guide:

```php
$sql = new xSQL();

/**
 * DB connection
 */
$sql->connect(array(
        'host' => 'localhost';
        'username' => 'username oh';
        'password' => 'home - his password is unique';
        'database' => 'test';
));

/**
 * query single row
 */
$sql->query("SELECT * FROM table_name WHERE username = ? AND password = ? AND deleted IS NULL", array($username, $password));

// check if query have something...
if ($sql->num_rows() > 0) {

   // fetch data as normal array
   $user_data = $sql->fetch();
   
   // fetch data as associative array
   $user_data = $sql->fetch_assoc();
}

/**
 * query numbers of row
 */
$sql->query("SELECT * FROM table_name WHERE group_id = ? AND deleted IS NULL", array($username, $password));

// check if query have something...
if ($sql->num_rows() > 0) {

   // fetch all data in normal array..
   $users_data = $sql->fetch_all();
   
   // fetch all data in associative array..
   $users_data = $sql->fetch_all_assoc();
   
}

/**
 * insert a row
 */
$sql->insert("INSERT INTO table_name (name, address) VALUES (?,?)", array('Juan' , 'Bonifacio Avenue, Cagayan De Oro City'));

// get last insert id...
$new_id = $sql->last_id();


/**
 * update an entry
 */
$sql->update("UPDATE table_name SET password = ? where username = ?", array(md5('secret_password'), 'foobar'));
```
