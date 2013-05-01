<html>
<head></head>
<body>

<p>Please waiting for the output ... (5 seconds)</p>

<script type="text/javascript">
function println(content) {
	document.write(content + "<br>");
}
</script>

<script type="text/javascript" src="script.php?action=print&sleep=5&content=1"></script>
<script type="text/javascript" src="script.php?action=print&sleep=4&content=2"></script>
<script type="text/javascript" src="script.php?action=print&sleep=3&content=3"></script>
<script type="text/javascript" src="script.php?action=print&sleep=2&content=4"></script>
<script type="text/javascript" src="script.php?action=print&sleep=1&content=5"></script>


<script type="text/javascript">
var code = 'var theNumber=9;function theFunction(){println(8)}';
code += 'println(6);';
code += "document.write('";
code += '<?php echo urlencode('<script type="text/javascript" src="script.php?action=print&sleep=2&content=6.1"></script>'); ?>';
code += "')";
document.write('<script type="text/javascript" src="script.php?action=code&sleep=3&content=' + code + '"><\/script>');
</script>

<script type="text/javascript">
document.write('<script type="text/javascript">');
document.write('println(7);')
document.write('theFunction();');
document.write('println(theNumber);');
document.write('<\/script>');
</script>

<script type="text/javascript">
println(10);
</script>

<p>
The correct order is from 1 to 10
</p>

</body>
</html>