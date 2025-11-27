<?php
/*
 * Copyright (c) 2025 Bloxtor (http://bloxtor.com) and Joao Pinto (http://jplpinto.com)
 * 
 * Multi-licensed: BSD 3-Clause | Apache 2.0 | GNU LGPL v3 | HLNC License (http://bloxtor.com/LICENSE_HLNC.md)
 * Choose one license that best fits your needs.
 *
 * Original PTL Repo: https://github.com/a19836/ptl/
 * Original Bloxtor Repo: https://github.com/a19836/bloxtor
 *
 * YOU ARE NOT AUTHORIZED TO MODIFY OR REMOVE ANY PART OF THIS NOTICE!
 */

//PTL - PHP Template Language test
include __DIR__ . "/autoload.php";

$t = isset($_GET["t"]) ? $_GET["t"] : 1;

/* some default and pre-defined functions and vars so the code doesn't give error on execution */
function pau($x = null, $y = null, $w = null, $t = null) {}
function funcXXX($x = null, $y = null, $w = null, $t = null) {}
function callFuncXX($x = null, $y = null, $w = null, $t = null) {}
function callArray($x = null, $y = null, $w = null, $t = null) {return array();}
$GLOBALS["arr"] = array();

$template_1 = '
<php:class:PaginationLayout:extends:stdClass></php:class:MyClass>
<?:function:foo s></php:function:foo>

<ptl:var:PaginationLayout new PaginationLayout(0, 50, array("current_page" =&gt; 0), "current_page") />
<php:funcXXX>
<php:funcXXX jp 12>
<php:funcXXX jp . pau (1 + 12.3412 1 < 2)>
<php:funcXXX (12.3412 as) jp>
<php:funcXXX (we rr) as as>
<ptl:funcXXX ("we rr") as as />
<ptl:echo foo((12.3412 as) jp) />
<ptl:echo foo((we rr) as as) />
<php:print jp . "pauá" (1 + 12.3412 1 < 2)>';

$template_2 = '
<php:echo $_GET?print_r($_GET, 1):"NO GET ARRAY">
<php:echo $_GET ? 123.234 asd : "">
<php:echo $_GET ?"":"asd" asd212>
<php:echo   (     $_GET?"":"" )>
<php:echo +@$_GET[name]>
<php:echo +.@$_GET[name]>
<php:echo +pau()>
<php:echo + ()>
<php:echo as +asdsd-12>
<php:echo as +asd " " sd-12>
<php:echo as +asd" "sd-12>

<?:function:asd s>
	<php:echo $s>
</php:function:asd>

<ptl:echo asd/ss{@$var[asd][asd(asd 12)]}ss/asd>
<ptl:echo asd/ss@${var[asd][asd(asd 12)]}ss/asd>
<ptl:echo asd/s"s{@$var[asd][asdasd(f)]}ss/asd">
<ptl:echo "asd/ss@$var[asd][asdasd]ss/asd">
<ptl:echo "bla ble ." @$input[username] ". bli blo." @$input[name] ". blu"/>';

$template_3 = '
<php:define NAME name>
<php:definevar:name NAME>
<php:var:name NAME>
<php:var:name NAME $name>
<php:var:y 12>
<php:echo name intval($y) "," callFuncXX (asd, floatVal(123), array(1,2,asd))>
<php:echo $name intval($y) "," callFuncXX (asd, floatVal(123), array(1,2,asd))>
<ptl:echo @$arr[@$_GET[0]]@$arr[ @$_GET[$name ] ] or @$arr[ @$_GET[name ]][joao][paulo] or @$arr[str_replace(search replacement, $name)]>
<php:var:name \'.\' intval($y) . callFuncXX (asd, floatVal(123), array(1,2,asd), paulo>
- <php:var:name intval($y) + callFuncXX (asd floatVal(123) . 2 array(1 2 asd) (joao paulo) pinto)>
';

$template_4 = '
<php:if @$name == joao || intval(@$y) &gt; 1 && callFuncXX (12 floatVal(sads), array(1,2,asd))>
<php:elseif @$name == joao || intval(@$y) &gt; 1 && !callFuncXX (12 floatVal(sads), array(1,2,asd))>
</php:if>

