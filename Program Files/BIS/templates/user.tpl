<div align="center">
	<table border="0" width="800" cellspacing="0" cellpadding="0">
		<tr>
			<td>
			<div align="center">
				<p align="center">&nbsp;</p>
				<p align="center"><a href="user.php?go=add">
				<img border="0" src="templates/images/user_add_48.png"></a></p>
				<table border="0" width="800" cellpadding="0" style="border-collapse: collapse">
					<tr>
						<td align="center" class="row2" width="84">ID#</td>
						<td align="center" class="row2" width="358">Name</td>
						<td align="center" class="row2">Group</td>
						<td width="45" align="center" class="row2">Edit</td>
						<td width="40" align="center" class="row2">Delete</td>
					</tr>
					<LOOP Name="{users}" SQL="{qu}" >
					<tr bgcolor="#EEEEEE|#FFFFFF">
						<td width="84" >
						<p align="center">{users.id}</td>
						<td width="358" >
						<p align="center">{users.name}</td>
						<td >
						<p align="center">&nbsp;<IF Name="{users.group} eq 0">Administrator<ELSEIF Name="{users.group} eq 1">User </IF></td>
						<td width="45" align="center" >
						<a href="user.php?go=edit&id={users.id}">
						<img border="0" src="templates/images/edit.gif" width="16" height="16"></a></td>
						<td width="40" align="center" >
						<a href="user.php?go=delete&id={users.id}">
						<img border="0" src="templates/images/delete.gif" width="16" height="16" onclick="if(confirm('Do you really want to delete the record')) return true; else return false;"></a></td>
					</tr>
					</LOOP>
				</table>
			</div>
			</td>
		</tr>
	</table>
</div>
