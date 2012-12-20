**filenames.should.look.like.this.php**

**\t for identation, convert \t to 4 spaces for processes that handle tabs incorrectly.**

**No line should be longer than 180 characters (tabs counted as 4 characters).**

```php
$variablesAreLikeThis;
functions_are_like_this();
$ClassNamesAreLikeThis = new ClassName();
```

**This format should be followed by control structures & calls.**

**IF too long for one line format like this:**
```php
if
(
	this_is_condition1 &&
	this_is_condition2 &&
	this_is_condition3 &&
	this_is_condition4 &&
	this_is_condition5 &&
	this_is_condition6 &&
	this_is_condition7 &&
	this_is_condition8 &&
	this_is_condition9 &&
	this_is_condition10                                                                                                                                                                  
)
{
}
```
**Otherise use this:**
```php
if( this_conditon && that_condition )
{
}
```

**If it is a control structure without _any_ nesting, this is acceptable:**
```php
if( this_conditon && that_condition )
	echo "no_nest\n";
```


**Good ternary operators:**
```php
echo (true?true:false);
```

**Evil ternary operators (nesting - do not do):**
```php
(true?'true':false?'t':'f');
```

**Arrays: Arrays are to use text keys whenever semantic differences between values exist. Otherwise, use numeric keys.**
```php
$MaleNames = array('Bob','John','Tom');

$UserPass = array('username' => $username, 'password' => $password);
```

**Application Specific Details**
MySQL: PDO is used for all connections via the mysql class. All statements containing variables are to be prepared then executed. Always returns an associate array on SELECT.