<php:for $i = @$y; $i < intval(@$y) . callFuncXX (asd, floatVal(123), array(1,2,asd)); $i++></php:for>
<php:for $i = 0 $i < (intval(@$y) callFuncXX (asd, floatVal(123), array(1,2,asd))) $i++></php:for>

<php:foreach $GLOBALS[arr] $item></php:foreach>
<php:foreach array((arr jp) 12) k $item></php:foreach>
<php:foreach array(arr jp 12) k $item></php:foreach>
<php:foreach callArray (asd, floatVal(123)) k item></php:foreach>
';

$template_5 = '
<php:switch @$name>
	<php:case joao>
		<php:echo JP>
		<php:break>
	<php:default>
		<php:echo OTHER>
</php:switch>
<php:switch name>
	<php:default>
		<php:echo OTHER>
</php:switch>

<php:try>
	<php:echo try some code here>
	
	<php:throw new Exception("asdasd", 123)>
	<php:throw funcXXX(new Exception("asdasd", 123))>
	<php:throw $e>
	<php:throw e>
	<php:throw:Exception asdasd 123>
<?:catch Exception exc>
	<php:echo CATCHED>
</php:try>
';

$template_6 = '
<php:class:MyClass:extends:stdClass>
	<php:var:public:bar 123>
	<php:var:CONST:bar2 123>
	
	<php:function:public:static:foo $x $y = 0>
		<php:return INSIDE OF FUNCTION>
	</php:function>
</php:class:MyClass>

<?:function:foo x y = 0>
	<php:return INSIDE OF FUNCTION>
</php:function:foo>
';

$template_7 = '
<?:code $i = 0 * 2; $x = "asd"; $obj = new MyClass(); $obj-&gt;bar="asd"; echo MyClass::bar2; >
<ptl:code $obj-&gt;bar = 123;>
<php:code $obj-&gt;bar = MyClass::foo(1);>

<!--php:code sad asd-->
';

$template_8 = '
<ptl:var:asd new XXX(asd, 123, array(12,s))/>
<ptl:var:asd "new" XXX(asd, 123, array(12,s))/>
<ptl:var:asd-&gt;xxx 234 asd/>
<php:var:Obj::bar $MyClass-&gt;foo(1)>
<ptl:var:asd["xxx"] $foo["bar"]/>
<ptl:var:asd-&gt;xxx/>
<ptl:var:asd["xxx"]/>
<ptl:var:asd[asd]/>
<ptl:var:asd/>
<ptl:var:asd />
<ptl:incvar:asd 1 />
<ptl:decvar:asd 1 />
<ptl:joinvar:asd joao />
<ptl:concatvar:asd paulo />

<php:var:x "asd&gt;">
<php:var:x asd&gt;as2&gt;32as>
<php:var:x 2&gt;32>
<php:var:x "2&gt;32">

<php:var:x "false" >
<php:var:x true>
<php:var:x false >
<php:var:x is $asd false>?
<php:var:x is $asd . false sd>
<ptl:if $x == true || false != $x || "false" != 12 ></ptl:if>

<php:var:x &gt; &amp;gt; &amp;amp;gt; >
<php:var:x "&gt; &amp;gt; <> &amp;amp;gt;" >
';

$template_9 = '
\\<ptl:echo \'asd"asd\'/>
<ptl:echo asd\"asd />
<ptl:echo asd\\"asd />\\
<ptl:echo "asd\"asd" />
<ptl:echo assd"as2sd />\\

<!--php:include $path /asd/qwe/$asd/as12s.php>
bla ble comments here
<php:include $path \'/asd/qwe/$asd/as12s.php\'-->

<!-- but leave this comments -->
some html here
';

$template_10 = '
<div class="div_class">
	<form action="?name=<?:echo $_GET[name]>" method="post">
		<php:for ($i = 0) ($i < 2) $i++>
			<php:if $_GET[name] == 123 && 1 == 1>
				<input type="text" name="name" value="<php:echo $_GET[name]>" />
			<php:elseif asd == 123>
				<input type="text" name="name" value="<php:echo $_GET[name]>" />
			<ptl:else>
				<textarea name="name"><?:echo $_GET[name]></textarea>
			</?:if>
		</php:for>
		
		<?:echo joao 12.3>
		<!--?:echo "joao 123"-->
	</form>
</div>';

