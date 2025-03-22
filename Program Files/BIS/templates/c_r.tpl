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
				<p align="center">&nbsp;</p>
				<table border="0" width="800" cellpadding="0" style="border-collapse: collapse">
					<tr>
						<td align="center" class="row2" width="200">M_ID</td>
						<td align="center" class="row2" width="200">M_Type</td>
						<td align="center" class="row2" width="200">Course Code</td>
						<td align="center" class="row2" width="200">Semester</td>
					</tr>
					<LOOP Name="{r_c}" SQL="{qu}" LIMIT="20">
					<tr bgcolor="#EEEEEE|#FFFFFF">
						<td align="center" width="100" >
						<a href="search.php?go=member&id={r_c.m_id}&type={r_c.m_type}">{r_c.m_id}</a></td>
						<td align="center" width="100" >{r_c.m_type}</td>
						<td width="100" >
						<p align="center">{r_c.c_code}</td>
						<td width="400">
						<p align="center">{r_c.semester}</td>
					</tr>
					</LOOP>
				</table>
			</div>
			</td>
		</tr>
	</table>
</div>
<p align="center">&nbsp;</p>
<p align="center">
<IF NAME="{r_c_paging}">
	Pages: [{r_c_paging}]
<ELSE>
</IF>
</p>
