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
						<td align="center" class="row2" width="100">ID</td>
						<td align="center" class="row2" width="100">Type</td>
						<td align="center" class="row2" width="100">Gender</td>
						<td align="center" class="row2" width="400">Member</td>
					</tr>
					<LOOP Name="{member}" SQL="{qu}" LIMIT="20">
					<tr bgcolor="#EEEEEE|#FFFFFF">
						<td align="center" width="100" >{member.m_id}</td>
						<td align="center" width="100" >{member.m_type}</td>
						<td width="100" >
						<p align="center">{member.gender}</td>
						<td width="400" >
						<p align="center">
							<a href="javascript:;" onClick="MM_openBrWindow('member.php?go=search&id={member.m_id}&type={member.m_type}','template','width=400,height=300')">{member.name}</a></td>
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
<IF NAME="{member_paging}">
	Pages: [{member_paging}]
<ELSE>
</IF>
</p>