$template_11 = "<div class=\"form-group photo_id hidden\">
   <div class=\"form-input\">
      <input type=\"hidden\" class=\"form-control \" value=\"<ptl:echo str_replace('\"', '&quot;', (\$input[photo_id] )) />\" photoUrl=\"<ptl:echo str_replace('\"', '&quot;', (\$input[photo_url] )) />\" onRemovePhotoConfirmationMessage=\"<ptl:echo str_replace('\"', '&quot;', (translateProjectText(\$EVC, 'Do you really want to delete this photo?'))) />\" name=\"photo_id\" />
   </div>
</div>";

$template_12 = '<div class="nav-text<ptl:if strlen(\$item[label]) &gt; 22> nav-text-slide</ptl:if>"><ptl:echo \$item[label]/>:<ptl:echo strlen(\$item[label])></div>
<div class="nav-text<ptl:echo strlen(\$item[label]) &gt; 22? " nav-text-slide" : ""/>"><ptl:echo \$item[label]/>:<ptl:echo strlen(\$item[label])></div>
<div class="nav-text<ptl:if strlen($item[label]) &gt; 22> nav-text-slide</ptl:if>"><ptl:echo $item[label]/>:<ptl:echo strlen($item[label])></div>
<div class="nav-text<ptl:echo strlen($item[label]) &gt; 22? " nav-text-slide" : ""/>"><ptl:echo $item[label]/>:<ptl:echo strlen($item[label])></div>';

$template_13 = '<php:funcXXX (12.3412 as) jp>
<php:funcXXX (we rr) as as>
<ptl:echo foo((12.3412 as) jp) />
<ptl:echo foo((we rr) as as) />
<php:throw:Exception (we rr) as as>
<php:throw:Exception (12.3412 as) jp>
<php:function:foo $x $y = a(3 as, (as ass))></php:function>
<php:function:foo $x $y = a((as ass) 3 as)></php:function>
<php:foreach array((12.3412 as) jp) $item></php:foreach>
<php:foreach array((we rr) as as) k $item></php:foreach>';

$template_14 = '
<php:echo @$_GET ? print_r($_GET, 1) : "NO GET ARRAY">
<php:echo +@$_GET[NAME]>
<php:echo +.@$_GET[NAME]>
<php:echo @$_GET[NAME]>
<ptl:echo @$arr[@$_GET[0]]$arr[ @$_GET[$name ] ] or $arr[ $_GET[name ]][joao][paulo]>
<ptl:foo @$_GET[bar]>
<php:if @$x == joao || intval($y) &gt; 1 && callFuncXX (12 floatVal(sads), array(1,2,asd), @$_POST)>
<ptl:echo @$_GET ? foo((we rr) as as) : null />

<ptl:if isset($item[menus]) && is_array($item[menus])>
	<ptl:if !empty($item[menus]) || empty($_GET[name])>
		<ptl:echo isset($item[class]) ? $item[class] : null/>
			<ptl:if !empty($_GET[all]) || !empty($_GET[tag])>
				<ptl:echo !empty($_GET[all]) ? "Articles in all categories" : "Articles in category: \'" (!empty($_GET[tag_label]) ? $_GET[tag_label] : $_GET[tag]) "\'" />
			</ptl:if>
		<ptl:echo !empty($_GET[all]) ? \' active\' : \'\' />
	</ptl:if>
</ptl:if>
<ptl:echo isset($_GET[tag]) && isset($item[url]) && $_GET[tag] == $item[url] ? \' active\' : "" />
<ptl:var:user_name isset($user[username]) ? $user[username] : null/>
<ptl:var:user_label !empty($user[name]) ? $user[name] " - " $user_name : $user_name />
<ptl:echo isset($_GET[user_id]) && isset($user[user_id]) && $_GET[user_id] == $user[user_id] ? \' active\' : \'\' />
</php:if>

