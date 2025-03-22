<div align="center">
	<table border="0" width="800" cellspacing="0" cellpadding="0">
		<tr>
			<td>
			<div align="center">
				<form method="POST" action="courses.php?go=adding">
					<p>&nbsp;</p>
					<table border="0" width="500" cellspacing="0" cellpadding="0">
						<tr>
							<td class="row2" height="24">Add new 
							Course :</td>
						</tr>
						<tr>
							<td class="row1" width="500" align="center">Code</td>
						</tr>
						<tr>
							<td class="row1" width="500" align="center">
							<input type="text" name="code" size="31"></td>
						</tr>
						<tr>
							<td class="row1" width="500">&nbsp;</td>
						</tr>
						<tr>
							<td class="row1" width="500">
							<p align="center">Book ISBN</td>
						</tr>
						<tr>
							<td class="row1" width="500">
							<p align="center">
							<select name="book_ISBN" style="width: 346; height: 21" size="1" tabindex="1">
							<option value="" selected>NULL</option>
							<LOOP Name="{isbn}" SQL="select title,ISBN from books">
							<option value="{isbn.ISBN}">ISBN:{isbn.ISBN} &nbsp;/&nbsp;  Title:{isbn.title}</option>
							</LOOP>
							</select></td>
						</tr>
						<tr>
							<td class="row1" width="500">
							<p align="center">&nbsp;</p>
							<p align="center">
							<input  name="B1" style="width: 97; height: 24; border-style: solid; border-width: 1px; background-image: url('templates/images/action_save.gif'); background-repeat: no-repeat; background-position: left center" type="submit" value="Save"></td>
						</tr>
					</table>
					<p>&nbsp;</p>
				</form>
			</div>
			</td>
		</tr>
	</table>
</div>
