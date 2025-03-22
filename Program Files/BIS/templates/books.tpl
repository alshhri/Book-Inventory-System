<div align="center">
	<table border="0" width="800" cellspacing="0" cellpadding="0">
		<tr>
			<td>
			<div align="center">
				<p align="center">&nbsp;</p>
				<p align="center"><a href="books.php?go=add">
				<img border="0" src="templates/images/folder_add_48.png"></a></p>
				<table border="0" width="800" cellpadding="0" style="border-collapse: collapse">
					<tr>
						<td align="center" class="row2" width="172">Book ISBN</td>
						<td align="center" class="row2" width="287">Book Title</td>
						<td align="center" class="row2" width="120">Quantity in 
						Male</td>
						<td align="center" class="row2" width="120">Quantity in 
						Female</td>
						<td width="45" align="center" class="row2">Edit</td>
						<td width="40" align="center" class="row2">Delete</td>
					</tr>
					<LOOP Name="{books}" SQL="{qu}" LIMIT="15" >
					<tr bgcolor="#EEEEEE|#FFFFFF">
						<td width="172" align="center" >{books.ISBN}</td>
						<td width="287" align="center" >{books.title}</td>
						<td align="center" width="120" >{books.m_quantity}</td>
						<td width="120" align="center" >{books.f_quantity}</td>
						<td width="45" align="center" >
						<a href="books.php?go=edit&id={books.ISBN}">
						<img border="0" src="templates/images/edit.gif" width="16" height="16"></a></td>
						<td width="40" align="center" >
						<a href="books.php?go=delete&id={books.ISBN}">
						<img border="0" src="templates/images/delete.gif" width="16" height="16" onclick="if(confirm('Do you really want to delete the record')) return true; else return false;"></a></td>
					</tr>
					</LOOP>
				</table>
			</div>
			</td>
		</tr>
	</table>
</div>
	<p>&nbsp;</p>
	<p align="center">
<IF NAME="{books_paging}">
	Pages: [{books_paging}]
<ELSE>
</IF>
</p>