<div class="appointment-sessions-count">
   <ptl:echo @$input[last_appointment_sessions_stats][sessions_count] . (@$input[last_appointment_sessions_stats][treatments_count] ? " / " . (@$input[last_appointment_sessions_stats][treatments_total] / @$input[last_appointment_sessions_stats][treatments_count]) : "")/>
   <br/>
   <ptl:echo (@$input[last_appointment_sessions_stats][sessions_count] * @$input[last_appointment_sessions_stats][treatments_count]) . " / " . @$input[last_appointment_sessions_stats][treatments_total] . (@$input[last_appointment_sessions_stats][sessions_treatments_count] ? " + " . @$input[last_appointment_sessions_stats][sessions_treatments_count] . \' \' : "")/>
</div>
';

$template_15 = '<ptl:echo addcslashes(str_replace("\n", "", foo($x)), "\'") />';
$template_16 = "<ptl:echo str_replace('</textarea', '&lt;/textarea', (\$_POST[description] ? \$_POST[description] : \$input[appointment][description])) />";
$template_17 = "<ptl:echo str_replace('</textarea', '&lt;/textarea', \$asd !== \$_POST[description] ? \$_POST[description] : \$input[appointment][description]) />";
$template_18 = "<span class=\"badge badge-<ptl:echo \$item[active] ? 'success' : 'secondary'/>\"><ptl:echo translateProjectText(\$EVC, \$item[active] ? 'Active' : 'Inactive')/></span>";
$template_19 = '<ptl:echo $asd && "asd" />';
$template_20 = '<ptl:echo $asd || "asd" />';
$template_21 = '<php:for $i = $y ? 2 : 7; $i < ($g ? 10 : 11); $i++></php:for>';
$template_22 = '<php:for $i = $y ? 2 : 7; $i < 10 ? true : false; $i++></php:for>';
$template_23 = '<php:for $i = ($x ? 2 : 1) ? ($w ? 4 : 5) : ($u ? 6 : 7); $i < 10 ? true : false; $i++></php:for>';
$template_24 = '<php:for $i = ($x ? 2 : 1) ? ($w ? 4 : 5) : ($u ? 6 : 7); $i < 10 ? (4 ? 4:0) : ($h?true:false); $i++></php:for>';
$template_25 = '<php:for $i = $x ? ($y ? 2 : 1) : 7; $i < 10; $i++></php:for>';
$template_26 = '<php:for $i = ($x ? ($y ? 2 : 1) : 7); ($i < 10 ? true : false); $i++></php:for>';

$template = $template_1;

if ($t) {
	eval("\$template = isset(\$template_$t) ? \$template_$t : \$template;");
}

$PHPTemplateLanguage = new PHPTemplateLanguage();
$code = $PHPTemplateLanguage->getTemplateCode($template);
$valid = PHPScriptHandler::isValidPHPContents($code);

echo "<h1 style='text-align:center;'>PTL - PHP Template Language</h1>";
echo '<h2 style="text-align:center">Choose a Template: 
	<select onChange="document.location=\'?t=\' + this.value;">';
for ($i = 1; $i <= 26; $i++)
	echo "<option" . ($i == $t ? " selected" : "") . ">$i</option>";
echo "</select></h2>";

echo "<h3 style='margin-bottom:0;'>HTML PTL</h3>";
echo "<p style='margin-top:0;'>This is the html template with ptl tags, to be parsed to php.<br/>The idea is to mix the PTL code below with regular HTML.</p>";
echo "<textarea style='width:100%;height:200px;color:#333;' readonly>$template</textarea>";
echo "<br/><br/>";

echo "<h3 style='margin-bottom:0;'>GENERATED PHP CODE - " . ($valid ? '<span style="color:green; font-weight:bold;">VALID CODE</span>' : '<span style="color:red; font-weight:bold;">INVALID CODE</span>') . "</h3>";
echo "<p style='margin-top:0;'>This is the PHP code generated from the template above.</p>";
echo "<textarea style='width:100%;height:200px;color:#333;' readonly>$code</textarea>";
echo "<br/><br/>";

echo "<h3 style='margin-bottom:0;'>OUTPUT FROM EXECUTED PHP CODE</h3>";
echo "<p style='margin-top:0;'>This is the output from the execution of the generated PHP code.<br/><small>Note that if you get some execution erros or exceptions, this doesn't mean your code was generated incorrectly. Maybe was your PTL that needs something else... like some variables definition, before you call that variables...</small></p>";
echo "<textarea style='width:100%;height:200px;color:#333;' readonly>";
echo $PHPTemplateLanguage->parseTemplate($template);
echo "</textarea>";
echo "<div style='margin-bottom:50px;'></div>";
die();
?>
