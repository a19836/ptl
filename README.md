# PTL - PHP Template Language

> Original Repos:   
> - PTL: https://github.com/a19836/ptl/   
> - Bloxtor: https://github.com/a19836/bloxtor/

## Overview

**PTL (PHP Template Language)** is a template language that allows you to write logic code directly inside HTML.  
It’s designed to be **user-friendly**, **fast**, and acts as a simplified **representation of PHP** within an HTML-based template language.
**PTL** works as a flexible alternative to Smarty, automatically adapting to PHP versions and providing greater versatility and extensibility.

The idea of PTL is to convert PHP into an user-friendly template language.

Check out a live example by opening [index.php](index.php).

---

## Why PTL?

Some might argue that PTL does what PHP already does — separating presentation from business logic.  
While PHP is excellent for programming, mixing it with HTML can lead to messy and hard-to-manage syntax.  

PTL solves this by introducing **clean, tag-based syntax** that insulates the PHP logic from the presentation layer.

The tags reveal application content clearly and enforce a **clean separation** between HTML and PHP logic.

---

## When to Use PTL

The importance of separation between logic and presentation depends on your project.  
PTL is especially useful when:

- **Web designers** manage templates (not PHP developers).
- **Efficient template management** is required.
- The **project includes hundreds or thousands of templates** (template inheritance helps keep maintenance simple).

Even though PTL introduces an additional compile step, the **time saved** in template maintenance makes it worthwhile.

---

## PTL vs PHP Examples

Below are side-by-side comparisons between PTL syntax and equivalent PHP code.

| **PTL** | **PHP** |
|----------|----------|
| `<php:foo></php:foo>` | `foo();` |
| `<php:foo jp></php:foo>` | `foo("JP");` |
| `<php:foo jp 12 bar (1 + 12.3412 1 < 2)></php:foo>` | `foo("JP", 12, bar(1 + 12.3412, 1 < 2));`<br>_foo_ and _bar_ are functions. _foo_ receives 3 arguments and _bar_ receives 2. |
| `<php:foo bar(trim(jp))></php:foo>` | `foo(bar(trim("JP")));` |
| `<php:echo jp></php:echo>` | `echo "JP";` |
| `<php:echo jp . 23 bar (1 + 12.3412 1 < 2)></php:echo>` | `echo "JP" . 12 . bar(1 + 12.3412, 1 < 2);`<br>_bar_ is a function which receives 2 arguments. |
| `<php:var:name jp></php:var:name>` | `$name = "JP";` |
| `<php:var:name intval($y) . foo (jp, floatval(123)array(1,2 onlineit)some string)></php:var:name>` | `$name = intval($y) . foo("JP", floatVal(123), array(1, 2, "OnlineIT"), "Some string");` |
| `<php:for $i="0" < count($array) $i++></php:for>` | `for ($i = 0; $i < count($array); $i++) {}` |
| `<php:for $i="0" < (intval($y) callfuncxx (asd, floatval(123) array(1 2 asd))) $i++></php:for>` | `for ($i = 0; $i < (intval($y) . callFuncXX("asd", floatVal(123), array(1, 2, "asd"))); $i++) {}` |
| `<php:foreach $arr key item></php:foreach>` | `foreach($arr as $key => $item) { }` |
| `<php:foreach array(1, 2) key item></php:foreach>` | `foreach(array(1, 2) as $key => $item) { }` |
| `<php:switch $name><br>&emsp;<php:case joao><br>&emsp;&emsp;<php:echo jp></php:echo><br>&emsp;&emsp;<php:break></php:break><br>&emsp;</php:case><br>&emsp;<php:default><br>&emsp;&emsp;<php:echo other></php:echo><br>&emsp;</php:default><br></php:switch>` | ```php<br>switch ($name) {<br>  case "joao":<br>    echo "jp";<br>    break;<br>  default:<br>    echo "other";<br>}``` |
| `<php:try><br>&emsp;<php:throw new myexception("some message here" 123)></php:throw><br><?:catch Exception exc><br>&emsp;<php:echo catched></php:echo><br></php:try>` | ```php<br>try {<br>  throw new MyException("some message here", 123);<br>} catch(Exception $exc) {<br>  echo "catched";<br>}``` |
| `<php:class:myclass:extends:stdclass><br>&emsp;<php:var:public:bar 123></php:var:public:bar><br>&emsp;<php:var:const:bar2 123></php:var:const:bar2><br><br>&emsp;<php:function:public:static:foo $x $y="0"><br>&emsp;&emsp;<php:return inside of function></php:return><br>&emsp;</php:function:public:static:foo><br></php:class:myclass:extends:stdclass>` | ```php<br>class MyClass extends stdClass {<br>  public $bar = 123;<br>  const bar2 = 123;<br><br>  public static function foo($x, $y = 0) {<br>    return "inside of function";<br>  }<br>}``` |
| `<?:function:foo $x y = 0><br>&emsp;<php:return inside of function></php:return><br></?:function:foo>` | ```php<br>function foo($x, $y = 0) {<br>  return "inside of function";<br>}``` |
| `<?:code $i = 0 * 2; $x = "asd"; $obj = new MyClass(); $obj->bar="asd"; echo MyClass::bar2; >` | `$i = 0 * 2; $x = "asd"; $obj = new MyClass(); $obj->bar="asd"; echo MyClass::bar2;` |
| `<php:code {$obj}->bar = MyClass::foo(1);>` | `$obj->bar = MyClass::foo(1);` |

---

## Usage

```php
<?php
// Include autoload file
include "autoload.php"; // or use require_once if needed

// Initialize PHPTemplateLanguage object
$PHPTemplateLanguage = new PHPTemplateLanguage();

// Create your PTL code together with your HTML
$template = '
    ... some html code here ...
    
    <ptl:var:x 123/>
    
    ... some other html code here ...
    
    <ptl:if $x>
        <h1><ptl:echo $x /></h1>
    </ptl:if>
    
    ... some other html code here ...
';

// Convert PTL into PHP code
$code = $PHPTemplateLanguage->getTemplateCode($template);

// Execute a template
$output = $PHPTemplateLanguage->parseTemplate($template);

// (Optional) Or check if the generated code is valid PHP
if (PHPScriptHandler::isValidPHPContents($code)) {
    // Execute the generated PHP code and get the output
    $output = PHPScriptHandler::parseContent($code);
} 
else
    echo "Invalid PTL code generated.";

// Print the output to the browser
echo $output;
?>
```

---

## Tutorials

To learn PTL through readable tutorials and practical examples, visit: [PTL Documentation](https://bloxtor.com/onlineitframeworktutorial/?block_id=documentation/ptl)  

To learn PTL through video tutorials and practical examples, visit: [PTL Video Tutorials](https://bloxtor.com/onlineitframeworktutorial/?block_id=video/advanced#tutorial_conversion_of_form_settings_to_ptl)  

---

## Summary

PTL is a **template-driven alternative to PHP syntax**, providing:
- Cleaner, tag-based structure
- Easier collaboration between developers and designers
- Built-in caching and inheritance mechanisms
- One-time compilation for optimized performance

Ideal for teams where **HTML and logic are managed separately**.


