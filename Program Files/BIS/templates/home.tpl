
<head>
<meta http-equiv="Content-Language" content="en-us">
</head>

<div align="center">
	<table border="0" width="800" cellspacing="0" cellpadding="0">
		<tr>
			<td>&nbsp;<table border="0" width="800" cellspacing="0" cellpadding="0">
				<tr>
					<td class="row2" width="400">Welcome {user_name}</td>
					<td class="row2" width="400">Enter ID </td>
				</tr>
				<tr>
					<td width="400" class="row1">
					<table border="0" width="400" cellspacing="0" cellpadding="0">
						<tr>
							<td width="200">ID</td>
							<td>{user_id}</td>
						</tr>
						<tr>
							<td width="200">Email</td>
							<td>{user_email}</td>
						</tr>
						<tr>
							<td width="200">Mobile</td>
							<td>{user_mobile}</td>
						</tr>
						<tr>
							<td width="200">Group</td>
							<td><IF Name="{user_group} eq 0" >Administrator<ELSEIF Name="{user_group} eq 1">User</IF></td>
						</tr>
					</table>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</td>
					<td width="400" class="row1">
						<div align="center">
							<table border="0" width="83%" cellspacing="0" cellpadding="0">
								<form method="POST" action="search.php?go=search">
								<tr>
									<td>
									<p align="center">
									<input name="m_id" size="14" style="width: 231; height: 37; font-size: 18pt" type="text"></td>
								</tr>
								<tr>
									<td>
									<p align="center">
									<select name="m_type" style="width: 230; height: 77" size="40">
									<option selected value="student">student
									</option>
									<option value="teacher">teacher</option>
									<option value="other">other</option>
									</select></td>
								</tr>
								<tr>
									<td>
									<p align="center">
							&nbsp;<p align="center">
							<input class="button"name="B1" style="width: 97; height: 43; border-style: solid; border-width: 1.0px; background-image: url('../../IT/cpadmin/templates/templates/images/search.gif'); background-repeat: no-repeat; background-position: left center" type="submit" value="Search"></td>
								</tr>
								</form>
							</table>
						</div>
						&nbsp;</td>
				</tr>
			</table>
			</td>
		</tr>
	</table>
</div>
