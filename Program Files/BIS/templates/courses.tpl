<script language="JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
window.open(theURL,winName,features);
}
//-->
</script>
<div align="center">
	<table border="0" width="800" cellspacing="0" cellpadding="0">
		<tr>
			<td>
			<div align="center">
				<p align="center">&nbsp;</p>
				<p align="center"><a href="courses.php?go=add">
				<img border="0" src="templates/images/folder_add_48.png"></a></p>
				<table border="0" width="800" cellpadding="0" style="border-collapse: collapse">
					<tr>
						<td align="center" class="row2" width="172">
						Courses Code</td>
						<td align="center" class="row2" width="287">Book ISBN</td>
						<td width="45" align="center" class="row2">Edit</td>
						<td width="40" align="center" class="row2">Delete</td>
					</tr>
					<LOOP Name="{courses}" SQL="{qu}" LIMIT="15" >
					<tr bgcolor="#EEEEEE|#FFFFFF">
						<td width="172" align="center" >{courses.code}</td>
						<td width="287" align="center" ><a href="javascript:;" onClick="MM_openBrWindow('books.php?go=book_info&id={courses.book_ISBN}','template','width=400,height=300')">{courses.book_ISBN}</a></td>
						<td width="45" align="center" >
						<a href="courses.php?go=edit&id={courses.code}">
						<img border="0" src="templates/images/edit.gif" width="16" height="16"></a></td>
						<td width="40" align="center" >
						<a href="courses.php?go=delete&id={courses.code}">
						<img border="0" src="templates/images/delete.gif" width="16" height="16" onclick="if(confirm('Do you really want to delete the record')) return true; else return false;"></a></td>
					</tr>
					</LOOP>
				</table>
			</div>
			</td>
		</tr>
	</table>
	<p>&nbsp;</p>
	<p align="center">
<IF NAME="{courses_paging}">
	Pages: [{courses_paging}]
<ELSE>
</IF>
</p>
</div>