**no need css hack. html tag adding your browser info**

if IE6

```
<html class="ie ie6 win js">
```

ie6 ie67 ie678 ie6789

if IE10

```
<html class="ie ie10 ie9m win js">
```


if iPhone Safari

```
<html class="webkit safari mobile ios iphone js">
```

if android retina tablet chrome

```
default internet
<html class="webkit chrome mobile chromedef android tablet retina ratio2 js">
google play chrome
<html class="webkit mobile chrome android tablet retina ratio2 js">
```

using

```
.myText { margin-bottom:2px; } 
.ie6 .myText { margin-bottom:1px; }
.opera .myText { margin-top:-1px; }
```

php version using
```
$className = css_browser_selector::getClassName($_SERVER['HTTP_USER_AGENT]);
```

**fork this project from : http://rafael.adm.br/css_browser_selector/ -read original document**

**more support types**

```
.ie67, .ie678, .ie9m (IE9 and more)
.ff4 ~ .ff11 and more
```

**if jQuery && mobile support**

**width > height ? landscape : portrait**

```
.portrait .landscape
.smartnarrow ( <= 360 )
.smartwide ( <= 640 )
.tabletnarrow ( <= 768 )
.tabletwide ( <= 1024 )
.pc ( > 1024 )
```

example

```
#photo { float:left; }
.iphone.portrait #photo { clear:both; }
.smartwide #leftMenu, .tabletwide #leftMenu { float:left; width:120px; }
.tabletwide #rightMenu { float:right; width:120px; }
```

**support retina : view test page.**

**mobile font zoom disable**

```
body {
	-webkit-text-size-adjust: none;
	-moz-text-size-adjust: none;
	-ms-text-size-adjust: none;
	text-size-adjust: none;
}
```

**jquery 1.9 $.browser deprecated.**

```
// window.CSSBS_* defined.
if(window.CSSBS_ie) alert('MSIE');
if(window.CSSBS_ie6) alert('MSIE 6');

if MSIE define $.browser = {msie:1,version:msie version};
other browser $.browser = {};
```

**compressed**

https://css-browser-selector.googlecode.com/git/css_browser_selector.min.js

**source**

https://css-browser-selector.googlecode.com/git/css_browser_selector.js

https://css-browser-selector.googlecode.com/git/css_browser_selector.class.php

**test page**

https://css-browser-selector.googlecode.com/git/test.html

